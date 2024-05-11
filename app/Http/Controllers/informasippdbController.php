<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InformasiPPDB;
use App\Models\AlurPPDB;

class informasippdbController extends Controller
{

    public function adminInformasiPPDB()
    {
        $informasi = InformasiPPDB::all();
        $alurs = AlurPPDB::all();
        
        return view('admin.informasiPPDB', [
            "title" => "Admin Informasi PPDB",
            "informasi" => $informasi,
            "alurs" => $alurs,
        ]);
    }

    public function storeInformasiPPDB(Request $request)
    {
        $request->validate([
            'deskripsi_ppdb' => 'required',
        ]);

        InformasiPPDB::create([
            'deskripsi_ppdb' => $request->deskripsi_ppdb,
        ]);
        return redirect()->route('admin.informasiPPDB.index')->with('success', 'Informasi PPDB berhasil ditambahkan');
    }

    public function updateInformasiPPDB(Request $request, $id)
    {
        $request->validate([
            'deskripsi_ppdb' => 'required',
        ]);

        $informasi_ppdb = InformasiPPDB::findOrFail($id);

        $informasi_ppdb->update([
            'deskripsi_ppdb' => $request->deskripsi_ppdb,
        ]);
        return redirect()->route('admin.informasiPPDB.index')->with('success', 'Informasi PPDB berhasil diupdate');
    }

    public function destroyInformasiPPDB($id)
    {
        // Temukan album yang akan dihapus
        $informasi_ppdb = InformasiPPDB::findOrFail($id);

        $informasi_ppdb->delete();

        return redirect()->route('admin.informasiPPDB.index')->with('success', 'Informasi PPDB berhasil dihapus.');
    }


    //ALUR PPDB
    
    public function storeAlurPPDB(Request $request)
    {
        $request->validate([
            'judul_alur' => 'required',
            'tanggal_alur' => 'required|date',
            'deskripsi_alur' => 'required',
        ]);

        AlurPPDB::create([
            'judul_alur' => $request->judul_alur,
            'tanggal_alur' => $request->tanggal_alur,
            'deskripsi_alur' => $request->deskripsi_alur,
        ]);

        return redirect()->route('admin.informasiPPDB.index')->with('success', 'Alur PPDB berhasil ditambahkan');
    }

    public function updateAlurPPDB(Request $request, $id)
    {
        $request->validate([
            'judul_alur' => 'required',
            'tanggal_alur' => 'required|date',
            'deskripsi_alur' => 'required',
        ]);

        $alur_ppdb = AlurPPDB::findOrFail($id);

        $alur_ppdb->update([
            'judul_alur' => $request->judul_alur,
            'tanggal_alur' => $request->tanggal_alur,
            'deskripsi_alur' => $request->deskripsi_alur,
        ]);

        return redirect()->route('admin.informasiPPDB.index')->with('success', 'Alur PPDB berhasil diupdate');
    }

    public function destroyAlurPPDB($id)
    {
        $alur_ppdb = AlurPPDB::findOrFail($id);

        $alur_ppdb->delete();

        return redirect()->route('admin.informasiPPDB.index')->with('success', 'Alur PPDB berhasil dihapus.');
    }
}
