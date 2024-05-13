<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DirektoriGuru extends Model
{
    protected $table = "direktori_guru";
    protected $primaryKey = "id_guru";
    protected $fillable = [
        "id_program",
        "nama_guru",
        "nik_guru",
        "jabatan_guru",
        "TTL_guru",
        "tempat_lahir_guru",
        "jenis_kelamin",
        "no_hp_guru",
        "alamat_guru",
        "gambar_guru",
        "status_guru",
        "email_guru"
    ];
    public function programKeahlian()
    {
        return $this->belongsTo(ProgramKeahlian::class);
    }
}