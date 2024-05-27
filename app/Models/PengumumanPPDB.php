<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengumumanPPDB extends Model
{
    use HasFactory;

    protected $table = 'pengumuman_ppdb';

    protected $primaryKey = 'id_pengumuman';

    protected $fillable = [
        'id_pendaftaran',
        'tautan_dokumen',
    ];
}
