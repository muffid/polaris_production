<?php
namespace App\Http\Controllers\adminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MasterBahanController extends Controller
{
    public function index(){
        $data = [
            'active' => 'MasterBahan',
            'session' => [
                'status' => session('role'),
                'username' => session('username'),
        ],
            'key' => '897878',
        ];
        return view('admin/masterBahan',$data);
    }
}
