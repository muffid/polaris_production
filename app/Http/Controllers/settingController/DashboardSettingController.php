<?php
namespace App\Http\Controllers\settingController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class DashboardSettingController extends Controller
{
    public function index(){

        $data = [

            'active' => 'Dashboard',
            'session' => [
                    'status' => session('role'),
                    'username' => session('username'),
                    'img_profil' => session('img'),
            ]

        ];
        return view('setting/dashboard_setting',$data);
    }



}
