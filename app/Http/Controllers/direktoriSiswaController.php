<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DirektoriSiswa;
use App\Models\ProgramKeahlian;
use Illuminate\Support\Facades\Storage;

class direktoriSiswaController extends Controller
{
    public function adminSiswa()
    {
        $direktoriSiswa = DirektoriSiswa::all();
        $programKeahlian = ProgramKeahlian::all();

        return view('admin/siswa', [
            "title" => "Admin Siswa",
            "direktoriSiswa" => $direktoriSiswa,
            "programKeahlian" => $programKeahlian
        ]);
    }

    public function storeDirektoriSiswa(Request $request)
    {

        $validate = $request->validate([
            'id_program' => 'nullable',
            'nama_siswa' => 'required',
            'nisn_siswa' => 'required',
            'jenis_kelamin' => 'required',
            'no_hp_siswa' => 'required',
            'TTL_siswa' => 'required',
            'tempat_lahir_siswa' => 'required',
            'alamat_siswa' => 'required',
            'kelas_siswa' => 'required',
            'tahun_angkatan_siswa' => 'required',
            'gambar_siswa' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $gambarSiswa = $request->file('gambar_siswa')->store('image/gambarSiswa', 'public');
        $validate['gambar_siswa'] = $gambarSiswa;
        $direktoriSiswa = DirektoriSiswa::create($validate);

        if ($direktoriSiswa) {
            return redirect()->route('admin.direktoriSiswa.index');
        } else {
            return redirect()->route('admin.direktoriSiswa.index');
        }
    }

    public function updateDirektoriSiswa(Request $request, $id_siswa)
    {

        $siswa = DirektoriSiswa::findOrFail($id_siswa);

        $validate = $request->validate([
            'id_program' => 'nullable',
            'nama_siswa' => 'required',
            'nisn_siswa' => 'required',
            'jenis_kelamin' => 'required',
            'no_hp_siswa' => 'required',
            'TTL_siswa' => 'required',
            'tempat_lahir_siswa' => 'required',
            'alamat_siswa' => 'required',
            'kelas_siswa' => 'required',
            'tahun_angkatan_siswa' => 'required',
            'gambar_siswa' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('gambar_siswa')) {
            $gambarPath = $request->file('gambar_siswa')->store('image/gambarSiswa', 'public');
            if ($siswa->gambar_siswa) {
                Storage::disk('public')->delete($siswa->gambar_siswa);
            }
            $validate['gambar_siswa'] = $gambarPath;
        }

        $status = $siswa->fill($validate)->save();
        if ($status) {
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

    public function destroyDirektoriSiswa($id_siswa)
    {
        $siswa = DirektoriSiswa::findOrFail($id_siswa);

        $siswa->delete();

        return redirect()->route('admin.direktoriSiswa.index');
    }
}