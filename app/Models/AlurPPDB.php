<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class AlurPPDB extends Model
{
    use HasFactory;

    protected $table = 'alur_ppdb';
    protected $primaryKey = 'id_alur';
    protected $fillable = [
        'judul_alur',
        'tanggal_alur',
        'deskripsi_alur',
    ];
    public function getTanggalAlurAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d', $value)->subMonth()->format('d F Y');
    }
}
