<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramKeahlian extends Model
{
    protected $table = "programKeahlian";
    protected $primaryKey = "id_program";
    protected $fillable = [
        "nama_program",
        "logo_program",
        "deskripsi_program",
        "visi_program",
        "misi_program",
        "tujuan_program",
        "sasaran_program"
    ];
}