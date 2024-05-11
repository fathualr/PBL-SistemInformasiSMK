<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformasiPPDB extends Model
{
   
    use HasFactory;

    protected $table = 'informasi_ppdb';
    protected $primaryKey = 'id_ppdb';
    protected $fillable = [
        'deskripsi_ppdb',
    ];
}
