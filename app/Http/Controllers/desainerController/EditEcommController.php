<?php
namespace App\Http\Controllers\desainerController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Http\Controllers\GetMasterDataController;

class EditEcommController extends Controller{

    public function store(Request $request, $id_akun, $id_ecomm){
     
        $idAkun = session('id');
        $orderTime = $request->input('tanggal_order');
        $akunEcomm = $request->input('akun');
        $namaAkunOrder = $request->input('nama_akun_order');
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
        $ekspedisi = $request->input('ekspedisi');

        

       $client = new Client();
            
      
       try {
        $url = "https://padvp2v123.jualdecal.com/ecommerce/editOrderEcom/unApvDesainerByIdEcom/".$id_ecomm;
        $data = [
           "id_order_ecom" => $id_ecomm,
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
           "ekspedisi" => $ekspedisi,
          
        ];
       
     
       

        $response = $client->put($url, [
            'json' => $data,
            'headers' => [
                'auth-token' => session('token'),
            ],
        ]);

        $statusCode = $response->getStatusCode();

        if ($statusCode === 200) {
            $request->session()->flash('message', 'success');
            return redirect()->route('input_ecomm_page');
            return $statusCode;
        
        } else {
            $request->session()->flash('message', 'fail');
            return redirect()->route('input_ecomm_page');
            return $statusCode;
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