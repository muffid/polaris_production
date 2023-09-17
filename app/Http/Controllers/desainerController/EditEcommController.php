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
        $url = env('BASE_URL_API')."ecommerce/editOrderEcom/unOkSettingByIdorder/".$id_ecomm;
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
           "id_ekspedisi" => $ekspedisi,

        ];




        $response = $client->put($url, [
            'json' => $data,
            'headers' => [
                'auth-token' => session('token'),
            ],
        ]);

        $statusCode = $response->getStatusCode();

        if ($statusCode === 200) {

            $singleData = json_decode($this->getDataEcomById($id_ecomm));

            $textToCopy = $singleData[0]->no_urut.'-'.$singleData[0]->nama_akun_ecom.'-'.
                            $singleData[0]->nama_akun_order.'-'.$singleData[0]->nama_penerima.'-'.
                            $singleData[0]->sku.'-'.
                            $singleData[0]->warna.'-'.$singleData[0]->panjang_bahan.'-'.
                            $singleData[0]->nama_ekspedisi.'-'.$singleData[0]->order_time;

            session()->flash('message', 'success');
            session()->flash('copy',$textToCopy );
            return redirect()->route('input_ecomm_page');

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


    private function getDataEcomById($idEcom){

        $client = new Client();
        try{
            $url = env('BASE_URL_API')."ecommerce/orderEcom/unOkSettingByIdEcom/".$idEcom;
            $response = $client->get($url,[
                'headers' => [
                    'auth-token' => session('token'),
                ]
                ]);
            return $response->getBody()->getContents();
            // return "not";
        } catch(ClientException $e){

        }
    }
}
