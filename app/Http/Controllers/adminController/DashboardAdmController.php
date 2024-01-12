<?php

namespace App\Http\Controllers\adminController;

use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use GuzzleHttp\Client;

class DashboardAdmController extends Controller
{
    public function index(){

        $array = $this->getDataFromApi();

        $data = [
            'performa' => $array,

            'active' => 'Dashboard',
            'session' => [
                    'status' => session('role'),
                    'username' => session('username'),
                    'img_profil' => session('img'),
            ],
            'key' => '897878',
        ];
        return view('admin/dashboard',$data);
    }

    public function getDataFromApi()
    {
        $file = public_path('json/performa.json');
        $jsonString = file_get_contents($file);
        $dataObject = json_decode($jsonString);

        return $dataObject;
    }

}
