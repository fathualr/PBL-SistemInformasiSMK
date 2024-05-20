<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SejarahSekolah;

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

        $request->validate([
            'judul_sejarah' => 'required',
            'gambar_sejarah' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust file size limit as needed
            'deskripsi_sejarah' => 'required',
            'tanggal_sejarah' => 'required',
        ]);


        $format_file = $request->file('gambar_sejarah')->getClientOriginalName();
        $request->file('gambar_sejarah')->move(public_path('gambarSejarah'), $format_file);


        SejarahSekolah::create([
            "judul_sejarah" => $request->judul_sejarah,
            "deskripsi_sejarah" => $request->deskripsi_sejarah,
            "tanggal_sejarah" => $request->tanggal_sejarah,
            "gambar_sejarah" => 'gambarSejarah/'. $format_file,
        ]);

        
        return redirect()->route('admin.sejarahSekolah.index');
    }

    public function updateSejarahSekolah(Request $request, $id_sejarah)
    {
        $sejarahSekolah = SejarahSekolah::findOrFail($id_sejarah);

        $validateData =
        [
            "judul_sejarah" => $request->judul_sejarah,
            "deskripsi_sejarah" => $request->deskripsi_sejarah,
            "tanggal_sejarah" => $request->tanggal_sejarah,
        ];

        if  ($request -> hasFile('gambar_sejarah')) {
            $format_file = $request->file('gambar_sejarah')->getClientOriginalName();
            $request->file('gambar_sejarah')->move(public_path('gambarSejarah'), $format_file);
            $validateData["gambar_sejarah"] = 'gambarSejarah/' .$format_file;
        }

        $sejarahSekolah->update($validateData);

        return redirect()->route('admin.sejarahSekolah.index');
    }

    public function destroySejarahSekolah($id_sejarah)
    {
        $sejrahSekolah = SejarahSekolah::findOrFail($id_sejarah);

        $sejrahSekolah->delete();

        return redirect()->route('admin.sejarahSekolah.index');
    }
}