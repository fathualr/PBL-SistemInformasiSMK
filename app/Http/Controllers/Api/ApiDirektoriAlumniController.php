<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DirektoriAlumni;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ApiDirektoriAlumniController extends Controller
{
    public function index()
    {
        try {
            $alumnis = DirektoriAlumni::all();

            return response()->json([
                'status' => true,
                'message' => 'Data berhasil ditemukan',
                'data' => $alumnis
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
            $alumni = DirektoriAlumni::find($id);

            if (!$alumni) {
                return response()->json([
                    'status' => false,
                    'message' => 'Data tidak ditemukan',
                ], 404);
            }

            return response()->json([
                'status' => true,
                'message' => 'Data berhasil ditemukan',
                'data' => $alumni
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
    // CRUD DIREKTORI ALUMNI
    //----- 
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'nama_alumni' => 'required|string|max:255',
                'no_hp_alumni' => 'required|string|max:255',
                'email_alumni' => 'required|email|max:255',
                'jenis_kelamin_alumni' => 'required|in:Laki - Laki,Perempuan',
                'TTL_alumni' => 'required|date',
                'tempat_lahir_alumni' => 'required|string|max:255',
                'tahun_kelulusan_alumni' => 'required|integer',
                'gambar_alumni' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'alamat_alumni' => 'required|string',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation error',
                    'errors' => $validator->errors()
                ], 400);
            }

            if ($request->hasFile('gambar_alumni')) {
                $path = $request->file('gambar_alumni')->store('image/gambarAlumni', 'public');
                $request->merge(['gambar_alumni' => $path]);
            }

            $alumni = DirektoriAlumni::create($request->all());

            return response()->json([
                'status' => true,
                'message' => 'Data alumni berhasil ditambahkan',
                'data' => $alumni
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menambahkan data alumni',
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

    // Update method
    public function update(Request $request, $id)
    {
        try {
            $alumni = DirektoriAlumni::findOrFail($id);

            $validator = Validator::make($request->all(), [
                'nama_alumni' => 'required|string|max:255',
                'no_hp_alumni' => 'required|string|max:255',
                'email_alumni' => 'required|email|max:255',
                'jenis_kelamin_alumni' => 'required|in:Laki - Laki,Perempuan',
                'TTL_alumni' => 'required|date',
                'tempat_lahir_alumni' => 'required|string|max:255',
                'tahun_kelulusan_alumni' => 'required|integer',
                'gambar_alumni' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'alamat_alumni' => 'required|string',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation error',
                    'errors' => $validator->errors()
                ], 400);
            }

            if ($request->hasFile('gambar_alumni')) {
                if ($alumni->gambar_alumni) {
                    Storage::disk('public')->delete($alumni->gambar_alumni);
                }
                $path = $request->file('gambar_alumni')->store('image/gambarAlumni', 'public');
                $request->merge(['gambar_alumni' => $path]);
            }

            $alumni->update($request->all());

            return response()->json([
                'status' => true,
                'message' => 'Data alumni berhasil diperbarui',
                'data' => $alumni
            ], 200);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal memperbarui data alumni',
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

    // Destroy method
    public function destroy($id)
    {
        try {
            $alumni = DirektoriAlumni::findOrFail($id);

            if ($alumni->gambar_alumni) {
                Storage::disk('public')->delete($alumni->gambar_alumni);
            }

            $alumni->delete();

            return response()->json([
                'status' => true,
                'message' => 'Data alumni berhasil dihapus'
            ], 200);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menghapus data alumni',
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
