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
use App\Http\Controllers\desainerController\prepareEditEcomController;
use App\Http\Controllers\desainerController\EditEcommController;
use App\Http\Controllers\desainerController\DeleteOrderEcomController;
use App\Http\Controllers\desainerController\DataEcommController;

// Setting Controller
use App\Http\Controllers\settingController\LoginSettingController;
use App\Http\Controllers\settingController\DashboardSettingController;
use App\Http\Controllers\settingController\EcommHandleSetting;
use App\Http\Controllers\settingController\DataEcommSettingController;

Route::get('/', function () {return view('login');})->middleware('isLogin')->name('login');
Route::get('/logout',[LogoutController::class,'index'])->name('logout');

//login_page
Route::get('/loginAdminPage',[LoginAdminController::class,'index'])->middleware('isLogin')->name('login_admin_page');
Route::get('/desainer_login',function(){return view('desainer/login_desainer');})->middleware('isLogin')->name('login_desainer_page');
Route::get('/setting_login',function(){return view('setting/login_setting');})->middleware('isLogin')->name('login_setting_page');

//form
Route::POST('/login_admin',[LoginController::class,'authenticate'])->name('login_admin');

//form
Route::POST('/login_desainer',[LoginDesainerController::class,'authenticate'])->name('login_desainer');

//form
Route::POST('/login_setting',[LoginSettingController::class,'authenticate'])->name('login_setting');

//form
Route::POST('/save_ecomm',[PostInputEcomm::class,'store'])->name('save_ecomm');

//form
Route::PUT('/edit_ecomm/{id_akun}/{id_ecomm}',[EditEcommController::class,'store'])->name('edit_ecomm');

Route::middleware('desainer')->group(function(){
    Route::get('/dashborad_desainer',[DashboardDesainerController::class,'index'])->name('dashboard_desainer');
    Route::get('/input_ecommerce',[InputEcommController::class,'index'])->name('input_ecomm_page');
    Route::get('/data_ecommerce',[DataEcommController::class,'index'])->name('data_ecomm_page');
    Route::get('/edit_ecom/{id_akun}/{id_ecom}',[prepareEditEcomController::class,'index'])->name('edit_ecom');

    //ajax
    Route::get('/delete_order_ecom/{id_ecomm}',[DeleteOrderEcomController::class,'deleteOrderEcom'])->name('delete_order_ecom');

    //ajax
    Route::get('/get_ecomm_by_date/{id_akun}/{date}',[DataEcommController::class,'getDataEcommByDate'])->name('get_ecomm_by_date');

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

Route::middleware('setting')->group(function(){
    Route::get('/dashboard_setting',[DashboardSettingController::class,'index'])->name('dashboard_setting');
    Route::get('/handle_ecomm',[EcommHandleSetting::class,'index'])->name('handle_ecomm');

    //ajax
    Route::get('/get_ecomm_unapprove',[DataEcommSettingController::class,'getAllEcommUnapprove'])->name('get_ecomm_unpprove');
});
