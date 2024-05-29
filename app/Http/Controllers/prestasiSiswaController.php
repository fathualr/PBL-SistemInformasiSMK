<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PrestasiSiswa;
use App\Models\GambarPrestasiSiswa;
use Illuminate\Support\Facades\Storage;

class prestasiSiswaController extends Controller
{
    public function index() {
        $PrestasiSiswa = PrestasiSiswa::with('gambar')->orderBy('created_at', 'desc')->paginate(10);
        return view('guest/prestasi', [
            'PrestasiSiswa' => $PrestasiSiswa,
            "title" => "Prestasi Siswa"
        ]);
    }

    public function showTemplate($id_prestasi){
        $PrestasiSiswa = PrestasiSiswa::with('gambar')->findOrFail($id_prestasi);
        return view('guest/prestasi-siswa-template', [
            "PrestasiSiswa" => $PrestasiSiswa,
            "title" => "Prestasi Siswa"
        ]);
    }

    public function adminPrestasi() {
        $prestasiSiswa = PrestasiSiswa::with("gambar")->paginate(10);
        return view('admin/prestasi', [
            "title" => "Admin Prestasi",
            "prestasiSiswa" => $prestasiSiswa
        ]);
    }

    public function storePrestasiSiswa(Request $request)
    {
            $validate = $request->validate([
            'nama_prestasi' => 'required',
            'siswa_prestasi' => 'required',
            'deskripsi_prestasi' => 'required',
            'tanggal_prestasi' => 'required',
            'kategori_prestasi' => 'required',
            'tingkat_prestasi' => 'required',
            'gambar_prestasi' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'gambar.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $gambarPrestasi = $request->file('gambar_prestasi')->store('image/gambarPrestasi', 'public');
        $validate['gambar_prestasi'] = $gambarPrestasi;
        $prestasi = PrestasiSiswa::create($validate);

        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $image){
                GambarPrestasiSiswa::create([
                    'id_prestasi' => $prestasi->id_prestasi,
                    'gambar' => $image->store('image/gambarPrestasi', 'public'),
                ]);
            }
        }

        if($prestasi){
            return redirect()->back()->with('success', 'Prestasi berhasil ditambahkan.');
        } else {
            return redirect()->back()->with('error', 'Prestasi gagal ditambahkan.');
        }

    }

    public function updatePrestasiSiswa(Request $request, $id_prestasi){
        $prestasi = PrestasiSiswa::findOrFail($id_prestasi);
    
        $validate = $request->validate([
            'nama_prestasi' => 'required',
            'siswa_prestasi' => 'required',
            'deskripsi_prestasi' => 'required',
            'tanggal_prestasi' => 'required',
            'kategori_prestasi' => 'required|max:255',
            'tingkat_prestasi' => 'required|max:255',
            'gambar_prestasi' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'gambar.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('gambar_prestasi')) {
            // Hapus gambar lama dari penyimpanan sebelum memperbarui dengan gambar yang baru
            Storage::disk('public')->delete($prestasi->gambar_prestasi);
            
            $gambarPath = $request->file('gambar_prestasi')->store('image/gambarPrestasi', 'public');
            $validate['gambar_prestasi'] = $gambarPath;
        }
        
        $status = $prestasi->fill($validate)->save();
        if($status){
            return redirect()->back()->with('success', 'Prestasi berhasil diubah.');
        }
        else{
            return redirect()->back()->with('error', 'Prestasi gagal diubah.');
        }
    }
    
    public function destroyPrestasiSiswa($id_prestasi){
        $prestasi = PrestasiSiswa::findOrFail($id_prestasi);
        
        foreach ($prestasi->gambar as $gambar) {
            Storage::disk('public')->delete($gambar->gambar);
            $gambar->delete();
        }

        if ($prestasi->gambar_prestasi) {
            Storage::disk('public')->delete($prestasi->gambar_prestasi);
        }
    
        $status = $prestasi->delete();
        if($status){
            return redirect()->back()->with('success', 'Prestasi berhasil dihapus.');
        }
        else{
            return redirect()->back()->with('error', 'Prestasi gagal dihapus.');
        }
    }
    

    public function updateGambarPrestasi(Request $request, $id_prestasi) {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        $prestasi = PrestasiSiswa::findOrFail($id_prestasi);
        $image = $request->file('gambar');
    
        $status = GambarPrestasiSiswa::create([
            'id_prestasi' => $prestasi->id_prestasi,
            'gambar' => $image->store('image/gambarPrestasi', 'public'),
        ]);
        if($status){
            return redirect()->back()->with('success', 'Gambar prestasu berhasil ditambahkan.');
        }
        else{
            return redirect()->back()->with('error', 'Gambar prestasi gagal ditambahkan.');
        }
    }

    public function destroyGambarPrestasi($id_gambar){
        $gambar = GambarPrestasiSiswa::findOrFail($id_gambar);
        
        // Hapus gambar dari penyimpanan
        Storage::disk('public')->delete($gambar->gambar);

        $status = $gambar->delete();
        if($status){
            return redirect()->back()->with('success', 'Gambar berhasil dihapus.');
        }
        else{
            return redirect()->back()->with('error', 'Gambar gagal dihapus.');
        }
    }
    
}
