<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\webController;

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

//  Route::get('/', function () {
//      return view('welcome');
//  });

Route::get('/', [webController::class, 'home']);
Route::get('/profile', [webController::class, 'profile']);
Route::get('/program-keahlian', [webController::class, 'program']);
Route::get('/ppdb', [webController::class, 'ppdb']);
Route::get('/pengumuman-ppdb', [webController::class, 'pengumuman']);
Route::get('/direktori-guru', [webController::class, 'guru']);
Route::get('/direktori-pegawai', [webController::class, 'pegawai']);
Route::get('/direktori-siswa', [webController::class, 'siswa']);
Route::get('/direktori-alumni', [webController::class, 'alumni']);
Route::get('/galeri-foto', [webController::class, 'foto']);
Route::get('/galeri-video', [webController::class, 'video']);
Route::get('/sarana-prasarana', [webController::class, 'saranaPrasarana']);
Route::get('/prestasi-siswa', [webController::class, 'prestasi']);
Route::get('/berita', [webController::class, 'berita']);
Route::get('/ekstrakulikuler', [webController::class, 'ekstrakulikuler']);
Route::get('/media-sosial', [webController::class, 'mediaSosial']);
Route::get('/sejarah', [webController::class, 'sejarah']);
Route::get('/detail-program', [webController::class, 'detailProgram']);