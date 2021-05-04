<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PemasokController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\StokController;

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

Route::get('/', function () {
    return view('layout.app');
});

Route::get('/auth/login', [LoginController::class, 'check'])->name('auth.login');
Route::post('/auth/check', [LoginController::class, 'check'])->name('auth.check');

Route::group(['middleware' => ['AuthCheck']], function () {
    Route::post('/auth/logout', [LoginController::class, 'logout'])->name('auth.logout');

    // manage data
    Route::get('/manage-data', [PemasokController::class, 'index'])->name('manage-data');
    Route::post('/manage-data/insert', [PemasokController::class, 'store'])->name('insert-data');
    Route::match(['get', 'post'], '/manage-data/edit{id}', [PemasokController::class, 'edit']);
    Route::post('/manage-data/delete{id}', [PemasokController::class, 'destroy']);
    Route::get('/changeStatus', [PemasokController::class, 'changeStatus'])->name('changeStatus');
    Route::get('/manage-data/download-data', [PemasokController::class, 'downloadPDF'])->name('print-pdf');

    // transaksi barang
    Route::get('/pembelian', [PembelianController::class, 'index'])->name('pembelian');
    Route::post('/pembelian/store', [PembelianController::class, 'store'])->name('pembelian-store');
    Route::match(['get', 'post'], '/pembelian/update{id}', [PembelianController::class, 'update']);
    Route::get('/pengeluaran', [PengeluaranController::class, 'index'])->name('pengeluaran');
    Route::match(['get', 'post'], '/pengeluaran/update{id}', [PengeluaranController::class, 'update']);

    // stok barang
    Route::get('/stok-barang', [StokController::class, 'index'])->name('stok');
});
