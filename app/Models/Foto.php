<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{

    use HasFactory;

    protected $table = 'foto';
    protected $primaryKey = 'id_foto';
    protected $fillable = ['id_album', 'tautan_foto'];

    // Relasi dengan model Album
    public function album()
    {
        return $this->belongsTo(Album::class, 'id_album', 'id_album');
    }
}
