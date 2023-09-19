<?php
namespace App\Http\Controllers\desainerController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;
use App\Http\Controllers\GetMasterDataController;

class DataEcommController extends Controller
{
    public function index(){

        $data_ecomm = json_decode($this->getDataEcommBulanIni());

        $data = [
            'data_ecomm' => $data_ecomm,
            'active' => 'Ecommerce_Data',
            'session' => [
                    'status' => session('role'),
                    'username' => session('username'),
            ]
        ];
        // dd($data);
        return view('desainer/data_ecomm',$data);


    }

    private function getDataEcommBulanIni(){
        $client = new Client();
        try{
            $url = env('BASE_URL_API')."ecommerce/orderEcomAllByBulanIni/".session('id');
            $response = $client->get($url,[
                'headers' => [
                    'auth-token' => session('token'),
                ]
                ]);
            return $response->getBody()->getContents();
            // return "not";
        } catch(ClientException $e){
        }
    }

    public function getDataEcommByDate($id_akun, $date){

        $client = new Client();
        try{
            $url = env('BASE_URL_API')."ecommerce/orderEcomAllByBulanIniFE/".session('id')."/".$date;
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
        }

        // $data = [
        //     "id_akun" => $id_akun,
        //     "id_ecomm" => $date,
        // ];
        // return response()->json($data);
    }
}
