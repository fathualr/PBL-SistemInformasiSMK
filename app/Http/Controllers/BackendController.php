<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Foto;
use App\Models\Video;

class BackendController extends Controller
{
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

        // Redirect pengguna ke halaman terkait atau tampilkan pesan sukses
        return redirect()->route('admin.album.index')->with('success', 'Album berhasil dihapus.');
    }

    public function storeFoto(Request $request)
    {
        // Validasi request
        $request->validate([
            'id_album' => 'required|exists:album,id_album',
            'tautan_foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Sesuaikan dengan kebutuhan
        ]);

        // Simpan foto ke dalam direktori penyimpanan public/fotos dengan nama asli file
        $request->file('tautan_foto')->store('image/albumFoto', 'public');
        // Buat entri baru dalam database
        Foto::create([
            'id_album' => $request->id_album,
            'tautan_foto' => $request->file('tautan_foto')->store('image/albumFoto', 'public'), // Simpan path relatif ke dalam database
        ]);

        return redirect()->route('admin.foto.index')->with('success', 'Foto berhasil ditambahkan.');
    }

    public function updateFoto(Request $request, $id)
    {
        // Validasi request
        $request->validate([
            'id_album' => 'required|exists:album,id_album', // Pastikan tabel album memiliki nama yang sesuai dengan yang Anda gunakan di sini
            'tautan_foto' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048', // File gambar hanya diperlukan saat pembaruan dilakukan
        ]);

        // Temukan foto yang akan diperbarui
        $foto = Foto::findOrFail($id);

        // Jika ada file gambar yang diunggah, proses pembaruan
        if ($request->hasFile('tautan_foto')) {

            $request->file('tautan_foto')->store('image/albumFoto', 'public');

            $foto->update([
                'id_album' => $request->id_album,
                'tautan_foto' => $request->file('tautan_foto')->store('image/albumFoto', 'public'), // Simpan path relatif ke dalam database
            ]);
        } else {
            $foto->update([
                'id_album' => $request->id_album,
            ]);
        }

        return redirect()->route('admin.foto.index')->with('success', 'Foto berhasil diperbarui.');
    }

    public function destroyFoto($id)
    {
        // Temukan album yang akan dihapus
        $foto = Foto::findOrFail($id);

        $foto->delete();

        return redirect()->route('admin.foto.index')->with('success', 'Album berhasil dihapus.');
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

    public function updateVideo(Request $request, $id)
    {
        // Validasi data yang diterima dari formulir
        $request->validate([
            'id_album' => 'required|exists:album,id_album', // Pastikan album tersedia
            'tautan_video' => 'required|string',
            // Tambahkan validasi lainnya sesuai kebutuhan
        ]);

        // Temukan video yang sesuai berdasarkan ID
        $video = Video::findOrFail($id);

        // Lakukan update data
        $video->update([
            'id_album' => $request->id_album,
            'tautan_video' => $request->tautan_video,
            // Tambahkan field lainnya jika ada
        ]);

        // Redirect pengguna ke halaman terkait atau tampilkan pesan sukses
        return redirect()->route('admin.video.index')->with('success', 'Video berhasil diperbarui.');
    }

    public function destroyVideo($id)
    {
        // Temukan album yang akan dihapus
        $video = Video::findOrFail($id);

        $video->delete();

        return redirect()->route('admin.video.index')->with('success', 'Video berhasil dihapus.');
    }
}
