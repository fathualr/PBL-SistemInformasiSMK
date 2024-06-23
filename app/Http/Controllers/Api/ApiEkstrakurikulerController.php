<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ekstrakulikuler;
use App\Models\GambarEkstrakurikuler;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ApiEkstrakurikulerController extends Controller
{
    public function index()
    {
        try {
            $ekstrakulikuler = Ekstrakulikuler::with("guru", "gambar")->get();

            return response()->json([
                'status' => true,
                'message' => 'Data berhasil ditemukan',
                'data' => $ekstrakulikuler
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
            $ekstrakurikuler = Ekstrakulikuler::with("guru", "gambar")->find($id);

            if (!$ekstrakurikuler) {
                return response()->json([
                    'status' => false,
                    'message' => 'Data tidak ditemukan',
                ], 404);
            }

            return response()->json([
                'status' => true,
                'message' => 'Data berhasil ditemukan',
                'data' => $ekstrakurikuler
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
    // CRUD EKSTRAKURIKULER
    //----- 
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'id_guru' => 'nullable|exists:direktori_guru,id_guru',
                'nama_ekstrakurikuler' => 'required|string|max:255',
                'deskripsi_ekstrakurikuler' => 'required|string',
                'tempat_ekstrakurikuler' => 'required|string|max:255',
                'jadwal_ekstrakurikuler' => 'required|string|max:255',
                'gambar_profil_ekstrakurikuler' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'gambar_ekstrakurikuler.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
            ]);

            if ($validator->fails()) {
                throw new ValidationException($validator);
            }

            $path = $request->file('gambar_profil_ekstrakurikuler')->store('image/EkstrakurikulerHeadline', 'public');
            $validatedData = $validator->validated();
            $validatedData['gambar_profil_ekstrakurikuler'] = $path;

            $ekstrakurikuler = Ekstrakulikuler::create($validatedData);

            if ($request->hasFile('gambar_ekstrakurikuler')) {
                foreach ($request->file('gambar_ekstrakurikuler') as $image) {
                    GambarEkstrakurikuler::create([
                        'id_ekstrakurikuler' => $ekstrakurikuler->id_ekstrakurikuler,
                        'gambar_ekstrakurikuler' => $image->store('image/Ekstrakurikuler', 'public'),
                    ]);
                }
            }

            return response()->json([
                'status' => true,
                'message' => 'Ekstrakurikuler berhasil ditambahkan!',
                'data' => $ekstrakurikuler
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menambahkan ekstrakurikuler',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $ekstrakurikuler = Ekstrakulikuler::findOrFail($id);

            $validator = Validator::make($request->all(), [
                'id_guru' => 'nullable|exists:direktori_guru,id_guru',
                'nama_ekstrakurikuler' => 'required|string|max:255',
                'deskripsi_ekstrakurikuler' => 'required|string',
                'tempat_ekstrakurikuler' => 'required|string|max:255',
                'jadwal_ekstrakurikuler' => 'required|string|max:255',
                'gambar_profil_ekstrakurikuler' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'gambar_ekstrakurikuler.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
            ]);

            if ($validator->fails()) {
                throw new ValidationException($validator);
            }

            if ($request->hasFile('gambar_profil_ekstrakurikuler')) {
                if ($ekstrakurikuler->gambar_profil_ekstrakurikuler) {
                    Storage::disk('public')->delete($ekstrakurikuler->gambar_profil_ekstrakurikuler);
                }
                $path = $request->file('gambar_profil_ekstrakurikuler')->store('image/EkstrakurikulerHeadline', 'public');
                $validatedData = $validator->validated();
                $validatedData['gambar_profil_ekstrakurikuler'] = $path;
            }

            $status = $ekstrakurikuler->update($validatedData);

            if ($status && $request->hasFile('gambar_ekstrakurikuler')) {
                // Hapus gambar-gambar lama sebelum menambahkan yang baru
                foreach ($ekstrakurikuler->gambar as $gambar) {
                    Storage::disk('public')->delete($gambar->gambar_ekstrakurikuler);
                    $gambar->delete();
                }

                // Tambahkan gambar-gambar baru
                foreach ($request->file('gambar_ekstrakurikuler') as $image) {
                    GambarEkstrakurikuler::create([
                        'id_ekstrakurikuler' => $ekstrakurikuler->id_ekstrakurikuler,
                        'gambar_ekstrakurikuler' => $image->store('image/Ekstrakurikuler', 'public'),
                    ]);
                }
            }

            return response()->json([
                'status' => true,
                'message' => 'Ekstrakurikuler berhasil diperbarui!',
                'data' => $ekstrakurikuler
            ], 200);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal memperbarui ekstrakurikuler',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $ekstrakurikuler = Ekstrakulikuler::findOrFail($id);

            if ($ekstrakurikuler->gambar_profil_ekstrakurikuler) {
                Storage::disk('public')->delete($ekstrakurikuler->gambar_profil_ekstrakurikuler);
            }

            foreach ($ekstrakurikuler->gambar as $gambar) {
                Storage::disk('public')->delete($gambar->gambar_ekstrakurikuler);
                $gambar->delete();
            }

            $status = $ekstrakurikuler->delete();

            if ($status) {
                return response()->json([
                    'status' => true,
                    'message' => 'Ekstrakurikuler berhasil dihapus!'
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Ekstrakurikuler gagal dihapus!'
                ], 500);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menghapus ekstrakurikuler',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    
    //----------------------------------------------------------------------------------------------------
    // CRUD GAMBAR EKSTRAKURIKULER
    //----- 
    public function storeGambarEkstrakurikuler(Request $request, $id)
    {
        try {
            $ekstrakurikuler = Ekstrakulikuler::findOrFail($id);

            $validator = Validator::make($request->all(), [
                'gambar_ekstrakurikuler' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            if ($validator->fails()) {
                throw new ValidationException($validator);
            }

            $image = $request->file('gambar_ekstrakurikuler');
            $path = $image->store('image/Ekstrakurikuler', 'public');

            $status = GambarEkstrakurikuler::create([
                'id_ekstrakurikuler' => $ekstrakurikuler->id_ekstrakurikuler,
                'gambar_ekstrakurikuler' => $path,
            ]);

            if ($status) {
                return response()->json([
                    'status' => true,
                    'message' => 'Gambar ekstrakurikuler berhasil ditambahkan!',
                    'data' => $status
                ], 201);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Gambar ekstrakurikuler gagal ditambahkan!',
                ], 500);
            }
        } catch (ValidationException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menambahkan gambar ekstrakurikuler',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function destroyGambarEkstrakurikuler($id)
    {
        try {
            $gambarEkstrakurikuler = GambarEkstrakurikuler::findOrFail($id);

            Storage::disk('public')->delete($gambarEkstrakurikuler->gambar_ekstrakurikuler);

            $status = $gambarEkstrakurikuler->delete();

            if ($status) {
                return response()->json([
                    'status' => true,
                    'message' => 'Gambar ekstrakurikuler berhasil dihapus!'
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Gambar ekstrakurikuler gagal dihapus!'
                ], 500);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menghapus gambar ekstrakurikuler',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
