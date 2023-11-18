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

    private function getAllReturn(){
        $client = new Client();
        try{
            $url = env('BASE_URL_API')."ecommerce/Allreturn";
            $response = $client->get($url,[
                'headers' => [
                    'auth-token' => session('token'),
                ]
                ]);
            return ($response->getBody()->getContents());
        } catch(ClientException $e){

        }
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

    public function setReturn($id_order){

        $client = new Client();
        try {
            $url = env('BASE_URL_API')."ecommerce/returnOrder/".$id_order;

            $response = $client->put($url, [

                'headers' => [
                    'auth-token' => session('token'),
                ],
            ]);
            $res = $response->getBody()->getContents();
            return response()->json($res);
        } catch (ClientException $e) {


        }

    }

    public function listOrderReturnPage(){
        $dataEcomm = json_decode($this->getMaster(),true);

        $ekspedisi = $dataEcomm["ekspedisi"];
        $laminasi = $dataEcomm["laminasi"];
        $akunEcom = $dataEcomm["akun_ecom"];
        $mesinCetak = $dataEcomm["mesin_cetak"];
        $bahanCetak = $dataEcomm["bahan_cetak"];

        $data = [
            'ekspedisi' =>$ekspedisi,
            'laminasi' => $laminasi,
            'akun_ecom' => $akunEcom,
            'mesin_cetak' => $mesinCetak,
            'bahan_cetak' => $bahanCetak,
            'order_tuntas' =>  json_decode($this->getAllReturn(),true),
            'active' => 'Return',
            'session' => [
                    'status' => session('role'),
                    'username' => session('username'),
            ]

        ];

        return view('desainer/list_order_return',$data);
    }

    private function getMaster(){
        $client = new Client();
        try{
            $url = env('BASE_URL_API')."masterdata/AllMasterData";
            $response = $client->get($url,[
                'headers' => [
                    'auth-token' => session('token'),
                ]
                ]);
            return ($response->getBody()->getContents());
        } catch(ClientException $e){

        }
    }

}


