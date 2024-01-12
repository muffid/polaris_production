<?php
namespace App\Http\Controllers\adminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
class MasterBahanController extends Controller
{

    public function store(Request $request){
        $idBahan = $this->generateUniqueRandomString();
        $namaBahan =  $request->input('nama_bahan');
        $lebarBahan = $request->input('lebar_bahan');
        $client = new Client();
        try {
            $url = env('BASE_URL_API')."masterData/newBahanCetak";
            $data = [
               "id_bahan_cetak" => $idBahan,
               "nama_bahan_cetak" => $namaBahan,
               "lebar_bahan" => $lebarBahan,

            ];

            $response = $client->post($url, [
                'json' => $data,
                'headers' => [
                    'auth-token' => session('token'),
                ],
            ]);
            $statusCode = $response->getStatusCode();
            if ($statusCode === 200) {
                return redirect()->route('master_bahan');
            } else {
                session()->flash('message', 'fail');
                return redirect()->route('master_bahan');
            }
        } catch (ClientException $e) {

        }
    }

    public function edit(Request $req){
        $client = new Client();
        try {
            $url = env('BASE_URL_API')."masterData/editBahanCetak/".$req->input("id_bahan");
         $data = [
            "nama_bahan_cetak" => $req->input("nama_bahan"),
            "lebar_bahan" => $req->input("lebar_bahan"),

         ];
         $response = $client->put($url, [
             'json' => $data,
             'headers' => [
                 'auth-token' => session('token'),
             ],
         ]);

         $statusCode = $response->getStatusCode();
         if($statusCode == 200){
            return redirect()->route('master_bahan');
         }
        } catch (ClientException $e) {

        }

    }

    public function index(){
        // dd($this->getDataBahan());
        $data = [
            'data_bahan' => json_decode($this->getDataBahan()),
            'active' => 'MasterBahan',
            'session' => [
                'status' => session('role'),
                'username' => session('username'),
                'img_profil' => session('img'),
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
