<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UmpanBalik;

class umpanBalikController extends Controller
{
    public function adminUmpanBalik(Request $request){
        $search = $request->query('search');
        $perPage = $request->query('perPage') ?? 10; // Default 10 jika tidak ada perPage

        if ($search) {
            // Pencarian berdasarkan nama_alumni atau tahun_kelulusan_alumni
            $umpanBalik = UmpanBalik::where('nama_penulis', 'like', '%' . $search . '%')
                ->orWhere('email_penulis', 'like', '%' . $search . '%')
                ->paginate($perPage);
        } else {
            // Jika tidak ada query pencarian, tampilkan semua data
            $umpanBalik = UmpanBalik::paginate($perPage);
        }
    
        // Menambahkan parameter pencarian dan perPage ke pagination links
        $umpanBalik->appends(['search' => $search, 'perPage' => $perPage]);

        return view('admin/umpanBalik', [
            "title" => "Admin Umpan Balik",
            "umpanBalik"=> $umpanBalik,
            "search" => $search, // Mengirimkan search ke view
            "perPage" => $perPage, // Mengirimkan perPage ke view
        ]);
    }

    public function storeUmpanBalik(Request $request){
        $validatedData = $request->validate([
            'nama_penulis' => 'required|string|max:255',
            'email_penulis' => 'required|email|max:255',
            'deskripsi_pesan' => 'required|string',
        ]);
    
        $umpanBalik = UmpanBalik::create($validatedData);
    
        if ($umpanBalik) {
            return redirect()->back()->with('success', 'Umpan balik berhasil dikirim!');
        } else {
            return redirect()->back()->with('error', 'Umpan balik gagal dikirim!');
        }
    }

    public function destroyUmpanBalik($id_pesan){
        $umpanBalik = UmpanBalik::findOrFail($id_pesan);
    
        if ($umpanBalik->delete()) {
            return redirect()->back()->with('success', 'Umpan balik berhasil dihapus!');
        } else {
            return redirect()->back()->with('error', 'Umpan balik gagal dihapus!');
        }
    }
}
