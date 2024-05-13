<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgramKeahlian;
use App\Models\DirektoriGuru;

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
            $format_file = $request->file('gambar_guru')->getClientOriginalName();
            $request->file('gambar_guru')->move(public_path('gambarGuru'), $format_file);
    
            DirektoriGuru::create([
                "id_program" => $request->id_program,
                "nama_guru" => $request->nama_guru,
                "nik_guru" => $request->nik_guru,
                "jabatan_guru" => $request->jabatan_guru,
                "TTL_guru" => $request->TTL_guru,
                "tempat_lahir_guru" =>$request->tempat_lahir_guru,
                "jenis_kelamin" => $request->jenis_kelamin,
                "no_hp_guru" => $request->no_hp_guru,
                "alamat_guru" => $request->alamat_guru,
                "gambar_guru" => 'gambarGuru/'.$format_file,
                "status_guru" => $request->status_guru,
                "email_guru" => $request->email_guru
            ]);
            return redirect()->route('admin.direktoriGuru.index');
    }

    public function updateDirektoriGuru(Request $request, $id_guru)
    {
    
        $guru = DirektoriGuru::findOrFail($id_guru);
    
        $validatedData = [
                "id_program" => $request->id_program,
                "nama_guru" => $request->nama_guru,
                "nik_guru" => $request->nik_guru,
                "jabatan_guru" => $request->jabatan_guru,
                "TTL_guru" => $request->TTL_guru,
                "tempat_lahir_guru" => $request->tempat_lahir_guru,
                "jenis_kelamin" => $request->jenis_kelamin,
                "no_hp_guru" => $request->no_hp_guru,
                "alamat_guru" => $request->alamat_guru,
                "status_guru" => $request->status_guru,
                "email_guru" => $request->email_guru
        ];

        if ($request->hasFile('gambar_guru')) {
            $format_file = $request->file('gambar_guru')->getClientOriginalName();
            $request->file('gambar_guru')->move(public_path('gambarGuru'), $format_file);
            $validatedData["gambar_guru"] = 'gambarGuru/' . $format_file;
        }
    
        $guru->update($validatedData);
    
        return redirect()->route('admin.direktoriGuru.index');
    }

        public function destroyDirektoriGuru($id_guru)
    {
        $guru = DirektoriGuru::findOrFail($id_guru);
        
        $guru->delete();
    
        return redirect()->route('admin.direktoriGuru.index');
    }
}