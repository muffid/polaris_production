<?php
namespace App\Http\Controllers\desainerController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;
use App\Http\Controllers\GetMasterDataController;

class InputOrderNonEcomController extends Controller{

    public function index(){

        $dataEcomm = json_decode($this->getMaster(),true);


        $laminasi = $dataEcomm["laminasi"];
        $mesinCetak = $dataEcomm["mesin_cetak"];
        $bahanCetak = $dataEcomm["bahan_cetak"];

        $data = [

            'data_customer' => json_decode($this->getDataCustomer(),true),
            'bahan_cetak' => $bahanCetak,
            'mesin_cetak' => $mesinCetak,
            'laminasi' => $laminasi,
            'active' => 'Ecommerce',
            'session' => [
                    'status' => session('role'),
                    'username' => session('username'),
                    'img_profil' => session('img'),
                ]
        ];
    return view('desainer/input_nonecomm',$data);

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

    private function getDataCustomer(){
        $client = new Client();
        try{
            $url = env('BASE_URL_API')."nonecom/dataAll";
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
