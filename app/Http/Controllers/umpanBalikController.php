<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UmpanBalik;

class umpanBalikController extends Controller
{
    public function adminUmpanBalik(){
        $umpanBalik = UmpanBalik::paginate(10);
        return view('admin/umpanBalik', [
            "title" => "Admin Umpan Balik",
            "umpanBalik"=> $umpanBalik
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
