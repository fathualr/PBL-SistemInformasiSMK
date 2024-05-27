<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PrestasiSiswa;
use App\Models\GambarPrestasiSiswa;

class prestasiSiswaController extends Controller
{
    public function adminPrestasi()
    {
        $prestasiSiswa = PrestasiSiswa::with("gambarPrestasi")->get();
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
            'gambar_prestasi' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
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
            return redirect()->route('admin.prestasiSiswa.index');
        } else {
            return redirect()->route('admin.prestasiSiswa.index');
        }

    }

    public function updatePrestasiSiswa(Request $request, $id_prestasi)
    {
    
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
            $gambarPath = $request->file('gambar_prestasi')->store('image/gambarPrestasi', 'public');
            $validate['gambar_prestasi'] = $gambarPath;
        }

        $status = $prestasi->fill($validate)->save();
        if($status){
            return redirect()->route('admin.prestasiSiswa.index');
        }
        else{
            return redirect()->route('admin.prestasiSiswa.index');
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
            return redirect()->back();
        }
        else{
            return redirect()->back();
        }
    }

    public function destroyGambarPrestasi($id_gambar){
        $data = GambarPrestasiSiswa::findOrFail($id_gambar);
        $status = $data->delete();
        if($status){
            return redirect()->back();
        }
        else{
            return redirect()->back();
        }
    }

    public function destroyPrestasiSiswa($id_prestasi)
    {
        $prestasi = PrestasiSiswa::findOrFail($id_prestasi);
        
        $prestasi->delete();
    
        return redirect()->route('admin.prestasiSiswa.index');
    }

}
