<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UmpanBalik extends Model
{
    protected $table = "umpan_balik";
    protected $primaryKey = "id_pesan";
    protected $fillable = [
        "nama_penulis",
        "email_penulis",
        "deskripsi_pesan"
    ];
}