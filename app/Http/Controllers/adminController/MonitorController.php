<?php

namespace App\Http\Controllers\adminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;


class MonitorController extends Controller
{
    public function getMonitorData(){
        $client = new Client();
        try{
            $url = env('BASE_URL_API')."ecommerce/monitor_order";
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
    public function index(){

        $data = [
            'data_monitor' => $this->getMonitorData(),
            'active' => 'Monitor',
            'session' => [
                'status' => session('role'),
                'username' => session('username'),
                'img_profil' => session('img'),
        ],
            'key' => '897878',
        ];
        return view('globals/monitor',$data);
    }
}
