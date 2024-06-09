<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Foto;
use App\Models\Video;
use App\Models\MediaSosial;

class AlbumFotoVideoController extends Controller
{
    public function adminAlbum(Request $request)
    {
        $search = $request->query('search');
        $perPage = $request->query('perPage') ?? 10;

        if ($search) {

            $albums = Album::where('nama_album', 'like', '%' . $search . '%')
                ->orWhere('tipe_album', 'like', '%' . $search . '%')
                ->paginate($perPage);
        } else {
            // Jika tidak ada query pencarian, tampilkan semua data
            $albums = Album::paginate($perPage);
        }
        // Menambahkan parameter pencarian dan perPage ke pagination links
        $albums->appends(['search' => $search, 'perPage' => $perPage]);

        return view('admin/album', [
            "title" => "Admin Album",
            "albums" => $albums, // Meneruskan data album ke tampilan
            "search" => $search, // Mengirimkan search ke view
            "perPage" => $perPage, // Mengirimkan perPage ke view
        ]);
    }

    public function adminFoto(Request $request)
    {
        $search = $request->query('search');
        $perPage = $request->query('perPage') ?? 10;

        if ($search) {
            // Pencarian berdasarkan nik_guru, nama, atau programKeahlian.nama_program
            $fotos = Foto::with('album')
                ->where('tautan_foto', 'like', '%' . $search . '%')
                ->orWhereHas('album', function ($query) use ($search) {
                    $query->where('nama_album', 'like', '%' . $search . '%');
                })
                ->paginate($perPage);
        } else {
            // Jika tidak ada query pencarian, tampilkan semua data
            $fotos = Foto::with('album')->paginate($perPage);
        }
        // Menambahkan parameter pencarian dan perPage ke pagination links
        $fotos->appends(['search' => $search, 'perPage' => $perPage]);

        $albums = Album::all();
        // Mengirim data foto ke view 'admin.foto'
        return view('admin/foto', [
            "title" => "Admin Foto",
            "fotos" => $fotos,
            "albums" => $albums,
            "search" => $search, // Mengirimkan search ke view
            "perPage" => $perPage, // Mengirimkan perPage ke view
        ]);
    }

    public function adminVideo(Request $request)
    {
        $search = $request->query('search');
        $perPage = $request->query('perPage') ?? 10;

        if ($search) {
            // Pencarian berdasarkan nik_guru, nama, atau programKeahlian.nama_program
            $videos = Video::with('album')
                ->where('tautan_video', 'like', '%' . $search . '%')
                ->orWhereHas('album', function ($query) use ($search) {
                    $query->where('nama_album', 'like', '%' . $search . '%');
                })
                ->paginate($perPage);
        } else {
            // Jika tidak ada query pencarian, tampilkan semua data
            $videos = Video::with('album')->paginate($perPage);
        }
        // Menambahkan parameter pencarian dan perPage ke pagination links
        $videos->appends(['search' => $search, 'perPage' => $perPage]);

        $albums = Album::all();
        // Mengirim data video ke view 'admin.video'
        return view('admin/video', [
            "title" => "Admin Video",
            "videos" => $videos,
            "albums" => $albums,
            "search" => $search, // Mengirimkan search ke view
            "perPage" => $perPage, // Mengirimkan perPage ke view
        ]);
    }

    public function foto()
    {
        $albums = Album::where('tipe_album', 'Foto')->paginate(6);
        $medsos = MediaSosial::first();

        return view('guest.foto', [
            'title' => 'Galeri Foto',
            'albums' => $albums,
            "medsos" => $medsos
        ]);
    }

    public function video()
    {
        $albums = Album::where('tipe_album', 'Video')->paginate(6);
        $medsos = MediaSosial::first();

        return view('guest.video', [
            'title' => 'Galeri Video',
            'albums' => $albums,
            "medsos" => $medsos
        ]);
    }

    public function galeriTemplate($id_album)
    {
        $fotos = Foto::where('id_album', $id_album)->paginate(16); // Mengambil semua foto berdasarkan id_album
        $albums = Album::where('id_album', $id_album)->get();
        $medsos = MediaSosial::first();

        return view('guest.galeri-template', [
            "title" => "Galeri Foto",
            "fotos" => $fotos, // Meneruskan data foto ke tampilan blade
            'albums' => $albums,
            "medsos" => $medsos
        ]);
    }

    public function galeriTemplateVideo($id_album)
    {
        $videos = Video::where('id_album', $id_album)->paginate(6); // Mengambil semua vidio berdasarkan id_album
        $albums = Album::where('id_album', $id_album)->get();
        $medsos = MediaSosial::first();

        return view('guest.galeri-template-video', [
            "title" => "Galeri Video",
            "videos" => $videos, // Meneruskan data foto ke tampilan blade
            'albums' => $albums,
            "medsos" => $medsos
        ]);
    }

