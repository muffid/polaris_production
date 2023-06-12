<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasterMesinController extends Controller
{
    public function index(){
        $data = [
            'active' => 'MasterMesin',
            'session' => [
                    'user' => 'John Saina',
                    'status' => 'Administrator',
            ],
            'key' => '897878',
        ];
        return view('admin/masterMesin',$data);
    }
}
