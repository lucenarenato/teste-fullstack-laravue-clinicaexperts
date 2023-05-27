<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShortLink;

class ShortLinkController extends Controller
{
    public function index()
    {
        // $views->num_acessos = $views->num_acessos + 1;
    }

    public function store(Request $request)
    {
        $shortLink = new ShortLink();
        $this->validate($request, $shortLink->regras());
        $params = [];
        $url_mini = substr(sha1(time()), 0, 8);
        $url = env('APP_URL');
        $params = [
            'url_link' => $request->link,
            'identificador' => $request->identificador ? $request->identificador : null,
            'url_mini' => $url . '/' . $url_mini
        ];
        $shortLink->create($params);
        return response()->json($params, 200);
    }
}
