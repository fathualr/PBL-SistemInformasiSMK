<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormPPDB;

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
                ->paginate($perPage);
        } else {
            // Jika tidak ada query pencarian, tampilkan semua data
            $forms = FormPPDB::orderBy('created_at', 'desc')->paginate($perPage);
        }
    
        return view('admin.pengumumanPPDB', [
            "title" => "Admin Pendaftaran PPDB",
            "forms" => $forms,
        ]);
    }

    public function updateBatch(Request $request)
    {
        $ids = $request->input('selected_forms');
        $status = $request->input('status');

        if (!empty($ids)) {
            FormPPDB::whereIn('id_pendaftaran', $ids)->update(['status' => $status]);
        }

        return redirect()->route('admin.pengumumanPPDB.index')->with('success', 'Status berhasil diperbarui.');
    }
}
