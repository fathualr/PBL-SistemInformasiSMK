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
Route::get('guest/ekstrakulikuler', [webController::class, 'ekstrakulikuler']);
Route::get('guest/media-sosial', [webController::class, 'mediaSosial']);
Route::get('guest/sejarah', [webController::class, 'sejarah']);
Route::get('guest/detail-program', [webController::class, 'detailProgram']);
// Public

// Admin 
Route::get('admin/login', [adminController::class, 'login']);
Route::get('admin/dashboard', [adminController::class, 'dashboard']);
Route::get('admin/beranda', [adminController::class, 'adminBeranda']);
Route::get('admin/sejarah', [adminController::class, 'adminSejarah']);
Route::get('admin/program-keahlian', [adminController::class, 'adminProgramKeahlian']);
Route::get('admin/guru', [adminController::class, 'adminGuru']);
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
Route::get('admin/ekstrakulikuler', [adminController::class, 'adminEkstrakulikuler']);
Route::get('admin/sosialMedia', [adminController::class, 'adminSosialMedia']);
Route::get('admin/umpanBalik', [adminController::class, 'adminUmpanBalik']);
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
Route::patch('/namaSekolahUpdate/{id}', [kontenWebsiteActionController::class, 'updateNamaSekolah'])->name('namaSekolah.update');
Route::patch('/updateLogoSekolah/{id}', [kontenWebsiteActionController::class, 'updateLogoSekolah'])->name('logoSekolah.update');
Route::patch('/updateAlamatSekolah/{id}', [kontenWebsiteActionController::class, 'updateAlamatSekolah'])->name('alamatSekolah.update');
Route::patch('/updateNoTelpSekolah/{id}', [kontenWebsiteActionController::class, 'updateNoTelpSekolah'])->name('noTelpSekolah.update');
Route::patch('/updateEmailSekolah/{id}', [kontenWebsiteActionController::class, 'updateEmailSekolah'])->name('emailSekolah.update');
Route::patch('/updateNamaKepalaSekolah/{id}', [kontenWebsiteActionController::class, 'updateNamaKepalaSekolah'])->name('namaKepalaSekolah.update');
Route::patch('/updateSejarah/{id}', [kontenWebsiteActionController::class, 'updateSejarah'])->name('sejarah.update');
Route::patch('/updateTautanVideoSejarah/{id}', [kontenWebsiteActionController::class, 'updateTautanVideoSejarah'])->name('tautanVideoSejarah.update');
Route::patch('/updateSambutan/{id}', [kontenWebsiteActionController::class, 'updateSambutan'])->name('sambutan.update');
Route::patch('/updateTautanVideoSambutan/{id}', [kontenWebsiteActionController::class, 'updateTautanVideoSambutan'])->name('tautanVideoSambutan.update');
Route::patch('/updateVisi/{id}', [kontenWebsiteActionController::class, 'updateVisi'])->name('visi.update');
Route::patch('/updateMisi/{id}', [kontenWebsiteActionController::class, 'updateMisi'])->name('misi.update');
Route::patch('/updateNis/{id}', [kontenWebsiteActionController::class, 'updateNis'])->name('nis.update');
Route::patch('/updateStatusAkreditasiSekolah/{id}', [kontenWebsiteActionController::class, 'updateStatusAkreditasiSekolah'])->name('statusAkreditasiSekolah.update');
Route::patch('/updateStrukturOrganisasiSekolah/{id}', [kontenWebsiteActionController::class, 'updateStrukturOrganisasiSekolah'])->name('strukturOrganisasiSekolah.update');
Route::patch('/updateStatusKepemilikanTanah/{id}', [kontenWebsiteActionController::class, 'updateStatusKepemilikanTanah'])->name('statusKepemilikanTanah.update');
Route::patch('/updateTahunDidirikan/{id}', [kontenWebsiteActionController::class, 'updateTahunDidirikan'])->name('tahunDidirikan.update');
Route::patch('/updateTahunOperasional/{id}', [kontenWebsiteActionController::class, 'updateTahunOperasional'])->name('tahunOperasional.update');
Route::patch('/updateNoStatistikSekolah/{id}', [kontenWebsiteActionController::class, 'updateNoStatistikSekolah'])->name('noStatistikSekolah.update');
Route::patch('/updateFasilitasLainnya/{id}', [kontenWebsiteActionController::class, 'updateFasilitasLainnya'])->name('fasilitasLainnya.update');
Route::patch('/updateLuasTanah/{id}', [kontenWebsiteActionController::class, 'updateLuasTanah'])->name('luasTanah.update');
Route::patch('/updateNoSertifikat/{id}', [kontenWebsiteActionController::class, 'updateNoSertifikat'])->name('noSertifikat.update');
Route::patch('/updateNoPendirianSekolah/{id}', [kontenWebsiteActionController::class, 'updateNoPendirianSekolah'])->name('noPendirianSekolah.update');
Route::patch('/updateStatusKepemilikanBangunan/{id}', [kontenWebsiteActionController::class, 'updateStatusKepemilikanBangunan'])->name('statusKepemilikanBangunan.update');
Route::patch('/updateSisaLahanSeluruhnya/{id}', [kontenWebsiteActionController::class, 'updateSisaLahanSeluruhnya'])->name('sisaLahanSeluruhnya.update');
Route::patch('/updateLuasLahanKeseluruhan/{id}', [kontenWebsiteActionController::class, 'updateLuasLahanKeseluruhan'])->name('luasLahanKeseluruhan.update');
Route::patch('/updateTeksProfile/{id}', [kontenWebsiteActionController::class, 'updateTeksProfile'])->name('teksProfile.update');
Route::patch('/updateTeksFasilitas/{id}', [kontenWebsiteActionController::class, 'updateTeksFasilitas'])->name('teksFasilitas.update');
Route::patch('/updateTeksLokasi/{id}', [kontenWebsiteActionController::class, 'updateTeksLokasi'])->name('teksLokasi.update');
Route::patch('/updateTeksSejarah/{id}', [kontenWebsiteActionController::class, 'updateTeksSejarah'])->name('teksSejarah.update');
Route::patch('/updateTeksPrestasi/{id}', [kontenWebsiteActionController::class, 'updateTeksPrestasi'])->name('teksPrestasi.update');
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
















