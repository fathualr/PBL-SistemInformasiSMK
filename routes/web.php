<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\webController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\frontEndController;
use App\Http\Controllers\adminActionController;
use App\Http\Controllers\beritaActionController;
use App\Http\Controllers\komentarBeritaActionController;
use App\Http\Controllers\kontenWebsiteActionController;
use App\Http\Controllers\carouselsActionController;
use App\Http\Controllers\programKeahlianController;
use App\Http\Controllers\direktoriGuruController;
use App\Http\Controllers\direktoriPegawaiController;
use App\Http\Controllers\direktoriSiswaController;
use App\Http\Controllers\direktoriAlumniController;
use App\Http\Controllers\formController;
use App\Http\Controllers\informasippdbController;
use App\Http\Controllers\pengumumanController;
use App\Http\Controllers\ekstrakulikulerController;
use App\Http\Controllers\sejarahSekolahController;
use App\Http\Controllers\MediaSosialController;
use App\Http\Controllers\umpanBalikController;
use App\Http\Controllers\PrasaranaController;
use App\Http\Controllers\prestasiSiswaController;


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
Route::get('guest/profile', [frontEndController::class, 'profile']);
Route::get('guest/program-keahlian', [webController::class, 'program']);
Route::get('guest/pengumuman-ppdb', [webController::class, 'pengumuman'])->name('guest.pengumuman-ppdb.index');
Route::get('guest/direktori-guru', [webController::class, 'guru']);
Route::get('guest/direktori-pegawai', [webController::class, 'pegawai']);
Route::get('guest/direktori-siswa', [webController::class, 'siswa']);
Route::get('guest/direktori-alumni', [webController::class, 'alumni']);
Route::get('guest/galeri-foto', [webController::class, 'foto']);
Route::get('guest/galeri-video', [webController::class, 'video']);
Route::get('guest/galeri-template/{id_album}', [webController::class, 'galeriTemplate']);
Route::get('guest/galeri-template-video/{id_album}', [webController::class, 'galeriTemplateVideo']);
Route::get('guest/prestasi-siswa', [webController::class, 'prestasi']);
Route::get('guest/prestasi-template', [webController::class, 'prestasiTemplate']);
Route::get('guest/ekstrakulikuler', [webController::class, 'ekstrakulikuler']);
Route::get('guest/ekstrakulikuler-template/{id_ekstrakurikuler}', [webController::class, 'ekstrakulikulerTemplate']);
Route::get('guest/sejarah', [webController::class, 'sejarah']);
// Public

// Admin 
Route::get('admin/login', [adminController::class, 'login']);
Route::get('admin/dashboard', [adminController::class, 'dashboard']);
Route::get('admin/beranda', [adminController::class, 'adminBeranda']);
// Route::get('admin/sejarah', [adminController::class, 'adminSejarah']);
Route::get('admin/profile', [adminController::class, 'adminProfile']);
// Route::get('admin/program-keahlian', [adminController::class, 'adminProgramKeahlian'])->name('admin.programKeahlian.index');
// Route::get('admin/guru', [adminController::class, 'adminGuru']);
// Route::get('admin/staff', [adminController::class, 'adminStaff']);
// Route::get('admin/siswa', [adminController::class, 'adminSiswa']);
// Route::get('admin/alumni', [adminController::class, 'adminAlumni']);
Route::get('admin/album', [adminController::class, 'adminAlbum'])->name('admin.album.index');
Route::get('admin/foto', [adminController::class, 'adminFoto'])->name('admin.foto.index');
Route::get('admin/video', [adminController::class, 'adminVideo'])->name('admin.video.index');
Route::get('admin/prestasi', [adminController::class, 'adminPrestasi']);
// Route::get('admin/ekstrakulikuler', [adminController::class, 'adminEkstrakulikuler']);
// Route::get('admin/umpanBalik', [umpanBalikController::class, 'adminUmpanBalik']);
Route::get('admin/pengaturan', [adminController::class, 'adminPengaturan']);
// Admin

