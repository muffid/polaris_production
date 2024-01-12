<?php
namespace App\Http\Controllers\adminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;


class MasterMesinController extends Controller
{

    public function store(Request $request){
        $idBahan = $this->generateUniqueRandomString();
        $namaMesin =  $request->input('nama_mesin');

        $client = new Client();
        try {
            $url = env('BASE_URL_API')."masterData/newMesinCetak";
            $data = [
               "id_mesin_cetak" => $idBahan,
               "nama_mesin_cetak" => $namaMesin,



            ];

            $response = $client->post($url, [
                'json' => $data,
                'headers' => [
                    'auth-token' => session('token'),
                ],
            ]);
            $statusCode = $response->getStatusCode();
            if ($statusCode === 200) {
                return redirect()->route('master_mesin');
            } else {
                session()->flash('message', 'fail');
                return redirect()->route('master_mesin');
            }
        } catch (ClientException $e) {

        }
    }

    public function edit(Request $req){
        $client = new Client();
        try {
            $url = env('BASE_URL_API')."masterData/editMesinCetak/".$req->input("id_mesin");
         $data = [
            "nama_mesin_cetak" => $req->input("nama_mesin"),

         ];

         $response = $client->put($url, [
             'json' => $data,
             'headers' => [
                 'auth-token' => session('token'),
             ],
         ]);

         $statusCode = $response->getStatusCode();

            return redirect()->route('master_mesin');

        } catch (ClientException $e) {

        }

    }


    public function index(){
        $data = [
            'data_mesin' => json_decode($this->getDataMesin()),
            'active' => 'MasterMesin',
            'session' => [
                'status' => session('role'),
                'username' => session('username'),
                'img_profil' => session('img'),
        ],
            'key' => '897878',
        ];
        return view('admin/masterMesin',$data);
    }


    private function getDataMesin(){
        $client = new Client();
        try{
            $url = env('BASE_URL_API')."masterData/mesincetak";
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
