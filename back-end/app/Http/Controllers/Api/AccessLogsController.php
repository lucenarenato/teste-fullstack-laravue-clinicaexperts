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
    public function getIp(Request $request)
    {
        $accessLogsRepository = new AccessLogsRepository();
        dump($accessLogsRepository->getIp($request));
        dump(request()->server('HTTP_USER_AGENT'));

    }

    public function create(Request $request)
    {
        $accessLogsRepository = new AccessLogsRepository();
        $accessLogsRepository->create($request);

    }

}
