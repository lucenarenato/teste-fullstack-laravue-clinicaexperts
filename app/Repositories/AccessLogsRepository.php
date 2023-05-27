<?php

namespace App\Repositories;

use App\Models\AccessLog;
use App\Http\Requests\Request;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class AccessLogsRepository
{
    public function getIp()
    {
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key){
            if (array_key_exists($key, $_SERVER) === true){
                foreach (explode(',', $_SERVER[$key]) as $ip){
                    $ip = trim($ip); // just to be safe
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false){
                        return $ip;
                    }
                }
            }
        }
        return request()->ip();
    }

    public function create($request)
    {
            $ipData = $this->ipdata(); //data($request);
            dump($ipData);

            $accessLog = new AccessLog();
            $accessLog->ip = $this->getIp(); //$ipData['ip'] ? $ipData['ip'] : null;
            $accessLog->data = Carbon::now();
            $accessLog->pais = $ipData->country ? $ipData->country : null;
            $accessLog->continente = $ipData->continent ? $ipData->continent : null;
            $accessLog->latitude = $ipData->latitude ? $ipData->latitude : null;
            $accessLog->longitude = $ipData->longitude ? $ipData->longitude : null;
            $accessLog->cidade = $ipData->city ? $ipData->city : null;
            //$accessLog->location = $ipData['city'] . '-' . $ipData['country_name'] ? $ipData['city'] . '-' . $ipData['country_name'] : null;
            $accessLog->user_agente = request()->server('HTTP_USER_AGENT');
            // num_acessos
            if ($accessLog->save()) {
                return $accessLog;
            } else {
                return null;
            }
    }

    public function ipdata()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://www.iplocate.io/api/lookup/",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        }

        $response = json_decode($response);
        $lat = $response->latitude;
        $lon = $response->longitude;

        return $response;
    }
}
