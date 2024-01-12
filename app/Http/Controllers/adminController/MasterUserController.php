<?php
namespace App\Http\Controllers\adminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
class MasterUserController extends Controller
{


    public function index(){

        $data = [
            'data_user' => json_decode($this->getDataUser()),
            'active' => 'MasterBahan',
            'session' => [
                'status' => session('role'),
                'username' => session('username'),
                'img_profil' => session('img'),
        ],

        ];
        return view('admin/masterUser',$data);
    }

    public function store(Request $request){


        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $client = new Client();
            $response = $client->request('POST', 'https://freeimage.host/api/1/upload', [
                'multipart' => [
                    [
                        'name'     => 'key',
                        'contents' => '6d207e02198a847aa98d0a2a901485a5',
                    ],
                    [
                        'name'     => 'action',
                        'contents' => 'upload',
                    ],
                    [
                        'name'     => 'source',
                        'contents' => fopen($file->getPathname(), 'r'),
                    ],
                ],
            ]);
            $responseData = json_decode($response->getBody(), true);
            if ($responseData['status_code'] == 200) {
                //id_akun, nama_akun, username_akun,password_akun, status_akun,foto_akun
                    $id_akun = $this->generateUniqueRandomString(5);
                    $nama_akun = $request->input('nama_lengkap');
                    $username_akun = $request->input('nama_user');
                    $password_akun = "123";
                    $status_akun = $request->input('status_akun');
                    $foto_akun = $responseData['image']['url'];

                    try {
                        $url = env('BASE_URL_API')."administrator/newAkun";
                        $data = [
                           "id_akun" => $id_akun,
                           "nama_akun" => $nama_akun,
                           "username_akun" => $username_akun,
                           "password_akun" => $password_akun,
                           "status_akun" => $status_akun,
                           "foto_akun" => $foto_akun
                        ];

                        $response = $client->post($url, [
                            'json' => $data,
                            'headers' => [
                                'auth-token' => session('token'),
                            ],
                        ]);
                        $statusCode = $response->getStatusCode();
                        if ($statusCode === 200) {
                            return redirect()->route('master_user');
                        } else {

                            return redirect()->route('master_user');
                        }
                    } catch (ClientException $e) {
                        return redirect()->route('master_user');
                    }
            } else {

                return redirect()->route('master_user');
            }

        //jika tidak menyertakan file
        }else{

            $id_akun = $this->generateUniqueRandomString(5);
            $nama_akun = $request->input('nama_lengkap');
            $username_akun = $request->input('nama_user');
            $password_akun = "123";
            $status_akun = $request->input('status_akun');
            $foto_akun = "https://iili.io/HsqJcNI.png";
            try {
                $url = env('BASE_URL_API')."administrator/newAkun";
                $data = [
                   "id_akun" => $id_akun,
                   "nama_akun" => $nama_akun,
                   "username_akun" => $username_akun,
                   "password_akun" => $password_akun,
                   "status_akun" => $status_akun,
                   "foto_akun" => $foto_akun
                ];

                $response = $client->post($url, [
                    'json' => $data,
                    'headers' => [
                        'auth-token' => session('token'),
                    ],
                ]);
                $statusCode = $response->getStatusCode();
                if ($statusCode === 200) {
                    return redirect()->route('master_user');
                } else {

                    return redirect()->route('master_user');
                }
            } catch (ClientException $e) {
                return redirect()->route('master_user');
            }

         }
    }

    private function addToDatabase($id_akun,$nama_akun,$username_akun,$password_akun,$status_akun,$foto_akun,$client){

        try {
            $url = env('BASE_URL_API')."administrator/newAkun";
            $data = [
               "id_akun" => $id_akun,
               "nama_akun" => $nama_akun,
               "username_akun" => $username_akun,
               "password_akun" => $password_akun,
               "status_akun" => $status_akun,
               "foto_akun" => $foto_akun
            ];

            $response = $client->post($url, [
                'json' => $data,
                'headers' => [
                    'auth-token' => session('token'),
                ],
            ]);
            $statusCode = $response->getStatusCode();
            if ($statusCode === 200) {
                return redirect()->route('master_user');
            } else {

                return redirect()->route('master_user');
            }
        } catch (ClientException $e) {
            return redirect()->route('master_user');
        }
    }

    private function getDataUser(){
        $client = new Client();
        try{
            $url = env('BASE_URL_API')."administrator/akun";
            $response = $client->get($url, [
                'headers' => [
                    'auth-token' => session('token'),
                ],
            ]);

            $res = $response->getBody()->getContents();

            return $res;
        } catch (ClientException $e) {
            $response = $e->getResponse();
            $statusCode = $response->getStatusCode();
            dd($response);
            if ($statusCode === 401) {
                return $e;
            } else {
                return $e;
            }
        } catch (RequestException $e) {
            $response = $e->getResponse();
            $statusCode = $response->getStatusCode();
            dd($statusCode);
        }
    }

    private function generateUniqueRandomString($length = 10) {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $randomString = '';

        $charactersLength = strlen($characters);
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

}
