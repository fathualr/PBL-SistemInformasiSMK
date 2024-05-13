<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KomentarBerita;

class komentarBeritaActionController extends Controller
{
    public function store(Request $request, $id){
        $validate = $request->validate([
            'nama_komentar' => 'required|string|max:255',
            'teks_komentar' => 'required|string',
        ]);
        $validate['id_berita'] = $id;

        $status = KomentarBerita::create($validate);
        if($status){
            return redirect()->back()->with('success', 'Komentar berhasil ditambahkan.');
        } else {
            return redirect()->back()->with('error', 'Komentar gagal ditambahkan.');
        }
    }

    public function destroy($id){
        $data = KomentarBerita::findOrFail($id);
        $status = $data->delete();
        if($status){
            return redirect()->back()->with('success', 'Komentar berhasil dihapus!');
        }
        else{
            return redirect()->back()->with('error', 'Komentar berita gagal dihapus!');
        }
    }
}
