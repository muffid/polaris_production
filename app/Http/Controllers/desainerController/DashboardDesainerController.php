<?php
namespace App\Http\Controllers\desainerController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class DashboardDesainerController extends Controller
{
    public function index(){
        $array = $this->getDataFromApi();
        $data = [
            'performa' => $array,
            'active' => 'Dashboard',
            'session' => [
                    'status' => session('role'),
                    'username' => session('username'),
            ]
          
        ];
        return view('desainer/dashboard_desainer',$data);
    }

    public function getDataFromApi()
    {
        $file = public_path('json/performa.json'); 
        $jsonString = file_get_contents($file);
        $dataObject = json_decode($jsonString);

        return $dataObject;
    }
  
}