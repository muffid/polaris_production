<?php
namespace App\Http\Controllers\adminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
class MasterTokoController extends Controller
{

    public function store(Request $request){
        $idEksp = $this->generateUniqueRandomString();
        $namaEksp =  $request->input('nama_toko');

        $client = new Client();
        try {
            $url = env('BASE_URL_API')."masterData/newAkunEcom";
            $data = [
               "id_akun_ecom" => $idEksp,
               "nama_akun_ecom" => $namaEksp,


            ];

            $response = $client->post($url, [
                'json' => $data,
                'headers' => [
                    'auth-token' => session('token'),
                ],
            ]);
            $statusCode = $response->getStatusCode();
            if ($statusCode === 200) {
                return redirect()->route('master_toko');
            } else {
                session()->flash('message', 'fail');
                return redirect()->route('master_toko');
            }
        } catch (ClientException $e) {

        }
    }

    public function edit(Request $req){
        $client = new Client();
        try {
            $url = env('BASE_URL_API')."masterData/editAkunEcom/".$req->input("id_toko");
         $data = [
            "nama_akun_ecom" => $req->input("nama_toko"),


         ];
         $response = $client->put($url, [
             'json' => $data,
             'headers' => [
                 'auth-token' => session('token'),
             ],
         ]);

         $statusCode = $response->getStatusCode();
         if($statusCode == 200){
            return redirect()->route('master_toko');
         }
        } catch (ClientException $e) {

        }

    }

    public function index(){

        $data = [
            'data_toko' => json_decode($this->getDataToko()),
            'active' => 'MasterBahan',
            'session' => [
                'status' => session('role'),
                'username' => session('username'),
                'img_profil' => session('img'),
        ],

        ];
        return view('admin/mastertoko',$data);
    }

    private function getDataToko(){
        $client = new Client();
        try{
            $url = env('BASE_URL_API')."masterData/akun_ecom";
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