//Admin CRUD
Route::get('admin/admin', [adminActionController::class, 'index'])->name('admin.index');
Route::post('/adminStore', [adminActionController::class, 'store'])->name('admin.store');
Route::patch('/adminUpdate/{id}', [adminActionController::class, 'update'])->name('admin.update');
Route::delete('/adminDestroy/{id}', [adminActionController::class, 'destroy'])->name('admin.destroy');

//Berita -----
Route::get('admin/berita', [beritaActionController::class, 'index'])->name('berita.index');
//CRUD
Route::post('/beritaStore', [beritaActionController::class, 'store'])->name('berita.store');
Route::patch('/beritaUpdate/{id}', [beritaActionController::class, 'update'])->name('berita.update');
Route::delete('/beritaDestroy/{id}', [beritaActionController::class, 'destroy'])->name('berita.destroy');

Route::patch('/gambarBeritaUpdate/{id}', [beritaActionController::class, 'updateGambarBerita'])->name('gambarBerita.update');
Route::delete('/gambarBeritaDestroy/{id}', [beritaActionController::class, 'destroyGambarBerita'])->name('gambarBerita.destroy');

Route::patch('/kategoriBeritaUpdate/{id}', [beritaActionController::class, 'updateKategoriBerita'])->name('kategoriBerita.update');
Route::delete('/kategoriBeritaDestroy/{id}', [beritaActionController::class, 'destroyKategoriBerita'])->name('kategoriBerita.destroy');
//Guest
Route::get('guest/berita', [beritaActionController::class, 'show'])->name('berita.show');
Route::get('guest/berita-template/{id_berita}', [beritaActionController::class, 'showTemplate']);
//Komentar 
Route::post('/komentarStore/{id}', [komentarBeritaActionController::class, 'store'])->name('komentarBerita.store');
Route::delete('/komentarDestroy/{id}', [komentarBeritaActionController::class, 'destroy'])->name('komentarBerita.destroy');
//-----

//Konten Website -----
Route::get('/', [frontEndController::class, 'home']);
Route::get('admin/profile', [kontenWebsiteActionController::class, 'index']);
    //CMS
    Route::patch('/kontenUpdate/{id}/{field}', [KontenWebsiteActionController::class, 'update'])->name('konten.update');
//-----

//Carousels -----
Route::get('admin/carousels', [carouselsActionController::class, 'index']);
//CRUD
Route::post('carouselsStore', [carouselsActionController::class, 'store'])->name('carousels.store');
Route::delete('carouselsDestroy/{id}', [carouselsActionController::class, 'destroy'])->name('carousels.destroy');
//-----

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

//PPDB
Route::get('admin/informasiPPDB', [informasippdbController::class, 'adminInformasiPPDB'])->name('admin.informasiPPDB.index');
Route::post('admin/informasiPPDB', [informasippdbController::class, 'storeInformasiPPDB'])->name('admin.informasiPPDB.store');
Route::patch('admin/informasiPPDB/{id}', [informasippdbController::class, 'updateInformasiPPDB'])->name('admin.informasiPPDB.update');
Route::delete('admin/informasiPPDB/{id}', [informasippdbController::class, 'destroyInformasiPPDB'])->name('admin.informasiPPDB.destroy');

Route::post('admin/alurPPDB', [informasippdbController::class, 'storeAlurPPDB'])->name('admin.alurPPDB.store');
Route::patch('admin/alurPPDB/{id}', [informasippdbController::class, 'updateAlurPPDB'])->name('admin.alurPPDB.update');
Route::delete('admin/alurPPDB/{id}', [informasippdbController::class, 'destroyAlurPPDB'])->name('admin.alurPPDB.destroy');

Route::get('guest/ppdb', [webController::class, 'ppdb'])->name('guest.ppdb.index');
Route::post('guest/ppdb', [formController::class, 'storePPDB'])->name('guest.ppdb.store');
Route::get('/download-excel', [formController::class, 'downloadExcel'])->name('download.excel');
Route::get('admin/pendaftaranPPDB', [formController::class, 'adminPendaftaranPPDB'])->name('admin.pendaftaranPPDB.index');
Route::delete('admin/pendaftaranPPDB/{id}', [formController::class, 'destroyPendaftaranPPDB'])->name('admin.pendaftaranPPDB.destroy');

