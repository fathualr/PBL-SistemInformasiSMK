<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DirektoriAlumni;
use Illuminate\Support\Facades\Storage;

class direktoriAlumniController extends Controller
{
    public function adminAlumni()
    {
        $direktoriAlumni = DirektoriAlumni::all();
        return view('admin/alumni', [
            "title" => "Admin Alumni",
            "direktoriAlumni" => $direktoriAlumni
        ]);
    }

    public function storeDirektoriAlumni(Request $request)
    {

        $validate = $request->validate([
            'nama_alumni' => 'required',
            'no_hp_alumni' => 'required',
            'email_alumni' => 'required',
            'jenis_kelamin' => 'required',
            'TTL_alumni' => 'required',
            'tempat_lahir_alumni' => 'required',
            'tahun_kelulusan_alumni' => 'required',
            'gambar_alumni' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'alamat_alumni' => 'required'
        ]);

        $gambarAlumni = $request->file('gambar_alumni')->store('image/gambarAlumni', 'public');
        $validate['gambar_alumni'] = $gambarAlumni;
        $direktoriAlumni = DirektoriAlumni::create($validate);

        if ($direktoriAlumni) {
            return redirect()->route('admin.direktoriAlumni.index');
        } else {
            return redirect()->route('admin.direktoriAlumni.index');
        }
    }

    public function updateDirektoriAlumni(Request $request, $id_alumni)
    {

        $alumni = DirektoriAlumni::findOrFail($id_alumni);

        $validate = $request->validate([
            'nama_alumni' => 'required',
            'no_hp_alumni' => 'required',
            'email_alumni' => 'required',
            'jenis_kelamin' => 'required',
            'TTL_alumni' => 'required',
            'tempat_lahir_alumni' => 'required',
            'tahun_kelulusan_alumni' => 'required',
            'gambar_alumni' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'alamat_alumni' => 'required'
        ]);

        if ($request->hasFile('gambar_alumni')) {
            $gambarPath = $request->file('gambar_alumni')->store('image/gambarAlumni', 'public');
            if ($alumni->gambar_alumni) {
                Storage::disk('public')->delete($alumni->gambar_alumni);
            }
            $validate['gambar_alumni'] = $gambarPath;
        }

        $status = $alumni->fill($validate)->save();
        if ($status) {
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

    public function destroyDirektoriAlumni($id_alumni)
    {
        $alumni = DirektoriAlumni::findOrFail($id_alumni);

        $alumni->delete();

        return redirect()->route('admin.direktoriAlumni.index');
    }
}
