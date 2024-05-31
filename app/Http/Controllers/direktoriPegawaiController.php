<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DirektoriPegawai;
use Illuminate\Support\Facades\Storage;

class direktoriPegawaiController extends Controller
{
    public function pegawai()
    {
        $direktoriPegawai = DirektoriPegawai::all();
        return view('guest/direktori-pegawai', [
            "title" => "Direktori Pegawai",
            "direktoriPegawai"=> $direktoriPegawai
        ]);
    }

    //Perbaiki ^^
    public function adminPegawai(){
        $pegawai = DirektoriPegawai::paginate(10);
        return view('admin/pegawai', [
            "title" => "Admin Staff",
            "pegawai"=> $pegawai
        ]);
    }

    public function storeDirektoriPegawai(Request $request){
        $validate = $request->validate([
            'nama_pegawai' => 'required|string|max:255',
            'nik_pegawai' => 'required|string|unique:direktori_pegawai,nik_pegawai',
            'jabatan_pegawai' => 'required|string|max:255',
            'TTL_pegawai' => 'required|date',
            'tempat_lahir_pegawai' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki - Laki,Perempuan',
            'no_hp_pegawai' => 'required|string|max:255',
            'alamat_pegawai' => 'required|string',
            'gambar_pegawai' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'status_pegawai' => 'required|in:Aktif,Cuti,Pensiun,Resign',
            'email_pegawai' => 'required|string|email|unique:direktori_pegawai,email_pegawai',
        ]);

        $path = $request->file('gambar_pegawai')->store('image/gambarPegawai', 'public');
        $validate['gambar_pegawai'] = $path;

        $status = DirektoriPegawai::create($validate);
        if ($status) {
            return redirect()->back()->with('success', 'Data pegawai berhasil ditambahkan!');
        } else {
            return redirect()->back()->with('error', 'Data pegawai gagal ditambahkan!');
        }
    }

    public function updateDirektoriPegawai(Request $request, $id){
        $pegawai = DirektoriPegawai::findOrFail($id);

        $validate = $request->validate([
            'nama_pegawai' => 'required|string|max:255',
            'nik_pegawai' => 'required|string|max:255|unique:direktori_pegawai,nik_pegawai,' . $id . ',id_pegawai',
            'jabatan_pegawai' => 'required|string|max:255',
            'TTL_pegawai' => 'required|date',
            'tempat_lahir_pegawai' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki - Laki,Perempuan',
            'no_hp_pegawai' => 'required|string|max:255',
            'alamat_pegawai' => 'required|string',
            'gambar_pegawai' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status_pegawai' => 'required|in:Aktif,Cuti,Pensiun,Resign',
            'email_pegawai' => 'required|string|email|unique:direktori_pegawai,email_pegawai,' . $id . ',id_pegawai',
        ]);

        if ($request->hasFile('gambar_pegawai')) {
            if ($pegawai->gambar_pegawai) {
                Storage::disk('public')->delete($pegawai->gambar_pegawai);
            }
            $path = $request->file('gambar_pegawai')->store('image/gambarPegawai', 'public');
            $validate['gambar_pegawai'] = $path;
        }

        $status = $pegawai->update($validate);
        if ($status) {
            return redirect()->back()->with('success', 'Data pegawai berhasil diperbarui!');
        } else {
            return redirect()->back()->with('error', 'Data pegawai gagal diperbarui!');
        }
    }

    public function destroyDirektoriPegawai($id_pegawai){
        $pegawai = DirektoriPegawai::findOrFail($id_pegawai);

        if ($pegawai->gambar_pegawai) {
            Storage::disk('public')->delete($pegawai->gambar_pegawai);
        }

        $status = $pegawai->delete();
        if ($status) {
            return redirect()->back()->with('success', 'Data pegawai berhasil dihapus!');
        } else {
            return redirect()->back()->with('error', 'Data pegawai gagal dihapus!');
        }
    }
}
