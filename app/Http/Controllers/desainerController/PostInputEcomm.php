<?php
namespace App\Http\Controllers\desainerController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;
use Carbon\Carbon;

class PostInputEcomm extends Controller
{

    private function generateUniqueRandomString($length = 10) {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $randomString = '';
    
        $charactersLength = strlen($characters);
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
    
        return $randomString;
    }

    public function store(Request $request){
        $idEcomm = $this->generateUniqueRandomString();
        $idAkun = session('id');
        $orderTime = $request->input('tanggal_order');
        $akunEcomm = $request->input('akun');
        $namaAkunOrder = $request->input('akun_pengorder');
        $namaPenerima = $request->input('nama_penerima');
        $nomorOrder = $request->input('nomor_order');
        $sku = $request->input('sku');
        $warna = $request->input('warna');
        $idBahanCetak = $request->input('bahan');
        $idMesinCetak = $request->input('mesin');
        $idLaminasi = $request->input('laminasi');
        $panjang = $request->input('panjang');
        $lebar = $request->input('lebar');
        $jumlah = $request->input('jumlah');
        $note = $request->input('note');
        $outputFileName = "-";
        $key = "-";
        $timeStamps = Carbon::now()->format('Y-m-d H:i');
        $ekspedisi = $request->input('ekspedisi');
        $admApp = "-";
        $statusPrint = "-";
        $admAppPrint = "-";
        $statusDistribusi = "-";
        $admAppDistribusi = "-";
      

        $data = [
            "id_order_ecomm" => $idEcomm,
            "id_akun" => $idAkun,
            "order_time" => $orderTime,
            "akun_ecom" => $akunEcomm,
            "nama_akun_order" => $namaAkunOrder,
            "nama_penerima" => $namaPenerima,
            "nomor_order" => $nomorOrder,
            "sku" => $sku,
            "warna" => $warna,
            "id_bahan_cetak" => $idBahanCetak,
            "id_mesin_cetak" => $idMesinCetak,
            "id_laminasi" => $idLaminasi,
            "lebar_bahan" => $lebar,
            "panjang_bahan" => $panjang,
            "qty_order" => $jumlah,
            "note" => $note,
            "output_file" => $outputFileName,
            "key" => $key,
            "time" => $timeStamps,
            "ekspedisi" => $ekspedisi,
            "admin_apv_edsainer" => $admApp,
            "status_print" => $statusPrint,
            "admin_apv_print" => $admAppPrint,
            "ststus_distribusi" => $statusDistribusi,
            "admin_apv_distribusi" => $admAppDistribusi
            
         ];

         

        $client = new Client();
        try {
            $url = "https://padvp2v123.jualdecal.com/ecommerce/newEcom";
            $data = [
               "id_order_ecom" => $idEcomm,
               "id_akun" => session('id'),
               "order_time" => $orderTime,
               "akun_ecom" => $akunEcomm,
               "nama_akun_order" => $namaAkunOrder,
               "nama_penerima" => $namaPenerima,
               "nomor_order" => $nomorOrder,
               "sku" => $sku,
               "warna" => $warna,
               "id_bahan_cetak" => $idBahanCetak,
               "id_mesin_cetak" => $idMesinCetak,
               "id_laminasi" => $idLaminasi,
               "lebar_bahan" => $lebar,
               "panjang_bahan" => $panjang,
               "qty_order" => $jumlah,
               "note" => $note,
               "output_file" => $outputFileName,
               "key" => $key,
               "time" => $timeStamps,
               "ekspedisi" => $ekspedisi,
               "admin_apv_desainer" => $admApp,
               "ststus_print" => $statusPrint,
               "admin_apv_print" => $admAppPrint,
               "ststus_distribusi" => $statusDistribusi,
               "admin_apv_distribusi" => $admAppDistribusi
            ];
           
           

            $response = $client->post($url, [
                'json' => $data,
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