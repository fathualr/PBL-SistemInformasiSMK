<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GambarEkstarkurikuler extends Model
{
    Use HasFactory;
    protected $table = "gambar_ekstrakurikuler";
    protected $primaryKey = "id_gambar_ekstrakurikuler";
    protected $fillable = [
        "id_ekstrakurikuler",
        "gambar_ekstrakurikuler"
    ];
    public function ekstrakurikuler()
    {
        return $this->belongsTo(Ekstrakulikuler::class, 'id_ekstrakurikuler');
    }
}