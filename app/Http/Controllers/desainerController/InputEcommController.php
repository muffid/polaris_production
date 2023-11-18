<?php
namespace App\Http\Controllers\desainerController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;
use App\Http\Controllers\GetMasterDataController;

class InputEcommController extends Controller
{

    private function getOrderUnapprove($id_akun){
        $client = new Client();
        try{
            $url = env('BASE_URL_API')."ecommerce/orderEcomAllByIdAkun/".$id_akun;
            $response = $client->get($url,[
                'headers' => [
                    'auth-token' => session('token'),
                ]
                ]);
            return ($response->getBody()->getContents());
        } catch(ClientException $e){
        }
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
    public function index(){



    // $getData = new GetMasterDataController();
    //    $ekspedisi = json_decode($getData->getDataEkspedisi());
    //    $laminasi = json_decode($getData->getDataLaminasi());
    //    $akunEcom = json_decode($getData->getDataAkunEcom());
    //    $mesinCetak = json_decode($getData->getDataMesin());
    //    $bahanCetak = json_decode($getData->getDataBahan());


        $dataEcomm = json_decode($this->getMaster(),true);

        $ekspedisi = $dataEcomm["ekspedisi"];
        $laminasi = $dataEcomm["laminasi"];
        $akunEcom = $dataEcomm["akun_ecom"];
        $mesinCetak = $dataEcomm["mesin_cetak"];
        $bahanCetak = $dataEcomm["bahan_cetak"];

       $orderUnapprove = json_decode($this->getOrderUnapprove(session('id')));

    //    dd($orderUnapprove);
        $data = [


            'ekspedisi' =>$ekspedisi,
            'laminasi' => $laminasi,
            'akun_ecom' => $akunEcom,
            'order_unapprove' => $orderUnapprove,
            'mesin_cetak' => $mesinCetak,
            'bahan_cetak' => $bahanCetak,
            'active' => 'Ecommerce',
            'session' => [
                    'status' => session('role'),
                    'username' => session('username'),
            ]
        ];


        return view('desainer/input_ecomm',$data);

    }
}
