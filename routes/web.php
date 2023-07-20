<?php

use Illuminate\Support\Facades\Route;

// Admin Controller
use App\Http\Controllers\adminController\DashboardAdmController;
use App\Http\Controllers\adminController\EcommerceAdmController;
use App\Http\Controllers\adminController\NonEcommController;
use App\Http\Controllers\adminController\BahanController;
use App\Http\Controllers\adminController\MonitorController;
use App\Http\Controllers\adminController\MasterBahanController;
use App\Http\Controllers\adminController\MasterMesinController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\adminController\PerformaController;
use App\Http\Controllers\adminController\LoginAdminController;

// Desainer Controller
use App\Http\Controllers\desainerController\LoginDesainerController;
use App\Http\Controllers\desainerController\DashboardDesainerController;
use App\Http\Controllers\desainerController\InputEcommController;
use App\Http\Controllers\desainerController\PostInputEcomm;


Route::get('/', function () {return view('login');})->middleware('isLogin')->name('login');
Route::get('/logout',[LogoutController::class,'index'])->name('logout');

Route::POST('/login_admin',[LoginController::class,'authenticate'])->name('login_admin');
Route::get('/loginAdminPage',[LoginAdminController::class,'index'])->middleware('isLogin')->name('login_admin_page');

Route::POST('/login_desainer',[LoginDesainerController::class,'authenticate'])->name('login_desainer');
Route::POST('/save_ecomm',[PostInputEcomm::class,'store'])->name('save_ecomm');
Route::get('/desainer_login',function(){return view('desainer/login_desainer');})->middleware('isLogin')->name('login_desainer_page');


Route::middleware('desainer')->group(function(){
    Route::get('/dashborad_desainer',[DashboardDesainerController::class,'index'])->name('dashboard_desainer');
    Route::get('/input_ecommerce',[InputEcommController::class,'index'])->name('input_ecomm_page');

});

Route::middleware('admin')->group(function(){
    Route::get('/dashborad_adm',[DashboardAdmController::class,'index'])->name('dashboard_admin');
    Route::get('/ecommerce',[EcommerceAdmController::class,'index'])->name('ecommerce_admin');
    Route::get('/performa',[PerformaController::class,'index'])->name('performa');
    Route::get('/non_ecommerce',[NonEcommController::class,'index'])->name('nonecommerce_admin');
    Route::get('/bahan',[BahanController::class,'index'])->name('bahan_admin');
    Route::get('/monitor',[MonitorController::class,'index'])->name('monitor');
    Route::get('/master_bahan',[MasterBahanController::class,'index'])->name('master_bahan');
    Route::get('/master_mesin',[MasterMesinController::class,'index'])->name('master_mesin');
});




