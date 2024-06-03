<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ekstrakulikuler;
use App\Models\GambarEkstrakurikuler;
use App\Models\DirektoriGuru;
use Illuminate\Support\Facades\Storage;

class ekstrakulikulerController extends Controller
{
    public function ekstrakulikuler()
    {
        $ekstrakulikuler = Ekstrakulikuler::with("guru", "gambar")->get();
        return view('guest/ekstrakulikuler', [
            "title" => "Ekstrakulikuler",
            "ekstrakulikuler" => $ekstrakulikuler
        ]);
    }

    public function ekstrakulikulerTemplate($id_ekstrakurikuler)
    {
        $ekstrakulikuler = Ekstrakulikuler::with("guru", "gambar")->findOrFail($id_ekstrakurikuler);
        return view('guest/ekstrakulikuler-template', [
            "title" => "Ekstrakulikuler",
            "ekstrakulikuler" => $ekstrakulikuler
        ]);
    }

    // Perbaiki ^^^
    public function adminEkstrakulikuler()
    {
        $ekstrakulikuler = Ekstrakulikuler::with("guru", "gambar")->paginate(10);
        $gurus = DirektoriGuru::all();
        return view('admin/ekstrakulikuler', [
            "title" => "Admin Ekstrakulikuler",
            "ekstrakulikuler" => $ekstrakulikuler,
            "gurus" => $gurus
        ]);
    }

    public function storeEkstrakulikuler(Request $request)
    {
        $validate = $request->validate([
            'id_guru' => 'nullable|exists:direktori_guru,id_guru',
            'nama_ekstrakurikuler' => 'required|string|max:255',
            'deskripsi_ekstrakurikuler' => 'required|string',
            'tempat_ekstrakurikuler' => 'required|string|max:255',
            'jadwal_ekstrakurikuler' => 'required|string|max:255',
            'gambar_profil_ekstrakurikuler' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'gambar_ekstrakurikuler.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $path = $request->file('gambar_profil_ekstrakurikuler')->store('image/EkstrakurikulerHeadline', 'public');
        $validate['gambar_profil_ekstrakurikuler'] = $path;

        $ekstrakurikuler = Ekstrakulikuler::create($validate);

        if ($request->hasFile('gambar_ekstrakurikuler')) {
            foreach ($request->file('gambar_ekstrakurikuler') as $image) {
                GambarEkstrakurikuler::create([
                    'id_ekstrakurikuler' => $ekstrakurikuler->id_ekstrakurikuler,
                    'gambar_ekstrakurikuler' => $image->store('image/Ekstrakurikuler', 'public'),
                ]);
            }
        }

        if ($ekstrakurikuler) {
            return redirect()->back()->with('success', 'Ekstrakurikuler berhasil ditambahkan!');
        } else {
            return redirect()->back()->with('error', 'Ekstrakurikuler gagal ditambahkan!');
        }
    }

    public function updateEkstrakulikuler(Request $request, $id_ekstrakurikuler)
    {
        $ekstrakurikuler = Ekstrakulikuler::findOrFail($id_ekstrakurikuler);

        $validate = $request->validate([
            'id_guru' => 'nullable|exists:direktori_guru,id_guru',
            'nama_ekstrakurikuler' => 'required|string|max:255',
            'deskripsi_ekstrakurikuler' => 'required|string',
            'tempat_ekstrakurikuler' => 'required|string|max:255',
            'jadwal_ekstrakurikuler' => 'required|string|max:255',
            'gambar_profil_ekstrakurikuler' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'gambar_ekstrakurikuler.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('gambar_profil_ekstrakurikuler')) {
            if ($ekstrakurikuler->gambar_profil_ekstrakurikuler) {
                Storage::disk('public')->delete($ekstrakurikuler->gambar_profil_ekstrakurikuler);
            }
            $path = $request->file('gambar_profil_ekstrakurikuler')->store('image/EkstrakurikulerHeadline', 'public');
            $validate['gambar_profil_ekstrakurikuler'] = $path;
        }

        $status = $ekstrakurikuler->update($validate);
        if ($status) {
            return redirect()->back()->with('success', 'Ekstrakurikuler berhasil diperbarui!');
        } else {
            return redirect()->back()->with('error', 'Ekstrakurikuler gagal diperbarui!');
        }
    }

    public function destroyEkstrakulikuler($id_ekstrakurikuler)
    {
        $ekstrakurikuler = Ekstrakulikuler::findOrFail($id_ekstrakurikuler);

        if ($ekstrakurikuler->gambar_profil_ekstrakurikuler) {
            Storage::disk('public')->delete($ekstrakurikuler->gambar_profil_ekstrakurikuler);
        }

        foreach ($ekstrakurikuler->gambar as $gambar) {
            Storage::disk('public')->delete($gambar->gambar_ekstrakurikuler);
            $gambar->delete();
        }

        $status = $ekstrakurikuler->delete();
        if ($status) {
            return redirect()->back()->with('success', 'Ekstrakurikuler berhasil dihapus!');
        } else {
            return redirect()->back()->with('error', 'Ekstrakurikuler gagal dihapus!');
        }
    }

    public function updateGambarEkstrakurikuler(Request $request, $id_ekstrakurikuler)
    {
        $ekstrakurikuler = Ekstrakulikuler::findOrFail($id_ekstrakurikuler);

        $request->validate([
            'gambar_ekstrakurikuler' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $image = $request->file('gambar_ekstrakurikuler');
        $status = GambarEkstrakurikuler::create([
            'id_ekstrakurikuler' => $ekstrakurikuler->id_ekstrakurikuler,
            'gambar_ekstrakurikuler' => $image->store('image/Ekstrakurikuler', 'public'),
        ]);
        if ($status) {
            return redirect()->back()->with('success', 'Gambar ekstrakurikuler berhasil ditambahkan!');
        } else {
            return redirect()->back()->with('error', 'Gambar ekstrakurikuler gagal ditambahkan!');
        }
    }

    public function destroyGambarEkstrakurikuler($id_gambar_ekstrakurikuler)
    {
        $gambarEkstrakurikuler = GambarEkstrakurikuler::findOrFail($id_gambar_ekstrakurikuler);

        if ($gambarEkstrakurikuler->gambar_ekstrakurikuler) {
            Storage::disk('public')->delete($gambarEkstrakurikuler->gambar_ekstrakurikuler);
        }

        $status = $gambarEkstrakurikuler->delete();
        if ($status) {
            return redirect()->back()->with('success', 'Gambar ekstrakurikuler berhasil dihapus!');
        } else {
            return redirect()->back()->with('error', 'Gambar ekstrakurikuler gagal dihapus!');
        }
    }
}
