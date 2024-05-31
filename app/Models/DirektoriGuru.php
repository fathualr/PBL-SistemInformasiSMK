<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DirektoriGuru extends Model
{
    use HasFactory;
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
        return $this->belongsTo(ProgramKeahlian::class, 'id_program', 'id_program');
    }

        public function ekstrakurikuler()
    {
        return $this->belongsTo(Ekstrakulikuler::class, 'id_guru');
    }
}