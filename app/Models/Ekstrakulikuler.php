<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\GambarEkstarkurikuler;

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
    public function guru()
    {
        return $this->belongsTo(DirektoriGuru::class, 'id_guru');
    }

    public function gambarEkstrakurikuler()
    {
        return $this->hasMany(GambarEkstarkurikuler::class, 'id_ekstrakurikuler');
    }
}