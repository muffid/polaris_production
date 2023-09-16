<?php
namespace App\Http\Controllers\settingController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class EcommHandleSetting extends Controller
{
    public function index(){


        $data = [

            'active' => 'Handle_Ecomm',
            'session' => [
                    'status' => session('role'),
                    'username' => session('username'),
            ]

        ];
        return view('setting/handle_ecom_setting',$data);
    }


    public function handleSetting($id_ecomm){

        $client = new Client();
        try{
            $url = "https://padvp2v123.jualdecal.com/ecommerce/settingOk/".$id_ecomm."/".session('id');
            $response = $client->delete($url, [

                'headers' => [
                    'auth-token' => session('token'),
                ],
            ]);

            $statusCode = $response->getStatusCode();

            if ($statusCode === 200) {
                $response = ['message' => 'ok'];
                return response()->json($response);
            } else {
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
