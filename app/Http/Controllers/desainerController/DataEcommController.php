<?php
namespace App\Http\Controllers\desainerController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;
use App\Http\Controllers\GetMasterDataController;

class DataEcommController extends Controller
{
    public function index(){
        $data = [
            'active' => 'Ecommerce_Data',
            'session' => [
                    'status' => session('role'),
                    'username' => session('username'),
            ]
        ];
        return view('desainer/data_ecomm',$data);
    }
}
