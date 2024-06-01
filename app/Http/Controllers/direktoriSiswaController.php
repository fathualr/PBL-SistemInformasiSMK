<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DirektoriSiswa;
use App\Models\ProgramKeahlian;
use Illuminate\Support\Facades\Storage;

class direktoriSiswaController extends Controller
{
    public function siswa(){
        $direktoriSiswa = DirektoriSiswa::with('programKeahlian')->get();
        $programKeahlian = ProgramKeahlian::all();
        return view('guest/direktori-siswa', [
            "title" => "Direktori Siswa",
            "direktoriSiswa" => $direktoriSiswa,
            "programKeahlian" => $programKeahlian
        ]);
    }

    public function adminSiswa(){
        $siswa = DirektoriSiswa::with('programKeahlian')->paginate(10);
        $programKeahlian = ProgramKeahlian::all();
        return view('admin/siswa', [
            "title" => "Admin Siswa",
            "siswa"=> $siswa,
            "programKeahlian"=> $programKeahlian
        ]);
    }

    public function storeDirektoriSiswa(Request $request){
        $validate = $request->validate([
            'id_program' => 'required|exists:program_keahlian,id_program',
            'nama_siswa' => 'required|string|max:255',
            'nisn_siswa' => 'required|string|max:255|unique:direktori_siswa,nisn_siswa',
            'jenis_kelamin_siswa' => 'required|in:Laki - Laki,Perempuan',
            'no_hp_siswa' => 'required|string|max:255',
            'TTL_siswa' => 'required|date',
            'tempat_lahir_siswa' => 'required|string|max:255',
            'alamat_siswa' => 'required|string',
            'kelas_siswa' => 'required|string|max:255',
            'tahun_angkatan_siswa' => 'required',
            'gambar_siswa' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('gambar_siswa')) {
            $path = $request->file('gambar_siswa')->store('image/gambarSiswa', 'public');
            $validate['gambar_siswa'] = $path;
        }

        $status = DirektoriSiswa::create($validate);
        if ($status) {
            return redirect()->route('admin.direktoriSiswa.index')->with('success', 'Data siswa berhasil ditambahkan!');
        } else {
            return redirect()->back()->with('error', 'Data siswa gagal ditambahkan!');
        }
    }

    public function updateDirektoriSiswa(Request $request, $id_siswa){
        $siswa = DirektoriSiswa::findOrFail($id_siswa);

        $validate = $request->validate([
            'id_program' => 'required|exists:program_keahlian,id_program',
            'nama_siswa' => 'required|string|max:255',
            'nisn_siswa' => 'required|string|max:255|',
            'jenis_kelamin_siswa' => 'required|in:Laki - Laki,Perempuan',
            'no_hp_siswa' => 'required|string|max:255',
            'TTL_siswa' => 'required|date',
            'tempat_lahir_siswa' => 'required|string|max:255',
            'alamat_siswa' => 'required|string',
            'kelas_siswa' => 'required|string|max:255',
            'tahun_angkatan_siswa' => 'required',
            'gambar_siswa' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('gambar_siswa')) {
            if ($siswa->gambar_siswa) {
                Storage::disk('public')->delete($siswa->gambar_siswa);
            }
            $path = $request->file('gambar_siswa')->store('image/gambarSiswa', 'public');
            $validate['gambar_siswa'] = $path;
        }

        $status = $siswa->update($validate);
        if ($status) {
            return redirect()->back()->with('success', 'Data siswa berhasil diperbarui!');
        } else {
            return redirect()->back()->with('error', 'Data siswa gagal diperbarui!');
        }
    }

    public function destroyDirektoriSiswa($id_siswa){
        $siswa = DirektoriSiswa::findOrFail($id_siswa);

        if ($siswa->gambar_siswa) {
            Storage::disk('public')->delete($siswa->gambar_siswa);
        }

        $status = $siswa->delete();
        if ($status) {
            return redirect()->back()->with('success', 'Data siswa berhasil dihapus!');
        } else {
            return redirect()->back()->with('error', 'Data siswa gagal dihapus!');
        }
    }
}