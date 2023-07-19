<?php
namespace App\Http\Controllers\adminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class EcommerceAdmController extends Controller
{
    public function index(){
        $data = [
            'active' => 'Ecommerce',
            'session' => [
                'status' => session('role'),
                'username' => session('username'),
        ],
            'key' => '897878',
        ];
        
        return view('admin/ecommerces',$data);
    }
}
