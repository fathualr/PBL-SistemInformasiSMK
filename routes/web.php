<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    Auth\LoginController,
    WebController,
    FrontEndController,
    DashboardController,
    AdminController,
    AdminActionController,
    CarouselsActionController,
    SejarahSekolahController,
    KontenWebsiteActionController,
    ProgramKeahlianController,
    DirektoriGuruController,
    DirektoriPegawaiController,
    DirektoriSiswaController,
    DirektoriAlumniController,
    AlbumFotoVideoController,
    InformasippdbController,
    FormController,
    PengumumanController,
    PrasaranaController,
    PrestasiSiswaController,
    BeritaActionController,
    KomentarBeritaActionController,
    EkstrakulikulerController,
    MediaSosialController,
    UmpanBalikController
};

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


// Home
Route::get('/', [frontEndController::class, 'home']);
// Public
Route::get('guest/profile', [frontEndController::class, 'profile']);
Route::get('guest/sejarah', [sejarahSekolahController::class, 'sejarah']);
Route::get('guest/program-keahlian', [programKeahlianController::class, 'program']);
Route::get('guest/program-keahlian-template/{id_program}', [programKeahlianController::class, 'detailProgram']);
Route::get('guest/direktori-guru', [direktoriGuruController::class, 'guru'])->name('guest.guru.index');
Route::get('guest/direktori-pegawai', [DirektoriPegawaiController::class, 'pegawai'])->name('guest.pegawai.index');
Route::get('guest/direktori-siswa', [DirektoriSiswaController::class, 'siswa'])->name('guest.siswa.index');
Route::get('guest/direktori-alumni', [direktoriAlumniController::class, 'alumni'])->name('guest.alumni.index');
Route::get('guest/galeri-foto', [AlbumFotoVideoController::class, 'foto']);
Route::get('guest/galeri-video', [AlbumFotoVideoController::class, 'video']);
Route::get('guest/galeri-template/{id_album}', [AlbumFotoVideoController::class, 'galeriTemplate']);
Route::get('guest/galeri-template-video/{id_album}', [AlbumFotoVideoController::class, 'galeriTemplateVideo']);
Route::get('guest/ppdb', [InformasippdbController::class, 'ppdb'])->name('guest.ppdb.index');
Route::post('guest/ppdb', [formController::class, 'storePPDB'])->name('guest.ppdb.store');
Route::get('guest/pengumuman-ppdb', [PengumumanController::class, 'pengumuman'])->name('guest.pengumuman-ppdb.index');
Route::get('guest/sarana-prasarana', [PrasaranaController::class, 'saranaPrasarana']);
Route::get('guest/prestasi-siswa', [prestasiSiswaController::class, 'index'])->name('guest.prestasi.index');
Route::get('guest/prestasi-siswa-template/{id_prestasi}', [PrestasiSiswaController::class, 'showTemplate']);
Route::get('guest/berita', [beritaActionController::class, 'show'])->name('berita.show');
Route::get('guest/berita-template/{id_berita}', [beritaActionController::class, 'showTemplate']);
Route::post('/komentarStore/{id}', [komentarBeritaActionController::class, 'store'])->name('komentarBerita.store');
Route::get('guest/ekstrakulikuler', [ekstrakulikulerController::class, 'ekstrakulikuler'])->name('guest.ekstrakulikuler.index');
Route::get('guest/ekstrakulikuler-template/{id_ekstrakurikuler}', [ekstrakulikulerController::class, 'ekstrakulikulerTemplate']);
Route::get('guest/media-sosial', [MediaSosialController::class, 'guestSosialMedia'])->name('guest.media-sosial.index');
Route::post('/umpanBalik', [umpanBalikController::class, 'storeUmpanBalik'])->name('UmpanBalik.store');
// Public



