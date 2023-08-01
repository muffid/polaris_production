<?php
namespace App\Http\Controllers\desainerController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Http\Controllers\GetMasterDataController;

class DeleteOrderEcomController extends Controller{
    public function deleteOrderEcom(Request $request, $id_ecomm){
        
        $client = new Client();
        try{
            $url = "https://padvp2v123.jualdecal.com/ecommerce/deleteOrderEcom/unApvDesainerByIdEcom/".$id_ecomm;
            $response = $client->delete($url, [
                
                'headers' => [
                    'auth-token' => session('token'),
                ],
            ]);
    
            $statusCode = $response->getStatusCode();
    
            if ($statusCode === 200) {
                $request->session()->flash('message', 'success');
                return redirect()->route('input_ecomm_page');
              
            
            } else {
                $request->session()->flash('message', 'fail');
                return redirect()->route('input_ecomm_page');
              
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
    
