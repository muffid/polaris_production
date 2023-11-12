<?php

namespace App\Http\Controllers\operatorController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;

class CetakOrderOperatorController extends Controller
{
    public function index(){

        $data = [

            'active' => 'Print',
            'session' => [
                    'status' => session('role'),
                    'username' => session('username'),
            ]

        ];
        return view('operator/cetak_order_operator',$data);
    }

    public function getEcommOnProses(){
        $client = new Client();
        try{
            $url = env('BASE_URL_API')."ecommerce/AllprosesSetting/";
            $response = $client->get($url, [
                'headers' => [
                    'auth-token' => session('token'),
                ],
            ]);
            $res = $response->getBody()->getContents();
            $result = [
                "data" => $res
            ];
            return response()->json($res);
        } catch (ClientException $e) {
            $response = $e->getResponse();
            $statusCode = $response->getStatusCode();
            dd($response);
            if ($statusCode === 401) {
                return $e;
            } else {
                return $e;
            }
        } catch (RequestException $e) {
            $response = $e->getResponse();
            $statusCode = $response->getStatusCode();
            dd($statusCode);
        }
    }



}
