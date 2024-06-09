<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\GambarBerita;
use App\Models\KategoriBerita;
use App\Models\KomentarBerita;
use App\Models\MediaSosial;
use Illuminate\Support\Facades\Storage;

class beritaActionController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        $perPageBerita = $request->query('perPageBerita') ?? 5;
        $perPageKomentar = $request->query('perPageKomentar') ?? 5;

        // Cek apakah ada query pencarian
        if ($search) {
            // Pencarian berdasarkan judul_berita atau nama_kategori
            $berita = Berita::with('kategori', 'gambar')
                ->where('judul_berita', 'like', '%' . $search . '%')
                ->orWhereHas('kategori', function ($query) use ($search) {
                    $query->where('nama_kategori', 'like', '%' . $search . '%');
                })
                ->orderBy('created_at', 'desc')
                ->paginate($perPageBerita, ['*'], 'berita_page');
        } else {
            // Jika tidak ada query pencarian, tampilkan semua data
            $berita = Berita::with('kategori', 'gambar')
                ->orderBy('created_at', 'desc')
                ->paginate($perPageBerita, ['*'], 'berita_page');
        }

        // Ambil data komentar tanpa filter pencarian (sesuai dengan permintaan)
        $komentar = KomentarBerita::with('berita')
            ->orderBy('created_at', 'desc')
            ->paginate($perPageKomentar, ['*'], 'komentar_page');

        // Menambahkan parameter pencarian dan perPage ke pagination links
        $berita->appends(['search' => $search, 'perPageBerita' => $perPageBerita]);
        $komentar->appends(['perPageKomentar' => $perPageKomentar]);

        return view('admin.berita', [
            'berita' => $berita,
            'komentar' => $komentar,
            'search' => $search,
            'perPageBerita' => $perPageBerita,
            'perPageKomentar' => $perPageKomentar,
            "title" => "Admin Berita"
        ]);
    }

    public function show(Request $request)
    {
        $search = $request->query('search');
        $nama_kategori = $request->query('nama_kategori');
        $perPage = $request->query('perPage') ?? 6;

        $medsos = MediaSosial::first();
        $query = Berita::with('kategori', 'gambar')->orderBy('created_at', 'desc');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('judul_berita', 'like', '%' . $search . '%')
                    ->orWhereHas('kategori', function ($q) use ($search) {
                        $q->where('nama_kategori', 'like', '%' . $search . '%');
                    });
            });
        }

        if ($nama_kategori) {
            $query->whereHas('kategori', function ($q) use ($nama_kategori) {
                $q->where('nama_kategori', $nama_kategori);
            });
        }

        $berita = $query->paginate($perPage);
        $berita->appends([
            'search' => $search,
            'perPage' => $perPage,
            'nama_kategori' => $nama_kategori
        ]);

        $kategoriBerita = KategoriBerita::select('nama_kategori')->distinct()->get();

        return view('guest.berita', [
            'berita' => $berita,
            'title' => 'Berita',
            'kategoriBerita' => $kategoriBerita,
            "medsos" => $medsos
        ]);
    }


    public function showTemplate($id_berita)
    {
        $medsos = MediaSosial::first();
        $berita = Berita::with(['kategori', 'gambar', 'komentar' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }])->findOrFail($id_berita);
    
        // Fetch the latest news articles
        $latestBerita = Berita::orderBy('created_at', 'desc')->take(3)->get();
    
        return view('guest/berita-template', [
            'berita' => $berita,
            'title' => "Berita $berita->judul_berita",
            "medsos" => $medsos,
            'latestBerita' => $latestBerita // Pass the latest news articles to the view
        ]);
    }
    

    public function store(Request $request)
    {
        $validate = $request->validate([
            'judul_berita' => 'required|string|max:255',
            'gambar_berita.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'isi_berita' => 'required|string',
            'kategori_berita.*' => 'nullable|string|max:255',
            'gambar_headline' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'tanggal_berita' => 'required|date',
        ]);

        $gambarHeadline = $request->file('gambar_headline')->store('image/BeritaHeadline', 'public');
        $validate['gambar_headline'] = $gambarHeadline;
        $berita = Berita::create($validate);

        if ($request->hasFile('gambar_berita')) {
            foreach ($request->file('gambar_berita') as $image) {
                GambarBerita::create([
                    'berita_id' => $berita->id_berita,
                    'tautan_gambar' => $image->store('image/Berita', 'public'),
                ]);
            }
        }

        if ($validate['kategori_berita'][0] !== null) {
            foreach ($validate['kategori_berita'] as $kategori) {
                KategoriBerita::create([
                    'berita_id' => $berita->id_berita,
                    'nama_kategori' => $kategori,
                ]);
            }
        }

        if ($berita) {
            return redirect()->back()->with('success', 'Berita berhasil ditambahkan.');
        } else {
            return redirect()->back()->with('error', 'Berita gagal ditambahkan.');
        }
    }

    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);
        $validate = $request->validate([
            'judul_berita' => 'required|string|max:255',
            'isi_berita' => 'required|string',
            'gambar_headline' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'tanggal_berita' => 'required|date',
        ]);

        if ($request->hasFile('gambar_headline')) {
            $gambarHeadlinePath = $request->file('gambar_headline')->store('image/BeritaHeadline', 'public');
            if ($berita->gambar_headline) {
                Storage::disk('public')->delete($berita->gambar_headline);
            }
            $validate['gambar_headline'] = $gambarHeadlinePath;
        }

        $status = $berita->fill($validate)->save();
        if ($status) {
            return redirect()->back()->with('success', 'Berita berhasil diubah!');
        } else {
            return redirect()->back()->with('error', 'Berita gagal diubah!');
        }
    }

    public function destroy($id)
    {
        $data = Berita::findOrFail($id);

        if ($data->gambar_headline) {
            Storage::disk('public')->delete($data->gambar_headline);
        }

        $gambarBeritas = $data->gambar;
        foreach ($gambarBeritas as $gambarBerita) {
            Storage::disk('public')->delete($gambarBerita->tautan_gambar);
            $gambarBerita->delete();
        }

        $status = $data->delete();
        if ($status) {
            return redirect()->back()->with('success', 'Berita berhasil dihapus!');
        } else {
            return redirect()->back()->with('error', 'Berita gagal dihapus!');
        }
    }

    public function updateGambarBerita(Request $request, $id)
    {
        $request->validate([
            'tautan_gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $berita = Berita::findOrFail($id);
        $image = $request->file('tautan_gambar');

        $status = GambarBerita::create([
            'berita_id' => $berita->id_berita,
            'tautan_gambar' => $image->store('image/Berita', 'public'),
        ]);
        if ($status) {
            return redirect()->back()->with('success', 'Gambar berita berhasil diubah!');
        } else {
            return redirect()->back()->with('error', 'Gambar berita gagal diubah!');
        }
    }

    public function destroyGambarBerita($id)
    {
        $data = GambarBerita::findOrFail($id);

        if ($data->tautan_gambar) {
            Storage::disk('public')->delete($data->tautan_gambar);
        }
        $status = $data->delete();
        if ($status) {
            return redirect()->back()->with('success', 'Gambar berita berhasil dihapus!');
        } else {
            return redirect()->back()->with('error', 'Gambar berita gagal dihapus!');
        }
    }

    public function updateKategoriBerita(Request $request, $id)
    {
        $validate = $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);
        $berita = Berita::findOrFail($id);
        $validate['berita_id'] = $berita->id_berita;

        $status = kategoriBerita::create($validate);
        if ($status) {
            return redirect()->back()->with('success', 'Kategori berita berhasil dihapus!');
        } else {
            return redirect()->back()->with('error', 'Kategori berita gagal dihapus!');
        }
    }

    public function destroyKategoriBerita($id)
    {
        $data = KategoriBerita::findOrFail($id);
        $status = $data->delete();
        if ($status) {
            return redirect()->back()->with('success', 'Kategori berita berhasil dihapus!');
        } else {
            return redirect()->back()->with('error', 'Kategori berita gagal dihapus!');
        }
    }
}
