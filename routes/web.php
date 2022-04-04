<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\DataRequestController;
use App\Http\Controllers\FormRequestController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\mainController;
use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\PelayananController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Middleware;
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

// main
Route::get('/dashboard', [mainController::class, 'index'])->middleware('admin');
// Barang
Route::get('/barang', [BarangController::class, 'index'])->name('barang')->middleware('barang');
Route::get('/barang/toko', [BarangController::class, 'filterToko'])->middleware('barang');
Route::get('/barang/suplier', [BarangController::class, 'filterSuplier'])->middleware('barang');
Route::post('/barang/update', [BarangController::class, 'update'])->middleware('barang');
Route::get('/barang/delete/{id}', [BarangController::class, 'delete'])->middleware('barang');
// Data Request
Route::get('/datarequest', [DataRequestController::class, 'index'])->name('datarequest');
// Penjualan
Route::get('/penjualan', [PenjualanController::class, 'index'])->name('penjualan')->middleware('kasir');
Route::post('/penjualan/create', [penjualanController::class, 'create'])->name('tambah-penjualan')->middleware('kasir');
Route::get('/penjualan/delete/{id_penjualan}', [penjualanController::class, 'delete'])->middleware('kasir');
Route::get('/penjualan/clear', [penjualanController::class, 'clear'])->middleware('kasir');
Route::post('/penjualan/simpan', [PenjualanController::class, 'simpan'])->middleware('kasir');
Route::get('/penjualan/printnota/{id_detail_penjualan}', [penjualanController::class, 'nota'])->middleware('kasir');
Route::get('/api/barang/{id}', [penjualanController::class, 'getBarangId']);
// Pembelian
Route::get('/pembelian', [PembelianController::class, 'index'])->name('pembelian')->middleware('kasir');
Route::post('/pembelian/create', [PembelianController::class, 'create'])->middleware('barang');
// Pelayanan
Route::get('/pelayanan', [PelayananController::class, 'index'])->name('pelayanan')->middleware('kasir');
Route::post('/pelayanan/fetch', [PelayananController::class, 'fetch'])->name('pelayanan.fetch');
Route::post('/pelayanan/create', [PelayananController::class, 'create'])->name('create-pelayanan')->middleware('kasir');
Route::get('/pelayanan/printnota/{id_pelayanan}', [PelayananController::class, 'nota'])->middleware('kasir');
Route::get('/pelayanan/printpembayaran/{id_pelayanan}', [PelayananController::class, 'notabayar'])->middleware('kasir');

// User
Route::get('/user', [UserController::class, 'index'])->name('user')->middleware('admin');
Route::post('/user/create', [userController::class, 'create'])->middleware('admin');
Route::get('/user/delete/{id}', [userController::class, 'delete'])->middleware('admin');
Route::post('/user/update', [userController::class, 'update'])->name('update.user')->middleware('admin');
// Kamar
Route::get('/kamar', [KamarController::class, 'index'])->name('kamar')->middleware('admin');
Route::post('/kamar/create', [KamarController::class, 'create'])->middleware('admin');
Route::get('/kamar/delete/{id}', [KamarController::class, 'delete'])->middleware('admin');
Route::post('/kamar/update', [KamarController::class, 'update'])->name('update.kamar')->middleware('admin');
//pasien
Route::get('/home', [KamarController::class, 'index'])->name('pasien')->middleware('pasien');
// Laporan Keuangan
Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan');
Route::get('/laporanservice', [LaporanController::class, 'indexService'])->name('laporanService');
// Form Request
Route::get('/request', [FormRequestController::class, 'index'])->name('request')->middleware('teknisi');
Route::post('/request/create', [FormRequestController::class, 'create'])->middleware('teknisi');
Route::get('/request_view', [FormRequestController::class, 'request_table'])->name('request_view')->middleware('teknisi');
// Notifikasi
Route::get('/notifikasi', [NotifikasiController::class, 'index'])->name('notifikasi')->middleware('teknisi');
Route::post('/notifikasi', [NotifikasiController::class, 'send']);
Route::post('/notifikasi/update', [NotifikasiController::class, 'update']);
//
Route::get('/api/barang/{id}', [penjualanController::class, 'getBarangId']);
Route::get('/api/laporan/{tanggal}', [laporanController::class, 'getDetail']);
// Login
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('autenticate');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
// Error
