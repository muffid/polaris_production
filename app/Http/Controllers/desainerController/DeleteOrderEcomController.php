<?php
namespace App\Http\Controllers\desainerController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Http\Controllers\GetMasterDataController;

class DeleteOrderEcomController extends Controller{
    public function deleteOrderEcom(Request $request, $id_ecomm){

        //https://padvp2v123.jualdecal.com/ecommerce/deleteOrderEcom/unOkSettingByIdorder/:idEcom

        $client = new Client();
        try{
            $url = env('BASE_URL_API')."ecommerce/deleteOrderEcom/unOkSettingByIdorder/".$id_ecomm;
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

