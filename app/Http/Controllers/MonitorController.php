<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MonitorController extends Controller
{
    public function index(){
        $data = [
            'active' => 'Monitor',
            'session' => [
                    'user' => 'John Saina',
                    'status' => 'Administrator',
            ],
            'key' => '897878',
        ];
        return view('globals/monitor',$data);
    }
}
