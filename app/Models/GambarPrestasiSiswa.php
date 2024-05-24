<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GambarPrestasiSiswa extends Model
{
    use HasFactory;
    protected $table = "gambar_prestasi";
    protected $primaryKey = "id_gambar";
    protected $fillable = [
        "id_prestasi",
        "gambar"
    ];
    public function prestasiSiswa()
    {
        return $this->belongsTo(PrestasiSiswa::class, 'id_prestasi');
    }
}
