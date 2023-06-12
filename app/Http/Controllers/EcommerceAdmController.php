<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EcommerceAdmController extends Controller
{
    public function index(){
        $data = [
            'active' => 'Ecommerce',
            'session' => [
                    'user' => 'John Saina',
                    'status' => 'Administrator'
            ],
            'key' => '897878',
        ];
        
        return view('admin/ecommerces',$data);
    }
}
