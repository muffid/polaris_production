<?php

namespace App\Http\Controllers\operatorController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;

class ScanOrderOperatorController extends Controller
{
    public function index(){

        $data = [

            'active' => 'ScanOrder',
            'session' => [
                    'status' => session('role'),
                    'username' => session('username'),
            ]

        ];
        return view('operator/scan_order_operator',$data);
    }
}
