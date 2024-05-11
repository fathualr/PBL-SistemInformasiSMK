<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormPPDB extends Model
{
    use HasFactory;

    protected $table = 'form_ppdb';

    protected $primaryKey = 'id_pendaftaran';

    protected $fillable = [
        'nama_lengkap',
        'jenis_kelamin',
        'nisn',
        'agama',
        'tempat_lahir',
        'tanggal_lahir',
        'no_hp',
        'pilihan_1',
        'pilihan_2',
        'nama_sekolah_asal',
        'alamat',
        'no_rt',
        'no_rw',
        'kelurahan',
        'kecamatan',
        'kota',
        'provinsi',
        'kode_pos',
        'nama_wali',
        'agama_wali',
        'alamat_wali',
        'no_hp_wali',
        'tempat_lahir_wali',
        'tanggal_lahir_wali',
        'pekerjaan_wali',
        'penghasilan_wali',
        'tautan_dokumen',
    ];
}
