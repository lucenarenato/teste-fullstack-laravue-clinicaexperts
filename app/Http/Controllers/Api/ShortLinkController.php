<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ShortLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShortLinkController extends Controller
{
    public function index()
    {
        $shortLink = new ShortLink();
        return response()->json($shortLink->all(), 200);
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
            'url_mini' => isset($request->identificador) ? $url . '/' . $request->identificador : $url . '/' . $url_mini,
        ];
        $shortLink->create($params);
        return response()->json($params, 200);
    }

    public function show($id)
    {
        $value = ShortLink::where('url_mini', '=', env('APP_URL') . '/' . $id)->first();
        if (isset($value)) {
            $params = [];
            $value->num_acessos = $value->num_acessos + 1;
            $value->update();
            $params = ['linkOriginal' => $value->url_link];
            return response()->json($params, 200);
        }
        $response = array();
        $response = ['Status' => 'Erro', 'Mensagem' => 'Link não cadastrado!'];
        return response()->json($response, 402);
    }

    public function update(Request $request, $id)
    {
        $value = ShortLink::where('url_mini', '=', env('APP_URL') . '/' . $id)->first();
        if (!isset($value)) {
            $response = array();
            $response = ['Status' => 'Erro', 'Mensagem' => 'Paramento não foi passado ou invalido!'];
            return response()->json($response, 404);
        }
        $url_mini = substr(sha1(time()), 0, 8);

        $params = [];
        $url = env('APP_URL');
        $params = [
            'url_link' => $request->link,
            'identificador' => $request->identificador ? $request->identificador : null,
            'url_mini' => isset($request->identificador) ? $url . '/' . $request->identificador : $url . '/' . $url_mini
        ];

        $value->update($params);
        $response = array();
        $response = ['Status' => 'Sucesso','Resultado' => 'Update realizado com sucesso!'];
        return response()->json($response, 200);
    }

    public function destroy($id)
    {
        $value = ShortLink::where('url_mini', '=', env('APP_URL') . '/' . $id)->first();
        if (!isset($value)) {
            $response = array();
            $response = ['Status' => 'Erro','Mensagem' => 'Não foi encontrado resultado para a consulta!'];
            return response()->json($response, 402);
        }
        else{
            DB::delete('delete from short_links where url_mini = ?',[$id]);
            $response = array();
            $response = ['Status' => 'Sucesso','Resultado' => "Delete realizado com sucesso!"];
            return response()->json($response, 200);
        }
    }
}
