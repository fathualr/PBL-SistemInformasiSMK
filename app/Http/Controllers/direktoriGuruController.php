<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgramKeahlian;
use App\Models\DirektoriGuru;
use Illuminate\Support\Facades\Storage;

class direktoriGuruController extends Controller
{
    public function adminDirektoriGuru()
    {
        $direktoriGuru = DirektoriGuru::all();
        $programKeahlian = ProgramKeahlian::all();
        return view('admin/guru', [
            "title" => "Admin Guru",
            "direktoriGuru" => $direktoriGuru,
            "programKeahlian" => $programKeahlian,
        ]);
    }

    public function storeDirektoriGuru(Request $request)
    {
        $validate = $request->validate([
            'id_program' => 'nullable',
            'nama_guru' => 'required',
            'nik_guru' => 'required',
            'jabatan_guru' => 'required',
            'TTL_guru' => 'required',
            'tempat_lahir_guru' => 'required',
            'jenis_kelamin' => 'required',
            'no_hp_guru' => 'required',
            'alamat_guru' => 'required',
            'gambar_guru' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status_guru' => 'required',
            'email_guru' => 'required'
        ]);

        $gambarGuru = $request->file('gambar_guru')->store('image/gambarGuru', 'public');
        $validate['gambar_guru'] = $gambarGuru;
        $direktoriGuru = DirektoriGuru::create($validate);

        if ($direktoriGuru) {
            return redirect()->route('admin.direktoriGuru.index');
        } else {
            return redirect()->route('admin.direktoriGuru.index');
        }
    }

    public function updateDirektoriGuru(Request $request, $id_guru)
    {

        $guru = DirektoriGuru::findOrFail($id_guru);

        $validate = $request->validate([
            'id_program' => 'nullable',
            'nama_guru' => 'required',
            'nik_guru' => 'required',
            'jabatan_guru' => 'required',
            'TTL_guru' => 'required',
            'tempat_lahir_guru' => 'required',
            'jenis_kelamin' => 'required',
            'no_hp_guru' => 'required',
            'alamat_guru' => 'required',
            'gambar_guru' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status_guru' => 'required',
            'email_guru' => 'required'
        ]);

        if ($request->hasFile('gambar_guru')) {
            $gambarPath = $request->file('gambar_guru')->store('image/gambarGuru', 'public');
            if ($guru->gambar_guru) {
                Storage::disk('public')->delete($guru->gambar_guru);
            }
            $validate['gambar_guru'] = $gambarPath;
        }

        $status = $guru->fill($validate)->save();
        if ($status) {
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

    public function destroyDirektoriGuru($id_guru)
    {
        $guru = DirektoriGuru::findOrFail($id_guru);

        $guru->delete();

        return redirect()->route('admin.direktoriGuru.index');
    }
}
