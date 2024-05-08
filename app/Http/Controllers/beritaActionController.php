<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\GambarBerita;
use App\Models\KategoriBerita;

class beritaActionController extends Controller
{
    public function index(){
        $berita = Berita::with('kategori', 'gambar')->get();
        return view('admin/berita', [
            'berita' => $berita,
            "title" => "Admin"
        ]);
    }

    public function show(){
        $berita = Berita::with('kategori', 'gambar')->get();
        return view('guest/berita', [
            'berita' => $berita,
            "title" => "Berita"
        ]);
    }

    public function showTemplate($id_berita){
        $berita = Berita::with('kategori', 'gambar')->findOrFail($id_berita);
        return view('guest/berita-template', [
            'berita' => $berita,
            'title' => "Berita $berita->judul_berita"
        ]);
    }

    public function store(Request $request){
        $validate = $request->validate([
            'judul_berita' => 'required|string|max:255',
            'gambar_berita.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'isi_berita' => 'required|string',
            'kategori_berita.*' => 'nullable|string|max:255',
            'gambar_headline' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'tanggal_berita' => 'required|date',
        ]);

        $gambarHeadline = $request->file('gambar_headline')->store('image/gambarBeritaHeadline', 'public');
        $validate['gambar_headline'] = $gambarHeadline;
        $berita = Berita::create($validate);

        if ($request->hasFile('gambar_berita')) {
            foreach ($request->file('gambar_berita') as $image){
                GambarBerita::create([
                    'berita_id' => $berita->id_berita,
                    'tautan_gambar' => $image->store('image/gambarBerita', 'public'),
                ]);
            }
        }
        
        if ($validate['kategori_berita'][0] !== null) {
            foreach ($validate['kategori_berita'] as $kategori){
                KategoriBerita::create([
                    'berita_id' => $berita->id_berita,
                    'nama_kategori' => $kategori,
                ]);
            }
        }

        if($berita){
            return redirect()->back()->with('success', 'Berita berhasil ditambahkan.');
        } else {
            return redirect()->back()->with('error', 'Berita gagal ditambahkan.');
        }
    }

    public function update(Request $request, $id){
        $berita = Berita::findOrFail($id);
        $validate = $request->validate([
            'judul_berita' => 'required|string|max:255',
            'isi_berita' => 'required|string',
            'gambar_headline' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'tanggal_berita' => 'required|date',
        ]);
        if ($request->hasFile('gambar_headline')) {
            $gambarHeadlinePath = $request->file('gambar_headline')->store('image/gambarBeritaHeadline', 'public');
            $validate['gambar_headline'] = $gambarHeadlinePath;
        }

        $status = $berita->fill($validate)->save();
        if($status){
            return redirect()->back()->with('success', 'Berita berhasil diubah!');
        }
        else{
            return redirect()->back()->with('error', 'Berita gagal diubah!');
        }
    }

    public function destroy($id){
        $data = Berita::findOrFail($id);
        $status = $data->delete();
        if($status){
            return redirect()->back()->with('success', 'Berita berhasil dihapus!');
        }
        else{
            return redirect()->back()->with('error', 'Berita gagal dihapus!');
        }
    }
    
    public function updateGambarBerita(Request $request, $id) {
        $request->validate([
            'tautan_gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        $berita = Berita::findOrFail($id);
        $image = $request->file('tautan_gambar');
    
        $status = GambarBerita::create([
            'berita_id' => $berita->id_berita,
            'tautan_gambar' => $image->store('image/gambarBerita', 'public'),
        ]);
        if($status){
            return redirect()->back()->with('success', 'Gambar berita berhasil diubah!');
        }
        else{
            return redirect()->back()->with('error', 'Gambar berita gagal diubah!');
        }
    }

    public function destroyGambarBerita($id){
        $data = GambarBerita::findOrFail($id);
        $status = $data->delete();
        if($status){
            return redirect()->back()->with('success', 'Gambar berita berhasil dihapus!');
        }
        else{
            return redirect()->back()->with('error', 'Gambar berita gagal dihapus!');
        }
    }

    public function updateKategoriBerita(Request $request, $id){
        $validate = $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);
        $berita = Berita::findOrFail($id);
        $validate['berita_id'] = $berita->id_berita;

        $status = kategoriBerita::create($validate);
        if($status){
            return redirect()->back()->with('success', 'Kategori berita berhasil dihapus!');
        }
        else{
            return redirect()->back()->with('error', 'Kategori berita gagal dihapus!');
        }
    }

    public function destroyKategoriBerita($id){
        $data = KategoriBerita::findOrFail($id);
        $status = $data->delete();
        if($status){
            return redirect()->back()->with('success', 'Kategori berita berhasil dihapus!');
        }
        else{
            return redirect()->back()->with('error', 'Kategori berita gagal dihapus!');
        }
    }
}
