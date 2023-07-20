<?php

namespace App\Http\Controllers\desainerController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;

class LoginDesainerController extends Controller
{
    public function authenticate(Request $request){
        
        $client = new Client();
        try {
            $url = "https://padvp2v123.jualdecal.com/api/login";
            $data = [
                "username" => $request->input('username'),
                "password" => $request->input('password')
            ];

            $response = $client->post($url, [
                'json' => $data
            ]);

            $statusCode = $response->getStatusCode();
        
            if ($statusCode === 200) {
                $responseHeader = $response->getHeaders();
                $responseBody = $response->getBody()->getContents();
                $data = json_decode($responseBody);
                $token = $responseHeader['auth-token'][0];
                $request->session()->put('token', $token);
                $request->session()->put('role',$data->status);
                $request->session()->put('id',$data->id);
                $request->session()->put('username',$data->username);

                return redirect()->route('dashboard_desainer');
            
            } else {
                return("not admin");
            }
        } catch (ClientException $e) {
            
            $response = $e->getResponse();
            $statusCode = $response->getStatusCode();
            
            if ($statusCode === 401) {
                return redirect()->route('login_admin_page')->with('Gagal','username atau password salah');
            } else {
                return redirect()->route('login_admin_page')->with('Gagal','terjadi kesalahan');
            }
        } catch (RequestException $e) {
            return redirect()->route('login_admin_page')->with('Gagal','gagal menghubungkan ke server');
        }
    }
}