<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PengarangController;
use App\Http\Controllers\MahasantriController;

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

//Tambahkan route baru di routes/web.php
Route::get('/salam', function () {
    return "Assalamu'alaikum Sobat, Selamat Belajar Laravel";
    });
    
//Tambahkan route baru di routes/web.php    
Route::get('/pegawai/{nama}/{divisi}', function ($nama,$divisi){
    return 'Nama Pegawai : '.$nama.'<br/>Departemen : '.$divisi;
    });

//Tambahkan route baru di routes/web.php
Route::get('/kabar', function () {
    return view('latihan.kondisi');
    });

Route::get(
    '/mahasiswa',
    [MahasiswaController::class, 'dataMahasiswa']
    );
        
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get(
    '/home',
    [HomeController::class, 'index']
    );

Route::get(
    '/aboutus',[HomeController::class, 'aboutus']);
    
Route::get(
    '/pegawai',
    [PegawaiController::class, 'index']
    );

Route::resource('pegawai', PegawaiController::class);

Route::get(
    '/mahasantri',
    [MahasantriController::class, 'index']
    );
Route::resource('mahasantri', MahasantriController::class);

Route::get(
    '/jurusan',
    [MahasantriController::class, 'jurusan']
    );

Route::resource('pengarang', PengarangController::class);

Route::resource('penerbit', PenerbitController::class);

Route::resource('kategori', KategoriController::class);

Route::resource('buku', BukuController::class);

Route::resource('pengarang', PengarangController::class)->middleware('auth');
Route::resource('penerbit', PenerbitController::class)->middleware('auth');
Route::resource('kategori', KategoriController::class)->middleware('auth');
Route::resource('buku', BukuController::class)->middleware('auth');

Auth::routes();
Route::get('/home',
[App\Http\Controllers\HomeController::class, 'index'])->name('home');

//penerbit
Route::get('penerbitpdf', [PenerbitController::class, 'penerbitPDF']);
Route::get('penerbitcsv', [PenerbitController::class, 'penerbitcsv']);

Route::get('/log_view', function () {
    Log::info('Hello saya informasi dari log');
    return view('welcome');
    }
    );