<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DirektoriAlumni;
use Illuminate\Support\Facades\Storage;

class direktoriAlumniController extends Controller
{
    public function alumni(){
        $direktoriAlumni = DirektoriAlumni::all();
        return view('guest/direktori-alumni', [
            "title" => "Direktori Alumni",
            "direktoriAlumni"=> $direktoriAlumni
        ]);
    }

    // Perbaiki ^^^
    public function adminAlumni(){
        $direktoriAlumni = DirektoriAlumni::paginate(10);
        return view('admin/alumni', [
            "title" => "Admin Alumni",
            "direktoriAlumni" => $direktoriAlumni
        ]);
    }

    public function storeDirektoriAlumni(Request $request){
        $validate = $request->validate([
            'nama_alumni' => 'required|string|max:255',
            'no_hp_alumni' => 'required|string|max:255',
            'email_alumni' => 'required|email|max:255',
            'jenis_kelamin_alumni' => 'required|in:Laki - Laki,Perempuan',
            'TTL_alumni' => 'required|date',
            'tempat_lahir_alumni' => 'required|string|max:255',
            'tahun_kelulusan_alumni' => 'required|integer',
            'gambar_alumni' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'alamat_alumni' => 'required|string',
        ]);

        if ($request->hasFile('gambar_alumni')) {
            $path = $request->file('gambar_alumni')->store('image/gambarAlumni', 'public');
            $validate['gambar_alumni'] = $path;
        }

        $status = DirektoriAlumni::create($validate);
        if ($status) {
            return redirect()->back()->with('success', 'Data alumni berhasil ditambahkan!');
        } else {
            return redirect()->back()->with('error', 'Data alumni gagal ditambahkan!');
        }
    }

    public function updateDirektoriAlumni(Request $request, $id_alumni){
        $alumni = DirektoriAlumni::findOrFail($id_alumni);

        $validate = $request->validate([
            'nama_alumni' => 'required|string|max:255',
            'no_hp_alumni' => 'required|string|max:255',
            'email_alumni' => 'required|email|max:255',
            'jenis_kelamin_alumni' => 'required|in:Laki - Laki,Perempuan',
            'TTL_alumni' => 'required|date',
            'tempat_lahir_alumni' => 'required|string|max:255',
            'tahun_kelulusan_alumni' => 'required|integer',
            'gambar_alumni' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'alamat_alumni' => 'required|string',
        ]);

        if ($request->hasFile('gambar_alumni')) {
            if ($alumni->gambar_alumni) {
                Storage::disk('public')->delete($alumni->gambar_alumni);
            }
            $path = $request->file('gambar_alumni')->store('image/gambarAlumni', 'public');
            $validate['gambar_alumni'] = $path;
        }

        $status = $alumni->update($validate);
        if ($status) {
            return redirect()->back()->with('success', 'Data alumni berhasil diperbarui!');
        } else {
            return redirect()->back()->with('error', 'Data alumni gagal diperbarui!');
        }
    }

    public function destroyDirektoriAlumni($id_alumni){
        $alumni = DirektoriAlumni::findOrFail($id_alumni);

        if ($alumni->gambar_alumni) {
            Storage::disk('public')->delete($alumni->gambar_alumni);
        }

        $status = $alumni->delete();
        if ($status) {
            return redirect()->back()->with('success', 'Data alumni berhasil dihapus!');
        } else {
            return redirect()->back()->with('error', 'Data alumni gagal dihapus!');
        }
    }
}
