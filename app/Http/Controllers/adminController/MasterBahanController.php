<?php
namespace App\Http\Controllers\adminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
class MasterBahanController extends Controller
{
    public function index(){
        // dd($this->getDataBahan());
        $data = [
            'data_bahan' => json_decode($this->getDataBahan()),
            'active' => 'MasterBahan',
            'session' => [
                'status' => session('role'),
                'username' => session('username'),
        ],

        ];
        return view('admin/masterBahan',$data);
    }

    private function getDataBahan(){
        $client = new Client();
        try{
            $url = env('BASE_URL_API')."masterData/bahancetak";
            $response = $client->get($url, [
                'headers' => [
                    'auth-token' => session('token'),
                ],
            ]);

            $res = $response->getBody()->getContents();

            return $res;
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
