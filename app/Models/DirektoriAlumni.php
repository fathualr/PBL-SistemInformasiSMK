<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DirektoriAlumni extends Model
{
    use HasFactory;
    protected $table = "direktori_alumni";
    protected $primaryKey = "id_alumni";
    protected $fillable = [
        "nama_alumni",
        "no_hp_alumni",
        "email_alumni",
        "jenis_kelamin_alumni",
        "TTL_alumni",
        "tempat_lahir_alumni",
        "tahun_kelulusan_alumni",
        "gambar_alumni",
        "alamat_alumni"
    ];
}