<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InformasiPPDB;
use App\Models\AlurPPDB;
use App\Models\CountdownSetting;
use App\Models\FormPPDB;
use App\Models\PengumumanPPDB;
use App\Models\ProgramKeahlian;
use Carbon\Carbon;

class InformasiPPDBController extends Controller
{

    public function __construct()
    {
        if (InformasiPPDB::count() === 0) {
            $informasi = new InformasiPPDB;
            $informasi->save();
        }
        if (PengumumanPPDB::count() === 0) {
            $pengumumanPPDB = new PengumumanPPDB;
            $pengumumanPPDB->tautan_dokumen = ''; // Memberikan nilai default kosong
            $pengumumanPPDB->save();
        }
    }

    public function ppdb()
    {
        $informasi = InformasiPPDB::first();
        $alurs = AlurPPDB::all();
        $programs = ProgramKeahlian::all();
        $countdownStart = CountdownSetting::where('key', 'countdown_start')->value('value');
        $countdownEnd = CountdownSetting::where('key', 'countdown_end')->value('value');

        // Check if countdownStart and countdownEnd are set
        $countdownStartSet = !is_null($countdownStart);
        $countdownEndSet = !is_null($countdownEnd);

        $currentDate = Carbon::now();
        $registrationClosed = !$countdownEndSet || $currentDate->greaterThan(Carbon::parse($countdownEnd));

        return view('guest.ppdb', [
            "title" => "Guest PPDB",
            "informasi" => $informasi,
            "alurs" => $alurs,
            "programs" => $programs,
            "countdownStart" => $countdownStartSet ? $countdownStart : '',
            "countdownEnd" => $countdownEndSet ? $countdownEnd : '',
            "registrationClosed" => $registrationClosed,
            "countdownStartSet" => $countdownStartSet,
            "countdownEndSet" => $countdownEndSet,
        ]);
    }

    public function pengumuman(Request $request)
    {
        $search = $request->query('search');
        $perPage = $request->query('perPage') ?? 10; // Mengambil nilai 'perPage' dari query string atau default 10 jika tidak ada
        $informasi = InformasiPPDB::first();
        $pengumuman_ppdb = PengumumanPPDB::first();

        // Lakukan pengecekan apakah terdapat query pencarian
        if ($search) {
            // Jika ada, lakukan pencarian berdasarkan nama atau NISN
            $forms = FormPPDB::where('nama_lengkap', 'like', '%' . $search . '%')
                ->orWhere('nisn', 'like', '%' . $search . '%')
                ->orWhere('tahun_pendaftaran', 'like', '%' . $search . '%')
                ->paginate($perPage);
        } else {
            // Jika tidak ada query pencarian, tampilkan semua data
            $forms = FormPPDB::orderBy('created_at', 'desc')->paginate($perPage);
        }

        $forms->appends(['search' => $search, 'perPage' => $perPage]);

        return view('guest.pengumuman-ppdb', [
            "title" => "Guest Pendaftaran PPDB",
            "informasi" => $informasi,
            "forms" => $forms,
            "search" => $search, // Mengirimkan search ke view
            "perPage" => $perPage, // Mengirimkan perPage ke view
            'pengumuman_ppdb' => $pengumuman_ppdb
        ]);
    }
    // Fungsi untuk menampilkan halaman admin informasi PPDB
    public function adminInformasiPPDB()
    {
        $informasi = InformasiPPDB::first();
        $alurs = AlurPPDB::all();
        $pengumumanPPDB = PengumumanPPDB::first();
        $countdownStart = CountdownSetting::where('key', 'countdown_start')->value('value');
        $countdownEnd = CountdownSetting::where('key', 'countdown_end')->value('value');

        return view('admin.informasiPPDB', [
            "title" => "Admin Informasi PPDB",
            "informasi" => $informasi,
            "alurs" => $alurs,
            "countdownStart" => $countdownStart,
            "countdownEnd" => $countdownEnd,
            'pengumuman_ppdb' => $pengumumanPPDB,
        ]);
    }

