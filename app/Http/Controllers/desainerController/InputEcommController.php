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
            $url = "https://padvp2v123.jualdecal.com/ecommerce/orderEcom/unApvDesainerByIdAkun/".$id_akun;
            $response = $client->get($url,[
                'headers' => [
                    'auth-token' => session('token'),
                ]
                ]);
            return ($response->getBody()->getContents());

        } catch(ClientException $e){
        }
    }

    private function getOrderApvDsUnapvDistr($id_akun){
        $client = new Client();
        try{
            $url = "https://padvp2v123.jualdecal.com/ecommerce/orderEcom/apvDesainerByIdEcom/unApvDistribusi/".$id_akun;
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
    
        $getData = new GetMasterDataController();

       $ekspedisi = json_decode($getData->getDataEkspedisi());
       $laminasi = json_decode($getData->getDataLaminasi());
       $akunEcom = json_decode($getData->getDataAkunEcom());
       $mesinCetak = json_decode($getData->getDataMesin());
       $bahanCetak = json_decode($getData->getDataBahan());
       $orderUnapprove = json_decode($this->getOrderUnapprove(session('id')));
       $orderApprove = json_decode($this->getOrderApvDsUnapvDistr(session('id')));
       

        $data = [
           
            'ekspedisi' =>$ekspedisi,
            'laminasi' => $laminasi,
            'akun_ecom' => $akunEcom,
            'order_unapprove' => $orderUnapprove,
            'order_approve' => $orderApprove,
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