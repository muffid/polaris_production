<?php
namespace App\Http\Controllers\desainerController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;

class InputEcommController extends Controller
{

    private function getDataMesin(){
        $client = new Client();
        try{
            $url = "https://padvp2v123.jualdecal.com/masterData/mesinCetak";
            $response = $client->get($url, [
                'headers' => [
                    'auth-token' => session('token'),
                ],
            ]);
            return ($response->getBody()->getContents());

        } catch (ClientException $e) {
            
            $response = $e->getResponse();
            $statusCode = $response->getStatusCode();
            return "error fetching data mesin";

        }
    }

    private function getDataBahan(){
        $client = new Client();
        try{
            $url = "https://padvp2v123.jualdecal.com/masterData/bahanCetak";
            $response = $client->get($url, [
                'headers' => [
                    'auth-token' => session('token'),
                ],
            ]);
            return ($response->getBody()->getContents());

        } catch (ClientException $e) {
            
            $response = $e->getResponse();
            $statusCode = $response->getStatusCode();
            return "error fetching data mesin";

        }
    }


    public function index(){

       $mesinCetak = json_decode($this->getDataMesin());
       $bahanCetak = json_decode($this->getDataBahan());
       

        $data = [
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