    // Fungsi untuk mengatur countdown
    public function updateCountdown(Request $request)
    {
        $request->validate([
            'countdown_start' => 'required|date',
            'countdown_end' => 'required|date|after:countdown_start',
        ]);

        // Update pengaturan countdown yang ada jika sudah ada
        CountdownSetting::updateOrCreate(
            ['key' => 'countdown_start'],
            ['value' => $request->countdown_start]
        );

        CountdownSetting::updateOrCreate(
            ['key' => 'countdown_end'],
            ['value' => $request->countdown_end]
        );

        return redirect()->back()->with('success', 'Pengaturan countdown berhasil diperbarui');
    }

    // Fungsi untuk menghapus pengaturan countdown
    public function destroyCountdown()
    {
        // Menghapus pengaturan countdown
        CountdownSetting::where('key', 'countdown_start')->delete();
        CountdownSetting::where('key', 'countdown_end')->delete();

        return redirect()->back()->with('success', 'Pengaturan countdown berhasil dihapus');
    }

    public function updateInformasiPPDB(Request $request, $id, $field)
    {
        $informasi = InformasiPPDB::findOrFail($id);

        $validateRules = [
            'deskripsi_ppdb' => 'required',
            'deskripsi_pengumuman' => 'required',
        ];

        $validate = $request->validate([
            $field => $validateRules[$field],
        ]);

        $informasi->fill($validate)->save();

        return redirect()->route('admin.informasiPPDB.index')->with('success', 'Informasi PPDB berhasil diupdate');
    }

    //ALUR PPDB

    public function storeAlurPPDB(Request $request)
    {
        $request->validate([
            'judul_alur' => 'required',
            'tanggal_alur' => 'required|date',
            'deskripsi_alur' => 'required',
        ]);

        AlurPPDB::create([
            'judul_alur' => $request->judul_alur,
            'tanggal_alur' => $request->tanggal_alur,
            'deskripsi_alur' => $request->deskripsi_alur,
        ]);

        return redirect()->route('admin.informasiPPDB.index')->with('success', 'Alur PPDB berhasil ditambahkan');
    }

    public function updateAlurPPDB(Request $request, $id)
    {
        $request->validate([
            'judul_alur' => 'required',
            'tanggal_alur' => 'required|date',
            'deskripsi_alur' => 'required',
        ]);

        $alur_ppdb = AlurPPDB::findOrFail($id);

        $alur_ppdb->update([
            'judul_alur' => $request->judul_alur,
            'tanggal_alur' => $request->tanggal_alur,
            'deskripsi_alur' => $request->deskripsi_alur,
        ]);

        return redirect()->route('admin.informasiPPDB.index')->with('success', 'Alur PPDB berhasil diupdate');
    }

    public function destroyAlurPPDB($id)
    {
        $alur_ppdb = AlurPPDB::findOrFail($id);

        $alur_ppdb->delete();

        return redirect()->route('admin.informasiPPDB.index')->with('success', 'Alur PPDB berhasil dihapus.');
    }

    public function updatePengumumanPPDB(Request $request, $id)
    {
        // Find the PengumumanPPDB entry by its ID
        $pengumumanPPDB = PengumumanPPDB::findOrFail($id);

        // Define validation rules
        $request->validate([
            'tautan_dokumen' => 'required|mimes:pdf|max:2048',
        ]);

        // Handle file upload
        if ($request->hasFile('tautan_dokumen')) {
            $file = $request->file('tautan_dokumen');
            $path = $file->store('pdfs', 'public');
            $pengumumanPPDB->tautan_dokumen = $path;
        }

        $pengumumanPPDB->save();

        // Redirect with success message
        return redirect()->route('admin.informasiPPDB.index')->with('success', 'Informasi PPDB berhasil diupdate');
    }
}
