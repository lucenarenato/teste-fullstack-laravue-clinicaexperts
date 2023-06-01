<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ShortLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Repositories\AccessLogsRepository;

class ShortLinkController extends Controller
{
    public function index()
    {
        $shortLinks = ShortLink::get();
        $rows = [];
        foreach($shortLinks as $shortLink){
            $row = [
                'identificador' => $shortLink->identificador,
                'url_mini' => $shortLink->url_mini,
                'num_acessos' => $shortLink->num_acessos,
            ];
            array_push($rows, $row);
        }

        return response()->json($rows, 200);
    }

    public function store(Request $request)
    {
        $shortLink = new ShortLink();
        $this->validate($request, $shortLink->regras());
        $params = [];
        $url_mini = substr(sha1(time()), 0, 8);
        $url = 'http://localhost:8080'; //env('APP_URL');

        $params = [
            'url_link' => $request->link,
            'identificador' => $request->identificador ? $request->identificador : null,
            'url_mini' => isset($request->identificador) ? $url . '/' . $request->identificador : $url . '/' . $url_mini,
        ];
        $shortLink->create($params);
        return response()->json($params['url_mini'], 200);
    }

    public function show($id)
    {
        $value = ShortLink::where('url_mini', '=', 'http://localhost:8080' . '/' . $id)->first();
        if (isset($value)) {
            $params = [];
            $value->num_acessos = $value->num_acessos + 1;
            $value->update();
            $params = [
                'total_visits' => $value->num_acessos,
                'chave' => $value->url_link,
                'title' => $value->identificador
            ];
            $accessLogsRepository = new AccessLogsRepository();
            $accessLogsRepository->create($value->id);
            return response()->json($params, 200);
        }
        $response = array();
        $response = ['Status' => 'Erro', 'Mensagem' => 'Link não cadastrado!'];
        return response()->json($response, 402);
    }

    public function update(Request $request, $id)
    {
        $value = ShortLink::where('url_mini', '=', 'http://localhost:8080' . '/' . $id)->first();
        if (!isset($value)) {
            $response = array();
            $response = ['Status' => 'Erro', 'Mensagem' => 'Paramento não foi passado ou invalido!'];
            return response()->json($response, 404);
        }
        $url_mini = substr(sha1(time()), 0, 8);

        $params = [];
        $url = 'http://localhost:8080';
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
        $value = ShortLink::where('url_mini', '=', 'http://localhost:8080' . '/' . $id)->first();
        if (!isset($value)) {
            $response = array();
            $response = ['Status' => 'Erro','Mensagem' => 'Não foi encontrado resultado para a consulta!'];
            return response()->json($response, 402);
        }
        else{
            ShortLink::where('url_mini', '=', 'http://localhost:8080' . '/' . $id)->delete();
            $response = array();
            $response = ['Status' => 'Sucesso','Resultado' => "Delete realizado com sucesso!"];
            return response()->json($response, 200);
        }
    }
}
