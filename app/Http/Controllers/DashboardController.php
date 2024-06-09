<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\DirektoriSiswa;
use App\Models\DirektoriAlumni;
use App\Models\DirektoriPegawai;
use App\Models\DirektoriGuru;
use App\Models\ProgramKeahlian;
use App\Models\FormPPDB;

class DashboardController extends Controller
{
    public function dashboard()
    {
        // Mengambil data jumlah siswa berdasarkan id_program
        $siswaByProgram = DirektoriSiswa::select('id_program', DB::raw('count(*) as total'))
            ->groupBy('id_program')
            ->get();

        // Menghitung total siswa dari setiap program keahlian
        $siswaCountByProgram = [];
        foreach ($siswaByProgram as $siswa) {
            $program = ProgramKeahlian::find($siswa->id_program);
            if ($program) {
                $programName = $program->nama_program; // asumsi ada kolom nama_program di tabel ProgramKeahlian
                $siswaCountByProgram[$programName] = $siswa->total;
            } else {
                // Handle the case where the program does not exist
                $siswaCountByProgram['Unknown Program'] = $siswa->total;
            }
        }

        // Mengambil data jumlah guru berdasarkan id_program
        $guruByProgram = DirektoriGuru::select('id_program', DB::raw('count(*) as total'))
            ->groupBy('id_program')
            ->get();

        // Menghitung total guru dari setiap program keahlian
        $guruCountByProgram = [];
        foreach ($guruByProgram as $guru) {
            $program = ProgramKeahlian::find($guru->id_program);
            if ($program) {
                $programName = $program->nama_program; // asumsi ada kolom nama_program di tabel ProgramKeahlian
                $guruCountByProgram[$programName] = $guru->total;
            } else {
                // Handle the case where the program does not exist
                $guruCountByProgram['Unknown Program'] = $guru->total;
            }
        }

        // Menghitung jumlah total siswa
        $totalSiswa = DirektoriSiswa::count();

        // Menghitung jumlah total guru
        $totalGuru = DirektoriGuru::count();

        // Menghitung jumlah total alumni
        $totalAlumni = DirektoriAlumni::count();

        // Menghitung jumlah total pegawai
        $totalPegawai = DirektoriPegawai::count();

        // Menghitung jumlah pendaftar PPDB
        $ppdbCount = FormPPDB::count();

        // Menghitung jumlah PPDB yang lolos berdasarkan status 'Diterima'
        $lolosPpdbCount = FormPPDB::where('status', 'Diterima')->count();

        // Menghitung jumlah PPDB yang ditolak
        $ditolakPpdbCount = FormPPDB::where('status', 'Ditolak')->count();

        // Menghitung jumlah PPDB yang dalam proses
        $prosesPpdbCount = FormPPDB::where('status', 'Dalam Proses')->count();

        // Menghitung jumlah pendaftar PPDB berdasarkan tahun pendaftaran
        $ppdbByYear = FormPPDB::select('tahun_pendaftaran', DB::raw('count(*) as total'))
            ->groupBy('tahun_pendaftaran')
            ->get();

        // Menghitung total pendaftar PPDB dari setiap tahun
        $ppdbCountByYear = [];
        foreach ($ppdbByYear as $ppdb) {
            $ppdbCountByYear[$ppdb->tahun_pendaftaran] = $ppdb->total;
        }

        // Menghitung jumlah alumni berdasarkan tahun kelulusan
        $alumniByGraduationYear = DirektoriAlumni::select('tahun_kelulusan_alumni', DB::raw('count(*) as total'))
            ->groupBy('tahun_kelulusan_alumni')
            ->get();

        // Menghitung total alumni dari setiap tahun kelulusan
        $alumniCountByGraduationYear = [];
        foreach ($alumniByGraduationYear as $alumni) {
            $alumniCountByGraduationYear[$alumni->tahun_kelulusan_alumni] = $alumni->total;
        }

        return view('admin.dashboard', [
            'title' => 'Dashboard',
            'siswaCountByProgram' => $siswaCountByProgram,
            'guruCountByProgram' => $guruCountByProgram,
            'totalSiswa' => $totalSiswa,
            'totalGuru' => $totalGuru,
            'totalAlumni' => $totalAlumni,
            'totalPegawai' => $totalPegawai,
            'ppdbCount' => $ppdbCount,
            'lolosPpdbCount' => $lolosPpdbCount,
            'ditolakPpdbCount' => $ditolakPpdbCount,
            'prosesPpdbCount' => $prosesPpdbCount,
            'ppdbCountByYear' => $ppdbCountByYear,
            'alumniCountByGraduationYear' => $alumniCountByGraduationYear
        ]);
    }
}
