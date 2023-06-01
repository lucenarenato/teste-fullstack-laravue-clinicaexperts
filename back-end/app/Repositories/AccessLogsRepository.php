<?php

namespace App\Repositories;

use App\Http\Requests\Request;
use App\Models\AccessLog;
use Carbon\Carbon;

class AccessLogsRepository
{
    public function getIp()
    {
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key) {
            if (array_key_exists($key, $_SERVER) === true) {
                foreach (explode(',', $_SERVER[$key]) as $ip) {
                    $ip = trim($ip); // just to be safe
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false) {
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

        $accessLog = new AccessLog();
        $accessLog::updateOrCreate([
            'ip' => $ipData->ip ? $ipData->ip : null,
            'ip_local' => $this->getIp(),
            'data' => Carbon::now(),
            'pais' => $ipData->country ? $ipData->country : null,
            'continente' => $ipData->continent ? $ipData->continent : null,
            'latitude' => $ipData->latitude ? $ipData->latitude : null,
            'longitude' => $ipData->longitude ? $ipData->longitude : null,
            'cidade' => $ipData->city ? $ipData->city : null,
            'user_agente' => request()->server('HTTP_USER_AGENT'),
            'short_link_id' => $request,
        ],

        );

        return $accessLog;

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
