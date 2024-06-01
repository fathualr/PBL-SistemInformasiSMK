<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgramKeahlian;
use App\Models\DirektoriGuru;
use Illuminate\Support\Facades\Storage;

class direktoriGuruController extends Controller
{
    public function guru()
    {
        $direktoriGuru = DirektoriGuru::with('programKeahlian')->get();
        return view('guest/direktori-guru', [
            "title" => "Direktori Guru",
            "direktoriGuru" => $direktoriGuru
        ]);
    }

    public function adminDirektoriGuru(){
        $gurus = DirektoriGuru::with('programKeahlian')->paginate(10);
        $programKeahlian = ProgramKeahlian::all();
        return view('admin/guru', [
            "title" => "Admin Guru",
            "gurus" => $gurus,
            "programKeahlian" => $programKeahlian,
        ]);
    }

    public function storeDirektoriGuru(Request $request){
        $validate = $request->validate([
            'id_program' => 'required|exists:program_keahlian,id_program',
            'nama_guru' => 'required|string|max:255',
            'nik_guru' => 'required|max:255|unique:direktori_guru,nik_guru',
            'jabatan_guru' => 'required|string|max:255',
            'TTL_guru' => 'required|date',
            'tempat_lahir_guru' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki - Laki,Perempuan',
            'no_hp_guru' => 'required|max:15',
            'alamat_guru' => 'required|string|max:255',
            'gambar_guru' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status_guru' => 'required|in:Aktif,Cuti,Pensiun,Resign',
            'email_guru' => 'required|email|max:255|unique:direktori_guru,email_guru',
        ]); 

        $path = $request->file('gambar_guru')->store('image/gambarGuru', 'public');
        $validate['gambar_guru'] = $path;

        $status = DirektoriGuru::create($validate);
        if ($status) {
            return redirect()->back()->with('success', 'Data guru berhasil ditambahkan!');
        } else {
            return redirect()->back()->with('error', 'Data guru gagal ditambahkan!');
        }
    }
    
    public function updateDirektoriGuru(Request $request, $id_guru){
        $guru = DirektoriGuru::findOrFail($id_guru);

        $validate = $request->validate([
            'id_program' => 'required|exists:program_keahlian,id_program',
            'nama_guru' => 'required|string|max:255',
            'nik_guru' => 'required|max:255|unique:direktori_guru,nik_guru,' . $id_guru . ',id_guru',
            'jabatan_guru' => 'required|string|max:255',
            'TTL_guru' => 'required|date',
            'tempat_lahir_guru' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki - Laki,Perempuan',
            'no_hp_guru' => 'required|max:15',
            'alamat_guru' => 'required|string|max:255',
            'gambar_guru' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status_guru' => 'required|in:Aktif,Cuti,Pensiun,Resign',
            'email_guru' => 'required|email|max:255|unique:direktori_guru,email_guru,' . $id_guru . ',id_guru',
        ]);

        if ($request->hasFile('gambar_guru')) {
            if ($guru->gambar_guru) {
                Storage::disk('public')->delete($guru->gambar_guru);
            }
            $path = $request->file('gambar_guru')->store('image/gambarGuru', 'public');
            $validate['gambar_guru'] = $path;
        }

        $status = $guru->update($validate);
        if ($status) {
            return redirect()->back()->with('success', 'Data guru berhasil diperbarui!');
        } else {
            return redirect()->back()->with('error', 'Data guru gagal diperbarui!');
        }
    }

    public function destroyDirektoriGuru($id_guru){
        $guru = DirektoriGuru::findOrFail($id_guru);

        if ($guru->gambar_guru) {
            Storage::disk('public')->delete($guru->gambar_guru);
        }

        $status = $guru->delete();
        if ($status) {
            return redirect()->back()->with('success', 'Data guru berhasil dihapus!');
        } else {
            return redirect()->back()->with('error', 'Data guru gagal dihapus!');
        }
    }
}
