<?php

namespace App\Http\Controllers\adminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class PerformaController extends Controller
{
    public function index(){
        $data = [
            'active' => 'Performa',
            'session' => [
                'status' => session('role'),
                'username' => session('username'),
                'img_profil' => session('img'),
        ],
            'key' => '897878',
        ];
        return view('admin/performa',$data);

    }
}
