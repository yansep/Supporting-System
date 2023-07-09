<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PtController;
use App\Http\Controllers\cmacontroller;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EstateController;
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
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::resource('/home', HomeController::class)->middleware('auth');

//file pdf
Route::resource('files', FileController::class)->middleware('auth');
Route::get('files/{file}/download', [FileController::class, 'download'])->name('files.download')->middleware('auth');
// Route::post('files/download', [FileController::class, 'downloadSelected'])->name('files.downloadSelected');
Route::post('files/download', [FileController::class, 'downloadSelected'])->name('files.downloadSelected')->middleware('auth');
Route::get('files/deletePDF/{id}', [FileController::class, 'deletePDF']);

//akses admin
Route::resource('/dashboard/admin', AdminController::class)->middleware('auth');
Route::resource('/dashboard/PT', PtController::class)->middleware('auth');
Route::resource('/dashboard/estate', EstateController::class)->middleware('auth');
Route::get('change-password', [ChangePasswordController::class, 'index'])->middleware('auth');
Route::post('change-password', [ChangePasswordController::class, 'changePassword'])->name('change.password')->middleware('auth');

// Route::get('/home', function(){return view('home.home');})->middleware('auth');//pembuatan method auth


