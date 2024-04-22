<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\webController;
use App\Http\Controllers\adminController;

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


// Public
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
Route::get('/sarana-prasarana-template', [webController::class, 'saranaPrasaranaTemplate']);
Route::get('/prestasi-siswa', [webController::class, 'prestasi']);
Route::get('/prestasi-template', [webController::class, 'prestasiTemplate']);
Route::get('/berita', [webController::class, 'berita']);
Route::get('/berita-template', [webController::class, 'beritaTemplate']);
Route::get('/ekstrakulikuler', [webController::class, 'ekstrakulikuler']);
Route::get('/media-sosial', [webController::class, 'mediaSosial']);
Route::get('/sejarah', [webController::class, 'sejarah']);
Route::get('/detail-program', [webController::class, 'detailProgram']);
// Public

// Admin
Route::get('admin/login', [adminController::class, 'login']);
Route::get('admin/dashboard', [adminController::class, 'dashboard']);
Route::get('admin/admin', [adminController::class, 'admin']);
Route::get('admin/beranda', [adminController::class, 'adminBeranda']);
Route::get('admin/profile', [adminController::class, 'adminProfile']);
Route::get('admin/program-keahlian', [adminController::class, 'adminProgramKeahlian']);
Route::get('admin/guru', [adminController::class, 'adminGuru']);
Route::get('admin/staff', [adminController::class, 'adminStaff']);
Route::get('admin/siswa', [adminController::class, 'adminSiswa']);
Route::get('admin/alumni', [adminController::class, 'adminAlumni']);
Route::get('admin/foto', [adminController::class, 'adminFoto']);
Route::get('admin/video', [adminController::class, 'adminVideo']);
Route::get('admin/informasiPPDB', [adminController::class, 'adminInformasiPPDB']);
Route::get('admin/pendaftaranPPDB', [adminController::class, 'adminPendaftaranPPDB']);
Route::get('admin/pengumumanPPDB', [adminController::class, 'adminPengumumanPPDB']);
Route::get('admin/saranaPrasarana', [adminController::class, 'adminSaranaPrasarana']);
Route::get('admin/prestasi', [adminController::class, 'adminPrestasi']);
Route::get('admin/berita', [adminController::class, 'adminIBerita']);
Route::get('admin/ekstrakulikuler', [adminController::class, 'adminEkstrakulikuler']);
Route::get('admin/sosialMedia', [adminController::class, 'adminSosialMedia']);
Route::get('admin/umpanBalik', [adminController::class, 'adminUmpanBalik']);
// Admin