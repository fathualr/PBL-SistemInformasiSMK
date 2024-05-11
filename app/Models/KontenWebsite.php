<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KontenWebsite extends Model
{
    use HasFactory;

    protected $table = 'konten_website';
    protected $primaryKey = 'id_sekolah';
    protected $fillable = [
        'nama_sekolah',
        'logo_sekolah',
        'alamat_sekolah',
        'no_telepon_sekolah',
        'email_sekolah',
        'sejarah',
        'tautan_video_sejarah',
        'sambutan',
        'tautan_video_sambutan',
        'visi',
        'misi',
        'nis',
        'status_akreditasi_sekolah',
        'struktur_organisasi_sekolah',
        'status_kepemilikan_tanah',
        'tahun_didirikan',
        'tahun_operasional',
        'no_statistik_sekolah',
        'fasilitas_lainnya',
        'luas_tanah',
        'nama_kepala_sekolah',
        'no_sertifikat',
        'no_pendirian_sekolah',
        'status_kepemilikan_bangunan',
        'sisa_lahan_seluruhnya',
        'luas_lahan_keseluruhan',
        'teks_profile',
        'teks_fasilitas',
        'teks_lokasi',
        'teks_sejarah',
        'teks_prestasi',
    ];
}
