<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InformasiPPDB;
use App\Models\AlurPPDB;
use App\Models\CountdownSetting;

class InformasiPPDBController extends Controller
{

    public function __construct()
    {
        if(InformasiPPDB::count() === 0){
            $informasi = new InformasiPPDB;
            $informasi->save();
        }
    }
   // Fungsi untuk menampilkan halaman admin informasi PPDB
    public function adminInformasiPPDB()
    {
        $informasi = InformasiPPDB::first();
        $alurs = AlurPPDB::all();
        $countdownStart = CountdownSetting::where('key', 'countdown_start')->value('value');
        $countdownEnd = CountdownSetting::where('key', 'countdown_end')->value('value');

        return view('admin.informasiPPDB', [
            "title" => "Admin Informasi PPDB",
            "informasi" => $informasi,
            "alurs" => $alurs,
            "countdownStart" => $countdownStart,
            "countdownEnd" => $countdownEnd,
        ]);
    }

    // Fungsi untuk mengatur countdown
    public function updateCountdown(Request $request)
    {
        $request->validate([
            'countdown_start' => 'required|date',
            'countdown_end' => 'required|date|after:countdown_start',
        ]);

        // Update pengaturan countdown yang ada jika sudah ada
        CountdownSetting::updateOrCreate(
            ['key' => 'countdown_start'],
            ['value' => $request->countdown_start]
        );

        CountdownSetting::updateOrCreate(
            ['key' => 'countdown_end'],
            ['value' => $request->countdown_end]
        );

        return redirect()->back()->with('success', 'Pengaturan countdown berhasil diperbarui');
    }

    // Fungsi untuk menghapus pengaturan countdown
    public function destroyCountdown()
    {
        // Menghapus pengaturan countdown
        CountdownSetting::where('key', 'countdown_start')->delete();
        CountdownSetting::where('key', 'countdown_end')->delete();

        return redirect()->back()->with('success', 'Pengaturan countdown berhasil dihapus');
    }

    public function updateInformasiPPDB(Request $request, $id, $field)
    {
        $informasi = InformasiPPDB::findOrFail($id);

        $validateRules=[
            'deskripsi_ppdb' => 'required',
            'deskripsi_pengumuman' => 'required',
        ] ;

        $validate = $request->validate([
            $field => $validateRules[$field],
        ]);

        $informasi->fill($validate)->save();

        return redirect()->route('admin.informasiPPDB.index')->with('success', 'Informasi PPDB berhasil diupdate');
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
