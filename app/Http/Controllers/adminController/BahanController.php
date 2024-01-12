<?php
namespace App\Http\Controllers\adminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class BahanController extends Controller
{
    public function index(){
        $data = [
            'active' => 'Bahan',
            'session' => [
                'status' => session('role'),
                'username' => session('username'),
                'img_profil' => session('img'),
        ],
            'key' => '897878',
        ];
        return view('admin/bahancetak',$data);
    }
}
