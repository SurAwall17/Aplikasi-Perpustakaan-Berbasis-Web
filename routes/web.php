<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MidtransController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PeminjamanController;

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
    return view('index');
});
// Route::get('/midtrans/callback', [MidtransController::class, 'callback']);

Route::get('/midtrans/finish', [MidtransController::class, 'finish'])->name('midtrans.finish');

Route::get('/export-peminjaman',[ExportController::class , 'export_peminjaman']);
Route::get('/export-pengembalian',[ExportController::class , 'export_pengembalian']);
Route::get('/export-denda',[ExportController::class , 'denda']);

Route::get('/login', [LoginController::class, 'view_login']);
Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', [RegisterController::class, 'view_register']);
Route::post('/register', [RegisterController::class, 'register']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/buku', [PeminjamanController::class, 'daftar_buku']);

Route::get('/pinjam', [PeminjamanController::class, 'form_peminjaman'])->middleware('auth');
Route::post('/pinjam', [PeminjamanController::class, 'tambah_peminjaman'])->middleware('auth');

Route::get('/peminjaman', [PeminjamanController::class, 'data_peminjaman'])->middleware('auth');

Route::get('/pengembalian', [PeminjamanController::class, 'form_pengembalian']);


