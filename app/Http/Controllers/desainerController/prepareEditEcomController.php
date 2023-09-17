<?php
namespace App\Http\Controllers\desainerController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Http\Controllers\GetMasterDataController;
use GuzzleHttp\Exception\ConnectException;

class prepareEditEcomController extends Controller
{



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

  public function index($id_akun,$id_ecom){
    $client = new Client();
    //https://padvp2v123.jualdecal.com/ecommerce/orderEcom/unOkSettingByIdEcom/:idEcom
    try{
        $url = env('BASE_URL_API')."ecommerce/orderEcom/unOkSettingByIdEcom/".$id_ecom;
        $response = $client->get($url, [
            'headers' => [
                'auth-token' => session('token'),
            ],
        ]);


        $orderUnapprove = $response->getBody()->getContents();

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
            'order_unapprove' => json_decode($orderUnapprove),
            'mesin_cetak' => $mesinCetak,
            'bahan_cetak' => $bahanCetak,
            'active' => 'Ecommerce',
            'session' => [
                    'status' => session('role'),
                    'username' => session('username'),
            ]

        ];

        // dd($data['akun_ecom'][0]['nama_akun_ecom']);
        return view('desainer/edit_ecomm',$data);


    } catch (ClientException $e) {

        $response = $e->getResponse();
        $statusCode = $response->getStatusCode();
        return "error fetching data mesin";

    }catch(ConnectException $e){

       return "connection time out. Periksa koneksi anda";
    }


  }
}
