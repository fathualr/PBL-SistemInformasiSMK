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

    public function storeSejarahSekolah(Request $request)
    {

        $validate = $request->validate([
            'judul_sejarah' => 'required',
            'gambar_sejarah' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi_sejarah' => 'required',
            'tanggal_sejarah' => 'required'
        ]);

        $gambarSejarah = $request->file('gambar_sejarah')->store('image/gambarSejarah', 'public');
        $validate['gambar_sejarah'] = $gambarSejarah;
        $sejarahSekolah = SejarahSekolah::create($validate);

        if ($sejarahSekolah) {
            return redirect()->route('admin.sejarahSekolah.index');
        } else {
            return redirect()->route('admin.sejarahSekolah.index');
        }
    }

    public function updateSejarahSekolah(Request $request, $id_sejarah)
    {

        $sejarahSekolah = SejarahSekolah::findOrFail($id_sejarah);

        $validate = $request->validate([
            'judul_sejarah' => 'required',
            'gambar_sejarah' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi_sejarah' => 'required',
            'tanggal_sejarah' => 'required'
        ]);

        if ($request->hasFile('gambar_sejarah')) {
            $gambarPath = $request->file('gambar_sejarah')->store('image/gambarSejarah', 'public');
            if ($sejarahSekolah->gambar_sejarah) {
                Storage::disk('public')->delete($sejarahSekolah->gambar_sejarah);
            }
            $validate['gambar_sejarah'] = $gambarPath;
        }

        $status = $sejarahSekolah->fill($validate)->save();
        if ($status) {
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

    public function destroySejarahSekolah($id_sejarah)
    {
        $sejrahSekolah = SejarahSekolah::findOrFail($id_sejarah);

        $sejrahSekolah->delete();

        return redirect()->route('admin.sejarahSekolah.index');
    }
}
