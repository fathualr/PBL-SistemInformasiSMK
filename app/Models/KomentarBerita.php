<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomentarBerita extends Model
{
    use HasFactory;

    protected $table = 'komentar_berita';
    protected $primaryKey = 'id_komentar';
    public $timestamps = true;

    protected $fillable = [
        'id_berita',
        'nama_komentar',
        'teks_komentar',
    ];

    public function berita(){
        return $this->belongsTo(Berita::class, 'id_berita', 'id_berita');
    }
}
