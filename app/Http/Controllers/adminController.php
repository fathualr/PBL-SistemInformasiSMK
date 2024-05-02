<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgramKeahlian;

class adminController extends Controller
{
    public function login(){
        return view('admin/login', [
            "title" => "Login"
        ]);
    }

    public function dashboard(){
        return view('admin/dashboard', [
            "title" => "Dashboard"
        ]);
    }

    public function admin(){
        return view('admin/admin', [
            "title" => "Admin"
        ]);
    }

    public function adminBeranda(){
        return view('admin/beranda', [
            "title" => "Admin Beranda"
        ]);
    }

    public function adminSejarah(){
        return view('admin/sejarah', [
            "title" => "Admin Sejarah Sekolah"
        ]);
    }

    public function adminProfile(){
        return view('admin/profile', [
            "title" => "Admin Profile"
        ]);
    }

    // Program Keahlian
    public function adminProgramKeahlian(){
        $programKeahlian = ProgramKeahlian::all();
        return view('admin/program-keahlian', [
            "title" => "Admin Program Keahlian",
            "programKeahlian" => $programKeahlian
        ]);
    }

    public function storeProgramKeahlian(Request $request)
    {
        $request->validate([
            "nama_program" => "required",
            "logo_program" => "required|image|mimes:jpeg,png,jpg,gif|max:2048",
            "deskripsi_program" => "required",
            "visi_program" => "required",
            "misi_program" => "required",
            "tujuan_program" => "required",
            "sasaran_program" => "required",
        ]);
        

            $format_file = $request->file('logo_program')->getClientOriginalName();
            $request->file('logo_program')->move(public_path('image'), $format_file);
    
            ProgramKeahlian::create([
                "nama_program" => $request->nama_program,
                "logo_program" => 'image/'.$format_file,
                "deskripsi_program" => $request->deskripsi_program,
                "visi_program" => $request->visi_program,
                "misi_program" => $request->misi_program,
                "tujuan_program" => $request->tujuan_program,
                "sasaran_program" => $request->sasaran_program,
            ]);
            return redirect()->route('admin.programKeahlian.index')->with('success', 'berhasil ditambahkan.');
    }
    
    

    public function updateProgramKeahlian(Request $request, $id_program)
    {
        $request->validate([
            "nama_program" => "required",
            "logo_program" => "nullable|image|mimes:jpeg,png,jpg,gif|max:2048",
            "deskripsi_program" => "required",
            "visi_program" => "required",
            "misi_program" => "required",
            "tujuan_program" => "required",
            "sasaran_program" => "required",
        ]);
    
        $program = ProgramKeahlian::findOrFail($id_program);
    
        $validatedData = [
            "nama_program" => $request->nama_program,
            "deskripsi_program" => $request->deskripsi_program,
            "visi_program" => $request->visi_program,
            "misi_program" => $request->misi_program,
            "tujuan_program" => $request->tujuan_program,
            "sasaran_program" => $request->sasaran_program,
        ];
    
        if ($request->hasFile('logo_program')) {
            $format_file = $request->file('logo_program')->getClientOriginalName();
            $request->file('logo_program')->move(public_path('image'), $format_file);
            $validatedData["logo_program"] = 'image/' . $format_file;
        }
    
        $program->update($validatedData);
    
        return redirect()->route('admin.programKeahlian.index')->with('success', 'Data berhasil diperbarui.');
    }
    
    public function destroyProgramKeahlian($id_program)
    {
        $program = ProgramKeahlian::findOrFail($id_program);
        
        $program->delete();
    
        return redirect()->route('admin.programKeahlian.index')->with('success', 'Data berhasil dihapus.');
    }
    // Program Keahlian

    public function adminGuru(){
        return view('admin/guru', [
            "title" => "Admin Guru"
        ]);
    }

    public function adminStaff(){
        return view('admin/staff', [
            "title" => "Admin Staff"
        ]);
    }

    public function adminSiswa(){
        return view('admin/siswa', [
            "title" => "Admin Siswa"
        ]);
    }

    public function adminAlumni(){
        return view('admin/alumni', [
            "title" => "Admin Alumni"
        ]);
    }

    public function adminFoto(){
        return view('admin/foto', [
            "title" => "Admin Foto"
        ]);
    }

    public function adminVideo(){
        return view('admin/video', [
            "title" => "Admin Video"
        ]);
    }

    public function adminInformasiPPDB(){
        return view('admin/informasiPPDB', [
            "title" => "Admin Informasi PPDB"
        ]);
    }

    public function adminPendaftaranPPDB(){
        return view('admin/pendaftaranPPDB', [
            "title" => "Admin Pendaftaran PPDB"
        ]);
    }

    public function adminPengumumanPPDB(){
        return view('admin/pengumumanPPDB', [
            "title" => "Admin Pengumuman PPDB"
        ]);
    }

    public function adminSaranaPrasarana(){
        return view('admin/saranaPrasarana', [
            "title" => "Admin Sarana & Prasarana"
        ]);
    }

    public function adminPrestasi(){
        return view('admin/prestasi', [
            "title" => "Admin Prestasi"
        ]);
    }

    public function adminIBerita(){
        return view('admin/berita', [
            "title" => "Admin Berita"
        ]);
    }

    public function adminEkstrakulikuler(){
        return view('admin/ekstrakulikuler', [
            "title" => "Admin Ekstrakulikuler"
        ]);
    }

    public function adminSosialMedia(){
        return view('admin/sosialMedia', [
            "title" => "Admin Sosial Media"
        ]);
    }

    public function adminUmpanBalik(){
        return view('admin/umpanBalik', [
            "title" => "Admin Umpan Balik"
        ]);
    }

    public function adminPengaturan(){
        return view('admin/pengaturan', [
            "title" => "Admin Pengaturan"
        ]);
    }
}