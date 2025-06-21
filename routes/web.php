<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KampusController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PengajuanMagangController;

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
    return view('dashboard');
});

Route::get('/magang', function () {
    return view('magang.index');
});

Route::get('/pelatihan', function () {
    return view('pelatihan.index');
});

//Route Kampus
Route::resource('kampus', KampusController::class)->parameters([
    'kampus' => 'kampus'
]);

//Route Mahasiswa
Route::resource('mahasiswa', MahasiswaController::class);

//Route Pengajuan Magang
Route::resource('pengajuan', PengajuanMagangController::class);
    //Invoice Magang
    Route::get('/pengajuan/{id}/invoice', [PengajuanMagangController::class, 'invoice'])->name('pengajuan.invoice');
    Route::post('/pengajuan/{id}/invoice', [PengajuanMagangController::class, 'invoiceStore'])->name('pengajuan.invoice.store');
    //Bukti Bayar
    Route::get('/pengajuan/{id}/upload-bayar', [PengajuanMagangController::class, 'uploadBukti'])->name('pengajuan.upload');
    Route::post('/pengajuan/{id}/upload-bayar', [PengajuanMagangController::class, 'storeBukti'])->name('pengajuan.upload.store');

