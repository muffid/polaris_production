<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;




class LoginController extends Controller{


    public function log(Request $request){
        
        $request->session()->put('role','admin');
        return redirect()->route('dashboard_admin');
    }

    public function authenticate(Request $request){

      

    $client = new Client();
    // dd($request->input('username')." ".$request->input('password'));
  
    try {
        $url = "https://padvp2v123.jualdecal.com/api/login";
        $data = [
            "username" => $request->input('username'),
            "password" => $request->input('password')
        ];

        $client = new Client();

        $response = $client->post($url, [
            'json' => $data
        ]);

        $statusCode = $response->getStatusCode();
    
       
        if ($statusCode === 200) {
            $responseHeader = $response->getHeaders();
            $responseBody = $response->getBody()->getContents();
            $token = $responseHeader['auth-token'][0];
            //harusnya ditaruh di chache
            $data = json_decode($responseBody);
          
            $request->session()->put('token', $token);
            $request->session()->put('role',$data->status);
            $request->session()->put('id',$data->id);
            $request->session()->put('username',$data->username);

            return redirect()->route('dashboard_admin');
         
        } else {
            // Tangani respons lainnya
            // ...
            return("not admin");
        }
    } catch (ClientException $e) {
        
        $response = $e->getResponse();
        $statusCode = $response->getStatusCode();
        
        if ($statusCode === 401) {
            
            return redirect()->route('login_admin_page')->with('Gagal','username atau password salah');
        } else {
            // Tangani respons lainnya
            // ...
            return redirect()->route('login_admin_page')->with('Gagal','terjadi kesalahan');
        }
    } catch (RequestException $e) {
        // Tangani kesalahan saat melakukan permintaan
        // ...
        return redirect()->route('login_admin_page')->with('Gagal','gagal menghubungkan ke server');
    }

    }
    
}
