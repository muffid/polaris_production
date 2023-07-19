<?php

namespace App\Http\Controllers\adminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class NonEcommController extends Controller
{
    public function index(){
        $data = [
            'active' => 'NonEcommerce',
            'session' => [
                'status' => session('role'),
                'username' => session('username'),
        ],
            'key' => '897878',
        ];
        return view('admin/nonecommerce',$data);
    }
}
