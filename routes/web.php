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
Route::get('guest/', [webController::class, 'home']);
Route::get('guest/profile', [webController::class, 'profile']);
Route::get('guest/program-keahlian', [webController::class, 'program']);
Route::get('guest/ppdb', [webController::class, 'ppdb']);
Route::get('guest/pengumuman-ppdb', [webController::class, 'pengumuman']);
Route::get('guest/direktori-guru', [webController::class, 'guru']);
Route::get('guest/direktori-pegawai', [webController::class, 'pegawai']);
Route::get('guest/direktori-siswa', [webController::class, 'siswa']);
Route::get('guest/direktori-alumni', [webController::class, 'alumni']);
Route::get('guest/galeri-foto', [webController::class, 'foto']);
Route::get('guest/galeri-video', [webController::class, 'video']);
Route::get('guest/sarana-prasarana', [webController::class, 'saranaPrasarana']);
Route::get('guest/sarana-prasarana-template', [webController::class, 'saranaPrasaranaTemplate']);
Route::get('guest/prestasi-siswa', [webController::class, 'prestasi']);
Route::get('guest/prestasi-template', [webController::class, 'prestasiTemplate']);
Route::get('guest/berita', [webController::class, 'berita']);
Route::get('guest/berita-template', [webController::class, 'beritaTemplate']);
Route::get('guest/ekstrakulikuler', [webController::class, 'ekstrakulikuler']);
Route::get('guest/media-sosial', [webController::class, 'mediaSosial']);
Route::get('guest/sejarah', [webController::class, 'sejarah']);
Route::get('guest/detail-program', [webController::class, 'detailProgram']);
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