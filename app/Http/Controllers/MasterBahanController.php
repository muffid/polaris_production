<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasterBahanController extends Controller
{
    public function index(){
        $data = [
            'active' => 'MasterBahan',
            'session' => [
                    'user' => 'John Saina',
                    'status' => 'Administrator',
            ],
            'key' => '897878',
        ];
        return view('admin/masterBahan',$data);
    }
}
