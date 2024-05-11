<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\webController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\adminActionController;
use App\Http\Controllers\programKeahlianController;
use App\Http\Controllers\direktoriGuruController;

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
Route::get('guest/galeri-template/{id_album}', [webController::class, 'galeriTemplate']);
Route::get('guest/galeri-template-video/{id_album}', [webController::class, 'galeriTemplateVideo']);
Route::get('guest/sarana-prasarana', [webController::class, 'saranaPrasarana']);
Route::get('guest/sarana-prasarana-template', [webController::class, 'saranaPrasaranaTemplate']);
Route::get('guest/prestasi-siswa', [webController::class, 'prestasi']);
Route::get('guest/prestasi-template', [webController::class, 'prestasiTemplate']);
Route::get('guest/berita', [webController::class, 'berita']);
Route::get('guest/berita-template', [webController::class, 'beritaTemplate']);
Route::get('guest/ekstrakulikuler', [webController::class, 'ekstrakulikuler']);
Route::get('guest/media-sosial', [webController::class, 'mediaSosial']);
Route::get('guest/sejarah', [webController::class, 'sejarah']);
// Public

// Admin 
Route::get('admin/login', [adminController::class, 'login']);
Route::get('admin/dashboard', [adminController::class, 'dashboard']);
// Route::get('admin/admin', [adminController::class, 'admin'])->name('admin.admin');
Route::get('admin/beranda', [adminController::class, 'adminBeranda']);
Route::get('admin/sejarah', [adminController::class, 'adminSejarah']);
Route::get('admin/profile', [adminController::class, 'adminProfile']);
// Route::get('admin/program-keahlian', [adminController::class, 'adminProgramKeahlian'])->name('admin.programKeahlian.index');
// Route::get('admin/guru', [adminController::class, 'adminGuru']);
Route::get('admin/staff', [adminController::class, 'adminStaff']);
Route::get('admin/siswa', [adminController::class, 'adminSiswa']);
Route::get('admin/alumni', [adminController::class, 'adminAlumni']);
Route::get('admin/album', [adminController::class, 'adminAlbum'])->name('admin.album.index');
Route::get('admin/foto', [adminController::class, 'adminFoto'])->name('admin.foto.index');
Route::get('admin/video', [adminController::class, 'adminVideo'])->name('admin.video.index');
Route::get('admin/informasiPPDB', [adminController::class, 'adminInformasiPPDB']);
Route::get('admin/pendaftaranPPDB', [adminController::class, 'adminPendaftaranPPDB']);
Route::get('admin/pengumumanPPDB', [adminController::class, 'adminPengumumanPPDB']);
Route::get('admin/saranaPrasarana', [adminController::class, 'adminSaranaPrasarana']);
Route::get('admin/prestasi', [adminController::class, 'adminPrestasi']);
Route::get('admin/berita', [adminController::class, 'adminIBerita']);
Route::get('admin/ekstrakulikuler', [adminController::class, 'adminEkstrakulikuler']);
Route::get('admin/sosialMedia', [adminController::class, 'adminSosialMedia']);
Route::get('admin/umpanBalik', [adminController::class, 'adminUmpanBalik']);
Route::get('admin/pengaturan', [adminController::class, 'adminPengaturan']);
// Admin

//Admin CRUD
Route::get('admin/admin', [adminActionController::class, 'index'])->name('admin.index');
Route::post('/adminStore', [adminActionController::class, 'store'])->name('admin.store');
Route::patch('/adminUpdate/{id}', [adminActionController::class, 'update'])->name('admin.update');
Route::delete('/adminUpdate/{id}', [adminActionController::class, 'destroy'])->name('admin.destroy');

//Backend Crud
Route::post('admin/album', [BackendController::class, 'storeAlbum'])->name('admin.album.store');
Route::patch('/admin/album/{id}', [BackendController::class, 'updateAlbum'])->name('admin.album.update');
Route::delete('/admin/album/{id}', [BackendController::class, 'destroyAlbum'])->name('admin.album.destroy');

Route::post('admin/foto', [BackendController::class, 'storeFoto'])->name('admin.foto.store');
Route::patch('/admin/foto/{id}', [BackendController::class, 'updateFoto'])->name('admin.foto.update');
Route::delete('/admin/foto/{id}', [BackendController::class, 'destroyFoto'])->name('admin.foto.destroy');

Route::post('admin/video', [BackendController::class, 'storeVideo'])->name('admin.video.store');
Route::patch('/admin/video/{id}', [BackendController::class, 'updateVideo'])->name('admin.video.update');
Route::delete('/admin/video/{id}', [BackendController::class, 'destroyVideo'])->name('admin.video.destroy');


// CRUD Program Keahlian
Route::get('admin/program-keahlian', [programKeahlianController::class, 'adminProgramKeahlian'])->name('admin.programKeahlian.index');
Route::get('guest/program-keahlian', [webController::class, 'program']);
Route::get('guest/detail-program/{id_program}', [webController::class, 'detailProgram']);
    // Store
    Route::post('admin/program-keahlian', [programKeahlianController::class, 'storeProgramKeahlian'])->name('ProgramKeahlian.store');
    Route::post('admin/capaianPembelajaran', [programKeahlianController::class, 'storeCapaianPembelajaran'])->name('CapaianPembelajaran.store');
    Route::post('admin/peluangKerja', [programKeahlianController::class, 'storePeluangKerja'])->name('PeluangKerja.store');
    // Store

    // Update
    Route::patch('admin/program-keahlian/{id_program}', [programKeahlianController::class, 'updateProgramKeahlian'])->name('ProgramKeahlian.update');
    Route::patch('admin/capaianPembelajaran/{id_capaian_pembelajaran}', [programKeahlianController::class, 'updateCapaianPembelajaran'])->name('CapaianPembelajaran.update');
    Route::patch('admin/peluangKerja/{id_peluang_kerja}', [programKeahlianController::class, 'updatePeluangKerja'])->name('PeluangKerja.update');
    // Update

    // Destroy
    Route::delete('admin/program-keahlian/{id_program}', [programKeahlianController::class, 'destroyProgramKeahlian'])->name('ProgramKeahlian.destroy');
    Route::delete('admin/capaianPembelajaran/{id_capaian_pembelajaran}', [programKeahlianController::class, 'destroyCapaianPembelajaran'])->name('CapaianPembelajaran.destroy');
    Route::delete('admin/peluangKerja/{id_peluang_kerja}', [programKeahlianController::class, 'destroyPeluangKerja'])->name('PeluangKerja.destroy');
    // Destroy

// CRUD Program Keahlian

// CRUD Direktori Guru
Route::get('admin/guru', [direktoriGuruController::class, 'adminDirektoriGuru'])->name('admin.direktoriGuru.index');

    // Store
    Route::post('admin/guru', [direktoriGuruController::class, 'storeDirektoriGuru'])->name('DirektoriGuru.store');
    // Store

    // Update
    Route::patch('admin/guru/{id_guru}', [direktoriGuruController::class, 'updateDirektoriGuru'])->name('DirektoriGuru.update');
    // Update

    // Destroy
    Route::delete('admin/guru/{id_guru}', [direktoriGuruController::class, 'destroyDirektoriGuru'])->name('DirektoriGuru.destroy');
    // Destroy
    
// CRUD Direktori Guru