<?php
namespace App\Http\Controllers\desainerController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Carbon\Carbon;

class OrderReturnController extends Controller
{

    public function recycle(Request $req){

        $client = new Client();



        try {
         $url = env('BASE_URL_API')."ecommerce/recycle/".$req->input("ID")."/".session('id');
         $data = [
            "id_order_ecom" =>$req->input("ID"),
            "order_time" => $req->input("tanggal_order"),
            "id_akun_ecom" => $req->input("akun"),
            "nama_akun_order" => $req->input("akun_pengorder"),
            "nama_penerima" => $req->input("nama_penerima"),
            "nomor_order" => $req->input("nomor_order"),
            "note" => $req->input("note"),
            "time" => Carbon::now()->format('Y-m-d H:i'),
            "id_ekspedisi" => $req->input("ekspedisi"),
            "return_order" => "-",
            "resi" => $req->input("resi"),
            "inputQty" => $req->input("jumlah"),
            "no_sc" => $req->input("no_sc")

         ];

         $response = $client->put($url, [
             'json' => $data,
             'headers' => [
                 'auth-token' => session('token'),
             ],
         ]);

         $statusCode = $response->getStatusCode();

         if ($statusCode === 200) {

            session()->flash('message', 'success');
            return redirect()->route('list_order_return');
        }else if($statusCode === 404){
            session()->flash('message', 'booked');
            return redirect()->route('list_order_return');
        }
    }catch (ClientException $e) {

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

    public function index(){

        $data = [
            'order_tuntas' =>  json_decode($this->getTuntas(),true),
            'active' => 'Return',
            'session' => [
                    'status' => session('role'),
                    'username' => session('username'),
                    'img_profil' => session('img'),
            ]

        ];

        return view('desainer/order_return',$data);
    }

    private function getAllReturn(){
        $client = new Client();
        try{
            $url = env('BASE_URL_API')."ecommerce/Allreturn";
            $response = $client->get($url,[
                'headers' => [
                    'auth-token' => session('token'),
                ]
                ]);
            return ($response->getBody()->getContents());
        } catch(ClientException $e){

        }
    }

    private function getReturnBySkuWarna($sku, $warna){
        $client = new Client();
        try{
            $url = env('BASE_URL_API')."ecommerce/barangReturn/".$sku."/".$warna;
            $response = $client->get($url,[
                'headers' => [
                    'auth-token' => session('token'),
                ]
                ]);
            return ($response->getBody()->getContents());
        } catch(ClientException $e){

        }
    }

    //ajax
    public function getListOrderReturn(){
        $client = new Client();
        try{
            $url = env('BASE_URL_API')."ecommerce/skuAndWarnaReturn";
            $response = $client->get($url, [
                'headers' => [
                    'auth-token' => session('token'),
                ],
            ]);

            $res = $response->getBody()->getContents();
            return response()->json($res);
        }catch (ClientException $e) {
            $response = $e->getResponse();
            $statusCode = $response->getStatusCode();

        }
    }

    private function getTuntas(){
        $client = new Client();
        try{
            $url = env('BASE_URL_API')."ecommerce/bybulaninituntas";
            $response = $client->get($url,[
                'headers' => [
                    'auth-token' => session('token'),
                ]
                ]);
            return ($response->getBody()->getContents());
        } catch(ClientException $e){

        }
    }

    public function getOrderByBulan($bulan){

        $client = new Client();
        try{
            $url = env('BASE_URL_API')."ecommerce/bybulan/tuntas/".$bulan;
            $response = $client->get($url,[
                'headers' => [
                    'auth-token' => session('token'),
                ]
            ]);
           $res = $response->getBody()->getContents();
           $result = [
            "data" => $res
        ];
        return response()->json($res);
        } catch(ClientException $e){
            $result=["message"=>"fail"];
            return response()->json($result);
        }
    }

    public function setReturn($id_order){

        $client = new Client();
        try {
            $url = env('BASE_URL_API')."ecommerce/returnOrder/".$id_order;

            $response = $client->put($url, [

                'headers' => [
                    'auth-token' => session('token'),
                ],
            ]);
            $res = $response->getBody()->getContents();
            return response()->json($res);
        } catch (ClientException $e) {


        }

    }

    public function listOrderReturnPage(){
            $dataEcomm = json_decode($this->getMaster(),true);
            $ekspedisi = $dataEcomm["ekspedisi"];
            $laminasi = $dataEcomm["laminasi"];
            $akunEcom = $dataEcomm["akun_ecom"];
            $mesinCetak = $dataEcomm["mesin_cetak"];
            $bahanCetak = $dataEcomm["bahan_cetak"];

            $data = [
                'ekspedisi' =>$ekspedisi,
                'laminasi' => $laminasi,
                'akun_ecom' => $akunEcom,
                'mesin_cetak' => $mesinCetak,
                'bahan_cetak' => $bahanCetak,
                'order_tuntas' =>  json_decode($this->getAllReturn(),true),
                'active' => 'Return',
                'session' => [
                        'status' => session('role'),
                        'username' => session('username'),
                ]

            ];

            return view('desainer/list_order_return',$data);

    }

    public function listOrderReturnPageWithParams($sku,$warna){
            $dataEcomm = json_decode($this->getMaster(),true);
            $ekspedisi = $dataEcomm["ekspedisi"];
            $laminasi = $dataEcomm["laminasi"];
            $akunEcom = $dataEcomm["akun_ecom"];
            $mesinCetak = $dataEcomm["mesin_cetak"];
            $bahanCetak = $dataEcomm["bahan_cetak"];

            $data = [
                'ekspedisi' =>$ekspedisi,
                'laminasi' => $laminasi,
                'akun_ecom' => $akunEcom,
                'mesin_cetak' => $mesinCetak,
                'bahan_cetak' => $bahanCetak,
                'order_tuntas' =>  json_decode($this->getReturnBySkuWarna($sku,$warna),true),
                'active' => 'Return',
                'session' => [
                        'status' => session('role'),
                        'username' => session('username'),
                ]

            ];

            return view('desainer/list_order_return',$data);

    }

    private function getMaster(){
        $client = new Client();
        try{
            $url = env('BASE_URL_API')."masterdata/AllMasterData";
            $response = $client->get($url,[
                'headers' => [
                    'auth-token' => session('token'),
                ]
                ]);
            return ($response->getBody()->getContents());
        } catch(ClientException $e){

        }
    }

}


