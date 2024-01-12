<?php

namespace App\Http\Controllers\operatorController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;

class ScanOrderOperatorController extends Controller
{
    public function index(){

        $data = [

            'active' => 'ScanOrder',
            'session' => [
                    'status' => session('role'),
                    'username' => session('username'),
                    'img_profil' => session('img'),
            ]

        ];
        return view('operator/scan_order_operator',$data);
    }

    public function getDataEcommByResi($no_resi){
        $client = new Client();
        try{
            $url = env('BASE_URL_API')."ecommerce/finish/".$no_resi;
            $response = $client->get($url, [
                'headers' => [
                    'auth-token' => session('token'),
                ],
            ]);

            $res = $response->getBody()->getContents();
            return response()->json($res);
        } catch (ClientException $e) {
            $response = $e->getResponse();
            $statusCode = $response->getStatusCode();

            if ($statusCode === 401) {
                return $e;
            } else {
                return $e;
            }
        } catch (RequestException $e) {
            $response = $e->getResponse();
            $statusCode = $response->getStatusCode();

        }
    }

    public function setTuntas($no_resi){
        $client = new Client();
        try{
            $url = env('BASE_URL_API')."ecommerce/OrderTuntas/".$no_resi."/".session('id');
            $response = $client->put($url, [
                'headers' => [
                    'auth-token' => session('token'),
                ],
            ]);

            $res = $response->getBody()->getContents();
            return response()->json($res);
        } catch (ClientException $e) {
            $response = $e->getResponse();
            $statusCode = $response->getStatusCode();

            if ($statusCode === 401) {
                return $e;
            } else {
                return $e;
            }
        } catch (RequestException $e) {
            $response = $e->getResponse();
            $statusCode = $response->getStatusCode();

        }
    }
}
