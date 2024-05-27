<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CapaianPembelajaran extends Model
{
    use HasFactory;
    protected $table = "capaian_pembelajaran";
    protected $primaryKey = "id_capaian_pembelajaran";
    protected $fillable = [
        "id_program",
        "deskripsi_capaian_pembelajaran",
        "aspek_sikap",
        "aspek_pengetahuan",
        "aspek_keterampilan_umum",
        "aspek_keterampilan_khusus"
    ];
    public function programKeahlian()
    {
        return $this->belongsTo(ProgramKeahlian::class);
    }
}