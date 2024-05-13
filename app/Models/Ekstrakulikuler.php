<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ekstrakulikuler extends Model
{
    protected $table = "ekstrakurikuler";
    protected $primaryKey = "id_ekstrakurikuler";
    protected $fillable = [
        "id_guru",
        "nama_ekstrakurikuler",
        "deskripsi_ekstrakurikuler",
        "tempat_ekstrakurikuler",
        "jadwal_ekstrakurikuler",
        "gambar_profil_ekstrakurikuler"
    ];
    public function direktoriGuru()
    {
        return $this->belongsTo(DirektoriGuru::class);
    }
}