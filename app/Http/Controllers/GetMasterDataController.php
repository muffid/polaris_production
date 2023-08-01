<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;

class GetMasterDataController extends Controller{
  

    public function getDataMesin(){
        $client = new Client();
        try{
            $url = "https://padvp2v123.jualdecal.com/masterData/mesinCetak";
            $response = $client->get($url, [
                'headers' => [
                    'auth-token' => session('token'),
                ],
            ]);
            return ($response->getBody()->getContents());

        } catch (ClientException $e) {
            
            $response = $e->getResponse();
            $statusCode = $response->getStatusCode();
            return "error fetching data mesin";

        }
    }

    public function getDataBahan(){
        $client = new Client();
        try{
            $url = "https://padvp2v123.jualdecal.com/masterData/bahanCetak";
            $response = $client->get($url, [
                'headers' => [
                    'auth-token' => session('token'),
                ],
            ]);
            return ($response->getBody()->getContents());

        } catch (ClientException $e) {
            
            $response = $e->getResponse();
            $statusCode = $response->getStatusCode();
            return "error fetching data mesin";

        }
    }

    public function getDataAkunEcom(){
        $client = new Client();
        try{
            $url = "https://padvp2v123.jualdecal.com/masterData/akun_ecom";
            $response = $client->get($url, [
                'headers' => [
                    'auth-token' => session('token'),
                ],
            ]);
            return ($response->getBody()->getContents());

        } catch (ClientException $e) {
            
            $response = $e->getResponse();
            $statusCode = $response->getStatusCode();
            return "error fetching data mesin";

        }
    }

    public function getDataEkspedisi(){
        $client = new Client();
        try{
            $url = "https://padvp2v123.jualdecal.com/masterData/ekspedisi";
            $response = $client->get($url, [
                'headers' => [
                    'auth-token' => session('token'),
                ],
            ]);
            return ($response->getBody()->getContents());

        } catch (ClientException $e) {
            
            $response = $e->getResponse();
            $statusCode = $response->getStatusCode();
            return "error fetching data mesin";

        }
    }

    public function getDataLaminasi(){
        $client = new Client();
        try{
            $url = "https://padvp2v123.jualdecal.com/masterData/laminasi";
            $response = $client->get($url, [
                'headers' => [
                    'auth-token' => session('token'),
                ],
            ]);
            return ($response->getBody()->getContents());

        } catch (ClientException $e) {
            
            $response = $e->getResponse();
            $statusCode = $response->getStatusCode();
            return "error fetching data mesin";

        }
    }

}