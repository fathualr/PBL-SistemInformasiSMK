<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\FormPPDB;
use Illuminate\Support\Facades\Validator;

class ApiFormController extends Controller
{
    public function index()
    {
        $forms = FormPPDB::orderBy('id_pendaftaran', 'desc')->get();

        return response()->json([
            'status' => true,
            'message' => 'Data ditemukan',
            'data' => $forms
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'required|string|max:255',
            'jenis_kelamin' => 'required',
            'nisn' => 'required|string|max:255',
            'agama' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'no_hp' => 'required|string|max:255',
            'tahun_pendaftaran' => 'required|string|max:255',
            'nama_sekolah_asal' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_rt' => 'required|string|max:255',
            'no_rw' => 'required|string|max:255',
            'kelurahan' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'kota' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'kode_pos' => 'required|string|max:255',
            'nama_wali' => 'required|string|max:255',
            'agama_wali' => 'required|string|max:255',
            'alamat_wali' => 'required|string',
            'no_hp_wali' => 'required|string|max:255',
            'tempat_lahir_wali' => 'required|string|max:255',
            'tanggal_lahir_wali' => 'required|date',
            'pekerjaan_wali' => 'required|string|max:255',
            'penghasilan_wali' => 'required|string|max:255',
            'tautan_dokumen' => 'required|file|mimes:pdf|max:10240',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            $path = $request->file('tautan_dokumen')->store('pdfs', 'public');

            $ppdb = FormPPDB::create([
                'nama_lengkap' => $request->nama_lengkap,
                'jenis_kelamin' => $request->jenis_kelamin,
                'nisn' => $request->nisn,
                'agama' => $request->agama,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'no_hp' => $request->no_hp,
                'pilihan_1' => $request->pilihan_1,
                'pilihan_2' => $request->pilihan_2,
                'tahun_pendaftaran' => $request->tahun_pendaftaran,
                'nama_sekolah_asal' => $request->nama_sekolah_asal,
                'alamat' => $request->alamat,
                'no_rt' => $request->no_rt,
                'no_rw' => $request->no_rw,
                'kelurahan' => $request->kelurahan,
                'kecamatan' => $request->kecamatan,
                'kota' => $request->kota,
                'provinsi' => $request->provinsi,
                'kode_pos' => $request->kode_pos,
                'nama_wali' => $request->nama_wali,
                'agama_wali' => $request->agama_wali,
                'alamat_wali' => $request->alamat_wali,
                'no_hp_wali' => $request->no_hp_wali,
                'tempat_lahir_wali' => $request->tempat_lahir_wali,
                'tanggal_lahir_wali' => $request->tanggal_lahir_wali,
                'pekerjaan_wali' => $request->pekerjaan_wali,
                'penghasilan_wali' => $request->penghasilan_wali,
                'tautan_dokumen' => $path,
            ]);

            return response()->json(['message' => 'Data berhasil disimpan', 'data' => $ppdb], 201);
        } catch (QueryException $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function show(string $id)
    {
        $form = FormPPDB::find($id);
        if ($form) {
            return response()->json([
                'status' => true,
                'message' => 'Data ditemukan',
                'data' => $form
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan',
                'data' => $form
            ], 404);
        }
    }
}
