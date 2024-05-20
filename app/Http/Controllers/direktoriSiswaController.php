<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DirektoriSiswa;
use App\Models\ProgramKeahlian;

class direktoriSiswaController extends Controller
{
    public function adminSiswa()
    {
        $direktoriSiswa = DirektoriSiswa::all();
        $programKeahlian = ProgramKeahlian::all();

        return view('admin/siswa', [
            "title" => "Admin Siswa",
            "direktoriSiswa"=> $direktoriSiswa,
            "programKeahlian"=> $programKeahlian
        ]);
    }

public function storeDirektoriSiswa(Request $request)
    {
            $format_file = $request->file('gambar_siswa')->getClientOriginalName();
            $request->file('gambar_siswa')->move(public_path('gambarSiswa'), $format_file);
    
            DirektoriSiswa::create([
                "id_program" => $request->id_program,
                "nama_siswa" => $request->nama_siswa,
                "nisn_siswa" => $request->nisn_siswa,
                "jenis_kelamin_siswa" => $request->jenis_kelamin_siswa,
                "no_hp_siswa" => $request->no_hp_siswa,
                "TTL_siswa" =>$request->TTL_siswa,
                "tempat_lahir_siswa" => $request->tempat_lahir_siswa,
                "alamat_siswa" => $request->alamat_siswa,
                "kelas_siswa" => $request->kelas_siswa,
                "tahun_angkatan_siswa" => $request->tahun_angkatan_siswa,
                "gambar_siswa" => 'gambarSiswa/'.$format_file
            ]);
            return redirect()->route('admin.direktoriSiswa.index');
    }

        public function updateDirektoriSiswa(Request $request, $id_siswa)
    {
    
        $siswa = DirektoriSiswa::findOrFail($id_siswa);
    
        $validatedData = [
                "id_program" => $request->id_program,
                "nama_siswa" => $request->nama_siswa,
                "nisn_siswa" => $request->nisn_siswa,
                "jenis_kelamin_siswa" => $request->jenis_kelamin_siswa,
                "no_hp_siswa" => $request->no_hp_siswa,
                "TTL_siswa" =>$request->TTL_siswa,
                "tempat_lahir_siswa" => $request->tempat_lahir_siswa,
                "alamat_siswa" => $request->alamat_siswa,
                "kelas_siswa" => $request->kelas_siswa,
                "tahun_angkatan_siswa" => $request->tahun_angkatan_siswa
        ];

        if ($request->hasFile('gambar_siswa')) {
            $format_file = $request->file('gambar_siswa')->getClientOriginalName();
            $request->file('gambar_siswa')->move(public_path('gambarSiswa'), $format_file);
            $validatedData["gambar_siswa"] = 'gambarSiswa/' . $format_file;
        }
    
        $siswa->update($validatedData);
    
        return redirect()->route('admin.direktoriSiswa.index');
    }

    public function destroyDirektoriSiswa($id_siswa)
    {
        $siswa = DirektoriSiswa::findOrFail($id_siswa);
        
        $siswa->delete();
    
        return redirect()->route('admin.direktoriSiswa.index');
    }
}