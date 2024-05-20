<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DirektoriPegawai extends Model
{
    protected $table = "direktori_pegawai";
    protected $primaryKey = "id_pegawai";
    protected $fillable = [
        "nama_pegawai",
        "nik_pegawai",
        "jabatan_pegawai",
        "TTL_pegawai",
        "tempat_lahir_pegawai",
        "jenis_kelamin",
        "no_hp_pegawai",
        "alamat_pegawai",
        "gambar_pegawai",
        "status_pegawai",
        "email_pegawai"
    ];
}