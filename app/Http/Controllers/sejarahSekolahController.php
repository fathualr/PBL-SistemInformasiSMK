<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SejarahSekolah;
use Illuminate\Support\Facades\Storage;

class SejarahSekolahController extends Controller
{
    public function adminSejarah()
    {
        $sejarahSekolah = SejarahSekolah::all();
    
        return view('admin.sejarah', [
            "title" => "Admin Sejarah Sekolah",
            "sejarahSekolah" => $sejarahSekolah
        ]);
    }

    public function storeSejarahSekolah(Request $request){

        $validate = $request->validate([
            'judul_sejarah' => 'required',
            'gambar_sejarah' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi_sejarah' => 'required',
            'tanggal_sejarah' => 'required',
        ]);

        $path = $request->file('gambar_sejarah')->store('image/Sejarah', 'public');
        $validate['gambar_sejarah'] = $path;
        $status = SejarahSekolah::create($validate);

        if($status){
            return redirect()->back()->with('success', 'Sejarah berhasil ditambahkan!');
        }
        else{
            return redirect()->back()->with('error', 'Sejarah gagal ditambahkan!');
        }
    }

    public function updateSejarahSekolah(Request $request, $id_sejarah){
        $sejarahSekolah = SejarahSekolah::findOrFail($id_sejarah);

        $validate = $request->validate([
            'judul_sejarah' => 'required',
            'deskripsi_sejarah' => 'required',
            'tanggal_sejarah' => 'required',
            'gambar_sejarah' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('gambar_sejarah')) {
            if ($sejarahSekolah->gambar_sejarah) {
                Storage::disk('public')->delete($sejarahSekolah->gambar_sejarah);
            }
            $path = $request->file('gambar_sejarah')->store('image/Sejarah', 'public');
            $validate['gambar_sejarah'] = $path;
        }

        $status = $sejarahSekolah->update($validate);
        if ($status) {
            return redirect()->back()->with('success', 'Sejarah berhasil diperbarui!');
        } else {
            return redirect()->back()->with('error', 'Sejarah gagal diperbarui!');
        }
    }

    public function destroySejarahSekolah($id_sejarah){
        $sejarahSekolah = SejarahSekolah::findOrFail($id_sejarah);

        if ($sejarahSekolah->gambar_sejarah) {
            Storage::disk('public')->delete($sejarahSekolah->gambar_sejarah);
        }

        $status = $sejarahSekolah->delete();
        if ($status) {
            return redirect()->back()->with('success', 'Sejarah berhasil dihapus!');
        } else {
            return redirect()->back()->with('error', 'Sejarah gagal dihapus!');
        }
    }
}