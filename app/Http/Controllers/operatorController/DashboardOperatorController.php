<?php
namespace App\Http\Controllers\operatorController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class DashboardOperatorController extends Controller
{
    public function index(){

        $data = [

            'active' => 'Dashboard',
            'session' => [
                    'status' => session('role'),
                    'username' => session('username'),
            ]

        ];
        return view('operator/dashboard_operator',$data);
    }



}
