<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\inputskucontroller;
use App\Http\Controllers\hrController;
use App\Http\Controllers\hrheadcontroller;
use App\Http\Controllers\skucontroller;
use App\Http\Controllers\gacontroller;
use App\Http\Controllers\cmacontroller;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChangePasswordController;

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


Route::get('/', [LoginController::class, 'index']);
Route::get('/login', function () {
    return view('login');
});

Route::get('/login', [LoginController::class, 'index']);//->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/home', function(){
    return view('home.home');
})->middleware('auth');//pembuatan method auth
Route::resource('/dashboard/inputsku/create', inputskucontroller::class)->middleware('auth');

Route::get('/trial/pengunjung', [HomeController::class, 'trialPengunjung']);
Route::get('/karyawan', [KaryawanController::class, 'index']);

Route::resource('/dashboard/hr', hrController::class)->middleware('auth');
Route::resource('/dashboard/sku', skucontroller::class)->middleware('auth');
Route::resource('/dashboard/ga', gacontroller::class)->middleware('auth');
Route::resource('/dashboard/hrhead', hrheadcontroller::class)->middleware('auth');
Route::resource('/dashboard/cma', cmacontroller::class)->middleware('auth');
Route::resource('/dashboard/admin', AdminController::class)->middleware('auth');

Route::get('/dashboard/print', [hrController::class, 'print'])->middleware('auth');
Route::get('/dashboard/downloadpdf/{id}', [hrController::class, 'downloadpdf'])->middleware('auth');

Route::get('change-password', [ChangePasswordController::class, 'index']);
Route::post('change-password', [ChangePasswordController::class, 'changePassword'])->name('change.password');
