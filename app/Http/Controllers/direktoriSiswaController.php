<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DirektoriSiswa;
use App\Models\ProgramKeahlian;
use App\Models\MediaSosial;
use Illuminate\Support\Facades\Storage;

class direktoriSiswaController extends Controller
{
    public function siswa(Request $request)
    {
        $search = $request->query('search');
        $nama_program = $request->query('nama_program');
        $tahun_angkatan = $request->query('tahun_angkatan');
        $perPage = $request->query('perPage') ?? 10;

        $medsos = MediaSosial::first();
        $query = DirektoriSiswa::with('programKeahlian');

        if ($search) {
            $query->where('nama_siswa', 'like', '%' . $search . '%')
                ->orWhereHas('programKeahlian', function ($q) use ($search) {
                    $q->where('nama_program', 'like', '%' . $search . '%');
                })
                ->orWhere('tahun_angkatan_siswa', $search); // Pencarian berdasarkan tahun angkatan siswa
        }

        if ($nama_program) {
            $query->whereHas('programKeahlian', function ($q) use ($nama_program) {
                $q->where('nama_program', $nama_program);
            });
        }

        if ($tahun_angkatan) {
            $query->where('tahun_angkatan_siswa', $tahun_angkatan);
        }

        $direktoriSiswa = $query->paginate($perPage);
        $direktoriSiswa->appends([
            'search' => $search,
            'perPage' => $perPage,
            'nama_program' => $nama_program,
            'tahun_angkatan' => $tahun_angkatan // Mengirim tahun_angkatan ke view
        ]);

        $programKeahlian = ProgramKeahlian::all()->unique('nama_program');

        return view('guest.direktori-siswa', [
            'title' => 'Direktori Siswa',
            'direktoriSiswa' => $direktoriSiswa,
            'programKeahlian' => $programKeahlian,
            "medsos" => $medsos
        ]);
    }

    public function adminSiswa(Request $request)
    {
        $search = $request->query('search');
        $perPage = $request->query('perPage') ?? 10; // Default 10 jika tidak ada perPage

        // Cek apakah ada query pencarian
        if ($search) {
            // Pencarian berdasarkan nama_siswa, nisn_siswa, atau nama_program
            $siswa = DirektoriSiswa::with('programKeahlian')
                ->where('nama_siswa', 'like', '%' . $search . '%')
                ->orWhere('nisn_siswa', 'like', '%' . $search . '%')
                ->orWhereHas('programKeahlian', function ($query) use ($search) {
                    $query->where('nama_program', 'like', '%' . $search . '%');
                })
                ->paginate($perPage);
        } else {
            // Jika tidak ada query pencarian, tampilkan semua data
            $siswa = DirektoriSiswa::with('programKeahlian')->paginate($perPage);
        }

        // Menambahkan parameter pencarian dan perPage ke pagination links
        $siswa->appends(['search' => $search, 'perPage' => $perPage]);

        $programKeahlian = ProgramKeahlian::all();

        return view('admin.siswa', [
            "title" => "Admin Siswa",
            "siswa" => $siswa,
            "programKeahlian" => $programKeahlian,
            "search" => $search, // Mengirimkan search ke view
            "perPage" => $perPage, // Mengirimkan perPage ke view
        ]);
    }


    public function storeDirektoriSiswa(Request $request)
    {
        $validate = $request->validate([
            'id_program' => 'required|exists:program_keahlian,id_program',
            'nama_siswa' => 'required|string|max:255',
            'nisn_siswa' => 'required|string|max:255|unique:direktori_siswa,nisn_siswa',
            'jenis_kelamin_siswa' => 'required|in:Laki - Laki,Perempuan',
            'no_hp_siswa' => 'required|string|max:255',
            'TTL_siswa' => 'required|date',
            'tempat_lahir_siswa' => 'required|string|max:255',
            'alamat_siswa' => 'required|string',
            'kelas_siswa' => 'required|string|max:255',
            'tahun_angkatan_siswa' => 'required',
            'gambar_siswa' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('gambar_siswa')) {
            $path = $request->file('gambar_siswa')->store('image/gambarSiswa', 'public');
            $validate['gambar_siswa'] = $path;
        }

        $status = DirektoriSiswa::create($validate);
        if ($status) {
            return redirect()->route('admin.direktoriSiswa.index')->with('success', 'Data siswa berhasil ditambahkan!');
        } else {
            return redirect()->back()->with('error', 'Data siswa gagal ditambahkan!');
        }
    }

    public function updateDirektoriSiswa(Request $request, $id_siswa)
    {
        $siswa = DirektoriSiswa::findOrFail($id_siswa);

        $validate = $request->validate([
            'id_program' => 'required|exists:program_keahlian,id_program',
            'nama_siswa' => 'required|string|max:255',
            'nisn_siswa' => 'required|string|max:255|',
            'jenis_kelamin_siswa' => 'required|in:Laki - Laki,Perempuan',
            'no_hp_siswa' => 'required|string|max:255',
            'TTL_siswa' => 'required|date',
            'tempat_lahir_siswa' => 'required|string|max:255',
            'alamat_siswa' => 'required|string',
            'kelas_siswa' => 'required|string|max:255',
            'tahun_angkatan_siswa' => 'required',
            'gambar_siswa' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('gambar_siswa')) {
            if ($siswa->gambar_siswa) {
                Storage::disk('public')->delete($siswa->gambar_siswa);
            }
            $path = $request->file('gambar_siswa')->store('image/gambarSiswa', 'public');
            $validate['gambar_siswa'] = $path;
        }

        $status = $siswa->update($validate);
        if ($status) {
            return redirect()->back()->with('success', 'Data siswa berhasil diperbarui!');
        } else {
            return redirect()->back()->with('error', 'Data siswa gagal diperbarui!');
        }
    }

    public function destroyDirektoriSiswa($id_siswa)
    {
        $siswa = DirektoriSiswa::findOrFail($id_siswa);

        if ($siswa->gambar_siswa) {
            Storage::disk('public')->delete($siswa->gambar_siswa);
        }

        $status = $siswa->delete();
        if ($status) {
            return redirect()->back()->with('success', 'Data siswa berhasil dihapus!');
        } else {
            return redirect()->back()->with('error', 'Data siswa gagal dihapus!');
        }
    }
}
