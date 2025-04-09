<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MidtransController;

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
