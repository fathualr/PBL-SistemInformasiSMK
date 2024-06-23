<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProgramKeahlian;
use App\Models\CapaianPembelajaran;
use App\Models\PeluangKerja;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;

class ApiProgramKeahlianController extends Controller
{
    public function index()
    {
        try {
            $programKeahlian = ProgramKeahlian::with('capaianPembelajaran', 'peluangKerja')->get();

            return response()->json([
                'status' => true,
                'message' => 'Data program keahlian berhasil ditemukan',
                'data' => $programKeahlian
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal mengambil data program keahlian',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $programKeahlian = ProgramKeahlian::with('capaianPembelajaran', 'peluangKerja')->find($id);

            if (!$programKeahlian) {
                return response()->json([
                    'status' => false,
                    'message' => 'Data program keahlian tidak ditemukan',
                ], 404);
            }

            return response()->json([
                'status' => true,
                'message' => 'Data program keahlian berhasil ditemukan',
                'data' => $programKeahlian
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal mengambil data program keahlian',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    //----------------------------------------------------------------------------------------------------
    // CRUD PROGRAM KEAHLIAN
    //----- 
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'nama_program' => 'required',
                'logo_program' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'deskripsi_program' => 'required',
                'deskripsi_peluang_kerja' => 'required',
                'visi_program' => 'required',
                'misi_program' => 'required',
                'tujuan_program' => 'required',
                'sasaran_program' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            $path = $request->file('logo_program')->store('image/logoProgram', 'public');
            $validatedData = $validator->validated();
            $validatedData['logo_program'] = $path;

            $programKeahlian = ProgramKeahlian::create($validatedData);

            if ($programKeahlian) {
                CapaianPembelajaran::create([
                    'id_program' => $programKeahlian->id_program
                ]);
                
                return response()->json([
                    'status' => true,
                    'message' => 'Program keahlian berhasil ditambahkan!',
                    'data' => $programKeahlian
                ], 201);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Gagal menambahkan program keahlian',
                ], 500);
            }
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menambahkan program keahlian. Terjadi kesalahan pada database.',
                'error' => $e->getMessage(),
            ], 500);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menambahkan program keahlian. Terjadi kesalahan.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $programKeahlian = ProgramKeahlian::findOrFail($id);

            $validator = Validator::make($request->all(), [
                'nama_program' => 'required',
                'logo_program' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'deskripsi_program' => 'required',
                'deskripsi_peluang_kerja' => 'required',
                'visi_program' => 'required',
                'misi_program' => 'required',
                'tujuan_program' => 'required',
                'sasaran_program' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            $validatedData = $validator->validated();

            if ($request->hasFile('logo_program')) {
                if ($programKeahlian->logo_program) {
                    Storage::disk('public')->delete($programKeahlian->logo_program);
                }
                $path = $request->file('logo_program')->store('image/logoProgram', 'public');
                $validatedData['logo_program'] = $path;
            }

            $status = $programKeahlian->update($validatedData);

            if ($status) {
                return response()->json([
                    'status' => true,
                    'message' => 'Program keahlian berhasil diperbarui!',
                    'data' => $programKeahlian
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Gagal memperbarui program keahlian',
                ], 500);
            }
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal memperbarui program keahlian. Terjadi kesalahan pada database.',
                'error' => $e->getMessage(),
            ], 500);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal memperbarui program keahlian. Terjadi kesalahan.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $programKeahlian = ProgramKeahlian::findOrFail($id);

            if ($programKeahlian->logo_program) {
                Storage::disk('public')->delete($programKeahlian->logo_program);
            }

            $status = $programKeahlian->delete();

            if ($status) {
                return response()->json([
                    'status' => true,
                    'message' => 'Program keahlian berhasil dihapus'
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Gagal menghapus program keahlian'
                ], 500);
            }
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menghapus program keahlian. Terjadi kesalahan pada database.',
                'error' => $e->getMessage(),
            ], 500);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menghapus program keahlian. Terjadi kesalahan.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    
    //----------------------------------------------------------------------------------------------------
    // CRUD CAPAIAN PEMBELAJARAN
    //----- 
    public function updateCapaianPembelajaran(Request $request, $id_program)
    {
        try {
            $program = ProgramKeahlian::findOrFail($id_program);
            
            $validator = Validator::make($request->all(), [
                'deskripsi_capaian_pembelajaran' => 'nullable|string',
                'aspek_sikap' => 'nullable|string',
                'aspek_pengetahuan' => 'nullable|string',
                'aspek_keterampilan_umum' => 'nullable|string',
                'aspek_keterampilan_khusus' => 'nullable|string',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi gagal',
                    'errors' => $validator->errors()
                ], 422);
            }

            $validatedData = $validator->validated();
            
            $capaianPembelajaran = $program->capaianPembelajaran;
            $status = $capaianPembelajaran->update($validatedData);

            if ($status) {
                return response()->json([
                    'status' => true,
                    'message' => 'Capaian Pembelajaran berhasil diperbarui!',
                    'data' => $capaianPembelajaran
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Capaian Pembelajaran gagal diperbarui!',
                ], 500);
            }
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal memperbarui Capaian Pembelajaran. Terjadi kesalahan pada database.',
                'error' => $e->getMessage()
            ], 500);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal memperbarui Capaian Pembelajaran. Terjadi kesalahan.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    //----------------------------------------------------------------------------------------------------
    // CRUD PELUANG KERJA
    //----- 
    public function storePeluangKerja(Request $request, $id_program)
    {
        try {
            $program = ProgramKeahlian::findOrFail($id_program);

            $validator = Validator::make($request->all(), [
                'peluang_kerja' => 'required|string|max:255',
                'deskripsi_pekerjaan' => 'required|string',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi gagal',
                    'errors' => $validator->errors()
                ], 422);
            }

            $validatedData = $validator->validated();
            $validatedData['id_program'] = $program->id_program;

            $peluangKerja = PeluangKerja::create($validatedData);

            if ($peluangKerja) {
                return response()->json([
                    'status' => true,
                    'message' => 'Peluang Kerja berhasil ditambahkan!',
                    'data' => $peluangKerja
                ], 201);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Peluang Kerja gagal ditambahkan!',
                ], 500);
            }
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menambahkan Peluang Kerja. Terjadi kesalahan pada database.',
                'error' => $e->getMessage(),
            ], 500);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menambahkan Peluang Kerja. Terjadi kesalahan.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function deletePeluangKerja($id)
    {
        try {
            $peluangKerja = PeluangKerja::findOrFail($id);
            $status = $peluangKerja->delete();

            if ($status) {
                return response()->json([
                    'status' => true,
                    'message' => 'Peluang Kerja berhasil dihapus'
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Gagal menghapus Peluang Kerja'
                ], 500);
            }
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menghapus Peluang Kerja. Terjadi kesalahan pada database.',
                'error' => $e->getMessage(),
            ], 500);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menghapus Peluang Kerja. Terjadi kesalahan.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
