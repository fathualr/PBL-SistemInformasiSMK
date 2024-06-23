<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiFormController;
use App\Http\Controllers\Api\ApiProgramKeahlianController;
use App\Http\Controllers\Api\ApiDirektoriGuruController;
use App\Http\Controllers\Api\ApiDirektoriPegawaiController;
use App\Http\Controllers\Api\ApiDirektoriSiswaController;
use App\Http\Controllers\Api\ApiDirektoriAlumniController;
use App\Http\Controllers\Api\ApiPrasaranaController;
use App\Http\Controllers\Api\ApiPrestasiSiswaController;
use App\Http\Controllers\Api\ApiBeritaController;
use App\Http\Controllers\Api\ApiKomentarBeritaController;
use App\Http\Controllers\Api\ApiEkstrakurikulerController;
use App\Http\Controllers\API\ApiUmpanBalikController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/ppdb', [ApiFormController::class, 'index']);
Route::get('/ppdb/{id}', [ApiFormController::class, 'show']);
Route::post('/ppdb', [ApiFormController::class, 'store']);

// Program Keahlian ----------
Route::get('/program-keahlian', [ApiProgramKeahlianController::class, 'index']);
Route::get('/program-keahlian/{id}', [ApiProgramKeahlianController::class, 'show']);
// CRUD Program Keahlian
Route::post('/program-keahlian', [ApiProgramKeahlianController::class, 'store']);
Route::put('/program-keahlian/{id}', [ApiProgramKeahlianController::class, 'update']);
Route::delete('/program-keahlian/{id}', [ApiProgramKeahlianController::class, 'destroy']);
// CRUD Capaian Pembelajaran
Route::put('/program-keahlian/{id}/update-capaian', [ApiProgramKeahlianController::class, 'updateCapaianPembelajaran']);
// CRUD Peluang Kerja
Route::post('/program-keahlian/{id}/create-peluang-kerja', [ApiProgramKeahlianController::class, 'createPeluangKerja']);
Route::delete('/peluang-kerja/{id}', [ApiProgramKeahlianController::class, 'deletePeluangKerja']);
// ----------

// Direktori Guru ----------
Route::get('/direktori-guru', [ApiDirektoriGuruController::class, 'index']);
Route::get('/direktori-guru/{id}', [ApiDirektoriGuruController::class, 'show']);
// CRUD Direktori Guru
Route::post('/direktori-guru', [ApiDirektoriGuruController::class, 'store']);
Route::put('/direktori-guru/{id}', [ApiDirektoriGuruController::class, 'update']);
Route::delete('/direktori-guru/{id}', [ApiDirektoriGuruController::class, 'destroy']);
// ----------

// Direktori Pegawai ----------
Route::get('/direktori-pegawai', [ApiDirektoriPegawaiController::class, 'index']);
Route::get('/direktori-pegawai/{id}', [ApiDirektoriPegawaiController::class, 'show']);
// CRUD Direktori Pegawai
Route::post('/direktori-pegawai', [ApiDirektoriPegawaiController::class, 'store']);
Route::put('/direktori-pegawai/{id}', [ApiDirektoriPegawaiController::class, 'update']);
Route::delete('/direktori-pegawai/{id}', [ApiDirektoriPegawaiController::class, 'destroy']);
// ----------

// Direktori Siswa ----------
Route::get('/direktori-siswa', [ApiDirektoriSiswaController::class, 'index']);
Route::get('/direktori-siswa/{id}', [ApiDirektoriSiswaController::class, 'show']);
// CRUD Direktori Siswa
Route::post('/direktori-siswa', [ApiDirektoriSiswaController::class, 'store']);
Route::put('/direktori-siswa/{id}', [ApiDirektoriSiswaController::class, 'update']);
Route::delete('/direktori-siswa/{id}', [ApiDirektoriSiswaController::class, 'destroy']);
// ----------

// Direktori Alumni ----------
Route::get('/direktori-alumni', [ApiDirektoriAlumniController::class, 'index']);
Route::get('/direktori-alumni/{id}', [ApiDirektoriAlumniController::class, 'show']);
// CRUD Direktori Alumni
Route::post('/direktori-alumni', [ApiDirektoriAlumniController::class, 'store']);
Route::put('/direktori-alumni/{id}', [ApiDirektoriAlumniController::class, 'update']);
Route::delete('/direktori-alumni/{id}', [ApiDirektoriAlumniController::class, 'destroy']);
// ----------

