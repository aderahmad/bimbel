<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\LupaPasswordController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\UserController;
use Illuminate\Routing\Controllers\Middleware;
use App\Http\Middleware\CekLogin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(RegisterController::class)->name('member.')->prefix('register')->group(function() {
    Route::get('/form-register','formRegister')->name('form-register');
    Route::post('/simpan', 'simpanRegister')->name('simpan-register');
});

Route::controller(AdminController::class)->name('admin.')->middleware('CekLogin:admin')->prefix('admin')->group(function() {
    Route::get('/', 'adminBeranda')->name('admin-beranda');
    Route::get('/buat-pesanan', 'buatPesanan')->name('form-input');
    Route::post('/proses-input', 'simpanPensanan')->name('proses-input');
    Route::get('/form-edit/{id}', 'formEdit')->name('form-edit');
    Route::post('/edit-data/{id}', 'editPesanan')->name('edit-data');
    Route::get('/delete/{id}', 'deletePesanan')->name('delete');
});

Route::controller(UserController::class)->name('user.')->middleware('CekLogin:user')->prefix('user')->group(function() {
    Route::get('/', 'userBeranda')->name('user-beranda');
    Route::get('/buat-pesanan', 'buatPesanan')->name('form-input');
    Route::post('/proses-input', 'simpanPensanan')->name('proses-input');
    Route::get('/form-edit/{id}', 'formEdit')->name('form-edit');
    Route::post('/edit-data/{id}', 'editPesanan')->name('edit-data');
    Route::get('/delete/{id}', 'deletePesanan')->name('delete');
});

Route::controller(LoginController::class)->name('login.')->prefix('login')->group(function() {
    Route::get('/', 'formLogin')->name('form-login');
    Route::post('proses-login', 'prosesLogin')->name('proses-login');
});

Route::controller(LogoutController::class)->name('logout.')->prefix('logout')->group(function() {
    Route::get('/', 'prosesLogout')->name('proses-logout');
});

Route::controller(LupaPasswordController::class)->name('forgot.')->prefix('forgot')->group(function() {
    Route::get('/', 'formLupaPw')->name('forgot');
    Route::post('/proses', 'prosesLupaPw')->name('proses-forgot');
    Route::get('/reset-password/{token}', 'resetPassword')->name('reset-password');
    Route::post('/proses-reset', 'prosesResetPassword')->name('proses-reset');
});