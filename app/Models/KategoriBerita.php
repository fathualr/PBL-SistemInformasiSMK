<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBerita extends Model
{
    use HasFactory;

    protected $table = 'kategori_berita';
    protected $primaryKey = 'id_kategori';
    protected $fillable = ['nama_kategori', 'berita_id'];

    public function berita()
    {
        return $this->belongsTo(Berita::class, 'berita_id');
    }
}
