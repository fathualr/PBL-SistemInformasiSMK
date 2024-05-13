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
use App\Http\Controllers\formController;
use App\Http\Controllers\informasippdbController;
use App\Http\Controllers\ekstrakulikulerController;

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
// Public

// Admin 
Route::get('admin/login', [adminController::class, 'login']);
Route::get('admin/dashboard', [adminController::class, 'dashboard']);
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
Route::get('admin/pendaftaranPPDB', [adminController::class, 'adminPendaftaranPPDB']);
Route::get('admin/pengumumanPPDB', [adminController::class, 'adminPengumumanPPDB']);
Route::get('admin/saranaPrasarana', [adminController::class, 'adminSaranaPrasarana']);
Route::get('admin/prestasi', [adminController::class, 'adminPrestasi']);
// Route::get('admin/ekstrakulikuler', [adminController::class, 'adminEkstrakulikuler']);
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

// CRUD Ekstrakulikuler
Route::get('admin/ekstrakulikuler', [ekstrakulikulerController::class, 'adminEkstrakulikuler'])->name('admin.ekstrakulikuler.index');
    // Store
    Route::post('admin/ekstrakulikuler', [ekstrakulikulerController::class, 'storeEkstrakulikuler'])->name('Ekstrakulikuler.store');
    // Store

    // Update
    Route::patch('admin/ekstrakulikuler/{id_ekstrakurikuler}', [ekstrakulikulerController::class, 'updateEkstrakulikuler'])->name('Ekstrakulikuler.update');
    // Update

    // Destroy
    Route::delete('admin/ekstrakulikuler/{id_ekstrakurikuler}', [ekstrakulikulerController::class, 'destroyEkstrakulikuler'])->name('Ekstrakulikuler.destroy');
    // Destroy
// CRUD Ekstrakulikuler