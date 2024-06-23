<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\DirektoriSiswa;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;

class ApiDirektoriSiswaController extends Controller
{
    public function index()
    {
        try {
            $siswas = DirektoriSiswa::all();

            return response()->json([
                'status' => true,
                'message' => 'Data berhasil ditemukan',
                'data' => $siswas
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
            $siswa = DirektoriSiswa::find($id);

            if (!$siswa) {
                return response()->json([
                    'status' => false,
                    'message' => 'Data tidak ditemukan',
                ], 404);
            }

            return response()->json([
                'status' => true,
                'message' => 'Data berhasil ditemukan',
                'data' => $siswa
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
    // CRUD DIREKTORI SISWA
    //----- 
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'id_program' => 'required|exists:program_keahlian,id_program',
                'nama_siswa' => 'required|string|max:255',
                'nisn_siswa' => 'required|string|max:255|unique:direktori_siswa,nisn_siswa',
                'jenis_kelamin_siswa' => 'required|in:Laki - Laki,Perempuan',
                'no_hp_siswa' => 'required|string|max:255',
                'TTL_siswa' => 'required|date',
                'tempat_lahir_siswa' => 'required|string|max:255',
                'alamat_siswa' => 'required|string',
                'kelas_siswa' => 'required|string|max:255',
                'tahun_angkatan_siswa' => 'required',
                'gambar_siswa' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation error',
                    'errors' => $validator->errors()
                ], 400);
            }

            $path = $request->file('gambar_siswa')->store('image/gambarSiswa', 'public');
            $data = $request->all();
            $data['gambar_siswa'] = $path;

            $siswa = DirektoriSiswa::create($data);

            return response()->json([
                'status' => true,
                'message' => 'Data siswa berhasil ditambahkan',
                'data' => $siswa
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menambahkan data siswa',
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
            $siswa = DirektoriSiswa::findOrFail($id);

            $validator = Validator::make($request->all(), [
                'id_program' => 'required|exists:program_keahlian,id_program',
                'nama_siswa' => 'required|string|max:255',
                'nisn_siswa' => 'required|string|max:255|unique:direktori_siswa,nisn_siswa,' . $id . ',id',
                'jenis_kelamin_siswa' => 'required|in:Laki - Laki,Perempuan',
                'no_hp_siswa' => 'required|string|max:255',
                'TTL_siswa' => 'required|date',
                'tempat_lahir_siswa' => 'required|string|max:255',
                'alamat_siswa' => 'required|string',
                'kelas_siswa' => 'required|string|max:255',
                'tahun_angkatan_siswa' => 'required',
                'gambar_siswa' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation error',
                    'errors' => $validator->errors()
                ], 400);
            }

            $data = $request->all();

            if ($request->hasFile('gambar_siswa')) {
                if ($siswa->gambar_siswa) {
                    Storage::disk('public')->delete($siswa->gambar_siswa);
                }
                $path = $request->file('gambar_siswa')->store('image/gambarSiswa', 'public');
                $data['gambar_siswa'] = $path;
            }

            $siswa->update($data);

            return response()->json([
                'status' => true,
                'message' => 'Data siswa berhasil diperbarui',
                'data' => $siswa
            ], 200);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal memperbarui data siswa',
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
            $siswa = DirektoriSiswa::findOrFail($id);

            if ($siswa->gambar_siswa) {
                Storage::disk('public')->delete($siswa->gambar_siswa);
            }

            $siswa->delete();

            return response()->json([
                'status' => true,
                'message' => 'Data siswa berhasil dihapus'
            ], 200);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menghapus data siswa',
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

