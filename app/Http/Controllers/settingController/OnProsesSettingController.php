<?php
namespace App\Http\Controllers\settingController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class OnProsesSettingController extends Controller
{

    public function index(){

        $data = [

            'active' => 'OnProsesSetting',
            'session' => [
                    'status' => session('role'),
                    'username' => session('username'),
                    'img_profil' => session('img'),
            ]

        ];
        return view('setting/task_setting',$data);
    }

}
