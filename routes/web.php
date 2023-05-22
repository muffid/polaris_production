<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/adm_login', function () {
    return view('admin/login');
})->name('admin_login');

Route::post('/adm_dashboard', function () {
    return view('admin/adm_dashboard');
})->name('admin_dashboard');

Route::get('/', function () {
    return view('welcome');
});
