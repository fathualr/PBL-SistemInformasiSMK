<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $table = 'album';
    protected $primaryKey = 'id_album';
    public $timestamps = true;
    protected $casts = [
        'tipe_album' => 'string',
    ];

    protected $fillable = [
        'nama_album',
        'tipe_album',
        'gambar_album',
        'deskripsi_album',
        'tanggal_unggah',
    ];
}