    public function storeAlbum(Request $request)
    {
        // Validasi data jika diperlukan
        $request->validate([
            'nama_album' => 'required',
            'tipe_album' => 'required',
            'deskripsi_album' => 'required',
            'gambar_album' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tanggal_unggah' => 'required|date',
        ]);

        // Simpan gambar ke dalam direktori penyimpanan public/album dengan nama asli file
        $request->file('gambar_album')->store('image/albumAlbumFoto', 'public');

        // Simpan data ke database dengan menyertakan path relatif gambar
        Album::create([
            'nama_album' => $request->nama_album,
            'tipe_album' => $request->tipe_album,
            'deskripsi_album' => $request->deskripsi_album,
            'gambar_album' => $request->file('gambar_album')->store('image/albumAlbumFoto', 'public'),
            'tanggal_unggah' => $request->tanggal_unggah,
        ]);

        // Redirect atau response yang sesuai
        return redirect()->route('admin.album.index')->with('success', 'Album berhasil ditambahkan');
    }

    public function updateAlbum(Request $request, $id)
    {
        // Validasi data yang diterima dari formulir
        $request->validate([
            'nama_album' => 'required|string|max:255',
            'tipe_album' => 'required|string|in:Foto,Video',
            'deskripsi_album' => 'nullable|string',
            'gambar_album' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tanggal_unggah' => 'required|date',
        ]);

        // Temukan album yang sesuai berdasarkan ID
        $album = Album::findOrFail($id);

        if ($request->hasFile('gambar_album')) {

            // Simpan foto ke dalam direktori penyimpanan public/fotos dengan nama asli file
            $request->file('gambar_album')->store('image/albumAlbumFoto', 'public');
            // Simpan perubahan
            $album->update([
                'nama_album' => $request->nama_album,
                'tipe_album' => $request->tipe_album,
                'deskripsi_album' => $request->deskripsi_album,
                'gambar_album' => $request->file('gambar_album')->store('image/albumAlbumFoto', 'public'),
                'tanggal_unggah' => $request->tanggal_unggah,
            ]);
        }
        // Redirect pengguna ke halaman terkait atau tampilkan pesan sukses
        return redirect()->route('admin.album.index')->with('success', 'Album berhasil diperbarui.');
    }

    public function destroyAlbum($id)
    {
        // Temukan album yang akan dihapus
        $album = Album::findOrFail($id);

        // Hapus album dari database
        $album->delete();

        return redirect()->route('admin.album.index')->with('success', 'Album berhasil dihapus.');
    }

    public function storeFoto(Request $request)
    {
        // Validasi request
        $request->validate([
            'id_album' => 'required|exists:album,id_album',
            'tautan_foto.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Sesuaikan dengan kebutuhan, tambahkan .* untuk menandakan array
        ]);

        // Simpan setiap foto ke dalam direktori penyimpanan public/fotos dengan nama asli file
        foreach ($request->file('tautan_foto') as $foto) {
            $path = $foto->store('image/albumFoto', 'public');

            // Buat entri baru dalam database
            Foto::create([
                'id_album' => $request->id_album,
                'tautan_foto' => $path, // Simpan path relatif ke dalam database
            ]);
        }

        return redirect()->route('admin.foto.index')->with('success', 'Foto berhasil ditambahkan.');
    }


    public function destroyFoto($id)
    {
        // Temukan album yang akan dihapus
        $foto = Foto::findOrFail($id);

        $foto->delete();

        return redirect()->route('admin.foto.index')->with('success', 'Foto berhasil dihapus.');
    }


    public function storeVideo(Request $request)
    {
        // Validasi data jika diperlukan
        $request->validate([
            'id_album' => 'required|exists:album,id_album',
            'tautan_video' => 'required|url', // Pastikan tautan yang dimasukkan adalah URL yang valid
        ]);

        // Membuat instance Video dengan tautan video yang diunggah
        Video::create([
            'id_album' => $request->id_album,
            'tautan_video' => $request->tautan_video,
        ]);

        // Redirect atau response yang sesuai
        return redirect()->route('admin.video.index')->with('success', 'Video berhasil ditambahkan');
    }

    public function destroyVideo($id)
    {
        // Temukan album yang akan dihapus
        $video = Video::findOrFail($id);

        $video->delete();

        return redirect()->route('admin.video.index')->with('success', 'Video berhasil dihapus.');
    }
}
