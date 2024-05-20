<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DirektoriAlumni;

class direktoriAlumniController extends Controller
{
    public function adminAlumni()
    {
        $direktoriAlumni = DirektoriAlumni::all();
        return view('admin/alumni', [
            "title" => "Admin Alumni",
            "direktoriAlumni"=> $direktoriAlumni
        ]);
    }

        public function storeDirektoriAlumni(Request $request)
    {
            $format_file = $request->file('gambar_alumni')->getClientOriginalName();
            $request->file('gambar_alumni')->move(public_path('gambarAlumni'), $format_file);
    
            DirektoriAlumni::create([
                "nama_alumni" => $request->nama_alumni,
                "no_hp_alumni" => $request->no_hp_alumni,
                "email_alumni" => $request->email_alumni,
                "jenis_kelamin_alumni" => $request->jenis_kelamin_alumni,
                "TTL_alumni" =>$request->TTL_alumni,
                "tempat_lahir_alumni" => $request->tempat_lahir_alumni,
                "tahun_kelulusan_alumni" => $request->tahun_kelulusan_alumni,
                "gambar_alumni" => 'gambarAlumni/'.$format_file,
                "alamat_alumni" => $request->alamat_alumni
            ]);
            return redirect()->route('admin.direktoriAlumni.index');
    }

     public function updateDirektoriAlumni(Request $request, $id_alumni)
    {
    
        $alumni = DirektoriAlumni::findOrFail($id_alumni);
    
        $validatedData = [
                "nama_alumni" => $request->nama_alumni,
                "no_hp_alumni" => $request->no_hp_alumni,
                "email_alumni" => $request->email_alumni,
                "jenis_kelamin_alumni" => $request->jenis_kelamin_alumni,
                "TTL_alumni" =>$request->TTL_alumni,
                "tempat_lahir_alumni" => $request->tempat_lahir_alumni,
                "tahun_kelulusan_alumni" => $request->tahun_kelulusan_alumni,
                "alamat_alumni" => $request->alamat_alumni
        ];

        if ($request->hasFile('gambar_alumni')) {
            $format_file = $request->file('gambar_alumni')->getClientOriginalName();
            $request->file('gambar_alumni')->move(public_path('gambarAlumni'), $format_file);
            $validatedData["gambar_alumni"] = 'gambarAlumni/' . $format_file;
        }
    
        $alumni->update($validatedData);
    
        return redirect()->route('admin.direktoriAlumni.index');
    }

        public function destroyDirektoriAlumni($id_alumni)
    {
        $alumni = DirektoriAlumni::findOrFail($id_alumni);
        
        $alumni->delete();
    
        return redirect()->route('admin.direktoriAlumni.index');
    }
}