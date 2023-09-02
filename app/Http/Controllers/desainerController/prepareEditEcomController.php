<?php
namespace App\Http\Controllers\desainerController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Http\Controllers\GetMasterDataController;

class prepareEditEcomController extends Controller
{


  public function index($id_akun,$id_ecom){
    $client = new Client();
    //https://padvp2v123.jualdecal.com/ecommerce/orderEcom/unOkSettingByIdEcom/:idEcom
    try{
        $url = "https://padvp2v123.jualdecal.com/ecommerce/orderEcom/unOkSettingByIdEcom/".$id_ecom;
        $response = $client->get($url, [
            'headers' => [
                'auth-token' => session('token'),
            ],
        ]);


        $orderUnapprove = $response->getBody()->getContents();

        $getData = new GetMasterDataController();

        $ekspedisi = json_decode($getData->getDataEkspedisi());
        $laminasi = json_decode($getData->getDataLaminasi());
        $akunEcom = json_decode($getData->getDataAkunEcom());
        $mesinCetak = json_decode($getData->getDataMesin());
        $bahanCetak = json_decode($getData->getDataBahan());

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

  ;
        return view('desainer/edit_ecomm',$data);


    } catch (ClientException $e) {

        $response = $e->getResponse();
        $statusCode = $response->getStatusCode();
        return "error fetching data mesin";

    }


  }
}