Route::get('admin/pengumumanPPDB', [pengumumanController::class, 'adminPengumumanPPDB'])->name('admin.pengumumanPPDB.index');
Route::post('admin/pengumumanPPDB/updateBatch', [PengumumanController::class, 'updateBatch'])->name('admin.pengumumanPPDB.updateBatch');
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
    Route::post('admin/guru', [direktoriGuruController::class, 'storeDirektoriGuru'])->name('DirektoriGuru.store');
    Route::patch('admin/guru/{id_guru}', [direktoriGuruController::class, 'updateDirektoriGuru'])->name('DirektoriGuru.update');
    Route::delete('admin/guru/{id_guru}', [direktoriGuruController::class, 'destroyDirektoriGuru'])->name('DirektoriGuru.destroy');
// CRUD Direktori Guru

// CRUD Direktori Pegawai
Route::get('admin/staff', [direktoriPegawaiController::class, 'adminStaff'])->name('admin.direktoriPegawai.index');
    Route::post('admin/staff', [direktoriPegawaiController::class, 'storeDirektoriPegawai'])->name('DirektoriPegawai.store');
    Route::patch('admin/staff/{id_pegawai}', [direktoriPegawaiController::class, 'updateDirektoriPegawai'])->name('DirektoriPegawai.update');
    Route::delete('admin/staff/{id_pegawai}', [direktoriPegawaiController::class, 'destroyDirektoriPegawai'])->name('DirektoriPegawai.destroy');
// CRUD Direktori Pegawai

// CRUD Direktori Siswa
Route::get('admin/siswa', [direktoriSiswaController::class, 'adminSiswa'])->name('admin.direktoriSiswa.index');
    Route::post('admin/siswa', [direktoriSiswaController::class, 'storeDirektoriSiswa'])->name('DirektoriSiswa.store');
    Route::patch('admin/siswa/{id_siswa}', [direktoriSiswaController::class, 'updateDirektoriSiswa'])->name('DirektoriSiswa.update');
    Route::delete('admin/siswa/{id_siswa}', [direktoriSiswaController::class, 'destroyDirektoriSiswa'])->name('DirektoriSiswa.destroy');
// CRUD Direktori Siswa

// CRUD Direktori Alumni
Route::get('admin/alumni', [direktoriAlumniController::class, 'adminAlumni'])->name('admin.direktoriAlumni.index');
    Route::post('admin/alumni', [direktoriAlumniController::class, 'storeDirektoriAlumni'])->name('DirektoriAlumni.store');
    Route::patch('admin/alumni/{id_alumni}', [direktoriAlumniController::class, 'updateDirektoriAlumni'])->name('DirektoriAlumni.update');
    Route::delete('admin/alumni/{id_alumni}', [direktoriAlumniController::class, 'destroyDirektoriAlumni'])->name('DirektoriAlumni.destroy');
// CRUD Direktori Alumni

// CRUD Ekstrakulikuler
Route::get('admin/ekstrakulikuler', [ekstrakulikulerController::class, 'adminEkstrakulikuler'])->name('admin.ekstrakulikuler.index');
    Route::post('admin/ekstrakulikuler', [ekstrakulikulerController::class, 'storeEkstrakulikuler'])->name('Ekstrakulikuler.store');
    Route::patch('admin/ekstrakulikulerUpdate/{id_ekstrakurikuler}', [ekstrakulikulerController::class, 'updateEkstrakurikuler'])->name('ekstrakurikuler.update');
    Route::patch('/gambarEkskulUpdate/{id_ekstrakurikuler}', [ekstrakulikulerController::class, 'updateGambarEkstrakurikuler'])->name('gambarEkskul.update');
    Route::delete('admin/ekstrakulikuler/{id_ekstrakurikuler}', [ekstrakulikulerController::class, 'destroyEkstrakulikuler'])->name('Ekstrakulikuler.destroy');
    Route::delete('/gambarEkskulDestroy/{id_ekstrakurikuler}', [ekstrakulikulerController::class, 'destroyGambarEkstrakurikuler'])->name('gambarEkskul.destroy');
