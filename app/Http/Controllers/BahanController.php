<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BahanController extends Controller
{
    public function index(){
        $data = [
            'active' => 'Bahan',
            'session' => [
                    'user' => 'John Saina',
                    'status' => 'Administrator',
            ],
            'key' => '897878',
        ];
        return view('admin/bahancetak',$data);
    }
}
