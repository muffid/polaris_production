<?php
namespace App\Http\Controllers\desainerController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class OrderReturnController extends Controller
{
    public function index(){

        $data = [
            'order_tuntas' =>  json_decode($this->getTuntas(),true),
            'active' => 'Return',
            'session' => [
                    'status' => session('role'),
                    'username' => session('username'),
            ]

        ];

        return view('desainer/order_return',$data);
    }

    private function getTuntas(){
        $client = new Client();
        try{
            $url = env('BASE_URL_API')."ecommerce/bybulaninituntas";
            $response = $client->get($url,[
                'headers' => [
                    'auth-token' => session('token'),
                ]
                ]);
            return ($response->getBody()->getContents());
        } catch(ClientException $e){

        }
    }

    public function getOrderByBulan($bulan){

        $client = new Client();
        try{
            $url = env('BASE_URL_API')."ecommerce/bybulan/tuntas/".$bulan;
            $response = $client->get($url,[
                'headers' => [
                    'auth-token' => session('token'),
                ]
            ]);
           $res = $response->getBody()->getContents();
           $result = [
            "data" => $res
        ];
        return response()->json($res);
        } catch(ClientException $e){
            $result=["message"=>"fail"];
            return response()->json($result);
        }
    }



}
