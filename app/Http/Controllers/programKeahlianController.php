<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgramKeahlian;
use App\Models\CapaianPembelajaran;
use App\Models\PeluangKerja;

class programKeahlianController extends Controller
{
    public function adminProgramKeahlian(){
        $programKeahlian = ProgramKeahlian::all();
        $capaianPembelajaran = CapaianPembelajaran::all();
        $peluangKerja = PeluangKerja::all();
    
        return view('admin/program-keahlian', [
            "title" => "Admin Program Keahlian",
            "programKeahlian" => $programKeahlian,
            "capaianPembelajaran"=> $capaianPembelajaran,
            "peluangKerja" => $peluangKerja
        ]);
    }

    // Program Keahlian
    public function storeProgramKeahlian(Request $request)
    {
            $format_file = $request->file('logo_program')->getClientOriginalName();
            $request->file('logo_program')->move(public_path('image'), $format_file);
    
            ProgramKeahlian::create([
                "nama_program" => $request->nama_program,
                "logo_program" => 'image/'.$format_file,
                "deskripsi_program" => $request->deskripsi_program,
                "deskripsi_peluang_kerja" => $request->deskripsi_peluang_kerja,
                "visi_program" => $request->visi_program,
                "misi_program" => $request->misi_program,
                "tujuan_program" => $request->tujuan_program,
                "sasaran_program" => $request->sasaran_program,
            ]);
            return redirect()->route('admin.programKeahlian.index');
    }
    
    

    public function updateProgramKeahlian(Request $request, $id_program)
    {
        $request->validate([
            "nama_program" => "required",
            "logo_program" => "nullable|image|mimes:jpeg,png,jpg,gif|max:2048",
            "deskripsi_program" => "required",
            "deskripsi_peluang_kerja" => "required",
            "visi_program" => "required",
            "misi_program" => "required",
            "tujuan_program" => "required",
            "sasaran_program" => "required",
        ]);
    
        $program = ProgramKeahlian::findOrFail($id_program);
    
        $validatedData = [
            "nama_program" => $request->nama_program,
            "deskripsi_program" => $request->deskripsi_program,
            "deskripsi_peluang_kerja" => $request->deskripsi_peluang_kerja,
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
    
        return redirect()->route('admin.programKeahlian.index');
    }
    
    public function destroyProgramKeahlian($id_program)
    {
        $program = ProgramKeahlian::findOrFail($id_program);
        
        $program->delete();
    
        return redirect()->route('admin.programKeahlian.index')->with('success', 'Data berhasil dihapus.');
    }
    // Program Keahlian

    // Capaian Pembelajaran
    public function capaianPembelajaran(){
        $programKeahlian = ProgramKeahlian::all();
        $capaianPembelajaran = CapaianPembelajaran::all();
        return view('admin/program-keahlian', [
            "title" => "Capaian Pembelajaran",
            "capaianPembelajaran"=> $capaianPembelajaran,
            "programKeahlian" => $programKeahlian,
            compact('programKeahlian', 'capaianPembelajaran')
        ]);
    }
    public function storeCapaianPembelajaran(Request $request)
    {
        CapaianPembelajaran::create([
            "id_program" => $request->id_program,
            "deskripsi_capaian_pembelajaran" => $request->deskripsi_capaian_pembelajaran,
            "aspek_sikap" => $request->aspek_sikap,
            "aspek_pengetahuan" => $request->aspek_pengetahuan,
            "aspek_keterampilan_umum" => $request->aspek_keterampilan_umum,
            "aspek_keterampilan_khusus" => $request->aspek_keterampilan_khusus,
        ]);
        return redirect()->route('admin.programKeahlian.index');
    }

    public function updateCapaianPembelajaran(Request $request, $id_capaian_pembelajaran)
    {
    
        $capaian = CapaianPembelajaran::findOrFail($id_capaian_pembelajaran);
    
        $validatedData = [
            "id_program" => $request->id_program,
            "deskripsi_capaian_pembelajaran" => $request->deskripsi_capaian_pembelajaran,
            "aspek_sikap" => $request->aspek_sikap,
            "aspek_pengetahuan" => $request->aspek_pengetahuan,
            "aspek_keterampilan_umum" => $request->aspek_keterampilan_umum,
            "aspek_keterampilan_khusus" => $request->aspek_keterampilan_khusus,
        ];
    
        $capaian->update($validatedData);
    
        return redirect()->route('admin.programKeahlian.index');
    }

    public function destroyCapaianPembelajaran($id_capaian_pembelajaran)
    {
        $capaianPembelajaran = CapaianPembelajaran::findOrFail($id_capaian_pembelajaran);
        
        $capaianPembelajaran->delete();
    
        return redirect()->route('admin.capaianPembelajaran.index');
    }
    // Capaian Pembelajaran

    // Peluang Kerja
    public function peluangKerja(){
        $programKeahlian = ProgramKeahlian::all();
        $peluangKerja = PeluangKerja::all();
        return view('admin/program-keahlian', [
            "peluangKerja"=> $peluangKerja,
            "programKeahlian" => $programKeahlian,
            compact('programKeahlian', 'peluangKerja')
        ]);
    }

    public function storePeluangKerja(Request $request)
    {
        PeluangKerja::create([
            "id_program" => $request->id_program,
            "peluang_kerja" => $request->peluang_kerja,
            "deskripsi_pekerjaan" => $request->deskripsi_pekerjaan
        ]);
        return redirect()->route('admin.programKeahlian.index');
    }

    public function updatePeluangKerja(Request $request, $id_peluang_kerja)
    {
    
        $peluang = PeluangKerja::findOrFail($id_peluang_kerja);
    
        $validatedData = [
            "id_program" => $request->id_program,
            "peluang_kerja" => $request->peluang_kerja,
            "deskripsi_pekerjaan" => $request->deskripsi_pekerjaan
        ];
    
        $peluang->update($validatedData);
    
        return redirect()->route('admin.programKeahlian.index');
    }

    public function destroyPeluangKerja($id_peluang_kerja)
    {
        $peluang = PeluangKerja::findOrFail($id_peluang_kerja);
        
        $peluang->delete();
    
        return redirect()->route('admin.programKeahlian.index');
    }
    // Peluang Kerja

    // Guest
        public function program()
    {
        $programKeahlian = ProgramKeahlian::all();
        $capaianPembelajaran = CapaianPembelajaran::all();
        $peluangKerja = PeluangKerja::all();
        return view('guest/program-keahlian', [
            "title" => "Program Keahlian",
            "programKeahlian" => $programKeahlian,
            "capaianPembelajaran"=> $capaianPembelajaran,
            "peluangKerja" => $peluangKerja
        ]);
    }
    // Guest
}