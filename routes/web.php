<?php

use App\Http\Controllers\authcontroller;
use App\Http\Controllers\berandacontroller;
use App\Http\Controllers\dashboardcontroller;
use App\Http\Controllers\pelanggancontroller;
use App\Http\Controllers\produkcontroller;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [berandacontroller::class, 'index']);
Route::get('/produk', [berandacontroller::class, 'produk']);
Route::get('/keranjang', [berandacontroller::class, 'keranjang']);
Route::post('/inputJumlah/{id}', [pelanggancontroller::class, 'inputjml']);
Route::delete('/hapusProduk/{id}', [pelanggancontroller::class, 'deleteItem']);
Route::delete('/hapuspelanggan/{id}', [dashboardcontroller::class, 'deletePelanggan']);
Route::put('/cekout', [pelanggancontroller::class, 'cekOut']);
Route::get('/produkDetail/{id}', [berandacontroller::class, 'produkdetail']);
Route::get('/login', [authcontroller::class, 'index'])->name('login')->middleware('guest');
Route::get('/register', [authcontroller::class, 'register']);
Route::post('/daftar', [authcontroller::class, 'store']);
Route::post('/authLogin', [authcontroller::class, 'login']);
Route::get('/logout', [authcontroller::class, 'logout']);

Route::get('/dasbor', [dashboardcontroller::class, 'index'])->middleware('auth');
Route::get('/riwayatPembelian', [dashboardcontroller::class, 'riwayat'])->middleware('auth');
Route::get('/tambahproduk', [dashboardcontroller::class, 'dataProduk'])->middleware('auth');

Route::get('/datapelanggan', [dashboardcontroller::class, 'dataPelanggan'])->middleware('auth');
// Route::get('/datapelanggan/{id}', [dashboardcontroller::class, 'detailPelanggan'])->middleware('auth');
Route::get('/datapelanggan/{id}', [dashboardcontroller::class, 'editPelanggan'])->middleware('auth');
Route::post('/updatepelanggan/{id}', [dashboardcontroller::class, 'updatePelanggan'])->middleware('auth');

Route::resource('/dataproduk', produkcontroller::class)->middleware('auth');
