<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DirektoriPegawai;
use Illuminate\Support\Facades\Storage;

class direktoriPegawaiController extends Controller
{
    public function adminStaff()
    {
        $direktoriPegawai = DirektoriPegawai::all();
        return view('admin/staff', [
            "title" => "Admin Staff",
            "direktoriPegawai" => $direktoriPegawai
        ]);
    }

    public function storeDirektoriPegawai(Request $request)
    {

        $validate = $request->validate([
            'nama_pegawai' => 'nullable',
            'nik_pegawai' => 'required',
            'jabatan_pegawai' => 'required',
            'TTL_pegawai' => 'required',
            'tempat_lahir_pegawai' => 'required',
            'jenis_kelamin' => 'required',
            'no_hp_pegawai' => 'required',
            'alamat_pegawai' => 'required',
            'gambar_pegawai' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status_pegawai' => 'required',
            'email_pegawai' => 'required'
        ]);

        $gambarPegawai = $request->file('gambar_pegawai')->store('image/gambarPegawai', 'public');
        $validate['gambar_pegawai'] = $gambarPegawai;
        $direktoriPegawai = DirektoriPegawai::create($validate);

        if ($direktoriPegawai) {
            return redirect()->route('admin.direktoriPegawai.index');
        } else {
            return redirect()->route('admin.direktoriPegawai.index');
        }
    }

    public function updateDirektoriPegawai(Request $request, $id_pegawai)
    {

        $staff = DirektoriPegawai::findOrFail($id_pegawai);

        $validate = $request->validate([
            'nama_pegawai' => 'nullable',
            'nik_pegawai' => 'required',
            'jabatan_pegawai' => 'required',
            'TTL_pegawai' => 'required',
            'tempat_lahir_pegawai' => 'required',
            'jenis_kelamin' => 'required',
            'no_hp_pegawai' => 'required',
            'alamat_pegawai' => 'required',
            'gambar_pegawai' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status_pegawai' => 'required',
            'email_pegawai' => 'required'
        ]);

        if ($request->hasFile('gambar_pegawai')) {
            $gambarPath = $request->file('gambar_pegawai')->store('image/gambarPegawai', 'public');
            if ($staff->gambar_pegawai) {
                Storage::disk('public')->delete($staff->gambar_pegawai);
            }
            $validate['gambar_pegawai'] = $gambarPath;
        }

        $status = $staff->fill($validate)->save();
        if ($status) {
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

    public function destroyDirektoriPegawai($id_pegawai)
    {
        $staff = DirektoriPegawai::findOrFail($id_pegawai);

        $staff->delete();

        return redirect()->route('admin.direktoriPegawai.index');
    }
}
