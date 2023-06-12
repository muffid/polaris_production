<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardAdmController;
use App\Http\Controllers\EcommerceAdmController;
use App\Http\Controllers\NonEcommController;
use App\Http\Controllers\BahanController;
use App\Http\Controllers\MonitorController;
use App\Http\Controllers\MasterBahanController;
use App\Http\Controllers\MasterMesinController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PerformaController;
use App\Http\Controllers\LoginAdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {return view('login');})->middleware('isLogin')->name('login');
Route::get('/logout',[LogoutController::class,'index'])->name('logout');

Route::POST('/login_admin',[LoginController::class,'authenticate'])->name('login_admin');
Route::get('/loginAdminPage',[LoginAdminController::class,'index'])->middleware('isLogin')->name('login_admin_page');

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




