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
use App\Http\Controllers\adminController\MasterLaminasiController;
use App\Http\Controllers\adminController\MasterEkspedisiController;
use App\Http\Controllers\adminController\MasterTokoController;
use App\Http\Controllers\adminController\MasterUserController;
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
use App\Http\Controllers\desainerController\InputOrderNonEcomController;
use App\Http\Controllers\desainerController\OrderReturnController;

// Setting Controller
use App\Http\Controllers\settingController\LoginSettingController;
use App\Http\Controllers\settingController\DashboardSettingController;
use App\Http\Controllers\settingController\EcommHandleSetting;
use App\Http\Controllers\settingController\DataEcommSettingController;
use App\Http\Controllers\settingController\OnProsesSettingController;
use App\Http\Controllers\settingController\FinnishedSettingController;

//OperatorController
use App\Http\Controllers\operatorController\LoginOperatorController;
use App\Http\Controllers\operatorController\DashboardOperatorController;
use App\Http\Controllers\operatorController\ScanOrderOperatorController;
use App\Http\Controllers\operatorController\CetakOrderOperatorController;

Route::get('/', function () {return view('login');})->middleware('isLogin')->name('login');
Route::get('/logout',[LogoutController::class,'index'])->name('logout');

//login_page
Route::get('/loginAdminPage',[LoginAdminController::class,'index'])->middleware('isLogin')->name('login_admin_page');
Route::get('/desainer_login',function(){return view('desainer/login_desainer');})->middleware('isLogin')->name('login_desainer_page');
Route::get('/setting_login',function(){return view('setting/login_setting');})->middleware('isLogin')->name('login_setting_page');
Route::get('/operator_login',function(){return view('operator/login_operator');})->middleware('isLogin')->name('login_operator_page');

//form login
Route::POST('/login_admin',[LoginController::class,'authenticate'])->name('login_admin');
Route::POST('/login_desainer',[LoginDesainerController::class,'authenticate'])->name('login_desainer');
Route::POST('/login_setting',[LoginSettingController::class,'authenticate'])->name('login_setting');
Route::POST('/login_operator',[LoginOperatorController::class,'authenticate'])->name('login_operator');



//form save order ecom
Route::POST('/save_ecomm',[PostInputEcomm::class,'store'])->name('save_ecomm');

//form edit order exom
Route::PUT('/edit_ecomm/{id_akun}/{id_ecomm}',[EditEcommController::class,'store'])->name('edit_ecomm');

//form edit recycle
Route::PUT('/recycle_return',[OrderReturnController::class,'recycle'])->name('recycle_return');

Route::get('/monitor',[MonitorController::class,'index'])->middleware('isAuthenticate')->name('monitor');

//ajax
Route::get('/get_monitor_data',[MonitorController::class,'getMonitorData'])->middleware('isAuthenticate')->name('get_monitor_data');

Route::middleware('desainer')->group(function(){
    Route::get('/dashborad_desainer',[DashboardDesainerController::class,'index'])->name('dashboard_desainer');
    Route::get('/input_ecommerce',[InputEcommController::class,'index'])->name('input_ecomm_page');
    Route::get('/data_ecomm_page',[DataEcommController::class,'index'])->name('data_ecomm_page');
    Route::get('/edit_ecom/{id_akun}/{id_ecom}',[prepareEditEcomController::class,'index'])->name('edit_ecom');
    // Desainer & Operator
    Route::get('/order_return',[OrderReturnController::class,'index'])->name('order_return');
    //Desainer & Operator
    Route::get('/list_order_return',[OrderReturnController::class,'listOrderReturnPage'])->name('list_order_return');
    //Desainer & Operator
    Route::get('/list_order_return/{sku}/{warna}',[OrderReturnController::class,'listOrderReturnPageWithParams'])->name('list_order_return_params');
    //ajax Desainer & Operator
    Route::get('/order_tuntas_bulan/{bulan}',[OrderReturnController::class,'getOrderByBulan'])->name('order_tuntas_bulan');
    //ajax Desainer & Operator
    Route::get('/list_order_return_ajax',[OrderReturnController::class,'getListOrderReturn'])->name('lst_order_return_ajax');
    //ajax
    Route::get('/delete_order_ecom/{id_ecomm}',[DeleteOrderEcomController::class,'deleteOrderEcom'])->name('delete_order_ecom');
    //ajax
    Route::get('/get_ecomm_by_date/{id_akun}/{date}',[DataEcommController::class,'getDataEcommByDate'])->name('get_ecomm_by_date');
    //ajax Desainer & Operator
    Route::get('/set_return/{id_order}',[OrderReturnController::class,'setReturn'])->name('set_return');
    //-------------- NON ECOMM ------------------------//
    Route::get('/input_nonecommerce',[InputOrderNonEcomController::class,'index'])->name('input_nonecommerce');

});

