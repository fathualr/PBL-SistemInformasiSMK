<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KontenWebsite;
use Illuminate\Support\Facades\Storage;

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

    public function update(Request $request, $id, $field){
        $konten = KontenWebsite::findOrFail($id);
        
        $validateRules = [
            'nama_sekolah' => 'required|string|max:255',
            'logo_sekolah' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'alamat_sekolah' => 'required',
            'no_telepon_sekolah' => 'required',
            'email_sekolah' => 'required',
            'nama_kepala_sekolah' => 'required',
            'sejarah' => 'required',
            'tautan_video_sejarah' => 'required',
            'sambutan' => 'required',
            'tautan_video_sambutan' => 'required',
            'visi' => 'required',
            'misi' => 'required',
            'nis' => 'required',
            'status_akreditasi_sekolah' => 'required',
            'struktur_organisasi_sekolah' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'status_kepemilikan_tanah' => 'required',
            'tahun_didirikan' => 'required',
            'tahun_operasional' => 'required',
            'no_statistik_sekolah' => 'required',
            'fasilitas_lainnya' => 'required',
            'luas_tanah' => 'required',
            'no_sertifikat' => 'required',
            'no_pendirian_sekolah' => 'required',
            'status_kepemilikan_bangunan' => 'required',
            'sisa_lahan_seluruhnya' => 'required',
            'luas_lahan_keseluruhan' => 'required',
            'teks_profile' => 'required',
            'teks_fasilitas' => 'required',
            'teks_lokasi' => 'required',
            'teks_sejarah' => 'required',
            'teks_prestasi' => 'required',
        ];
    
        $validate = $request->validate([
            $field => $validateRules[$field],
        ]);
    
        if($request->hasFile($field)){
            if($konten->$field){
                Storage::disk('public')->delete($konten->$field);
            }
            $validate[$field] = $request->file($field)->store('image/gambarKontenWebsite', 'public');
        }

        if ($field === 'tautan_video_sejarah' || $field === 'tautan_video_sambutan') {
            $videoId = $this->getYouTubeVideoId($request->$field);
            $validate[$field] = "https://www.youtube.com/embed/{$videoId}";
        }
    
        $status = $konten->fill($validate)->save();
        
        if($status){
            return redirect()->back()->with('success', 'Konten berhasil diubah!');
        }
        else{
            return redirect()->back()->with('error', 'Konten gagal diubah!');
        }
    }

    private function getYouTubeVideoId($url)
    {
        // Pattern untuk mencocokkan ID video YouTube
        $pattern = '/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/';

        preg_match($pattern, $url, $matches);

        return isset($matches[1]) ? $matches[1] : null;
    }
}
