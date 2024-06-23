<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UmpanBalik;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;

class ApiUmpanBalikController extends Controller
{
    public function index()
    {
        try {
            $umpanBalik = UmpanBalik::all();

            return response()->json([
                'status' => true,
                'message' => 'Data berhasil ditemukan',
                'data' => $umpanBalik
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
            $umpanBalik = UmpanBalik::find($id);

            if (!$umpanBalik) {
                return response()->json([
                    'status' => false,
                    'message' => 'Data tidak ditemukan',
                ], 404);
            }

            return response()->json([
                'status' => true,
                'message' => 'Data berhasil ditemukan',
                'data' => $umpanBalik
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
    // CRUD UMPAN BALIK
    //----- 
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'nama_penulis' => 'required|string|max:255',
                'email_penulis' => 'required|email|max:255',
                'deskripsi_pesan' => 'required|string',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi error',
                    'errors' => $validator->errors()
                ], 422);
            }

            $validatedData = $validator->validated();
            $umpanBalik = UmpanBalik::create($validatedData);

            return response()->json([
                'status' => true,
                'message' => 'Umpan balik berhasil disimpan',
                'data' => $umpanBalik
            ], 201);

        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menyimpan umpan balik',
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
            $umpanBalik = UmpanBalik::findOrFail($id);

            if ($umpanBalik->delete()) {
                return response()->json([
                    'status' => true,
                    'message' => 'Umpan balik berhasil dihapus'
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Umpan balik gagal dihapus'
                ], 500);
            }

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menghapus umpan balik',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
