<?php

namespace App\Http\Controllers\adminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginAdminController extends Controller
{
    public function index(){
        return view('admin/loginAdmin');
    }
}
