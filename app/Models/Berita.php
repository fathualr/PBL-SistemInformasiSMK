<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'berita';
    protected $primaryKey = 'id_berita';
    protected $fillable = [
        'judul_berita',
        'isi_berita',
        'gambar_headline',
        'tanggal_berita',
    ];

    public function kategori()
    {
        return $this->hasMany(KategoriBerita::class, 'berita_id');
    }

    public function gambar()
    {
        return $this->hasMany(GambarBerita::class, 'berita_id');
    }
}
