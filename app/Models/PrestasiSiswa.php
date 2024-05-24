<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrestasiSiswa extends Model
{
    use HasFactory;
    protected $table = "prestasi_siswa";
    protected $primaryKey = "id_prestasi";
    protected $fillable = [
        "nama_prestasi",
        "siswa_prestasi",
        "gambar_prestasi",
        "deskripsi_prestasi",
        "tanggal_prestasi",
        "kategori_prestasi",
        "tingkat_prestasi"
    ];

    public function gambarPrestasi()
    {
        return $this->hasMany(GambarPrestasiSiswa::class, 'id_prestasi');
    }
}
