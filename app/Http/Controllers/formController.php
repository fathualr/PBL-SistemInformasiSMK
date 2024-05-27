<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\FormPPDB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\FormsExport;

class FormController extends Controller
{
    public function adminPendaftaranPPDB(Request $request)
    {
        $search = $request->query('search');
        $perPage = $request->query('perPage') ?? 10; // Mengambil nilai 'perPage' dari query string atau default 10 jika tidak ada
    
        // Lakukan pengecekan apakah terdapat query pencarian
        if ($search) {
            // Jika ada, lakukan pencarian berdasarkan nama atau NISN
            $forms = FormPPDB::where('nama_lengkap', 'like', '%' . $search . '%')
                ->orWhere('nisn', 'like', '%' . $search . '%')
                ->orWhere('tahun_pendaftaran', 'like', '%' . $search . '%')
                ->paginate($perPage);
        } else {
            // Jika tidak ada query pencarian, tampilkan semua data
            $forms = FormPPDB::paginate($perPage);
        }
    
        return view('admin.pendaftaranPPDB', [
            "title" => "Admin Pendaftaran PPDB",
            "forms" => $forms,
        ]);
    }
    


    public function storePPDB(Request $request)
    {
        try {
            $request->validate([
                'nama_lengkap' => 'required|string|max:255',
                'jenis_kelamin' => 'required',
                'nisn' => 'required|string|max:255',
                'agama' => 'required|string|max:255',
                'tempat_lahir' => 'required|string|max:255',
                'tanggal_lahir' => 'required|date',
                'no_hp' => 'required|string|max:255',
                'tahun_pendaftaran' => 'required|string|max:255',
                'nama_sekolah_asal' => 'required|string|max:255',
                'alamat' => 'required|string',
                'no_rt' => 'required|string|max:255',
                'no_rw' => 'required|string|max:255',
                'kelurahan' => 'required|string|max:255',
                'kecamatan' => 'required|string|max:255',
                'kota' => 'required|string|max:255',
                'provinsi' => 'required|string|max:255',
                'kode_pos' => 'required|string|max:255',
                'nama_wali' => 'required|string|max:255',
                'agama_wali' => 'required|string|max:255',
                'alamat_wali' => 'required|string',
                'no_hp_wali' => 'required|string|max:255',
                'tempat_lahir_wali' => 'required|string|max:255',
                'tanggal_lahir_wali' => 'required|date',
                'pekerjaan_wali' => 'required|string|max:255',
                'penghasilan_wali' => 'required|string|max:255',
                'tautan_dokumen' => 'required|file|mimes:pdf|max:10240',
            ]);

            $request->file('tautan_dokumen')->store('pdfs', 'public');

            FormPPDB::create([
                'nama_lengkap' => $request->nama_lengkap,
                'jenis_kelamin' => $request->jenis_kelamin,
                'nisn' => $request->nisn,
                'agama' => $request->agama,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'no_hp' => $request->no_hp,
                'pilihan_1' => $request->pilihan_1,
                'pilihan_2' => $request->pilihan_2,
                'tahun_pendaftaran' => $request->tahun_pendaftaran,
                'nama_sekolah_asal' => $request->nama_sekolah_asal,
                'alamat' => $request->alamat,
                'no_rt' => $request->no_rt,
                'no_rw' => $request->no_rw,
                'kelurahan' => $request->kelurahan,
                'kecamatan' => $request->kecamatan,
                'kota' => $request->kota,
                'provinsi' => $request->provinsi,
                'kode_pos' => $request->kode_pos,
                'nama_wali' => $request->nama_wali,
                'agama_wali' => $request->agama_wali,
                'alamat_wali' => $request->alamat_wali,
                'no_hp_wali' => $request->no_hp_wali,
                'tempat_lahir_wali' => $request->tempat_lahir_wali,
                'tanggal_lahir_wali' => $request->tanggal_lahir_wali,
                'pekerjaan_wali' => $request->pekerjaan_wali,
                'penghasilan_wali' => $request->penghasilan_wali,
                'tautan_dokumen' => $request->file('tautan_dokumen')->store('pdfs', 'public'),
            ]);

            return redirect()->route('guest.ppdb.index')->with('success', 'Data berhasil disimpan');
        } catch (QueryException $e) {
            dd($e->getMessage());
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function downloadExcel()
    {
        return Excel::download(new FormsExport, 'pendaftaranPPDB.xlsx');
    }

    public function destroyPendaftaranPPDB($id)
    {
        // Temukan album yang akan dihapus
        $form_ppdb = FormPPDB::findOrFail($id);

        $form_ppdb->delete();

        return redirect()->route('admin.pendaftaranPPDB.index')->with('success', 'Data berhasil dihapus.');
    }
}
