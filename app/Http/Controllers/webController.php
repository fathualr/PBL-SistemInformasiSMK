<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Foto;
use App\Models\Video;
use App\Models\ProgramKeahlian;
use App\Models\CapaianPembelajaran;
use App\Models\PeluangKerja;
use App\Models\InformasiPPDB;
use App\Models\AlurPPDB;
use App\Models\DirektoriGuru;
use App\Models\DirektoriPegawai;
use App\Models\DirektoriSiswa;
use App\Models\DirektoriAlumni;
use App\Models\Ekstrakulikuler;
use App\Models\UmpanBalik;
use App\Models\SejarahSekolah;
use App\Models\Prasarana;
use App\Models\FotoPrasarana;


class webController extends Controller
{
    // public function home()
    // {
    //     return view('/home', [
    //         "title" => "Beranda"
    //     ]);
    // }

    // public function profile()
    // {
    //     return view('guest/profile', [
    //         "title" => "Profile"
    //     ]);
    // }

        public function program()
    {
        $programKeahlian = ProgramKeahlian::all();
        return view('guest/program-keahlian', [
            "title" => "Program Keahlian",
            "programKeahlian" => $programKeahlian
        ]);
    }

        public function detailProgram()
    {
        $programKeahlian = ProgramKeahlian::all();
        $capaianPembelajaran = CapaianPembelajaran::all();
        $peluangKerja = PeluangKerja::all();
        return view('guest/detail-program', [
            "title" => "Detail Program Keahlian",
            "programKeahlian" => $programKeahlian,
            "capaianPembelajaran"=> $capaianPembelajaran,
            "peluangKerja" => $peluangKerja
        ]);
    }

    public function ppdb()
    {
        $informasi = InformasiPPDB::all();
        $alurs = AlurPPDB::all();
        $programs = ProgramKeahlian::all();
        return view('guest.ppdb', [
            "title" => "Guest PPDB",
            "informasi" => $informasi,
            "alurs" => $alurs,
            "programs" => $programs,
        ]);
    }

    public function pengumuman()
    {
        return view('guest/pengumuman-ppdb', [
            "title" => "Pengumuman PPDB"
        ]);
    }

    public function guru()
    {
        $direktoriGuru = DirektoriGuru::all();
        $programKeahlian = ProgramKeahlian::all();
        return view('guest/direktori-guru', [
            "title" => "Direktori Guru",
            "direktoriGuru" => $direktoriGuru,
            "programKeahlian" => $programKeahlian
        ]);
    }

    public function pegawai()
    {
        $direktoriPegawai = DirektoriPegawai::all();
        return view('guest/direktori-pegawai', [
            "title" => "Direktori Pegawai",
            "direktoriPegawai"=> $direktoriPegawai
        ]);
    }

    public function siswa()
    {
        $direktoriSiswa = DirektoriSiswa::all();
        $programKeahlian = ProgramKeahlian::all();  
        return view('guest/direktori-siswa', [
            "title" => "Direktori Siswa",
            "direktoriSiswa" => $direktoriSiswa,
            "programKeahlian" => $programKeahlian
        ]);
    }

    public function alumni()
    {
        $direktoriAlumni = DirektoriAlumni::all();
        return view('guest/direktori-alumni', [
            "title" => "Direktori Alumni",
            "direktoriAlumni"=> $direktoriAlumni
        ]);
    }

    public function foto()
    {
        $albums = Album::where('tipe_album', 'Foto')->paginate(6);

        return view('guest.foto', [
            'title' => 'Galeri Foto',
            'albums' => $albums,
        ]);
    }

    public function video()
    {
        $albums = Album::where('tipe_album', 'Video')->paginate(6);
        return view('guest.video', [
            'title' => 'Galeri Video',
            'albums' => $albums,
        ]);
    }

    public function galeriTemplate($id_album)
    {
        $fotos = Foto::where('id_album', $id_album)->paginate(16); // Mengambil semua foto berdasarkan id_album
        $albums = Album::where('id_album', $id_album)->get();

        return view('guest.galeri-template', [
            "title" => "Galeri Foto",
            "fotos" => $fotos, // Meneruskan data foto ke tampilan blade
            'albums' => $albums,
        ]);
    }

    public function galeriTemplateVideo($id_album)
    {
        $videos = Video::where('id_album', $id_album)->paginate(6); // Mengambil semua vidio berdasarkan id_album
        $albums = Album::where('id_album', $id_album)->get();

        return view('guest.galeri-template-video', [
            "title" => "Galeri Video",
            "videos" => $videos, // Meneruskan data foto ke tampilan blade
            'albums' => $albums,
        ]);
    }

    public function saranaPrasarana()
    {
        $prasaranas = Prasarana::with('foto_prasarana')->paginate(10);
        return view('guest.sarana-prasarana', [
            'title' => 'Sarana & Prasarana',
            'prasaranas' => $prasaranas,
        ]);
    }    

    public function saranaPrasaranaTemplate()
    {
        return view('guest/sarana-prasarana-template', [
            "title" => "Sarana & Prasarana"
        ]);
    }

    public function prestasi()
    {
        return view('guest/prestasi', [
            "title" => "Prestasi Siswa"
        ]);
    }

    public function prestasiTemplate()
    {
        return view('guest/prestasi-template', [
            "title" => "Prestasi Siswa"
        ]);
    }

    // public function berita()
    // {
    //     return view('guest/berita', [
    //         "title" => "Berita"
    //     ]);
    // }

    // public function beritaTemplate()
    // {
    //     return view('guest/berita-template', [
    //         "title" => "Berita"
    //     ]);
    // }

    public function ekstrakulikuler()
    {
        $ekstrakulikuler = Ekstrakulikuler::with("guru", "gambarEkstrakurikuler")->get();
        $direktoriGuru = DirektoriGuru::all();
        return view('guest/ekstrakulikuler', [
            "title" => "Ekstrakulikuler",
            "ekstrakulikuler" => $ekstrakulikuler,
            "direktoriGuru"=> $direktoriGuru
        ]);
    }

    public function ekstrakulikulerTemplate($id_ekstrakurikuler)
    {        
        $ekstrakulikuler = Ekstrakulikuler::with("guru", "gambarEkstrakurikuler")->findOrFail($id_ekstrakurikuler);
        return view('guest/ekstrakulikuler-template', [
            "title" => "Ekstrakulikuler",
            "ekstrakulikuler" => $ekstrakulikuler
        ]);
    }

    // public function mediaSosial()
    // {
    //     return view('guest/media-sosial', [
    //         "title" => "Media Sosial"
    //     ]);
    // }

    public function sejarah()
    {
        $sejarahSekolah = SejarahSekolah::all();
        return view('guest/sejarah', [
            "title" => "Sejarah",
            "sejarahSekolah" => $sejarahSekolah
        ]);
    }
}