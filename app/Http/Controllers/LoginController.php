<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;




class LoginController extends Controller
{
    public function authenticate(Request $request){


    $client = new Client();

    try {
        $response = $client->post('https://padvp2v123.jualdecal.com/login', [
            'form_params' => [
                'username' => $request->input('username'),
                'password' => $request->input('password'),
            ],
        ]);
    
        $statusCode = $response->getStatusCode();
   
        if ($statusCode === 200) {
            $responseBody = $response->getBody();
            $data = json_decode($responseBody, true);
            
            $token = $data['token'];

            //harusnya ditaruh di chache
            $request->session()->put('token', $token);
          
            $request->session()->put('role','admin');
            return redirect()->route('dashboard_admin');
         
        } else {
            // Tangani respons lainnya
            // ...
        }
    } catch (ClientException $e) {
        $response = $e->getResponse();
        $statusCode = $response->getStatusCode();
    
        if ($statusCode === 401) {
            
            return redirect()->route('login_admin_page')->with('Gagal','username atau password salah');
        } else {
            // Tangani respons lainnya
            // ...
        }
    } catch (RequestException $e) {
        // Tangani kesalahan saat melakukan permintaan
        // ...
    }

   

    }
    
}