// Prasarana ----------
Route::get('/prasarana', [ApiPrasaranaController::class, 'index']);
Route::get('/prasarana/{id}', [ApiPrasaranaController::class, 'show']);
// CRUD Prasarana
Route::post('prasarana', [ApiPrasaranaController::class, 'store']);
Route::put('prasarana/{id}', [ApiPrasaranaController::class, 'update']);
Route::delete('prasarana/{id}', [ApiPrasaranaController::class, 'destroy']);
// CRUD Gambar Prasarana
Route::post('gambar-prasarana/{id}/gambar', [ApiPrasaranaController::class, 'storeGambarPrasarana']);
Route::delete('gambar-prasarana/gambar/{id}', [ApiPrasaranaController::class, 'destroyGambarPrasarana']);
// ----------

// Prestasi Siswa ----------
Route::get('/prestasi-siswa', [ApiPrestasiSiswaController::class, 'index']);
Route::get('/prestasi-siswa/{id}', [ApiPrestasiSiswaController::class, 'show']);
// CRUD Prestasi Siswa
Route::post('/prestasi-siswa', [ApiPrestasiSiswaController::class, 'store']);
Route::put('/prestasi-siswa/{id}', [ApiPrestasiSiswaController::class, 'update']);
Route::delete('/prestasi-siswa/{id}', [ApiPrestasiSiswaController::class, 'destroy']);
// ----------

// Berita ----------
Route::get('/berita', [ApiBeritaController::class, 'index']);
Route::get('/berita/{id}', [ApiBeritaController::class, 'show']);
Route::get('/berita-full', [ApiBeritaController::class, 'indexFull']);
Route::get('/berita-full/{id}', [ApiBeritaController::class, 'showFull']);
// CRUD Berita
Route::post('/berita', [ApiBeritaController::class, 'store']);
Route::put('/berita/{id}', [ApiBeritaController::class, 'update']);
Route::delete('/berita/{id}', [ApiBeritaController::class, 'destroy']);
// CRUD GambarBerita
Route::post('/gambar-berita/{id}', [ApiBeritaController::class, 'storeGambarBerita']);
Route::delete('/gambar-berita/{id}', [ApiBeritaController::class, 'destroyGambarBerita']);
// CRUD KategoriBerita
Route::post('/kategori-berita/{id}', [ApiBeritaController::class, 'storeKategoriBerita']);
Route::delete('/kategori-berita/{id}', [ApiBeritaController::class, 'destroyKategoriBerita']);
// ----------

// Komentar Berita ----------
Route::get('/komentar-berita', [ApiKomentarBeritaController::class, 'index']);
Route::get('/komentar-berita/{id}', [ApiKomentarBeritaController::class, 'show']);
// CRUD Komentar Berita
Route::post('/komentar-berita/{id}', [ApiKomentarBeritaController::class, 'store']);
Route::delete('/komentar-berita/{id}', [ApiKomentarBeritaController::class, 'destroy']);
// ----------

// Ekstrakurikuler ----------
Route::get('/ekstrakurikuler', [ApiEkstrakurikulerController::class, 'index']);
Route::get('/ekstrakurikuler/{id}', [ApiEkstrakurikulerController::class, 'show']);
// CRUD Ekstrakurikuler
Route::post('/ekstrakurikuler', [ApiEkstrakurikulerController::class, 'store']);
Route::put('/ekstrakurikuler/{id}', [ApiEkstrakurikulerController::class, 'update']);
Route::delete('/ekstrakurikuler/{id}', [ApiEkstrakurikulerController::class, 'destroy']);
// CRUD Gambar Ekstrakurikuler
Route::post('/gambar-ekstrakurikuler/{id}', [ApiEkstrakurikulerController::class, 'storeGambarEkstrakurikuler']);
Route::delete('/gambar-ekstrakurikuler/{id}', [ApiEkstrakurikulerController::class, 'destroyGambarEkstrakurikuler']);
// ----------

// Umpan Balik ----------
Route::get('/umpan-balik', [ApiUmpanBalikController::class, 'index']);
Route::get('/umpan-balik/{id}', [ApiUmpanBalikController::class, 'show']);
// CRUD Umpan Balik
Route::post('/umpan-balik', [ApiUmpanBalikController::class, 'store']);
Route::delete('/umpan-balik/{id}', [ApiUmpanBalikController::class, 'destroy']);
// ----------