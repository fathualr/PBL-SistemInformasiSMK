<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prasarana;
use App\Models\FotoPrasarana;
use Illuminate\Support\Facades\Storage;

class PrasaranaController extends Controller
{
    // Method untuk menampilkan daftar prasarana
    public function adminSaranaPrasarana()
    {
        $prasaranas = Prasarana::with('foto_prasarana')->paginate(10);
        return view('admin.saranaPrasarana', [
            'title' => 'Sarana & Prasarana',
            'prasaranas' => $prasaranas,
        ]);
    }

    // Method untuk menyimpan data prasarana baru
    public function storeSaranaPrasarana(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_prasarana' => 'required|string|max:255',
            'jenis_prasarana' => 'required|string|max:255',
            'deskripsi_prasarana' => 'required|string|max:500',
            'luas' => 'required|integer',
            'kapasitas' => 'required|integer',
            'tahun_dibangun' => 'required|date',
            'kondisi' => 'required|in:Baik,Perlu Perbaikan,Dalam Perbaikan',
            'status_prasarana' => 'required|in:Aktif,Tidak Aktif',
        ]);

        Prasarana::create([
            'nama_prasarana' => $request->nama_prasarana,
            'jenis_prasarana' => $request->jenis_prasarana,
            'deskripsi_prasarana' => $request->deskripsi_prasarana,
            'luas' => $request->luas,
            'kapasitas' => $request->kapasitas,
            'tahun_dibangun' => $request->tahun_dibangun,
            'kondisi' => $request->kondisi,
            'status_prasarana' => $request->status_prasarana,
        ]);

        return redirect()->route('admin.SaranaPrasarana.index')->with('success', 'Prasarana berhasil ditambahkan!');
    }

    public function updateSaranaPrasarana(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama_prasarana' => 'required|string|max:255',
            'jenis_prasarana' => 'required|string|max:255',
            'deskripsi_prasarana' => 'required|string|max:500',
            'luas' => 'required|integer',
            'kapasitas' => 'required|integer',
            'tahun_dibangun' => 'required|date',
            'kondisi' => 'required|in:Baik,Perlu Perbaikan,Dalam Perbaikan',
            'status_prasarana' => 'required|in:Aktif,Tidak Aktif',
        ]);

        // Ambil data prasarana berdasarkan ID
        $prasarana = Prasarana::findOrFail($id);

        $prasarana->update([
            'nama_prasarana' => $request->nama_prasarana,
            'jenis_prasarana' => $request->jenis_prasarana,
            'deskripsi_prasarana' => $request->deskripsi_prasarana,
            'luas' => $request->luas,
            'kapasitas' => $request->kapasitas,
            'tahun_dibangun' => $request->tahun_dibangun,
            'kondisi' => $request->kondisi,
            'status_prasarana' => $request->status_prasarana,
        ]);
        return redirect()->route('admin.SaranaPrasarana.index')->with('success', 'Prasarana berhasil diperbarui!');
    }

    // Method untuk menghapus data prasarana
    public function destroySaranaPrasarana($id)
    {
        // Cari prasarana berdasarkan ID dan hapus
        $prasarana = Prasarana::findOrFail($id);
        $prasarana->delete();

        return redirect()->route('admin.SaranaPrasarana.index')->with('success', 'Prasarana berhasil dihapus!');
    }

    public function adminFotoPrasarana()
    {
        $prasaranas = Prasarana::with('foto_prasarana')->paginate(10);
        $fotoPrasaranas = FotoPrasarana::with('prasarana')->paginate(10);
        return view('admin.fotoPrasarana', [
            "title" => "Sarana & Prasarana",
            "foto_prasaranas" => $fotoPrasaranas,
            'prasaranas' => $prasaranas,
        ]);
    }

    public function storeFotoPrasarana(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_prasarana' => 'required|exists:prasarana,id_prasarana',
            'tautan_foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Menghandle unggahan gambar
        $request->file('tautan_foto')->store('image/fotoPrasarana', 'public');

        FotoPrasarana::create([
            'id_prasarana' => $request->id_prasarana,
            'tautan_foto' => $request->file('tautan_foto')->store('image/fotoPrasarana', 'public'),
        ]);

        return redirect()->route('admin.FotoPrasarana.index')->with('success', 'Foto prasarana berhasil ditambahkan!');
    }

    // Method untuk memperbarui foto prasarana
    public function updateFotoPrasarana(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'id_prasarana' => 'required|exists:prasarana,id_prasarana',
            'tautan_foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Ambil data foto prasarana berdasarkan ID
        $fotoPrasarana = FotoPrasarana::findOrFail($id);

        if ($request->hasFile('tautan_foto')) {
            // Menghandle unggahan gambar baru
            $request->file('tautan_foto')->store('image/fotoPrasarana', 'public');
            // Hapus gambar lama
            Storage::disk('public')->delete($fotoPrasarana->tautan_foto);

            $fotoPrasarana->update([
                'tautan_foto' => $request->file('tautan_foto')->store('image/fotoPrasarana', 'public'),
            ]);
        }

        $fotoPrasarana->update([
            'id_prasarana' => $request->id_prasarana,
        ]);

        return redirect()->route('admin.FotoPrasarana.index')->with('success', 'Foto prasarana berhasil diperbarui!');
    }

    // Method untuk menghapus foto prasarana
    public function destroyFotoPrasarana($id)
    {
        // Cari foto prasarana berdasarkan ID dan hapus
        $fotoPrasarana = FotoPrasarana::findOrFail($id);
        Storage::disk('public')->delete($fotoPrasarana->tautan_foto);
        $fotoPrasarana->delete();

        return redirect()->route('admin.FotoPrasarana.index')->with('success', 'Foto prasarana berhasil dihapus!');
    }
}