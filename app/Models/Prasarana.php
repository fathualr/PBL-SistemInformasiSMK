<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prasarana extends Model
{
    use HasFactory;

    protected $table = 'prasarana';
    protected $primaryKey = 'id_prasarana';
    protected $fillable = [
        'nama_prasarana',
        'jenis_prasarana',
        'deskripsi_prasarana',
        'luas',
        'kapasitas',
        'tahun_dibangun',
        'gambar_prasarana',
        'kondisi',
        'status_prasarana',
    ];

    // Relasi dengan foto prasarana
    public function foto_prasarana()
    {
        return $this->hasMany(FotoPrasarana::class, 'id_prasarana', 'id_prasarana');
    }
}
