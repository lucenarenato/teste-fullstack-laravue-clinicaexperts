<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\AccessLog;
use App\Repositories\AccessLogsRepository;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpClient\Psr18Client;
use Nyholm\Psr7\Factory\Psr17Factory;


class AccessLogsController extends Controller
{
    public function getIp(){
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
        dump(request()->server('HTTP_USER_AGENT'));
        dump(request()->ip());
        return request()->ip(); // it will return the server IP if the client IP is not found using this method.
    }

    public function create(Request $request)
    {
        $accessLogsRepository = new AccessLogsRepository();
        $accessLogsRepository->create($request);

    }

}
