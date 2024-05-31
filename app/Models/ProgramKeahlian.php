<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramKeahlian extends Model
{
    use HasFactory;
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
        return $this->belongsTo(CapaianPembelajaran::class, 'id_program');
    }

    public function peluangKerja()
    {
        return $this->hasMany(PeluangKerja::class, 'id_program');
    }

    public function direktoriGuru()
    {
        return $this->belongsTo(DirektoriGuru::class, 'id_direktori_guru');
    }

    public function direktoriSiswa()
    {
        return $this->belongsTo(DirektoriSiswa::class, 'id_direktori_siswa');
    }
}
