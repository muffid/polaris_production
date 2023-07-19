<?php

namespace App\Http\Controllers\adminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class MonitorController extends Controller
{
    public function index(){
        $data = [
            'active' => 'Monitor',
            'session' => [
                'status' => session('role'),
                'username' => session('username'),
        ],
            'key' => '897878',
        ];
        return view('globals/monitor',$data);
    }
}
