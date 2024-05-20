<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SejarahSekolah extends Model
{
    Use HasFactory;
    protected $table = "sejarah_sekolah";

    protected $primaryKey = "id_sejarah";

    protected $fillable = [
        "judul_sejarah",
        "deskripsi_sejarah",
        "tanggal_sejarah",
        "gambar_sejarah"
    ];
}