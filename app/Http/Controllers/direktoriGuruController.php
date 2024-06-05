<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgramKeahlian;
use App\Models\DirektoriGuru;
use Illuminate\Support\Facades\Storage;

class direktoriGuruController extends Controller
{
    public function guru(Request $request)
    {
        $search = $request->query('search');
        $nama_program = $request->query('nama_program');
        $programKeahlian = ProgramKeahlian::all();
        $perPage = $request->query('perPage') ?? 12;

        $query = DirektoriGuru::with('programKeahlian');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama_guru', 'like', '%' . $search . '%')
                    ->orWhere('nik_guru', 'like', '%' . $search . '%')
                    ->orWhere('jabatan_guru', 'like', '%' . $search . '%')
                    ->orWhere('status_guru', 'like', '%' . $search . '%');
            });
        }

        if ($nama_program) {
            $query->whereHas('programKeahlian', function ($q) use ($nama_program) {
                $q->where('nama_program', $nama_program);
            });
        }

        $direktoriGuru = $query->paginate($perPage);
        $direktoriGuru->appends([
            'search' => $search,
            'perPage' => $perPage,
            'nama_program' => $nama_program
        ]);

        return view('guest.direktori-guru', [
            'title' => 'Direktori Guru',
            'direktoriGuru' => $direktoriGuru,
            'programKeahlian' => $programKeahlian
        ]);
    }


    public function adminDirektoriGuru(Request $request)
    {
        $search = $request->query('search');
        $perPage = $request->query('perPage') ?? 10; // Default 10 jika tidak ada perPage

        // Cek apakah ada query pencarian
        if ($search) {
            // Pencarian berdasarkan nik_guru, nama, atau programKeahlian.nama_program
            $gurus = DirektoriGuru::with('programKeahlian')
                ->where('nik_guru', 'like', '%' . $search . '%')
                ->orWhere('nama_guru', 'like', '%' . $search . '%')
                ->orWhereHas('programKeahlian', function ($query) use ($search) {
                    $query->where('nama_program', 'like', '%' . $search . '%');
                })
                ->paginate($perPage);
        } else {
            // Jika tidak ada query pencarian, tampilkan semua data
            $gurus = DirektoriGuru::with('programKeahlian')->paginate($perPage);
        }

        // Menambahkan parameter pencarian dan perPage ke pagination links
        $gurus->appends(['search' => $search, 'perPage' => $perPage]);

        $programKeahlian = ProgramKeahlian::all();

        return view('admin.guru', [
            "title" => "Admin Guru",
            "gurus" => $gurus,
            "programKeahlian" => $programKeahlian,
            "search" => $search, // Mengirimkan search ke view
            "perPage" => $perPage, // Mengirimkan perPage ke view
        ]);
    }



    public function storeDirektoriGuru(Request $request)
    {
        $validate = $request->validate([
            'id_program' => 'required|exists:program_keahlian,id_program',
            'nama_guru' => 'required|string|max:255',
            'nik_guru' => 'required|max:255|unique:direktori_guru,nik_guru',
            'jabatan_guru' => 'required|string|max:255',
            'TTL_guru' => 'required|date',
            'tempat_lahir_guru' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki - Laki,Perempuan',
            'no_hp_guru' => 'required|max:15',
            'alamat_guru' => 'required|string|max:255',
            'gambar_guru' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status_guru' => 'required|in:Aktif,Cuti,Pensiun,Resign',
            'email_guru' => 'required|email|max:255|unique:direktori_guru,email_guru',
        ]);

        $path = $request->file('gambar_guru')->store('image/gambarGuru', 'public');
        $validate['gambar_guru'] = $path;

        $status = DirektoriGuru::create($validate);
        if ($status) {
            return redirect()->back()->with('success', 'Data guru berhasil ditambahkan!');
        } else {
            return redirect()->back()->with('error', 'Data guru gagal ditambahkan!');
        }
    }

    public function updateDirektoriGuru(Request $request, $id_guru)
    {
        $guru = DirektoriGuru::findOrFail($id_guru);

        $validate = $request->validate([
            'id_program' => 'required|exists:program_keahlian,id_program',
            'nama_guru' => 'required|string|max:255',
            'nik_guru' => 'required|max:255|unique:direktori_guru,nik_guru,' . $id_guru . ',id_guru',
            'jabatan_guru' => 'required|string|max:255',
            'TTL_guru' => 'required|date',
            'tempat_lahir_guru' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki - Laki,Perempuan',
            'no_hp_guru' => 'required|max:15',
            'alamat_guru' => 'required|string|max:255',
            'gambar_guru' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status_guru' => 'required|in:Aktif,Cuti,Pensiun,Resign',
            'email_guru' => 'required|email|max:255|unique:direktori_guru,email_guru,' . $id_guru . ',id_guru',
        ]);

        if ($request->hasFile('gambar_guru')) {
            if ($guru->gambar_guru) {
                Storage::disk('public')->delete($guru->gambar_guru);
            }
            $path = $request->file('gambar_guru')->store('image/gambarGuru', 'public');
            $validate['gambar_guru'] = $path;
        }

        $status = $guru->update($validate);
        if ($status) {
            return redirect()->back()->with('success', 'Data guru berhasil diperbarui!');
        } else {
            return redirect()->back()->with('error', 'Data guru gagal diperbarui!');
        }
    }

    public function destroyDirektoriGuru($id_guru)
    {
        $guru = DirektoriGuru::findOrFail($id_guru);

        if ($guru->gambar_guru) {
            Storage::disk('public')->delete($guru->gambar_guru);
        }

        $status = $guru->delete();
        if ($status) {
            return redirect()->back()->with('success', 'Data guru berhasil dihapus!');
        } else {
            return redirect()->back()->with('error', 'Data guru gagal dihapus!');
        }
    }
}