Route::middleware('admin')->group(function(){
    Route::get('/dashboard_admin',[DashboardAdmController::class,'index'])->name('dashboard_admin');
    Route::get('/ecommerce_admin',[EcommerceAdmController::class,'index'])->name('ecommerce_admin');
    Route::get('/performa',[PerformaController::class,'index'])->name('performa');
    Route::get('/nonecommerce_admin',[NonEcommController::class,'index'])->name('nonecommerce_admin');
    Route::get('/bahan_admin',[BahanController::class,'index'])->name('bahan_admin');
    Route::get('/master_bahan',[MasterBahanController::class,'index'])->name('master_bahan');
    Route::get('/master_mesin',[MasterMesinController::class,'index'])->name('master_mesin');
    Route::get('/master_laminasi',[MasterLaminasiController::class,'index'])->name('master_laminasi');
    Route::get('/master_ekspedisi',[MasterEkspedisiController::class,'index'])->name('master_ekspedisi');
    Route::get('/master_toko',[MasterTokoController::class,'index'])->name('master_toko');
    Route::get('/master_user',[MasterUserController::class,'index'])->name('master_user');

    //form save bahan
    Route::POST('/save_bahan',[MasterBahanController::class,'store'])->name('save_bahan');

    //form save mesin
    Route::POST('/save_mesin',[MasterMesinController::class,'store'])->name('save_mesin');

    //form save laminasi
    Route::POST('/save_laminasi',[MasterLaminasiController::class,'store'])->name('save_laminasi');

    //form save ekspedisi
    Route::POST('/save_ekspedisi',[MasterEkspedisiController::class,'store'])->name('save_ekspedisi');

    //form save akun_ecom
    Route::POST('/save_toko',[MasterTokoController::class,'store'])->name('save_toko');

    //form save user
    Route::POST('/save_user',[MasterUserController::class,'store'])->name('save_user');

    //form edit bahan
    Route::PUT('/edit_bahan_cetak',[MasterBahanController::class,'edit'])->name('edit_bahan_cetak');

    //form edit mesin
    Route::PUT('/edit_mesin_cetak',[MasterMesinController::class,'edit'])->name('edit_mesin_cetak');

    //form edit laminasi
    Route::PUT('/edit_laminasi',[MasterLaminasiController::class,'edit'])->name('edit_laminasi');

    //form edit ekspedisi
    Route::PUT('/edit_ekspedisi',[MasterEkspedisiController::class,'edit'])->name('edit_ekspedisi');

    //form edit akun_ecom
    Route::PUT('/edit_toko',[MasterTokoController::class,'edit'])->name('edit_toko');
});

Route::middleware('setting')->group(function(){
    Route::get('/dashboard_setting',[DashboardSettingController::class,'index'])->name('dashboard_setting');
    Route::get('/handle_ecomm',[EcommHandleSetting::class,'index'])->name('handle_ecomm');
    //ajax
    Route::get('/get_ecomm_unapprove',[DataEcommSettingController::class,'getAllEcommUnapprove'])->name('get_ecomm_unapprove');
    //ajax
    Route::get('/handle_setting/{id_ecomm}',[EcommHandleSetting::class,'handleSetting'])->name('handle_setting');
    //ajax
    Route::get('/get_ecomm_on_proses/{id_akun}',[DataEcommSettingController::class,'getEcommOnProses'])->name('get_ecomm_on_proses');
    //ajax
    Route::get('/get_finished_setting_today',[DataEcommSettingController::class,'getFinishedSettingToday'])->name('get_finished_setting_today');
    //ajax
    Route::get('/get_finished_setting_by_date/{date}',[DataEcommSettingController::class,'getFinishedSettingByDate'])->name('get_finished_setting_by_date');
    Route::get('/on_proses_setting',[OnProsesSettingController::class,'index'])->name('on_proses_setting');
    Route::get('/finished_setting',[FinnishedSettingController::class,'index'])->name('finished_setting');
});

Route::middleware('operator')->group(function(){
    Route::get('/dashboard_operator',[DashboardOperatorController::class,'index'])->name('dashboard_operator');
    Route::get('/scan_order_operator',[ScanOrderOperatorController::class,'index'])->name('scan_order_operator');
    Route::get('/cetak_order_operator',[CetakOrderOperatorController::class,'index'])->name('cetak_order_operator');
    //ajax
    Route::get('/finnish_order/{id_ecomm}',[DataEcommSettingController::class,'finnishSetting'])->name('finnish_order');
    //ajax
    Route::get('/get_order_ecomm_by_resi/{no_resi}',[ScanOrderOperatorController::class,'getDataEcommByResi'])->name('get_order_ecomm_by_resi');
    //ajax
    Route::get('/set_tuntas_ecomm/{no_resi}',[ScanOrderOperatorController::class,'setTuntas'])->name('set_tuntas_ecomm');
    //ajax
    Route::get('/get_allsetting_onproses',[CetakOrderOperatorController::class,'getEcommOnProses'])->name('get_allsetting_onproses');
     //ajax
     Route::get('/cancel_setting/{id_ecomm}',[DataEcommSettingController::class,'cancelSetting'])->name('cancel_setting');
});


