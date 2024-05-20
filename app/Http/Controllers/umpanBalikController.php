<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UmpanBalik;

class umpanBalikController extends Controller
{
        public function adminUmpanBalik()
    {
        $umpanBalik = UmpanBalik::all();
        return view('admin/umpanBalik', [
            "title" => "Admin Umpan Balik",
            "umpanBalik"=> $umpanBalik
        ]);
    }

    public function storeUmpanBalik(Request $request)
    {

            UmpanBalik::create([
                "nama_penulis" => $request->nama_penulis,
                "email_penulis" => $request->email_penulis,
                "deskripsi_pesan" => $request->deskripsi_pesan
            ]);
            return redirect()->route('guest.media-sosial.index');
    }

        public function destroyUmpanBalik($id_pesan)
    {
        $umpanBalik = UmpanBalik::findOrFail($id_pesan);

        $umpanBalik->delete();

        return redirect()->route('admin.umpanBalik.index');
    }
}
