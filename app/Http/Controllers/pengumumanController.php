<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormPPDB;
use App\Models\InformasiPPDB;
use App\Models\PengumumanPPDB;

class PengumumanController extends Controller
{
    public function adminPengumumanPPDB(Request $request)
    {
        $search = $request->query('search');
        $perPage = $request->query('perPage') ?? 10; // Mengambil nilai 'perPage' dari query string atau default 10 jika tidak ada

        // Lakukan pengecekan apakah terdapat query pencarian
        if ($search) {
            // Jika ada, lakukan pencarian berdasarkan nama atau NISN
            $forms = FormPPDB::where('nama_lengkap', 'like', '%' . $search . '%')
                ->orWhere('nisn', 'like', '%' . $search . '%')
                ->orWhere('tahun_pendaftaran', 'like', '%' . $search . '%')
                ->orWhere('pilihan_1', 'like', '%' . $search . '%')
                ->orWhere('pilihan_2', 'like', '%' . $search . '%')
                ->paginate($perPage);
        } else {
            // Jika tidak ada query pencarian, tampilkan semua data
            $forms = FormPPDB::orderBy('tahun_pendaftaran', 'desc')->paginate($perPage);
        }

        return view('admin.pengumumanPPDB', [
            "title" => "Admin Pengumuman PPDB",
            "forms" => $forms,
        ]);
    }

    public function pengumuman(Request $request)
    {
        $search = $request->query('search');
        $perPage = $request->query('perPage') ?? 25; // Mengambil nilai 'perPage' dari query string atau default 10 jika tidak ada
        $informasi = InformasiPPDB::first();
        $pengumuman_ppdb = PengumumanPPDB::first();

        // Lakukan pengecekan apakah terdapat query pencarian
        if ($search) {
            // Jika ada, lakukan pencarian berdasarkan nama atau NISN
            $forms = FormPPDB::where('nama_lengkap', 'like', '%' . $search . '%')
                ->orWhere('nisn', 'like', '%' . $search . '%')
                ->orWhere('tahun_pendaftaran', 'like', '%' . $search . '%')
                ->paginate($perPage);
        } else {
            // Jika tidak ada query pencarian, tampilkan semua data
            $forms = FormPPDB::orderBy('tahun_pendaftaran', 'desc')->paginate($perPage);
        }

        $forms->appends(['search' => $search, 'perPage' => $perPage]);

        return view('guest.pengumuman-ppdb', [
            "title" => "Guest Pendaftaran PPDB",
            "informasi" => $informasi,
            "forms" => $forms,
            "search" => $search, // Mengirimkan search ke view
            "perPage" => $perPage, // Mengirimkan perPage ke view
            'pengumuman_ppdb' => $pengumuman_ppdb
        ]);
    }

    public function updateBatch(Request $request)
    {
        $ids = $request->input('selected_forms');
        $status = $request->input('status');
        $program = $request->input('program');

        if (!empty($ids)) {
            foreach ($ids as $id) {
                $form = FormPPDB::find($id);
                $form->status = $status;

                // Jika status "Diterima" dan program dipilih, update programnya
                if ($status === 'Diterima' && $program) {
                    if ($program === 'pilihan_1') {
                        $form->program_diterima = $form->pilihan_1;
                    } elseif ($program === 'pilihan_2') {
                        $form->program_diterima = $form->pilihan_2;
                    }
                }

                $form->save();
            }
        }

        return redirect()->route('admin.pengumumanPPDB.index')->with('success', 'Status berhasil diperbarui.');
    }
}