// -----
Route::get('admin/login', [adminController::class, 'login'])->name('login')->middleware('guest');
// Auth
Route::post('admin/authenticate', [loginController::class, 'authenticate'])->name('account.auth');
//-----

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('account.logout');

    // Dashboard
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('index');
    
    //Admin -----
    Route::get('admin', [adminActionController::class, 'index'])->name('admin.index')->middleware('master');
    //CRUD
    Route::post('/adminStore', [adminActionController::class, 'store'])->name('admin.store')->middleware('master');
    Route::patch('/adminUpdate/{id}', [adminActionController::class, 'update'])->name('admin.update')->middleware('master');
    Route::delete('/adminDestroy/{id}', [adminActionController::class, 'destroy'])->name('admin.destroy')->middleware('master');
    //-----

    //Carousels -----
    Route::get('carousels', [carouselsActionController::class, 'index']);
    //CRUD
    Route::post('carouselsStore', [carouselsActionController::class, 'store'])->name('carousels.store');
    Route::delete('carouselsDestroy/{id}', [carouselsActionController::class, 'destroy'])->name('carousels.destroy');
    //-----

    //Sejarah Sekolah -----
    Route::get('sejarah', [sejarahSekolahController::class, 'adminSejarah'])->name('admin.sejarahSekolah.index');
    //CRUD
    Route::post('sejarah', [sejarahSekolahController::class, 'storeSejarahSekolah'])->name('SejarahSekolah.store');
    Route::patch('sejarah/{id_sejarah}', [sejarahSekolahController::class, 'updateSejarahSekolah'])->name('SejarahSekolah.update');
    Route::delete('sejarah/{id_sejarah}', [sejarahSekolahController::class, 'destroySejarahSekolah'])->name('SejarahSekolah.destroy');
    //-----

    //Konten Website ----
    Route::get('profile', [kontenWebsiteActionController::class, 'index']);
    //CMS
    Route::patch('/kontenUpdate/{id}/{field}', [KontenWebsiteActionController::class, 'update'])->name('konten.update');
    //-----

    //Program Keahlian -----
    Route::get('program-keahlian', [programKeahlianController::class, 'adminProgramKeahlian'])->name('admin.programKeahlian.index');
    // CRUD program keahlian
    Route::post('program-keahlian', [programKeahlianController::class, 'storeProgramKeahlian'])->name('ProgramKeahlian.store');
    Route::patch('program-keahlian/{id_program}', [programKeahlianController::class, 'updateProgramKeahlian'])->name('ProgramKeahlian.update');
    Route::delete('program-keahlian/{id_program}', [programKeahlianController::class, 'destroyProgramKeahlian'])->name('ProgramKeahlian.destroy');
    // CRUD capaian pembelajaran
    Route::patch('capaianPembelajaran/{id_program}', [programKeahlianController::class, 'updateCapaianPembelajaran'])->name('CapaianPembelajaran.update');
    // CRUD peluang kerja
    Route::patch('peluangKerja/{id_program}', [programKeahlianController::class, 'updatePeluangKerja'])->name('PeluangKerja.update');
    Route::delete('peluangKerja/{id}', [programKeahlianController::class, 'destroyPeluangKerja'])->name('PeluangKerja.destroy');
    // -----

    // Direktori Guru -----
    Route::get('guru', [direktoriGuruController::class, 'adminDirektoriGuru'])->name('admin.direktoriGuru.index');
    // CRUD
    Route::post('guru', [direktoriGuruController::class, 'storeDirektoriGuru'])->name('DirektoriGuru.store');
    Route::patch('guru/{id_guru}', [direktoriGuruController::class, 'updateDirektoriGuru'])->name('DirektoriGuru.update');
    Route::delete('guru/{id_guru}', [direktoriGuruController::class, 'destroyDirektoriGuru'])->name('DirektoriGuru.destroy');
    // -----

    // Direktori Pegawai
    Route::get('pegawai', [direktoriPegawaiController::class, 'adminPegawai'])->name('admin.direktoriPegawai.index');
    // CRUD
    Route::post('pegawai', [direktoriPegawaiController::class, 'storeDirektoriPegawai'])->name('DirektoriPegawai.store');
    Route::patch('pegawai/{id_pegawai}', [direktoriPegawaiController::class, 'updateDirektoriPegawai'])->name('DirektoriPegawai.update');
    Route::delete('pegawai/{id_pegawai}', [direktoriPegawaiController::class, 'destroyDirektoriPegawai'])->name('DirektoriPegawai.destroy');
    // -----

    // Direktori Siswa
    Route::get('siswa', [direktoriSiswaController::class, 'adminSiswa'])->name('admin.direktoriSiswa.index');
    // CRUD
    Route::post('siswa', [direktoriSiswaController::class, 'storeDirektoriSiswa'])->name('DirektoriSiswa.store');
    Route::patch('siswa/{id_siswa}', [direktoriSiswaController::class, 'updateDirektoriSiswa'])->name('DirektoriSiswa.update');
    Route::delete('siswa/{id_siswa}', [direktoriSiswaController::class, 'destroyDirektoriSiswa'])->name('DirektoriSiswa.destroy');
    // -----

    // Direktori Alumni -----
    Route::get('alumni', [direktoriAlumniController::class, 'adminAlumni'])->name('admin.direktoriAlumni.index');
    // CRUD
    Route::post('alumni', [direktoriAlumniController::class, 'storeDirektoriAlumni'])->name('DirektoriAlumni.store');
    Route::patch('alumni/{id_alumni}', [direktoriAlumniController::class, 'updateDirektoriAlumni'])->name('DirektoriAlumni.update');
    Route::delete('alumni/{id_alumni}', [direktoriAlumniController::class, 'destroyDirektoriAlumni'])->name('DirektoriAlumni.destroy');
    // -----

    // Album -----
    Route::get('album', [AlbumFotoVideoController::class, 'adminAlbum'])->name('admin.album.index');
    Route::get('foto', [AlbumFotoVideoController::class, 'adminFoto'])->name('admin.foto.index');
    Route::get('video', [AlbumFotoVideoController::class, 'adminVideo'])->name('admin.video.index');
    // CRUD
    Route::post('album', [AlbumFotoVideoController::class, 'storeAlbum'])->name('admin.album.store');
    Route::patch('/album/{id}', [AlbumFotoVideoController::class, 'updateAlbum'])->name('admin.album.update');
    Route::delete('/album/{id}', [AlbumFotoVideoController::class, 'destroyAlbum'])->name('admin.album.destroy');
    // CRUD foto -----
    Route::post('foto', [AlbumFotoVideoController::class, 'storeFoto'])->name('admin.foto.store');
    Route::delete('/foto/{id}', [AlbumFotoVideoController::class, 'destroyFoto'])->name('admin.foto.destroy');
    // CRUD video -----
    Route::post('video', [AlbumFotoVideoController::class, 'storeVideo'])->name('admin.video.store');
    Route::delete('/video/{id}', [AlbumFotoVideoController::class, 'destroyVideo'])->name('admin.video.destroy');
    // -----

    // PPDB -----
    Route::get('informasiPPDB', [informasippdbController::class, 'adminInformasiPPDB'])->name('admin.informasiPPDB.index');
    Route::get('/download-excel', [formController::class, 'downloadExcel'])->name('download.excel');
    Route::get('pendaftaranPPDB', [formController::class, 'adminPendaftaranPPDB'])->name('admin.pendaftaranPPDB.index');
    Route::get('pengumumanPPDB', [pengumumanController::class, 'adminPengumumanPPDB'])->name('admin.pengumumanPPDB.index');
    Route::get('countdown', [InformasiPPDBController::class, 'adminCountdown'])->name('admin.countdown.edit');
    // CMS
    Route::patch('informasiPPDB/{id}/{field}', [informasippdbController::class, 'updateInformasiPPDB'])->name('admin.informasiPPDB.update');
    // CRUD alur
    Route::post('alurPPDB', [informasippdbController::class, 'storeAlurPPDB'])->name('admin.alurPPDB.store');
    Route::patch('alurPPDB/{id}', [informasippdbController::class, 'updateAlurPPDB'])->name('admin.alurPPDB.update');
    Route::delete('alurPPDB/{id}', [informasippdbController::class, 'destroyAlurPPDB'])->name('admin.alurPPDB.destroy');
    // CRUD pendaftaran
    Route::delete('pendaftaranPPDB/{id}', [formController::class, 'destroyPendaftaranPPDB'])->name('admin.pendaftaranPPDB.destroy');
    // CRUD pengumuman
    Route::patch('pengumumanPPDB/{id}', [InformasiPPDBController::class, 'updatePengumumanPPDB'])->name('admin.pengumumanPPDB.update');
    Route::post('pengumumanPPDB/updateBatch', [PengumumanController::class, 'updateBatch'])->name('admin.pengumumanPPDB.updateBatch');
    // CMS countdown
    Route::post('countdown/update', [InformasiPPDBController::class, 'updateCountdown'])->name('admin.countdown.update');
    Route::delete('countdown/delete', [InformasiPPDBController::class, 'destroyCountdown'])->name('admin.countdown.delete');
    // -----

    // Sarana - Prasarana -----
    Route::get('saranaPrasarana', [prasaranaController::class, 'adminSaranaPrasarana'])->name('admin.SaranaPrasarana.index');
    Route::get('fotoPrasarana', [prasaranaController::class, 'adminFotoPrasarana'])->name('admin.FotoPrasarana.index');
    // CRUD sarana-prasarana 
    Route::post('saranaPrasarana', [prasaranaController::class, 'storeSaranaPrasarana'])->name('admin.SaranaPrasarana.store');
    Route::patch('saranaPrasarana/{id_prasarana}', [prasaranaController::class, 'updateSaranaPrasarana'])->name('admin.SaranaPrasarana.update');
    Route::delete('saranaPrasarana/{id_prasarana}', [prasaranaController::class, 'destroySaranaPrasarana'])->name('admin.SaranaPrasarana.destroy');
    // CRUD foto sarana-prasarana
    Route::post('fotoPrasarana', [prasaranaController::class, 'storeFotoPrasarana'])->name('admin.FotoPrasarana.store');
    Route::patch('fotoPrasarana/{id_foto_prasarana}', [prasaranaController::class, 'updateFotoPrasarana'])->name('admin.FotoPrasarana.update');
    Route::delete('fotoPrasarana/{id_foto_prasarana}', [prasaranaController::class, 'destroyFotoPrasarana'])->name('admin.FotoPrasarana.destroy');
    // -----

    // Prestasi Siswa -----
    Route::get('prestasi', [prestasiSiswaController::class, 'adminPrestasi'])->name('admin.prestasiSiswa.index');
    // CRUD
    Route::post('prestasi', [prestasiSiswaController::class, 'storePrestasiSiswa'])->name('PrestasiSiswa.store');
    Route::patch('prestasi/{id_prestasi}', [prestasiSiswaController::class, 'updatePrestasiSiswa'])->name('PrestasiSiswa.update');
    Route::delete('prestasi/{id_prestasi}', [prestasiSiswaController::class, 'destroyPrestasiSiswa'])->name('PrestasiSiswa.destroy');
    // CRUD gambar prestasi
    Route::patch('/gambarPrestasiUpdate/{id_prestasi}', [prestasiSiswaController::class, 'updateGambarPrestasi'])->name('GambarPrestasi.update');
    Route::delete('/gambarPrestasiDestroy/{id_prestasi}', [prestasiSiswaController::class, 'destroyGambarPrestasi'])->name('GambarPrestasi.destroy');
    // -----

    // Berita -----
    Route::get('berita', [beritaActionController::class, 'index'])->name('berita.index');
    // CRUD
    Route::post('/beritaStore', [beritaActionController::class, 'store'])->name('berita.store');
    Route::patch('/beritaUpdate/{id}', [beritaActionController::class, 'update'])->name('berita.update');
    Route::delete('/beritaDestroy/{id}', [beritaActionController::class, 'destroy'])->name('berita.destroy');
    // CRUD gambar berita
    Route::patch('/gambarBeritaUpdate/{id}', [beritaActionController::class, 'updateGambarBerita'])->name('gambarBerita.update');
    Route::delete('/gambarBeritaDestroy/{id}', [beritaActionController::class, 'destroyGambarBerita'])->name('gambarBerita.destroy');
    // CRUD kategori berita
    Route::patch('/kategoriBeritaUpdate/{id}', [beritaActionController::class, 'updateKategoriBerita'])->name('kategoriBerita.update');
    Route::delete('/kategoriBeritaDestroy/{id}', [beritaActionController::class, 'destroyKategoriBerita'])->name('kategoriBerita.destroy');
    // CRUD komentar berita
    Route::delete('/komentarDestroy/{id}', [komentarBeritaActionController::class, 'destroy'])->name('komentarBerita.destroy');
    //-----

    // Ekstrakurikuler -----
    Route::get('ekstrakulikuler', [ekstrakulikulerController::class, 'adminEkstrakulikuler'])->name('admin.ekstrakulikuler.index');
    // CRUD
    Route::post('ekstrakulikuler', [ekstrakulikulerController::class, 'storeEkstrakulikuler'])->name('Ekstrakulikuler.store');
    Route::patch('ekstrakulikulerUpdate/{id_ekstrakurikuler}', [ekstrakulikulerController::class, 'updateEkstrakulikuler'])->name('ekstrakurikuler.update');
    Route::delete('ekstrakulikuler/{id_ekstrakurikuler}', [ekstrakulikulerController::class, 'destroyEkstrakulikuler'])->name('Ekstrakulikuler.destroy');
    // CRUD gambar ekstrakurikuler
    Route::patch('/gambarEkskulUpdate/{id_ekstrakurikuler}', [ekstrakulikulerController::class, 'updateGambarEkstrakurikuler'])->name('gambarEkskul.update');
    Route::delete('/gambarEkskulDestroy/{id_ekstrakurikuler}', [ekstrakulikulerController::class, 'destroyGambarEkstrakurikuler'])->name('gambarEkskul.destroy');
    // -----

    // Sosial Media -----
    Route::get('sosialMedia', [MediaSosialController::class, 'adminSosialMedia'])->name('sosialMedia.index');
    // CMS
    Route::patch('/MediaSosialUpdate/{id}/{field}', [MediaSosialController::class, 'update'])->name('medsos.update');
    // -----

    // Umpan Balik -----
    Route::get('umpanBalik', [umpanBalikController::class, 'adminUmpanBalik'])->name('admin.umpanBalik.index');
    // CRUD
    Route::delete('umpanBalik/{id_pesan}', [umpanBalikController::class, 'destroyUmpanBalik'])->name('UmpanBalik.destroy');
    // -----
});