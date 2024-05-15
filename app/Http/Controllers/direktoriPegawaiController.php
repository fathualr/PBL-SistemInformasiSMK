<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DirektoriPegawai;

class direktoriPegawaiController extends Controller
{
        public function adminStaff()
    {
        $direktoriPegawai = DirektoriPegawai::all();
        return view('admin/staff', [
            "title" => "Admin Staff",
            "direktoriPegawai"=> $direktoriPegawai
        ]);
    }

    public function storeDirektoriPegawai(Request $request)
    {
            $format_file = $request->file('gambar_pegawai')->getClientOriginalName();
            $request->file('gambar_pegawai')->move(public_path('gambarPegawai'), $format_file);
    
            DirektoriPegawai::create([
                "nama_pegawai" => $request->nama_pegawai,
                "nik_pegawai" => $request->nik_pegawai,
                "jabatan_pegawai" => $request->jabatan_pegawai,
                "TTL_pegawai" => $request->TTL_pegawai,
                "tempat_lahir_pegawai" =>$request->tempat_lahir_pegawai,
                "jenis_kelamin" => $request->jenis_kelamin,
                "no_hp_pegawai" => $request->no_hp_pegawai,
                "alamat_pegawai" => $request->alamat_pegawai,
                "gambar_pegawai" => 'gambarPegawai/'.$format_file,
                "status_pegawai" => $request->status_pegawai,
                "email_pegawai" => $request->email_pegawai
            ]);
            return redirect()->route('admin.direktoriPegawai.index');
    }

    public function updateDirektoriPegawai(Request $request, $id_pegawai)
    {
    
        $staff = DirektoriPegawai::findOrFail($id_pegawai);
    
        $validatedData = [
                "nama_pegawai" => $request->nama_pegawai,
                "nik_pegawai" => $request->nik_pegawai,
                "jabatan_pegawai" => $request->jabatan_pegawai,
                "TTL_pegawai" => $request->TTL_pegawai,
                "tempat_lahir_pegawai" =>$request->tempat_lahir_pegawai,
                "jenis_kelamin" => $request->jenis_kelamin,
                "no_hp_pegawai" => $request->no_hp_pegawai,
                "alamat_pegawai" => $request->alamat_pegawai,
                "status_pegawai" => $request->status_pegawai,
                "email_pegawai" => $request->email_pegawai
        ];

        if ($request->hasFile('gambar_pegawai')) {
            $format_file = $request->file('gambar_pegawai')->getClientOriginalName();
            $request->file('gambar_pegawai')->move(public_path('gambarPegawai'), $format_file);
            $validatedData["gambar_pegawai"] = 'gambarPegawai/' . $format_file;
        }
    
        $staff->update($validatedData);
    
        return redirect()->route('admin.direktoriPegawai.index');
    }

    public function destroyDirektoriPegawai($id_pegawai)
    {
        $staff = DirektoriPegawai::findOrFail($id_pegawai);
        
        $staff->delete();
    
        return redirect()->route('admin.direktoriPegawai.index');
    }
}