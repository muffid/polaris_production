<?php
namespace App\Http\Controllers\desainerController;
use App\Http\Controllers\Controller;

class InputEcommController extends Controller
{
    public function index(){
        $data = [
           
            'active' => 'Ecommerce',
            'session' => [
                    'status' => session('role'),
                    'username' => session('username'),
            ]
          
        ];
        return view('desainer/input_ecomm',$data);

    }
}