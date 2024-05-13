<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ekstrakulikuler;
use App\Models\DirektoriGuru;

class ekstrakulikulerController extends Controller
{
        public function adminEkstrakulikuler()
    {
        $ekstrakulikuler = Ekstrakulikuler::all();
        $direktoriGuru = DirektoriGuru::all();
        return view('admin/ekstrakulikuler', [
            "title" => "Admin Ekstrakulikuler",
            "ekstrakulikuler" => $ekstrakulikuler,
            "direktoriGuru" => $direktoriGuru
        ]);
    }

    public function storeEkstrakulikuler(Request $request)
    {
            $format_file = $request->file('gambar_profil_ekstrakurikuler')->getClientOriginalName();
            $request->file('gambar_profil_ekstrakurikuler')->move(public_path('gambarEkskul'), $format_file);
    
            Ekstrakulikuler::create([
                "id_guru" => $request->id_guru,
                "nama_ekstrakurikuler" => $request->nama_ekstrakurikuler,
                "deskripsi_ekstrakurikuler" => $request->deskripsi_ekstrakurikuler,
                "tempat_ekstrakurikuler" => $request->tempat_ekstrakurikuler,
                "jadwal_ekstrakurikuler" => $request->jadwal_ekstrakurikuler,
                "gambar_profil_ekstrakurikuler" => 'gambarEkskul/'.$format_file
            ]);
            return redirect()->route('admin.ekstrakulikuler.index');
    }

    public function updateEkstrakulikuler(Request $request, $id_ekstrakurikuler)
    {
    
        $ekskul = Ekstrakulikuler::findOrFail($id_ekstrakurikuler);
    
        $validatedData = [
                "id_guru" => $request->id_guru,
                "nama_ekstrakurikuler" => $request->nama_ekstrakurikuler,
                "deskripsi_ekstrakurikuler" => $request->deskripsi_ekstrakurikuler,
                "tempat_ekstrakurikuler" => $request->tempat_ekstrakurikuler,
                "jadwal_ekstrakurikuler" => $request->jadwal_ekstrakurikuler
        ];

        if ($request->hasFile('gambar_profil_ekstrakurikuler')) {
            $format_file = $request->file('gambar_profil_ekstrakurikuler')->getClientOriginalName();
            $request->file('gambar_profil_ekstrakurikuler')->move(public_path('gambarEkskul'), $format_file);
            $validatedData["gambar_profil_ekstrakurikuler"] = 'gambarEkskul/' . $format_file;
        }
    
        $ekskul->update($validatedData);
    
        return redirect()->route('admin.ekstrakulikuler.index');
    }

    public function destroyEkstrakulikuler($id_ekstrakurikuler)
    {
        $ekskul = Ekstrakulikuler::findOrFail($id_ekstrakurikuler);
        
        $ekskul->delete();
    
        return redirect()->route('admin.ekstrakulikuler.index');
    }
}