<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\DirektoriPegawai;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;

class ApiDirektoriPegawaiController extends Controller
{
    public function index()
    {
        try {
            $pegawais = DirektoriPegawai::all();

            return response()->json([
                'status' => true,
                'message' => 'Data berhasil ditemukan',
                'data' => $pegawais
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal mengambil data',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $pegawai = DirektoriPegawai::find($id);

            if (!$pegawai) {
                return response()->json([
                    'status' => false,
                    'message' => 'Data tidak ditemukan',
                ], 404);
            }

            return response()->json([
                'status' => true,
                'message' => 'Data berhasil ditemukan',
                'data' => $pegawai
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal mengambil data',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    //----------------------------------------------------------------------------------------------------
    // CRUD DIREKTORI PEGAWAI
    //----- 
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'nama_pegawai' => 'required|string|max:255',
                'nik_pegawai' => 'required|string|unique:direktori_pegawai,nik_pegawai',
                'jabatan_pegawai' => 'required|string|max:255',
                'TTL_pegawai' => 'required|date',
                'tempat_lahir_pegawai' => 'required|string|max:255',
                'jenis_kelamin' => 'required|in:Laki - Laki,Perempuan',
                'no_hp_pegawai' => 'required|string|max:255',
                'alamat_pegawai' => 'required|string',
                'gambar_pegawai' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'status_pegawai' => 'required|in:Aktif,Cuti,Pensiun,Resign',
                'email_pegawai' => 'required|string|email|unique:direktori_pegawai,email_pegawai',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation error',
                    'errors' => $validator->errors()
                ], 400);
            }

            $path = $request->file('gambar_pegawai')->store('image/gambarPegawai', 'public');
            $data = $request->all();
            $data['gambar_pegawai'] = $path;

            $pegawai = DirektoriPegawai::create($data);

            return response()->json([
                'status' => true,
                'message' => 'Data pegawai berhasil ditambahkan',
                'data' => $pegawai
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menambahkan data pegawai',
                'error' => $e->getMessage()
            ], 500);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Terjadi kesalahan',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $pegawai = DirektoriPegawai::findOrFail($id);

            $validator = Validator::make($request->all(), [
                'nama_pegawai' => 'required|string|max:255',
                'nik_pegawai' => 'required|string|max:255|unique:direktori_pegawai,nik_pegawai,' . $id . ',id',
                'jabatan_pegawai' => 'required|string|max:255',
                'TTL_pegawai' => 'required|date',
                'tempat_lahir_pegawai' => 'required|string|max:255',
                'jenis_kelamin' => 'required|in:Laki - Laki,Perempuan',
                'no_hp_pegawai' => 'required|string|max:255',
                'alamat_pegawai' => 'required|string',
                'gambar_pegawai' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'status_pegawai' => 'required|in:Aktif,Cuti,Pensiun,Resign',
                'email_pegawai' => 'required|string|email|unique:direktori_pegawai,email_pegawai,' . $id . ',id',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation error',
                    'errors' => $validator->errors()
                ], 400);
            }

            $data = $request->all();

            if ($request->hasFile('gambar_pegawai')) {
                if ($pegawai->gambar_pegawai) {
                    Storage::disk('public')->delete($pegawai->gambar_pegawai);
                }
                $path = $request->file('gambar_pegawai')->store('image/gambarPegawai', 'public');
                $data['gambar_pegawai'] = $path;
            }

            $pegawai->update($data);

            return response()->json([
                'status' => true,
                'message' => 'Data pegawai berhasil diperbarui',
                'data' => $pegawai
            ], 200);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal memperbarui data pegawai',
                'error' => $e->getMessage()
            ], 500);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Terjadi kesalahan',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $pegawai = DirektoriPegawai::findOrFail($id);

            if ($pegawai->gambar_pegawai) {
                Storage::disk('public')->delete($pegawai->gambar_pegawai);
            }

            $pegawai->delete();

            return response()->json([
                'status' => true,
                'message' => 'Data pegawai berhasil dihapus'
            ], 200);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menghapus data pegawai',
                'error' => $e->getMessage()
            ], 500);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Terjadi kesalahan',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
