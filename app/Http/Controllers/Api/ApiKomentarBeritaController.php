<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KomentarBerita;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;

class ApiKomentarBeritaController extends Controller
{
    public function index()
    {
        try {
            $komentarBerita = KomentarBerita::all();

            return response()->json([
                'status' => true,
                'message' => 'Data berhasil ditemukan',
                'data' => $komentarBerita
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
            $komentar = KomentarBerita::find($id);

            if (!$komentar) {
                return response()->json([
                    'status' => false,
                    'message' => 'Data tidak ditemukan',
                ], 404);
            }

            return response()->json([
                'status' => true,
                'message' => 'Data berhasil ditemukan',
                'data' => $komentar
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
    // CRUD KOMENTAR BERITA
    //----- 
    public function store(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_komentar' => 'required|string|max:255',
            'teks_komentar' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 400);
        }

        try {
            $validate = $validator->validated();
            $validate['id_berita'] = $id;
            $komentar = KomentarBerita::create($validate);

            return response()->json([
                'status' => true,
                'message' => 'Komentar berhasil ditambahkan',
                'data' => $komentar
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menambahkan data',
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
            $komentar = KomentarBerita::findOrFail($id);
            $komentar->delete();

            return response()->json([
                'status' => true,
                'message' => 'Komentar berhasil dihapus'
            ], 200);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menghapus data',
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
