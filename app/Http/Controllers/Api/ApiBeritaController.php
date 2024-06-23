<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\GambarBerita;
use App\Models\KategoriBerita;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;

class ApiBeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::with('kategori', 'gambar')->get();

        return response()->json([
            'status' => true,
            'message' => 'Berita ditemukan',
            'data' => $beritas
        ], 200);
    }

    public function show($id)
    {
        $berita = Berita::with('kategori', 'gambar')->find($id);

        if (!$berita) {
            return response()->json([
                'status' => false,
                'message' => 'Berita tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Berita ditemukan',
            'data' => $berita
        ], 200);
    }

    public function indexFull()
    {
        $beritas = Berita::with('kategori', 'gambar', 'komentar')->get();

        return response()->json([
            'status' => true,
            'message' => 'Berita ditemukan',
            'data' => $beritas
        ], 200);
    }

    public function showFull($id)
    {
        $berita = Berita::with('kategori', 'gambar', 'komentar')->find($id);

        if (!$berita) {
            return response()->json([
                'status' => false,
                'message' => 'Berita tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Berita ditemukan',
            'data' => $berita
        ], 200);
    }

    //----------------------------------------------------------------------------------------------------
    // CRUD BERITA
    //----- 
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'judul_berita' => 'required|string|max:255',
                'gambar_berita.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'isi_berita' => 'required|string',
                'kategori_berita.*' => 'nullable|string|max:255',
                'gambar_headline' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'tanggal_berita' => 'required|date',
            ]);
    
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }
    
            $gambarHeadline = $request->file('gambar_headline')->store('image/BeritaHeadline', 'public');
            $beritaData = $request->all();
            $beritaData['gambar_headline'] = $gambarHeadline;
    
            $berita = Berita::create($beritaData);
    
            if ($request->hasFile('gambar_berita')) {
                foreach ($request->file('gambar_berita') as $image) {
                    GambarBerita::create([
                        'berita_id' => $berita->id_berita,
                        'tautan_gambar' => $image->store('image/Berita', 'public'),
                    ]);
                }
            }
    
            if (isset($beritaData['kategori_berita'])) {
                foreach ($beritaData['kategori_berita'] as $kategori) {
                    KategoriBerita::create([
                        'berita_id' => $berita->id_berita,
                        'nama_kategori' => $kategori,
                    ]);
                }
            }
    
            return response()->json([
                'status' => true,
                'message' => 'Berita berhasil ditambahkan',
                'berita' => $berita
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menambahkan berita. Terjadi kesalahan pada database.',
                'error' => $e->getMessage(),
            ], 500);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menambahkan berita. Terjadi kesalahan.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $berita = Berita::findOrFail($id);
        
            $validator = Validator::make($request->all(), [
                'judul_berita' => 'required|string|max:255',
                'isi_berita' => 'required|string',
                'gambar_headline' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'tanggal_berita' => 'required|date',
            ]);
        
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }
        
            $beritaData = $request->all();
        
            if ($request->hasFile('gambar_headline')) {
                $gambarHeadlinePath = $request->file('gambar_headline')->store('image/BeritaHeadline', 'public');
                if ($berita->gambar_headline) {
                    Storage::disk('public')->delete($berita->gambar_headline);
                }
                $beritaData['gambar_headline'] = $gambarHeadlinePath;
            }
        
            $berita->update($beritaData);
        
            return response()->json([
                'status' => true,
                'message' => 'Berita berhasil diubah',
                'berita' => $berita
            ], 200);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal mengubah berita. Terjadi kesalahan pada database.',
                'error' => $e->getMessage(),
            ], 500);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal mengubah berita. Terjadi kesalahan.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $berita = Berita::findOrFail($id);
        
            if ($berita->gambar_headline) {
                Storage::disk('public')->delete($berita->gambar_headline);
            }
        
            $gambarBeritas = $berita->gambar;
            foreach ($gambarBeritas as $gambarBerita) {
                Storage::disk('public')->delete($gambarBerita->tautan_gambar);
                $gambarBerita->delete();
            }
        
            $berita->delete();
        
            return response()->json([
                'status' => true,
                'message' => 'Berita berhasil dihapus',
            ], 200);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menghapus berita. Terjadi kesalahan pada database.',
                'error' => $e->getMessage(),
            ], 500);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menghapus berita. Terjadi kesalahan.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    //----------------------------------------------------------------------------------------------------
    // CRUD GAMBAR BERITA
    //----- 
    public function storeGambarBerita(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'tautan_gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            $berita = Berita::findOrFail($id);
            $image = $request->file('tautan_gambar');

            $gambarBerita = GambarBerita::create([
                'berita_id' => $berita->id_berita,
                'tautan_gambar' => $image->store('image/Berita', 'public'),
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Gambar berita berhasil ditambahkan',
                'gambar_berita' => $gambarBerita
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menambahkan gambar berita. Terjadi kesalahan pada database.',
                'error' => $e->getMessage(),
            ], 500);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menambahkan gambar berita. Terjadi kesalahan.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function destroyGambarBerita($id)
    {
        try {
            $gambarBerita = GambarBerita::findOrFail($id);

            if ($gambarBerita->tautan_gambar) {
                Storage::disk('public')->delete($gambarBerita->tautan_gambar);
            }

            $gambarBerita->delete();

            return response()->json([
                'status' => true,
                'message' => 'Gambar berita berhasil dihapus',
            ], 200);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menghapus gambar berita. Terjadi kesalahan pada database.',
                'error' => $e->getMessage(),
            ], 500);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menghapus gambar berita. Terjadi kesalahan.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    //----------------------------------------------------------------------------------------------------
    // CRUD Kategori BERITA
    //----- 
    public function storeKategoriBerita(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'nama_kategori' => 'required|string|max:255',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            $berita = Berita::findOrFail($id);

            $kategoriBerita = KategoriBerita::create([
                'berita_id' => $berita->id_berita,
                'nama_kategori' => $request->nama_kategori,
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Kategori berita berhasil ditambahkan',
                'kategori_berita' => $kategoriBerita
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menambahkan kategori berita. Terjadi kesalahan pada database.',
                'error' => $e->getMessage(),
            ], 500);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menambahkan kategori berita. Terjadi kesalahan.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function destroyKategoriBerita($id)
    {
        try {
            $kategoriBerita = KategoriBerita::findOrFail($id);
            $kategoriBerita->delete();

            return response()->json([
                'status' => true,
                'message' => 'Kategori berita berhasil dihapus',
            ], 200);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menghapus kategori berita. Terjadi kesalahan pada database.',
                'error' => $e->getMessage(),
            ], 500);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menghapus kategori berita. Terjadi kesalahan.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
