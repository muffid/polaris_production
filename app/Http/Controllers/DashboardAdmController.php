<?php

namespace App\Http\Controllers;

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
                    'user' => 'John Saina',
                    'status' => 'Administrator',
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
