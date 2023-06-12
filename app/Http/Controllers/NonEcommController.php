<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NonEcommController extends Controller
{
    public function index(){
        $data = [
            'active' => 'NonEcommerce',
            'session' => [
                    'user' => 'John Saina',
                    'status' => 'Administrator',
            ],
            'key' => '897878',
        ];
        return view('admin/nonecommerce',$data);
    }
}
