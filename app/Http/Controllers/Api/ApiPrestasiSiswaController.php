<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PrestasiSiswa;
use App\Models\GambarPrestasiSiswa;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;

class ApiPrestasiSiswaController extends Controller
{
    public function index()
    {
        try {
            $prestasiSiswa = PrestasiSiswa::with('gambar')->get();

            return response()->json([
                'status' => true,
                'message' => 'Data berhasil ditemukan',
                'data' => $prestasiSiswa
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
            $prestasi = PrestasiSiswa::with('gambar')->find($id);

            if (!$prestasi) {
                return response()->json([
                    'status' => false,
                    'message' => 'Data tidak ditemukan',
                ], 404);
            }

            return response()->json([
                'status' => true,
                'message' => 'Data berhasil ditemukan',
                'data' => $prestasi
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
    // CRUD PRESTASI SISWA
    //----- 
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_prestasi' => 'required',
            'siswa_prestasi' => 'required',
            'deskripsi_prestasi' => 'required',
            'tanggal_prestasi' => 'required|date',
            'kategori_prestasi' => 'required|max:255',
            'tingkat_prestasi' => 'required|max:255',
            'gambar_prestasi' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'gambar.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
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
            $gambarPrestasi = $request->file('gambar_prestasi')->store('image/PrestasiHeadline', 'public');
            $validate['gambar_prestasi'] = $gambarPrestasi;
            $prestasi = PrestasiSiswa::create($validate);

            if ($request->hasFile('gambar')) {
                foreach ($request->file('gambar') as $image) {
                    GambarPrestasiSiswa::create([
                        'id_prestasi' => $prestasi->id_prestasi,
                        'gambar' => $image->store('image/PrestasiHeadline', 'public'),
                    ]);
                }
            }

            return response()->json([
                'status' => true,
                'message' => 'Prestasi berhasil ditambahkan',
                'data' => $prestasi
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

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_prestasi' => 'required',
            'siswa_prestasi' => 'required',
            'deskripsi_prestasi' => 'required',
            'tanggal_prestasi' => 'required|date',
            'kategori_prestasi' => 'required|max:255',
            'tingkat_prestasi' => 'required|max:255',
            'gambar_prestasi' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'gambar.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 400);
        }

        try {
            $prestasi = PrestasiSiswa::findOrFail($id);
            $validate = $validator->validated();

            if ($request->hasFile('gambar_prestasi')) {
                // Hapus gambar lama dari penyimpanan sebelum memperbarui dengan gambar yang baru
                Storage::disk('public')->delete($prestasi->gambar_prestasi);

                $gambarPath = $request->file('gambar_prestasi')->store('image/PrestasiHeadline', 'public');
                $validate['gambar_prestasi'] = $gambarPath;
            }

            $prestasi->update($validate);

            return response()->json([
                'status' => true,
                'message' => 'Prestasi berhasil diubah',
                'data' => $prestasi
            ], 200);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal mengubah data',
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
            $prestasi = PrestasiSiswa::findOrFail($id);

            foreach ($prestasi->gambar as $gambar) {
                Storage::disk('public')->delete($gambar->gambar);
                $gambar->delete();
            }

            if ($prestasi->gambar_prestasi) {
                Storage::disk('public')->delete($prestasi->gambar_prestasi);
            }

            $prestasi->delete();

            return response()->json([
                'status' => true,
                'message' => 'Prestasi berhasil dihapus'
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
