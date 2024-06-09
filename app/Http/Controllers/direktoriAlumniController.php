<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DirektoriAlumni;
use App\Models\MediaSosial;
use Illuminate\Support\Facades\Storage;

class direktoriAlumniController extends Controller
{
    public function alumni(Request $request)
    {
        $search = $request->query('search');
        $tahun_kelulusan = $request->query('tahun_kelulusan');
        $perPage = $request->query('perPage') ?? 10;

        $medsos = MediaSosial::first();
        $query = DirektoriAlumni::query();

        // Filter based on search
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama_alumni', 'like', '%' . $search . '%')
                    ->orWhere('tahun_kelulusan_alumni', $search);
            });
        }

        // Filter based on graduation year
        if ($tahun_kelulusan) {
            $query->where('tahun_kelulusan_alumni', $tahun_kelulusan);
        }

        // Order by graduation year in descending order
        $query->orderBy('tahun_kelulusan_alumni', 'desc');

        // Get unique graduation years
        $tahun_kelulusan_list = DirektoriAlumni::pluck('tahun_kelulusan_alumni')->unique()->sort()->values();

        // Paginate the results
        $direktoriAlumni = $query->paginate($perPage);
        $direktoriAlumni->appends([
            'search' => $search,
            'perPage' => $perPage,
            'tahun_kelulusan' => $tahun_kelulusan
        ]);

        return view('guest.direktori-alumni', [
            'title' => 'Direktori Alumni',
            'direktoriAlumni' => $direktoriAlumni,
            'tahun_kelulusan_list' => $tahun_kelulusan_list,
            "medsos" => $medsos
        ]);
    }

    public function adminAlumni(Request $request)
    {
        $search = $request->query('search');
        $perPage = $request->query('perPage') ?? 10; // Default 10 jika tidak ada perPage

        // Cek apakah ada query pencarian
        if ($search) {
            // Pencarian berdasarkan nama_alumni atau tahun_kelulusan_alumni
            $direktoriAlumni = DirektoriAlumni::where('nama_alumni', 'like', '%' . $search . '%')
                ->orWhere('tahun_kelulusan_alumni', 'like', '%' . $search . '%')
                ->paginate($perPage);
        } else {
            // Jika tidak ada query pencarian, tampilkan semua data
            $direktoriAlumni = DirektoriAlumni::paginate($perPage);
        }

        // Menambahkan parameter pencarian dan perPage ke pagination links
        $direktoriAlumni->appends(['search' => $search, 'perPage' => $perPage]);

        return view('admin.alumni', [
            "title" => "Admin Alumni",
            "direktoriAlumni" => $direktoriAlumni,
            "search" => $search, // Mengirimkan search ke view
            "perPage" => $perPage, // Mengirimkan perPage ke view
        ]);
    }


    public function storeDirektoriAlumni(Request $request)
    {
        $validate = $request->validate([
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

        if ($request->hasFile('gambar_alumni')) {
            $path = $request->file('gambar_alumni')->store('image/gambarAlumni', 'public');
            $validate['gambar_alumni'] = $path;
        }

        $status = DirektoriAlumni::create($validate);
        if ($status) {
            return redirect()->back()->with('success', 'Data alumni berhasil ditambahkan!');
        } else {
            return redirect()->back()->with('error', 'Data alumni gagal ditambahkan!');
        }
    }

    public function updateDirektoriAlumni(Request $request, $id_alumni)
    {
        $alumni = DirektoriAlumni::findOrFail($id_alumni);

        $validate = $request->validate([
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

        if ($request->hasFile('gambar_alumni')) {
            if ($alumni->gambar_alumni) {
                Storage::disk('public')->delete($alumni->gambar_alumni);
            }
            $path = $request->file('gambar_alumni')->store('image/gambarAlumni', 'public');
            $validate['gambar_alumni'] = $path;
        }

        $status = $alumni->update($validate);
        if ($status) {
            return redirect()->back()->with('success', 'Data alumni berhasil diperbarui!');
        } else {
            return redirect()->back()->with('error', 'Data alumni gagal diperbarui!');
        }
    }

    public function destroyDirektoriAlumni($id_alumni)
    {
        $alumni = DirektoriAlumni::findOrFail($id_alumni);

        if ($alumni->gambar_alumni) {
            Storage::disk('public')->delete($alumni->gambar_alumni);
        }

        $status = $alumni->delete();
        if ($status) {
            return redirect()->back()->with('success', 'Data alumni berhasil dihapus!');
        } else {
            return redirect()->back()->with('error', 'Data alumni gagal dihapus!');
        }
    }
}
