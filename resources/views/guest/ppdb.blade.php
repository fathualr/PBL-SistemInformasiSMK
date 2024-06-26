@extends('layouts.main')

@section('Main')

<div class="mx-auto bg-white rounded-md ">
    <!-- Informasi PPDB -->
    <div class="divider">
        <h4 class="font-bold text-2xl">INFORMASI PPDB</h4>
    </div>
    <div class="text-center"><span>{{ $informasi->deskripsi_ppdb }}</span></div>
    <!-- ALur PPDB -->
    <div class="divider">
        <h4 class="font-bold text-2xl">ALUR PPDB</h4>
    </div>
    <div>
        <ul class="timeline timeline-snap-icon max-md:timeline-compact timeline-vertical">
            @foreach($alurs as $key => $alur_ppdb)
            <li>
                @if ($key
                > count($alurs) - 4)
                <hr />
                @endif
                <div class="timeline-middle">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                @if ($key % 2 == 0)
                <div class="timeline-start md:text-end mb-10 timeline-box">
                    @else
                    <div class="timeline-end mb-10 timeline-box">
                        @endif
                        <time class="font-mono italic">{{ $alur_ppdb->tanggal_alur }}</time>
                        <div class="text-lg font-black">{{ $alur_ppdb->judul_alur }}</div>
                        {{ $alur_ppdb->deskripsi_alur }}
                    </div>
                    @if ($key
                    < count($alurs) - 1) <hr />
                    @endif
            </li>
            @endforeach
        </ul>
    </div>
    <!-- Form PPDB -->
    <div class="divider">
        <h4 class="font-bold text-2xl">FORM PPDB</h4>
    </div>

    @include('shared.success-message')
    @include('shared.error-message')


    @if ($countdownStartSet && $countdownEndSet)
    <div class="flex items-center justify-center">
        <div class="grid grid-flow-col gap-5 text-center auto-cols-max">
            <div class="flex flex-col items-center">
                <span id="days" class="countdown font-mono text-5xl">10</span>
                Hari
            </div>
            <div class="flex flex-col items-center">
                <span id="hours" class="countdown font-mono text-5xl">15</span>
                Jam
            </div>
            <div class="flex flex-col items-center">
                <span id="minutes" class="countdown font-mono text-5xl">30</span>
                Menit
            </div>
            <div class="flex flex-col items-center">
                <span id="seconds" class="countdown font-mono text-5xl">45</span>
                Detik
            </div>
        </div>
    </div>
    @endif


    <div id="form-container" style="display: none;">
        @if ($registrationClosed)
        <div class="text-center text-red-500">
            <p>Masa pendaftaran telah berakhir. Mohon tunggu informasi selanjutnya.</p>
        </div>
        @else
        <form action="{{ route('guest.ppdb.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="space-y-4 my-5">
                <div class=" bg-blue-400 py-1">
                    <h2 class="text-white font-bold ml-2 mt-2 mb-2">Data Siswa</h2>
                </div>
                <div class="grid grid-cols-12 gap-4">
                    <div class="col-span-4">
                        <label class="block font-medium ml-2">Nama Lengkap</label>
                    </div>
                    <div class="col-span-8 ">
                        <input type="text" id="nama_lengkap" name="nama_lengkap" class="input input-bordered w-full"
                            placeholder="Nama Lengkap" required>
                    </div>
                </div>
                <div class="grid grid-cols-12 gap-4">
                    <div class="col-span-4">
                        <label class="block font-medium ml-2">Jenis Kelamin</label>
                    </div>
                    <div class="col-span-8">
                        <select id="jenis_kelamin" name="jenis_kelamin" class="select select-bordered w-full">
                            <option disabled>Jenis Kelamin</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="grid grid-cols-12 gap-4">
                    <div class="col-span-4">
                        <label class="block font-medium ml-2">NISN</label>
                    </div>
                    <div class="col-span-8 ">
                        <input type="text" id="nisn" name="nisn" class="input input-bordered w-full" placeholder="NISN"
                            required>
                    </div>
                </div>
                <div class="grid grid-cols-12 gap-4">
                    <div class="col-span-4">
                        <label class="block font-medium ml-2">Agama</label>
                    </div>
                    <div class="col-span-8 ">
                        <input type="text" id="agama" name="agama" class="input input-bordered w-full"
                            placeholder="Agama" required>
                    </div>
                </div>
                <div class="grid grid-cols-12 gap-4">
                    <div class="col-span-4">
                        <label class="block font-medium ml-2">TTL Calon Siswa</label>
                    </div>
                    <div class="grid grid-cols-2 gap-4 col-span-8 ">
                        <input type="text" id="tempat_lahir" name="tempat_lahir" class="input input-bordered w-full"
                            placeholder="Tempat Lahir" required>
                        <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="input input-bordered w-full"
                            placeholder="Tanggal Lahir" required>
                    </div>
                </div>
                <div class="grid grid-cols-12 gap-4">
                    <div class="col-span-4">
                        <label class="block font-medium ml-2">No Handphone Casis</label>
                    </div>
                    <div class="col-span-8">
                        <input type="text" id="no_hp" name="no_hp" class="input input-bordered w-full"
                            placeholder="No Handphone Casis" required>
                    </div>
                </div>

                <div class="grid grid-cols-12 gap-4">
                    <div class="col-span-4">
                        <label class="block font-medium ml-2">Pilihan 1</label>
                    </div>
                    <div class="col-span-8">
                        <select id="pilihan_1" name="pilihan_1" class="select select-bordered w-full">
                            <option selected disabled>Program Keahlian</option>
                            @foreach($programs as $key => $program_keahlian)
                            <option value="{{ $program_keahlian->nama_program }}">{{ $program_keahlian->nama_program }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-12 gap-4">
                    <div class="col-span-4">
                        <label class="block font-medium ml-2">Pilihan 2</label>
                    </div>
                    <div class="col-span-8">
                        <select id="pilihan_2" name="pilihan_2" class="select select-bordered w-full">
                            <option selected disabled>Program Keahlian</option>
                            @foreach($programs as $key => $program_keahlian)
                            <option value="{{ $program_keahlian->nama_program }}">{{ $program_keahlian->nama_program }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="grid grid-cols-12 gap-4">
                    <div class="col-span-4">
                        <label class="block font-medium ml-2">Tahun Pendaftaran</label>
                    </div>
                    <div class="col-span-8">
                        <input type="text" id="tahun_pendaftaran" name="tahun_pendaftaran"
                            class="input input-bordered w-full" placeholder="Contoh: 2022, 2024" required>
                    </div>
                </div>

                <!-- Data Sekolah -->
                <div class=" bg-blue-400 py-1">
                    <h2 class="text-white font-bold ml-2 mt-2 mb-2">Data Sekolah</h2>
                </div>
                <div class="grid grid-cols-12 gap-4">
                    <div class="col-span-4">
                        <label class="block font-medium ml-2">Nama Sekolah Asal</label>
                    </div>
                    <div class="col-span-8 ">
                        <input type="text" id="nama_sekolah_asal" name="nama_sekolah_asal"
                            class="input input-bordered w-full" placeholder="Nama Sekolah Asal" required>
                    </div>
                </div>
                <div class="grid grid-cols-12 gap-4">
                    <div class="col-span-4">
                        <label class="block font-medium ml-2">Alamat Tempat Tinggal</label>
                    </div>
                    <div class="col-span-8 ">
                        <textarea id="alamat" name="alamat" class="textarea textarea-bordered w-full"
                            placeholder="Alamat Tempat Tinggal" required></textarea>
                    </div>
                </div>
                <div class="grid grid-cols-12 gap-4">
                    <div class="col-span-4">
                        <label class="block font-medium ml-2">No. RT</label>
                    </div>
                    <div class="col-span-8 ">
                        <input type="text" id="no_rt" name="no_rt" class="input input-bordered w-full"
                            placeholder="No. RT" required>
                    </div>
                </div>
                <div class="grid grid-cols-12 gap-4">
                    <div class="col-span-4">
                        <label class="block font-medium ml-2">No. RW</label>
                    </div>
                    <div class="col-span-8 ">
                        <input type="text" id="no_rw" name="no_rw" class="input input-bordered w-full"
                            placeholder="No. RW" required>
                    </div>
                </div>
                <div class="grid grid-cols-12 gap-4">
                    <div class="col-span-4">
                        <label class="block font-medium ml-2">Kelurahan</label>
                    </div>
                    <div class="col-span-8 ">
                        <input type="text" id="kelurahan" name="kelurahan" class="input input-bordered w-full"
                            placeholder="Kelurahan" required>
                    </div>
                </div>
                <div class="grid grid-cols-12 gap-4">
                    <div class="col-span-4">
                        <label class="block font-medium ml-2">Kecamatan</label>
                    </div>
                    <div class="col-span-8 ">
                        <input type="text" id="kecamatan" name="kecamatan" class="input input-bordered w-full"
                            placeholder="Kecamatan" required>
                    </div>
                </div>
                <div class="grid grid-cols-12 gap-4">
                    <div class="col-span-4">
                        <label class="block font-medium ml-2">Kota</label>
                    </div>
                    <div class="col-span-8 ">
                        <input type="text" id="kota" name="kota" class="input input-bordered w-full" placeholder="Kota"
                            required>
                    </div>
                </div>
                <div class="grid grid-cols-12 gap-4">
                    <div class="col-span-4">
                        <label class="block font-medium ml-2">Provinsi</label>
                    </div>
                    <div class="col-span-8 ">
                        <input type="text" id="provinsi" name="provinsi" class="input input-bordered w-full"
                            placeholder="Provinsi" required>
                    </div>
                </div>
                <div class="grid grid-cols-12 gap-4">
                    <div class="col-span-4">
                        <label class="block font-medium ml-2">Kode Pos</label>
                    </div>
                    <div class="col-span-8 ">
                        <input type="text" id="kode_pos" name="kode_pos" class="input input-bordered w-full"
                            placeholder="Kode Pos" required>
                    </div>
                </div>
                <!-- Data Wali -->
                <div class=" bg-blue-400 py-1">
                    <h2 class="text-white font-bold ml-2 mt-2 mb-2">Data Wali</h2>
                </div>
                <div class="grid grid-cols-12 gap-4">
                    <div class="col-span-4">
                        <label class="block font-medium ml-2">Nama Wali</label>
                    </div>
                    <div class="col-span-8 ">
                        <input type="text" id="nama_wali" name="nama_wali" class="input input-bordered w-full"
                            placeholder="Nama Wali" required>
                    </div>
                </div>
                <div class="grid grid-cols-12 gap-4">
                    <div class="col-span-4">
                        <label class="block font-medium ml-2">Agama Wali</label>
                    </div>
                    <div class="col-span-8 ">
                        <input type="text" id="agama_wali" name="agama_wali" class="input input-bordered w-full"
                            placeholder="Agama Wali" required>
                    </div>
                </div>
                <div class="grid grid-cols-12 gap-4">
                    <div class="col-span-4">
                        <label class="block font-medium ml-2">Alamat Wali</label>
                    </div>
                    <div class="col-span-8 ">
                        <textarea id="alamat_wali" name="alamat_wali" class="textarea textarea-bordered w-full"
                            placeholder="Alamat Wali" required></textarea>
                    </div>
                </div>
                <div class="grid grid-cols-12 gap-4">
                    <div class="col-span-4">
                        <label class="block font-medium ml-2">No Handphone Wali</label>
                    </div>
                    <div class="col-span-8 ">
                        <textarea id="no_hp_wali" name="no_hp_wali" class="textarea textarea-bordered w-full"
                            placeholder="No Handphone Wali" required></textarea>
                    </div>
                </div>
                <div class="grid grid-cols-12 gap-4">
                    <div class="col-span-4">
                        <label class="block font-medium ml-2">TTL Wali</label>
                    </div>
                    <div class="grid grid-cols-2 gap-4 col-span-8 ">
                        <input type="text" id="tempat_lahir_wali" name="tempat_lahir_wali"
                            class="input input-bordered w-full" placeholder="Tempat Lahir Wali">
                        <input type="date" id="tanggal_lahir_wali" name="tanggal_lahir_wali"
                            class="input input-bordered w-full" placeholder="Tanggal Lahir Wali">
                    </div>
                </div>
                <div class="grid grid-cols-12 gap-4">
                    <div class="col-span-4">
                        <label class="block font-medium ml-2">Pekerjaan Wali</label>
                    </div>
                    <div class="col-span-8 ">
                        <input type="text" id="pekerjaan_wali" name="pekerjaan_wali" class="input input-bordered w-full"
                            placeholder="Pekerjaan Wali" required>
                    </div>
                </div>
                <div class="grid grid-cols-12 gap-4">
                    <div class="col-span-4">
                        <label class="block font-medium ml-2">Penghasilan Wali</label>
                    </div>
                    <div class="col-span-8 ">
                        <input type="text" id="penghasilan_wali" name="penghasilan_wali"
                            class="input input-bordered w-full" placeholder="Penghasilan Wali" required>
                    </div>
                </div>
                <div class=" bg-blue-400 py-1">
                    <h2 class="text-white font-bold ml-2 mt-2 mb-2">Dokumen Tambahan</h2>
                </div>
                <div class="grid smartphone:grid-cols-6 tablet:grid-cols-12 gap-4 items-center justify-center">
                    <div class="smartphone:col-span-1 tablet:col-span-4">
                        <label class="block font-medium ml-2 -mt-3">File
                            Dokumen(Prestasi,
                            Nilai
                            Sementara,dll...)</label>
                    </div>
                    <div class="smartphone:col-span-3 smartphone:col-start-4 tablet:col-span-8">
                        <label
                            class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                            <input type="file" name="tautan_dokumen" id="tautan_dokumen" class="grow file-input file-input-success border-none bg-transparent py-2
                    file:mr-4 file:px-4 file:rounded-full file:border-0
                    file:text-sm file:font-semibold file:bg-blue-500 file:text-white
                    hover:file:bg-transparent hover:file:text-blue-400" accept=".pdf" required />
                        </label>
                    </div>
                </div>
                <div class="flex justify-center">
                    <button type="submit" class="btn bg-blue-400 font-bold text-white hover:text-blue-400 w-40 my-5">
                        <i class="fas fa-paper-plane"></i>
                        Kirim</button>
                </div>
            </div>
        </form>
        @endif
    </div>
</div>
@include('script.timer')
@endsection