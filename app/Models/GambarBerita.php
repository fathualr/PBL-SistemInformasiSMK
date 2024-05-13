<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GambarBerita extends Model
{
    use HasFactory;

    protected $table = 'gambar_berita';
    protected $primaryKey = 'id_gambar';
    protected $fillable = ['tautan_gambar', 'berita_id'];

    public function berita()
    {
        return $this->belongsTo(Berita::class, 'berita_id');
    }
}
