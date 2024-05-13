<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SejarahSekolah extends Model
{
    protected $table = "sejarah_sekolah";

    protected $primaryKey = "id_sejarah";

    protected $fillable = [
        "judul_sejarah",
        "deskripsi_sejarah",
        "tanggal_sejarah",
        "gambar_sejarah"
    ];
}