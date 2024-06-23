<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prasarana;
use App\Models\FotoPrasarana;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;

class ApiPrasaranaController extends Controller
{
    public function index()
    {
        try {
            $prasaranas = Prasarana::with('foto_prasarana')->get();

            return response()->json([
                'status' => true,
                'message' => 'Data berhasil ditemukan',
                'data' => $prasaranas
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
            $prasarana = Prasarana::with('foto_prasarana')->find($id);

            if (!$prasarana) {
                return response()->json([
                    'status' => false,
                    'message' => 'Data tidak ditemukan',
                ], 404);
            }

            return response()->json([
                'status' => true,
                'message' => 'Data berhasil ditemukan',
                'data' => $prasarana
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
    // CRUD PRASARANA
    //----- 
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'nama_prasarana' => 'required|string|max:255',
                'jenis_prasarana' => 'required|string|max:255',
                'deskripsi_prasarana' => 'required|string|max:500',
                'luas' => 'required|integer',
                'kapasitas' => 'required|integer',
                'tahun_dibangun' => 'required|date',
                'kondisi' => 'required|in:Baik,Perlu Perbaikan,Dalam Perbaikan',
                'status_prasarana' => 'required|in:Aktif,Tidak Aktif',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi error',
                    'errors' => $validator->errors()
                ], 422);
            }

            $validate = $validator->validated();
            $prasarana = Prasarana::create($validate);

            return response()->json([
                'status' => true,
                'message' => 'Prasarana berhasil ditambahkan',
                'data' => $prasarana
            ], 201);

        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menambahkan prasarana',
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
            $validator = Validator::make($request->all(), [
                'nama_prasarana' => 'required|string|max:255',
                'jenis_prasarana' => 'required|string|max:255',
                'deskripsi_prasarana' => 'required|string|max:500',
                'luas' => 'required|integer',
                'kapasitas' => 'required|integer',
                'tahun_dibangun' => 'required|date',
                'kondisi' => 'required|in:Baik,Perlu Perbaikan,Dalam Perbaikan',
                'status_prasarana' => 'required|in:Aktif,Tidak Aktif',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi error',
                    'errors' => $validator->errors()
                ], 422);
            }

            $prasarana = Prasarana::find($id);

            if (!$prasarana) {
                return response()->json([
                    'status' => false,
                    'message' => 'Prasarana tidak ditemukan',
                ], 404);
            }

            $validate = $validator->validated();
            $prasarana->update($validate);

            return response()->json([
                'status' => true,
                'message' => 'Prasarana berhasil diperbarui',
                'data' => $prasarana
            ], 200);

        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal memperbarui prasarana',
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
            $prasarana = Prasarana::find($id);

            if (!$prasarana) {
                return response()->json([
                    'status' => false,
                    'message' => 'Prasarana tidak ditemukan',
                ], 404);
            }

            $prasarana->delete();

            return response()->json([
                'status' => true,
                'message' => 'Prasarana berhasil dihapus',
            ], 200);

        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menghapus prasarana',
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
    
    //----------------------------------------------------------------------------------------------------
    // CRUD GAMBAR PRASARANA
    //----- 
    public function storeGambarPrasarana(Request $request, $id)
    {
        try {
            $prasarana = Prasarana::findOrFail($id);

            $validator = Validator::make($request->all(), [
                'gambar_prasarana' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi gagal',
                    'errors' => $validator->errors()
                ], 422);
            }

            $image = $request->file('gambar_prasarana');
            $path = $image->store('image/fotoPrasarana', 'public');

            $status = FotoPrasarana::create([
                'id_prasarana' => $prasarana->id_prasarana,
                'tautan_foto' => $path,
            ]);

            if ($status) {
                return response()->json([
                    'status' => true,
                    'message' => 'Gambar prasarana berhasil ditambahkan!',
                    'data' => $status
                ], 201);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Gambar prasarana gagal ditambahkan!',
                ], 500);
            }
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menambahkan gambar prasarana',
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

    public function destroyGambarPrasarana($id)
    {
        try {
            $fotoPrasarana = FotoPrasarana::findOrFail($id);

            Storage::disk('public')->delete($fotoPrasarana->tautan_foto);

            $status = $fotoPrasarana->delete();

            if ($status) {
                return response()->json([
                    'status' => true,
                    'message' => 'Gambar prasarana berhasil dihapus!'
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Gambar prasarana gagal dihapus!'
                ], 500);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menghapus gambar prasarana',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
