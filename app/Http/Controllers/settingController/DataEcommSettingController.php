<?php
namespace App\Http\Controllers\settingController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class DataEcommSettingController extends Controller
{
    public function index(){

        // $data_ecomm = $this->getOrderUnapprove();
        // $dataArray = json_decode($data_ecomm, true);

        $data = [
            // 'data_ecomm' => $dataArray,
            'active' => 'Handle_Ecomm',
            'session' => [
                    'status' => session('role'),
                    'username' => session('username'),
            ]

        ];
        return view('setting/handle_ecom_setting',$data);
    }

    public function getAllEcommUnapprove(){
        $client = new Client();
        try{
            $url = "https://padvp2v123.jualdecal.com/ecommerce/orderEcomAllBelumSetting";
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
