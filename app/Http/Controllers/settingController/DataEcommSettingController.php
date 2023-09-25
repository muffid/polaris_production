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
            $url = env('BASE_URL_API')."ecommerce/orderEcomAllBelumSetting";
            $response = $client->get($url,[
                'headers' => [
                    'auth-token' => session('token'),
                ]
                ]);
           $res = $response->getBody()->getContents();

           $result = [
            "data" => $res
        ];
        // dd($res);
           return response()->json($res);

        } catch(ClientException $e){
            $result=["message"=>"fail"];
            return response()->json($result);
        }
    }

    public function getEcommOnProses($id_akun){
        $client = new Client();
        try{
            $url = env('BASE_URL_API')."ecommerce/AllProsesSetting/".session('id');
            $response = $client->get($url, [

                'headers' => [
                    'auth-token' => session('token'),
                ],
            ]);

            $res = $response->getBody()->getContents();

            $result = [
             "data" => $res
         ];
         // dd($res);
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

    public function cancelSetting($id_ecomm){

        $client = new Client();
        try{
            $url = env('BASE_URL_API')."ecommerce/batalSettingProses/".$id_ecomm."/".session('id');
            $response = $client->put($url, [

                'headers' => [
                    'auth-token' => session('token'),
                ],
            ]);

            $statusCode = $response->getStatusCode();

            if ($statusCode === 200) {
                $response = ['message' => 'ok'];
                return response()->json($response);
            } else if($statusCode === 220) {
                $response = ['message' => 'booked'];
                return response()->json($response);
            }else{
                $response = ['message' => 'fail'];
                return response()->json($response);
            }
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



}
