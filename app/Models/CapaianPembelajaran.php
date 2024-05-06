<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CapaianPembelajaran extends Model
{
    protected $table = "capaianPembelajaran";
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
