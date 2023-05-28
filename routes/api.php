<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AccessLogsController;
use App\Http\Controllers\Api\ShortLinkController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('info', function () {
    $app_info = [
        'server' => getenv('APP_NAME'),
        'version' => getenv('APP_VERSION')
    ];

    return response()->json($app_info);
});

Route::get('ip', [AccessLogsController::class, 'getIp']);
Route::get('logs', [AccessLogsController::class, 'create']);

Route::get('short/list', [ShortLinkController::class, 'index']);
Route::post('short/link', [ShortLinkController::class, 'store']);
Route::get('short/link/{id}', [ShortLinkController::class, 'show']);
