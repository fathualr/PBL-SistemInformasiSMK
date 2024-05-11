<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KontenWebsite;

class kontenWebsiteActionController extends Controller
{
    public function __construct(){
        if(KontenWebsite::count() === 0) {
            $konten = new KontenWebsite;
            $konten->save();
        }
    }

    public function index(){
        $konten = KontenWebsite::first();
        return view('admin/profile', [
            "konten" => $konten,
            "title" => "Profile"
        ]);
    }

    public function updateNamaSekolah(Request $request, $id){
        $konten = KontenWebsite::findOrFail($id);
        $validate = $request->validate([
            'nama_sekolah' => 'required|string|max:255',
        ]);
        $status = $konten->fill($validate)->save();
        if($status){
            return redirect()->back()->with('success', 'Konten berhasil diubah!');
        }
        else{
            return redirect()->back()->with('error', 'Konten gagal diubah!');
        }
    }
    
    public function updateLogoSekolah(Request $request, $id){
        $konten = KontenWebsite::findOrFail($id);
        $validate = $request->validate([
            'logo_sekolah' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $validate['logo_sekolah'] = $request->file('logo_sekolah')->store('image/gambarKontenWebsite', 'public');

        $status = $konten->fill($validate)->save();
        if($status){
            return redirect()->back()->with('success', 'Konten berhasil diubah!');
        }
        else{
            return redirect()->back()->with('error', 'Konten gagal diubah!');
        }
    }

    public function updateAlamatSekolah(Request $request, $id){
        $konten = KontenWebsite::findOrFail($id);
        $validate = $request->validate([
            'alamat_sekolah' => 'required',
        ]);
        $status = $konten->fill($validate)->save();
        if($status){
            return redirect()->back()->with('success', 'Konten berhasil diubah!');
        }
        else{
            return redirect()->back()->with('error', 'Konten gagal diubah!');
        }
    }
    
    public function updateNoTelpSekolah(Request $request, $id){
        $konten = KontenWebsite::findOrFail($id);
        $validate = $request->validate([
            'no_telepon_sekolah' => 'required',
        ]);
        $status = $konten->fill($validate)->save();
        if($status){
            return redirect()->back()->with('success', 'Konten berhasil diubah!');
        }
        else{
            return redirect()->back()->with('error', 'Konten gagal diubah!');
        }
    }
    
    public function updateEmailSekolah(Request $request, $id){
        $konten = KontenWebsite::findOrFail($id);
        $validate = $request->validate([
            'email_sekolah' => 'required',
        ]);
        $status = $konten->fill($validate)->save();
        if($status){
            return redirect()->back()->with('success', 'Konten berhasil diubah!');
        }
        else{
            return redirect()->back()->with('error', 'Konten gagal diubah!');
        }
    }
    
    public function updateNamaKepalaSekolah(Request $request, $id){
        $konten = KontenWebsite::findOrFail($id);
        $validate = $request->validate([
            'nama_kepala_sekolah' => 'required',
        ]);
        $status = $konten->fill($validate)->save();
        if($status){
            return redirect()->back()->with('success', 'Konten berhasil diubah!');
        }
        else{
            return redirect()->back()->with('error', 'Konten gagal diubah!');
        }
    }
    
    public function updateSejarah(Request $request, $id){
        $konten = KontenWebsite::findOrFail($id);
        $validate = $request->validate([
            'sejarah' => 'required',
        ]);
        $status = $konten->fill($validate)->save();
        if($status){
            return redirect()->back()->with('success', 'Konten berhasil diubah!');
        }
        else{
            return redirect()->back()->with('error', 'Konten gagal diubah!');
        }
    }
    
    public function updateTautanVideoSejarah(Request $request, $id){
        $konten = KontenWebsite::findOrFail($id);
        $validate = $request->validate([
            'tautan_video_sejarah' => 'required',
        ]);
        $status = $konten->fill($validate)->save();
        if($status){
            return redirect()->back()->with('success', 'Konten berhasil diubah!');
        }
        else{
            return redirect()->back()->with('error', 'Konten gagal diubah!');
        }
    }
    
    public function updateSambutan(Request $request, $id){
        $konten = KontenWebsite::findOrFail($id);
        $validate = $request->validate([
            'sambutan' => 'required',
        ]);
        $status = $konten->fill($validate)->save();
        if($status){
            return redirect()->back()->with('success', 'Konten berhasil diubah!');
        }
        else{
            return redirect()->back()->with('error', 'Konten gagal diubah!');
        }
    }
    
    public function updateTautanVideoSambutan(Request $request, $id){
        $konten = KontenWebsite::findOrFail($id);
        $validate = $request->validate([
            'tautan_video_sambutan' => 'required',
        ]);
        $status = $konten->fill($validate)->save();
        if($status){
            return redirect()->back()->with('success', 'Konten berhasil diubah!');
        }
        else{
            return redirect()->back()->with('error', 'Konten gagal diubah!');
        }
    }
    
    public function updateVisi(Request $request, $id){
        $konten = KontenWebsite::findOrFail($id);
        $validate = $request->validate([
            'visi' => 'required',
        ]);
        $status = $konten->fill($validate)->save();
        if($status){
            return redirect()->back()->with('success', 'Konten berhasil diubah!');
        }
        else{
            return redirect()->back()->with('error', 'Konten gagal diubah!');
        }
    }
    
    public function updateMisi(Request $request, $id){
        $konten = KontenWebsite::findOrFail($id);
        $validate = $request->validate([
            'misi' => 'required',
        ]);
        $status = $konten->fill($validate)->save();
        if($status){
            return redirect()->back()->with('success', 'Konten berhasil diubah!');
        }
        else{
            return redirect()->back()->with('error', 'Konten gagal diubah!');
        }
    }
    
    public function updateNis(Request $request, $id){
        $konten = KontenWebsite::findOrFail($id);
        $validate = $request->validate([
            'nis' => 'required',
        ]);
        $status = $konten->fill($validate)->save();
        if($status){
            return redirect()->back()->with('success', 'Konten berhasil diubah!');
        }
        else{
            return redirect()->back()->with('error', 'Konten gagal diubah!');
        }
    }
    
    public function updateStatusAkreditasiSekolah(Request $request, $id){
        $konten = KontenWebsite::findOrFail($id);
        $validate = $request->validate([
            'status_akreditasi_sekolah' => 'required',
        ]);
        $status = $konten->fill($validate)->save();
        if($status){
            return redirect()->back()->with('success', 'Konten berhasil diubah!');
        }
        else{
            return redirect()->back()->with('error', 'Konten gagal diubah!');
        }
    }
    
    public function updateStrukturOrganisasiSekolah(Request $request, $id){
        $konten = KontenWebsite::findOrFail($id);
        $validate = $request->validate([
            'struktur_organisasi_sekolah' => 'required',
        ]);
        $validate['struktur_organisasi_sekolah'] = $request->file('struktur_organisasi_sekolah')->store('image/gambarKontenWebsite', 'public');

        $status = $konten->fill($validate)->save();
        if($status){
            return redirect()->back()->with('success', 'Konten berhasil diubah!');
        }
        else{
            return redirect()->back()->with('error', 'Konten gagal diubah!');
        }
    }
    
    public function updateStatusKepemilikanTanah(Request $request, $id){
        $konten = KontenWebsite::findOrFail($id);
        $validate = $request->validate([
            'status_kepemilikan_tanah' => 'required',
        ]);
        $status = $konten->fill($validate)->save();
        if($status){
            return redirect()->back()->with('success', 'Konten berhasil diubah!');
        }
        else{
            return redirect()->back()->with('error', 'Konten gagal diubah!');
        }
    }
    
    public function updateTahunDidirikan(Request $request, $id){
        $konten = KontenWebsite::findOrFail($id);
        $validate = $request->validate([
            'tahun_didirikan' => 'required',
        ]);
        $status = $konten->fill($validate)->save();
        if($status){
            return redirect()->back()->with('success', 'Konten berhasil diubah!');
        }
        else{
            return redirect()->back()->with('error', 'Konten gagal diubah!');
        }
    }
    
    public function updateTahunOperasional(Request $request, $id){
        $konten = KontenWebsite::findOrFail($id);
        $validate = $request->validate([
            'tahun_operasional' => 'required',
        ]);
        $status = $konten->fill($validate)->save();
        if($status){
            return redirect()->back()->with('success', 'Konten berhasil diubah!');
        }
        else{
            return redirect()->back()->with('error', 'Konten gagal diubah!');
        }
    }
    
    public function updateNoStatistikSekolah(Request $request, $id){
        $konten = KontenWebsite::findOrFail($id);
        $validate = $request->validate([
            'no_statistik_sekolah' => 'required',
        ]);
        $status = $konten->fill($validate)->save();
        if($status){
            return redirect()->back()->with('success', 'Konten berhasil diubah!');
        }
        else{
            return redirect()->back()->with('error', 'Konten gagal diubah!');
        }
    }
    
    public function updateFasilitasLainnya(Request $request, $id){
        $konten = KontenWebsite::findOrFail($id);
        $validate = $request->validate([
            'fasilitas_lainnya' => 'required',
        ]);
        $status = $konten->fill($validate)->save();
        if($status){
            return redirect()->back()->with('success', 'Konten berhasil diubah!');
        }
        else{
            return redirect()->back()->with('error', 'Konten gagal diubah!');
        }
    }
    
    public function updateLuasTanah(Request $request, $id){
        $konten = KontenWebsite::findOrFail($id);
        $validate = $request->validate([
            'luas_tanah' => 'required',
        ]);
        $status = $konten->fill($validate)->save();
        if($status){
            return redirect()->back()->with('success', 'Konten berhasil diubah!');
        }
        else{
            return redirect()->back()->with('error', 'Konten gagal diubah!');
        }
    }
    
    public function updateNoSertifikat(Request $request, $id){
        $konten = KontenWebsite::findOrFail($id);
        $validate = $request->validate([
            'no_sertifikat' => 'required',
        ]);
        $status = $konten->fill($validate)->save();
        if($status){
            return redirect()->back()->with('success', 'Konten berhasil diubah!');
        }
        else{
            return redirect()->back()->with('error', 'Konten gagal diubah!');
        }
    }
    
    public function updateNoPendirianSekolah(Request $request, $id){
        $konten = KontenWebsite::findOrFail($id);
        $validate = $request->validate([
            'no_pendirian_sekolah' => 'required',
        ]);
        $status = $konten->fill($validate)->save();
        if($status){
            return redirect()->back()->with('success', 'Konten berhasil diubah!');
        }
        else{
            return redirect()->back()->with('error', 'Konten gagal diubah!');
        }
    }
    
    public function updateStatusKepemilikanBangunan(Request $request, $id){
        $konten = KontenWebsite::findOrFail($id);
        $validate = $request->validate([
            'status_kepemilikan_bangunan' => 'required',
        ]);
        $status = $konten->fill($validate)->save();
        if($status){
            return redirect()->back()->with('success', 'Konten berhasil diubah!');
        }
        else{
            return redirect()->back()->with('error', 'Konten gagal diubah!');
        }
    }
    
    public function updateSisaLahanSeluruhnya(Request $request, $id){
        $konten = KontenWebsite::findOrFail($id);
        $validate = $request->validate([
            'sisa_lahan_seluruhnya' => 'required',
        ]);
        $status = $konten->fill($validate)->save();
        if($status){
            return redirect()->back()->with('success', 'Konten berhasil diubah!');
        }
        else{
            return redirect()->back()->with('error', 'Konten gagal diubah!');
        }
    }
    
    public function updateLuasLahanKeseluruhan(Request $request, $id){
        $konten = KontenWebsite::findOrFail($id);
        $validate = $request->validate([
            'luas_lahan_keseluruhan' => 'required',
        ]);
        $status = $konten->fill($validate)->save();
        if($status){
            return redirect()->back()->with('success', 'Konten berhasil diubah!');
        }
        else{
            return redirect()->back()->with('error', 'Konten gagal diubah!');
        }
    }
    
    public function updateTeksProfile(Request $request, $id){
        $konten = KontenWebsite::findOrFail($id);
        $validate = $request->validate([
            'teks_profile' => 'required',
        ]);
        $status = $konten->fill($validate)->save();
        if($status){
            return redirect()->back()->with('success', 'Konten berhasil diubah!');
        }
        else{
            return redirect()->back()->with('error', 'Konten gagal diubah!');
        }
    }
    
    public function updateTeksFasilitas(Request $request, $id){
        $konten = KontenWebsite::findOrFail($id);
        $validate = $request->validate([
            'teks_fasilitas' => 'required',
        ]);
        $status = $konten->fill($validate)->save();
        if($status){
            return redirect()->back()->with('success', 'Konten berhasil diubah!');
        }
        else{
            return redirect()->back()->with('error', 'Konten gagal diubah!');
        }
    }
    
    public function updateTeksLokasi(Request $request, $id){
        $konten = KontenWebsite::findOrFail($id);
        $validate = $request->validate([
            'teks_lokasi' => 'required',
        ]);
        $status = $konten->fill($validate)->save();
        if($status){
            return redirect()->back()->with('success', 'Konten berhasil diubah!');
        }
        else{
            return redirect()->back()->with('error', 'Konten gagal diubah!');
        }
    }
    
    public function updateTeksSejarah(Request $request, $id){
        $konten = KontenWebsite::findOrFail($id);
        $validate = $request->validate([
            'teks_sejarah' => 'required',
        ]);
        $status = $konten->fill($validate)->save();
        if($status){
            return redirect()->back()->with('success', 'Konten berhasil diubah!');
        }
        else{
            return redirect()->back()->with('error', 'Konten gagal diubah!');
        }
    }
    
    public function updateTeksPrestasi(Request $request, $id){
        $konten = KontenWebsite::findOrFail($id);
        $validate = $request->validate([
            'teks_prestasi' => 'required',
        ]);
        $status = $konten->fill($validate)->save();
        if($status){
            return redirect()->back()->with('success', 'Konten berhasil diubah!');
        }
        else{
            return redirect()->back()->with('error', 'Konten gagal diubah!');
        }
    }
    
}
