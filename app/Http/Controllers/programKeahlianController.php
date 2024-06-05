<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgramKeahlian;
use App\Models\CapaianPembelajaran;
use App\Models\PeluangKerja;
use Illuminate\Support\Facades\Storage;

class programKeahlianController extends Controller
{
    public function program(){
        $programKeahlian = ProgramKeahlian::all();
        return view('guest/program-keahlian', [
            "title" => "Program Keahlian",
            "programKeahlian" => $programKeahlian
        ]);
    }

    public function detailProgram($id){
        $program = ProgramKeahlian::with('capaianPembelajaran', 'peluangKerja')->findOrFail($id);
        return view('guest/program-keahlian-template', [
            "title" => "Detail Program Keahlian",
            "program" => $program
        ]);
    }
    // Perbaiki ^^^
    public function adminProgramKeahlian(Request $request){
        $search = $request->query('search');
        $perPage = $request->query('perPage') ?? 10;

        if ($search) {

            $programKeahlian = ProgramKeahlian::where('nama_program', 'like', '%' . $search . '%')
                ->paginate($perPage);
        } else {
            // Jika tidak ada query pencarian, tampilkan semua data
            $programKeahlian = ProgramKeahlian::paginate($perPage);
        }
    
        // Menambahkan parameter pencarian dan perPage ke pagination links
        $programKeahlian->appends(['search' => $search, 'perPage' => $perPage]);

        return view('admin/program-keahlian', [
            "title" => "Admin Program Keahlian",
            "programKeahlian" => $programKeahlian,
            "search" => $search, // Mengirimkan search ke view
            "perPage" => $perPage, // Mengirimkan perPage ke view
        ]);
    }

    public function storeProgramKeahlian(Request $request){
        $validate = $request->validate([
            'nama_program' => 'required',
            'logo_program' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'deskripsi_program' => 'required',
            'deskripsi_peluang_kerja' => 'required',
            'visi_program' => 'required',
            'misi_program' => 'required',
            'tujuan_program' => 'required',
            'sasaran_program' => 'required',
        ]);

        $path = $request->file('logo_program')->store('image/logoProgram', 'public');
        $validate['logo_program'] = $path;

        $programKeahlian = ProgramKeahlian::create($validate);
        if ($programKeahlian) {
            $capaianPembelajaran = CapaianPembelajaran::create([
                'id_program' => $programKeahlian->id_program,
            ]);

            if ($capaianPembelajaran) {
                return redirect()->back()->with('success', 'Program Keahlian berhasil ditambahkan!');
            } else {
                $programKeahlian->delete();
                return redirect()->back()->with('error', 'Gagal membuat Capaian Pembelajaran untuk Program Keahlian!');
            }
        } else {
            return redirect()->back()->with('error', 'Gagal membuat Program Keahlian!');
        }
    }

    public function updateProgramKeahlian(Request $request, $id_program){
        $programKeahlian = ProgramKeahlian::findOrFail($id_program);

        $validate = $request->validate([
            "nama_program" => "required",
            "logo_program" => "nullable|image|mimes:jpeg,png,jpg|max:2048",
            "deskripsi_program" => "required",
            "deskripsi_peluang_kerja" => "required",
            "visi_program" => "required",
            "misi_program" => "required",
            "tujuan_program" => "required",
            "sasaran_program" => "required"
        ]);

        if ($request->hasFile('logo_program')) {
            if ($programKeahlian->logo_program) {
                Storage::disk('public')->delete($programKeahlian->logo_program);
            }
            $path = $request->file('logo_program')->store('image/logoProgram', 'public');
            $validate['logo_program'] = $path;
        }

        $status = $programKeahlian->update($validate);
        if ($status) {
            return redirect()->back()->with('success', 'Program Keahlian berhasil diperbarui!');
        } else {
            return redirect()->back()->with('error', 'Program Keahlian gagal diperbarui!');
        }
    }

    public function destroyProgramKeahlian($id_program){
        $program = ProgramKeahlian::findOrFail($id_program);

        if ($program->logo_program) {
            Storage::disk('public')->delete($program->logo_program);
        }

        $status = $program->delete();
        if ($status) {
            return redirect()->back()->with('success', 'Program Keahlian berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'Gagal menghapus Program Keahlian.');
        }
    }

    public function updateCapaianPembelajaran(Request $request, $id_program){
        $program = ProgramKeahlian::findOrFail($id_program);

        $validatedData = $request->validate([
            'deskripsi_capaian_pembelajaran' => 'nullable',
            'aspek_sikap' => 'nullable',
            'aspek_pengetahuan' => 'nullable',
            'aspek_keterampilan_umum' => 'nullable',
            'aspek_keterampilan_khusus' => 'nullable',
        ]);
    
        $capaianPembelajaran = $program->capaianPembelajaran;
        $status = $capaianPembelajaran->update($validatedData);
        if ($status) {
            return redirect()->back()->with('success', 'Capaian Pembelajaran berhasil diperbarui!');
        } else {
            return redirect()->back()->with('error', 'Capaian Pembelajaran gagal diperbarui!');
        }
    }

    public function updatePeluangKerja(Request $request, $id_program){
        $program = ProgramKeahlian::findOrFail($id_program);
    
        $validate = $request->validate([
            'peluang_kerja' => 'required|string|max:255',
            'deskripsi_pekerjaan' => 'required|string|max:255',
        ]);
        $validate['id_program'] = $program->id_program;

        $status = PeluangKerja::create($validate);
        if($status){
            return redirect()->back()->with('success', 'Peluang Kerja berhasil ditambahkan!');
        }
        else{
            return redirect()->back()->with('error', 'Peluang Kerja gagal ditambahkan!');
        }
    }

    public function destroyPeluangKerja($id){
        $peluangKerja = PeluangKerja::findOrFail($id);
        $status = $peluangKerja->delete();
        if ($status) {
            return redirect()->back()->with('success', 'Peluang Kerja berhasil dihapus!');
        } else {
            return redirect()->back()->with('error', 'Peluang Kerja gagal dihapus!');
        }
    }
}