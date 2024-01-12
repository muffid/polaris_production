<?php
namespace App\Http\Controllers\adminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
class MasterEkspedisiController extends Controller
{

    public function store(Request $request){
        $idEksp = $this->generateUniqueRandomString();
        $namaEksp =  $request->input('nama_ekspedisi');

        $client = new Client();
        try {
            $url = env('BASE_URL_API')."masterData/newEkspedisi";
            $data = [
               "id_ekspedisi" => $idEksp,
               "nama_ekspedisi" => $namaEksp,


            ];

            $response = $client->post($url, [
                'json' => $data,
                'headers' => [
                    'auth-token' => session('token'),
                ],
            ]);
            $statusCode = $response->getStatusCode();
            if ($statusCode === 200) {
                return redirect()->route('master_ekspedisi');
            } else {
                session()->flash('message', 'fail');
                return redirect()->route('master_ekspedisi');
            }
        } catch (ClientException $e) {

        }
    }

    public function edit(Request $req){
        $client = new Client();
        try {
            $url = env('BASE_URL_API')."masterData/editEkspedisi/".$req->input("id_ekspedisi");
         $data = [
            "nama_ekspedisi" => $req->input("nama_ekspedisi"),


         ];
         $response = $client->put($url, [
             'json' => $data,
             'headers' => [
                 'auth-token' => session('token'),
             ],
         ]);

         $statusCode = $response->getStatusCode();
         if($statusCode == 200){
            return redirect()->route('master_ekspedisi');
         }
        } catch (ClientException $e) {

        }

    }

    public function index(){

        $data = [
            'data_ekspedisi' => json_decode($this->getDataEkspedisi()),
            'active' => 'MasterBahan',
            'session' => [
                'status' => session('role'),
                'username' => session('username'),
                'img_profil' => session('img'),
        ],

        ];
        return view('admin/masterEkspedisi',$data);
    }

    private function getDataEkspedisi(){
        $client = new Client();
        try{
            $url = env('BASE_URL_API')."masterData/ekspedisi";
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
