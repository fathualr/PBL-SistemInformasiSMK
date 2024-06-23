<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\DirektoriGuru;
use Illuminate\Database\QueryException;

class ApiDirektoriGuruController extends Controller
{
    public function index()
    {
        try {
            $gurus = DirektoriGuru::all();

            return response()->json([
                'status' => true,
                'message' => 'Data berhasil ditemukan',
                'data' => $gurus
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
            $guru = DirektoriGuru::find($id);

            if (!$guru) {
                return response()->json([
                    'status' => false,
                    'message' => 'Data tidak ditemukan',
                ], 404);
            }

            return response()->json([
                'status' => true,
                'message' => 'Data berhasil ditemukan',
                'data' => $guru
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
    // CRUD DIREKTORI GURU
    //----- 
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'id_program' => 'required|exists:program_keahlian,id_program',
                'nama_guru' => 'required|string|max:255',
                'nik_guru' => 'required|max:255|unique:direktori_guru,nik_guru',
                'jabatan_guru' => 'required|string|max:255',
                'TTL_guru' => 'required|date',
                'tempat_lahir_guru' => 'required|string|max:255',
                'jenis_kelamin' => 'required|in:Laki - Laki,Perempuan',
                'no_hp_guru' => 'required|max:15',
                'alamat_guru' => 'required|string|max:255',
                'gambar_guru' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'status_guru' => 'required|in:Aktif,Cuti,Pensiun,Resign',
                'email_guru' => 'required|email|max:255|unique:direktori_guru,email_guru',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            $validatedData = $validator->validated();

            if ($request->hasFile('gambar_guru')) {
                $path = $request->file('gambar_guru')->store('image/gambarGuru', 'public');
                $validatedData['gambar_guru'] = $path;
            }

            $guru = DirektoriGuru::create($validatedData);

            return response()->json([
                'status' => true,
                'message' => 'Data guru berhasil ditambahkan!',
                'data' => $guru
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menambahkan data guru. Terjadi kesalahan pada database.',
                'error' => $e->getMessage(),
            ], 500);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menambahkan data guru. Terjadi kesalahan.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $guru = DirektoriGuru::findOrFail($id);

            $validator = Validator::make($request->all(), [
                'id_program' => 'required|exists:program_keahlian,id_program',
                'nama_guru' => 'required|string|max:255',
                'nik_guru' => 'required|max:255|unique:direktori_guru,nik_guru,' . $id . ',id_guru',
                'jabatan_guru' => 'required|string|max:255',
                'TTL_guru' => 'required|date',
                'tempat_lahir_guru' => 'required|string|max:255',
                'jenis_kelamin' => 'required|in:Laki - Laki,Perempuan',
                'no_hp_guru' => 'required|max:15',
                'alamat_guru' => 'required|string|max:255',
                'gambar_guru' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'status_guru' => 'required|in:Aktif,Cuti,Pensiun,Resign',
                'email_guru' => 'required|email|max:255|unique:direktori_guru,email_guru,' . $id . ',id_guru',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            $validatedData = $validator->validated();

            if ($request->hasFile('gambar_guru')) {
                if ($guru->gambar_guru) {
                    Storage::disk('public')->delete($guru->gambar_guru);
                }
                $path = $request->file('gambar_guru')->store('image/gambarGuru', 'public');
                $validatedData['gambar_guru'] = $path;
            }

            $status = $guru->update($validatedData);

            if ($status) {
                return response()->json([
                    'status' => true,
                    'message' => 'Data guru berhasil diperbarui!',
                    'data' => $guru
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Gagal memperbarui data guru',
                ], 500);
            }
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal memperbarui data guru. Terjadi kesalahan pada database.',
                'error' => $e->getMessage(),
            ], 500);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal memperbarui data guru. Terjadi kesalahan.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $guru = DirektoriGuru::findOrFail($id);

            if ($guru->gambar_guru) {
                Storage::disk('public')->delete($guru->gambar_guru);
            }

            $status = $guru->delete();

            if ($status) {
                return response()->json([
                    'status' => true,
                    'message' => 'Data guru berhasil dihapus'
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Gagal menghapus data guru'
                ], 500);
            }
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menghapus data guru. Terjadi kesalahan pada database.',
                'error' => $e->getMessage(),
            ], 500);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menghapus data guru. Terjadi kesalahan.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
