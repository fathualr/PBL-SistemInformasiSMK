<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoPrasarana extends Model
{
    use HasFactory;

    protected $table = 'foto_prasarana';
    protected $primaryKey = 'id_foto_prasarana';
    protected $fillable = [
        'id_prasarana',
        'tautan_foto',
    ];

    // Relasi dengan prasarana
    public function prasarana()
    {
        return $this->belongsTo(Prasarana::class, 'id_prasarana', 'id_prasarana');
    }
}