// CRUD Ekstrakulikuler


// CRUD Sejarah Sekolah
Route::get('admin/sejarah', [sejarahSekolahController::class, 'adminSejarah'])->name('admin.sejarahSekolah.index');
    Route::post('admin/sejarah', [sejarahSekolahController::class, 'storeSejarahSekolah'])->name('SejarahSekolah.store');
    Route::patch('admin/sejarah/{id_sejarah}', [sejarahSekolahController::class, 'updateSejarahSekolah'])->name('SejarahSekolah.update');
    Route::delete('admin/sejarah/{id_sejarah}', [sejarahSekolahController::class, 'destroySejarahSekolah'])->name('SejarahSekolah.destroy');
// CRUD Sejarah Sekolah

Route::get('admin/sosialMedia', [MediaSosialController::class, 'adminSosialMedia'])->name('sosialMedia.index');
Route::get('guest/media-sosial', [MediaSosialController::class, 'guestSosialMedia'])->name('guest.media-sosial.index');
Route::patch('/MediaSosialUpdate/{id}/{field}', [MediaSosialController::class, 'update'])->name('medsos.update');


// CRUD Umpan Balik
Route::get('admin/umpanBalik', [umpanBalikController::class, 'adminUmpanBalik'])->name('admin.umpanBalik.index');
    Route::post('admin/umpanBalik', [umpanBalikController::class, 'storeUmpanBalik'])->name('UmpanBalik.store');
    Route::delete('admin/umpanBalik/{id_pesan}', [umpanBalikController::class, 'destroyUmpanBalik'])->name('UmpanBalik.destroy');
// CRUD Umpan Balik

// CRUD Prestasi Siswa
Route::get('admin/prestasi', [prestasiSiswaController::class, 'adminPrestasi'])->name('admin.prestasiSiswa.index');
    Route::post('admin/prestasi', [prestasiSiswaController::class, 'storePrestasiSiswa'])->name('PrestasiSiswa.store');
    Route::patch('admin/prestasi/{id_prestasi}', [prestasiSiswaController::class, 'updatePrestasiSiswa'])->name('PrestasiSiswa.update');
    Route::patch('/gambarPrestasiUpdate/{id_prestasi}', [prestasiSiswaController::class, 'updateGambarPrestasi'])->name('GambarPrestasi.update');
    Route::delete('/gambarPrestasiDestroy/{id_prestasi}', [prestasiSiswaController::class, 'destroyGambarPrestasi'])->name('GambarPrestasi.destroy');
    Route::delete('admin/prestasi/{id_prestasi}', [prestasiSiswaController::class, 'destroyPrestasiSiswa'])->name('PrestasiSiswa.destroy');
// CRUD Prestasi Siswa



Route::get('guest/sarana-prasarana', [webController::class, 'saranaPrasarana']);

Route::get('admin/saranaPrasarana', [prasaranaController::class, 'adminSaranaPrasarana'])->name('admin.SaranaPrasarana.index');
Route::post('admin/saranaPrasarana', [prasaranaController::class, 'storeSaranaPrasarana'])->name('admin.SaranaPrasarana.store');
Route::patch('admin/saranaPrasarana/{id_prasarana}', [prasaranaController::class, 'updateSaranaPrasarana'])->name('admin.SaranaPrasarana.update');
Route::delete('admin/saranaPrasarana/{id_prasarana}', [prasaranaController::class, 'destroySaranaPrasarana'])->name('admin.SaranaPrasarana.destroy');

Route::get('admin/fotoPrasarana', [prasaranaController::class, 'adminFotoPrasarana'])->name('admin.FotoPrasarana.index');
Route::post('admin/fotoPrasarana', [prasaranaController::class, 'storeFotoPrasarana'])->name('admin.FotoPrasarana.store');
Route::patch('admin/fotoPrasarana/{id_foto_prasarana}', [prasaranaController::class, 'updateFotoPrasarana'])->name('admin.FotoPrasarana.update');
Route::delete('admin/fotoPrasarana/{id_foto_prasarana}', [prasaranaController::class, 'destroyFotoPrasarana'])->name('admin.FotoPrasarana.destroy');