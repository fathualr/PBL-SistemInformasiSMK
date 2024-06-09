<?php

namespace App\Exports;

use App\Models\FormPPDB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class FormsExport implements FromCollection, WithHeadings
{
    /**
     * Menentukan koleksi data yang akan diekspor.
     *
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return FormPPDB::all();
    }

    /**
     * Menentukan header untuk kolom-kolom di file Excel.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID',
            'ID_Program',
            'Nama Lengkap',
            'Jenis Kelamin',
            'NISN',
            'Agama',
            'Tempat Lahir',
            'Tanggal Lahir',
            'No HP',
            'Pilihan 1',
            'Pilihan 2',
            'Tahun Pendaftaraan',
            'Nama Sekolah Asal',
            'Alamat',
            'No RT',
            'No RW',
            'Kelurahan',
            'Kecamatan',
            'Kota',
            'Provinsi',
            'Kode Pos',
            'Nama Wali',
            'Agama Wali',
            'Alamat Wali',
            'No HP Wali',
            'Tempat Lahir Wali',
            'Tanggal Lahir Wali',
            'Pekerjaan Wali',
            'Penghasilan Wali',
            'Tautan Dokumen',
            'Status',
            'Program Diterima',
            'Created At',
            'Updated At'
        ];
    }
}
