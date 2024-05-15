<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CapaianPembelajaran;
use App\Models\PeluangKerja;
use App\Models\DirektoriGuru;
use App\Models\DirektoriSiswa;

class ProgramKeahlian extends Model
{
    protected $table = "program_keahlian";
    protected $primaryKey = "id_program";
    protected $fillable = [
        "nama_program",
        "logo_program",
        "deskripsi_program",
        "deskripsi_peluang_kerja",
        "visi_program",
        "misi_program",
        "tujuan_program",
        "sasaran_program"
    ];
    public function capaianPembelajaran()
    {
        return $this->hasMany(CapaianPembelajaran::class);
    }
    public function peluangKerja()
    {
        return $this->hasMany(PeluangKerja::class);
    }
    public function direktoriGuru()
    {
        return $this->belongsTo(DirektoriGuru::class);
    }
    public function direktoriSiswa()
    {
        return $this->belongsTo(DirektoriSiswa::class);
    }
}