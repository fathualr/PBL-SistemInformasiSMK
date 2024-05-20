<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DirektoriSiswa extends Model
{
    protected $table = "direktori_siswa";
    protected $primaryKey = "id_siswa";
    protected $fillable = [
        "id_program",
        "nama_siswa",
        "nisn_siswa",
        "jenis_kelamin_siswa",
        "no_hp_siswa",
        "TTL_siswa",
        "tempat_lahir_siswa",
        "alamat_siswa",
        "kelas_siswa",
        "tahun_angkatan_siswa",
        "gambar_siswa"
    ];
        public function programKeahlian()
    {
        return $this->belongsTo(ProgramKeahlian::class);
    }
}