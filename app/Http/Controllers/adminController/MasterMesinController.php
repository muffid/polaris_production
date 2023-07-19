<?php
namespace App\Http\Controllers\adminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class MasterMesinController extends Controller
{
    public function index(){
        $data = [
            'active' => 'MasterMesin',
            'session' => [
                'status' => session('role'),
                'username' => session('username'),
        ],
            'key' => '897878',
        ];
        return view('admin/masterMesin',$data);
    }
}
