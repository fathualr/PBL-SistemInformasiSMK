<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PeluangKerja extends Model
{
    protected $table = "peluang_kerja";
    protected $primaryKey = "id_peluang_kerja";
    protected $fillable = [
        "id_program",
        "peluang_kerja",
        "deskripsi_pekerjaan"
    ];
    public function programKeahlian()
    {
        return $this->belongsTo(ProgramKeahlian::class);
    }
}