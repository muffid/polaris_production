<?php
namespace App\Http\Controllers\adminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
class MasterLaminasiController extends Controller
{
    public function index(){

        $data = [
            'data_laminasi' => json_decode($this->getDataLaminasi()),
            'active' => 'MasterBahan',
            'session' => [
                'status' => session('role'),
                'username' => session('username'),
                'img_profil' => session('img'),
        ],

        ];
        return view('admin/masterLaminasi',$data);
    }


    public function store(Request $request){
        $idLaminasi = $this->generateUniqueRandomString();
        $namaLaminasi =  $request->input('nama_laminasi');
        $client = new Client();
        try {
            $url = env('BASE_URL_API')."masterData/newLaminasi";
            $data = [
               "id_laminasi" => $idLaminasi,
               "nama_laminasi" => $namaLaminasi,
            ];

            $response = $client->post($url, [
                'json' => $data,
                'headers' => [
                    'auth-token' => session('token'),
                ],
            ]);

            return redirect()->route('master_laminasi');

        } catch (ClientException $e) {
            return redirect()->route('master_laminasi');
        }
    }

    public function edit(Request $req){
        $client = new Client();
        try {
            $url = env('BASE_URL_API')."masterData/editLaminasi/".$req->input("id_laminasi");
         $data = [
            "nama_laminasi" => $req->input("nama_laminasi"),
         ];
         $response = $client->put($url, [
             'json' => $data,
             'headers' => [
                 'auth-token' => session('token'),
             ],
         ]);

         $statusCode = $response->getStatusCode();

            return redirect()->route('master_laminasi');

        } catch (ClientException $e) {
            return redirect()->route('master_laminasi');
        }

    }

    private function getDataLaminasi(){
        $client = new Client();
        try{
            $url = env('BASE_URL_API')."masterData/laminasi";
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

    private function generateUniqueRandomString($length = 10) {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $randomString = '';

        $charactersLength = strlen($characters);
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }



}
