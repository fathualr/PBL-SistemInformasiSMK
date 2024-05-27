<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MediaSosial;

class MediaSosialController extends Controller
{   
    public function __construct(){
        if(MediaSosial::count() === 0) {
            $konten = new MediaSosial;
            $konten->save();
        }
    }

    public function adminSosialMedia()
    {
        $medsos = MediaSosial::first();
        return view('admin/sosialMedia', [
            "title" => "Admin Sosial Media",
            "medsos" => $medsos,
        ]);
    }
    public function guestSosialMedia()
    {
        $medsos = MediaSosial::first();
        return view('guest/media-sosial', [
            "title" => "Sosial Media",
            "medsos" => $medsos,
        ]);
    }
    public function updateMediaSosial(Request $request, $id)
{
    try {
        $request->validate([
            'nomor_telepon' => 'required',
            'fax' => 'required',
            'instagram' => 'required',
            'facebook' => 'required',
            'youtube' => 'required',
            'tiktok' => 'required',
            'email' => 'required',
            'google_map' => 'required',
        ]);

        $media_sosial = MediaSosial::findOrFail($id);

        // Periksa setiap atribut yang dikirimkan dan hanya perbarui yang diterima
        $updateData = [];
        if ($request->has('nomor_telepon')) {
            $updateData['nomor_telepon'] = $request->nomor_telepon;
        }
        if ($request->has('fax')) {
            $updateData['fax'] = $request->fax;
        }
        if ($request->has('instagram')) {
            $updateData['instagram'] = $request->instagram;
        }
        if ($request->has('facebook')) {
            $updateData['facebook'] = $request->facebook;
        }
        if ($request->has('youtube')) {
            $updateData['youtube'] = $request->youtube;
        }
        if ($request->has('tiktok')) {
            $updateData['tiktok'] = $request->tiktok;
        }
        if ($request->has('email')) {
            $updateData['email'] = $request->email;
        }
        if ($request->has('google_map')) {
            $updateData['google_map'] = $request->google_map;
        }

        // Perbarui data dengan atribut-atribut yang diperbarui
        $media_sosial->update($updateData);

        return redirect()->route('admin.mediaSosial.index')->with('success', 'Media Sosial berhasil diupdate');
    } catch (\Exception $e) {
        return back()->with('error', 'Gagal mengupdate Media Sosial: ' . $e->getMessage());
    }
}

public function update(Request $request, $id, $field){
    $konten = MediaSosial::findOrFail($id);

    $validateRules = [
        'nomor_telepon' => 'required',
        'fax' => 'required',
        'instagram' => 'required',
        'facebook' => 'required',
        'youtube' => 'required',
        'tiktok' => 'required',
        'email' => 'required',
        'google_map' => 'required',
    ];

    $validate = $request->validate([
        $field => $validateRules[$field],
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