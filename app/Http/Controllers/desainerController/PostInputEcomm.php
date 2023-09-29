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
        $return_order = "-";
        $resi = $request->input('resi');


        //  dd($timeStamps);


        $client = new Client();
        try {
            $url = env('BASE_URL_API')."ecommerce/newEcom";
            $data = [
               "id_order_ecom" => $idEcomm,
               "id_akun" => session('id'),
               "order_time" => $orderTime,
               "id_akun_ecom" => $akunEcomm,
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
               "id_ekspedisi" => $ekspedisi,
               "return_order" => $return_order,
               "resi" => $resi,
            ];

            $response = $client->post($url, [
                'json' => $data,
                'headers' => [
                    'auth-token' => session('token'),
                ],
            ]);

            $statusCode = $response->getStatusCode();


            if ($statusCode === 200) {
                $singleData = json_decode($this->getDataEcomById($idEcomm));

                $textToCopy = $singleData[0]->no_urut.'-'.$singleData[0]->nama_akun_ecom.'-'.
                                $singleData[0]->nama_akun_order.'-'.$singleData[0]->nama_penerima.'-'.
                                $singleData[0]->sku.'-'.
                                $singleData[0]->warna.'-'.$singleData[0]->panjang_bahan.'-'.
                                $singleData[0]->nama_ekspedisi.'-'.$singleData[0]->order_time;

                session()->flash('message', 'success');
                session()->flash('copy',$textToCopy );
                return redirect()->route('input_ecomm_page');

            } else {
               session()->flash('message', 'fail');
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
