<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerformaController extends Controller
{
    public function index(){
        $data = [
            'active' => 'Performa',
            'session' => [
                    'user' => 'John Saina',
                    'status' => 'Administrator',
            ],
            'key' => '897878',
        ];
        return view('admin/performa',$data);
    
    }
}
