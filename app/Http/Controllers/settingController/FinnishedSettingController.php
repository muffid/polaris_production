<?php
namespace App\Http\Controllers\settingController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class FinnishedSettingController extends Controller
{

    public function index(){

        $data = [

            'active' => 'FinnishSetting',
            'session' => [
                    'status' => session('role'),
                    'username' => session('username'),
                    'img_profil' => session('img'),
            ]

        ];
        return view('setting/finnished_ecom_setting',$data);
    }

}
