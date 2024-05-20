<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ekstrakulikuler;
use App\Models\GambarEkstarkurikuler;
use App\Models\DirektoriGuru;

class ekstrakulikulerController extends Controller
{
        public function adminEkstrakulikuler()
    {
        $ekstrakulikuler = Ekstrakulikuler::with("guru", "gambarEkstrakurikuler")->get();
        $direktoriGuru = DirektoriGuru::all();
        return view('admin/ekstrakulikuler', [
            "title" => "Admin Ekstrakulikuler",
            "ekstrakulikuler" => $ekstrakulikuler,
            "direktoriGuru"=> $direktoriGuru
        ]);
    }

public function storeEkstrakulikuler(Request $request)
    {
            $validate = $request->validate([
            'id_guru' => 'required',
            'nama_ekstrakurikuler' => 'required',
            'deskripsi_ekstrakurikuler' => 'required',
            'tempat_ekstrakurikuler' => 'required',
            'jadwal_ekstrakurikuler' => 'required',
            'gambar_profil_ekstrakurikuler' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'gambar_ekstrakurikuler.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $gambarProfil = $request->file('gambar_profil_ekstrakurikuler')->store('image/gambarEkskul', 'public');
        $validate['gambar_profil_ekstrakurikuler'] = $gambarProfil;
        $ekstrakurikuler = Ekstrakulikuler::create($validate);

        if ($request->hasFile('gambar_ekstrakurikuler')) {
            foreach ($request->file('gambar_ekstrakurikuler') as $image){
                GambarEkstarkurikuler::create([
                    'id_ekstrakurikuler' => $ekstrakurikuler->id_ekstrakurikuler,
                    'gambar_ekstrakurikuler' => $image->store('image/gambarEkskul', 'public'),
                ]);
            }
        }

        if($ekstrakurikuler){
            return redirect()->route('admin.ekstrakulikuler.index');
        } else {
            return redirect()->route('admin.ekstrakulikuler.index');
        }

    }
    public function updateEkstrakurikuler(Request $request, $id_ekstrakurikuler)
    {
    
        $ekskul = Ekstrakulikuler::findOrFail($id_ekstrakurikuler);
    
        $validate = $request->validate([
            'id_guru' => 'required',
            'nama_ekstrakurikuler' => 'required',
            'deskripsi_ekstrakurikuler' => 'required',
            'tempat_ekstrakurikuler' => 'required',
            'jadwal_ekstrakurikuler' => 'required',
            'gambar_profil_ekstrakurikuler' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('gambar_profil_ekstrakurikuler')) {
            $gambarPath = $request->file('gambar_profil_ekstrakurikuler')->store('image/gambarEkskul', 'public');
            $validate['gambar_profil_ekstrakurikuler'] = $gambarPath;
        }

        $status = $ekskul->fill($validate)->save();
        if($status){
            return redirect()->back();
        }
        else{
            return redirect()->back();
        }

    }

    public function destroyEkstrakulikuler($id_ekstrakurikuler)
    {
        $ekskul = Ekstrakulikuler::findOrFail($id_ekstrakurikuler);
        
        $ekskul->delete();
    
        return redirect()->route('admin.ekstrakulikuler.index');
    }

    public function updateGambarEkstrakurikuler(Request $request, $id_ekstrakurikuler) {
        $request->validate([
            'gambar_ekstrakurikuler' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        $ekskul = Ekstrakulikuler::findOrFail($id_ekstrakurikuler);
        $image = $request->file('gambar_ekstrakurikuler');
    
        $status = GambarEkstarkurikuler::create([
            'id_ekstrakurikuler' => $ekskul->id_ekstrakurikuler,
            'gambar_ekstrakurikuler' => $image->store('image/gambarEkskul', 'public'),
        ]);
        if($status){
            return redirect()->back();
        }
        else{
            return redirect()->back();
        }
    }

    public function destroyGambarEkstrakurikuler($id_gambar_ekstrakurikuler){
        $data = GambarEkstarkurikuler::findOrFail($id_gambar_ekstrakurikuler);
        $status = $data->delete();
        if($status){
            return redirect()->back();
        }
        else{
            return redirect()->back();
        }
    }
}