@extends('layouts.mainAdmin')

@section('main-content')

<!-- First Content -->
<div class="grid grid-cols-9 shadow-xl rounded-md">

    @include('shared.success-message')
    @include('shared.error-message')
    <div class="col-span-4 my-4 mx-5 row-start-2">
        <h3 class="font-bold text-lg">Pengelolaan Konten Profil Website</h3>
    </div>
    
    <div class="col-span-3 col-start-7 my-4 mx-5 row-start-2">
        <div class="dropdown w-full">
            <div tabindex="0" role="button" class="btn btn-neutral m-1 w-full">Daftar Konten</div>
            <ul tabindex="0" class="dropdown-content z-[50] menu p-2 shadow bg-base-100 rounded-box w-full">
                <li><a href="#nama_sekolah">Nama Sekolah</a></li>
                <li><a href="#logo_sekolah">Logo Sekolah</a></li>
                <li><a href="#alamat_sekolah">Alamat Sekolah</a></li>
                <li><a href="#no_telp_sekolah">No Telp Sekolah</a></li>
                <li><a href="#email_sekolah">Email Sekolah</a></li>
                <li><a href="#nama_kepala_sekolah">Nama Kepala Sekolah</a></li>
                <li><a href="#sejarah">Sejarah</a></li>
                <li><a href="#tautan_video_sejarah">Tautan Video Sejarah</a></li>
                <li><a href="#sambutan">Sambutan</a></li>
                <li><a href="#tautan_video_sambutan">Tautan Video Sambutan</a></li>
                <li><a href="#visi">Visi</a></li>
                <li><a href="#misi">Misi</a></li>
                <li><a href="#nis">NIS</a></li>
                <li><a href="#status_akreditasi_sekolah">Status Akreditasi Sekolah</a></li>
                <li><a href="#struktur_organisasi_sekolah">Struktur Organisasi Sekolah</a></li>
                <li><a href="#status_kepemilikan_tanah">Status Kepemilikan Tanah</a></li>
                <li><a href="#tahun_didirikan">Tahun Didirikan</a></li>
                <li><a href="#tahun_operasional">Tahun Operasional</a></li>
                <li><a href="#no_statistik_sekolah">Nomor Statistik Sekolah</a></li>
                <li><a href="#fasilitas_lainnya">Fasilitas Lainnya</a></li>
                <li><a href="#luas_tanah">Luas Tanah</a></li>
                <li><a href="#no_sertifikat">Nomor Sertifikat</a></li>
                <li><a href="#no_pendirian_sekolah">Nomor Pendirian Sekolah</a></li>
                <li><a href="#status_kepemilikan_bangunan">Status Kepemilikan Bangunan</a></li>
                <li><a href="#sisa_lahan_seluruhnya">Sisa Lahan Seluruhnya</a></li>
                <li><a href="#luas_lahan_keseluruhan">Luas Lahan Keseluruhan</a></li>
                <li><a href="#teks_profile">Teks Profile</a></li>
                <li><a href="#teks_fasilitas">Teks Fasilitas</a></li>
                <li><a href="#teks_lokasi">Teks Lokasi</a></li>
                <li><a href="#teks_sejarah">Teks Sejarah</a></li>
                <li><a href="#teks_prestasi">Teks Prestasi</a></li>
            </ul>
        </div>
    </div>

    <div class="col-span-9 row-start-3 pb-2">

        <!-- Nama Sekolah -->
        <div class="mt-5 px-16">
            <div class="collapse collapse-arrow bg-base-200" id="nama_sekolah">
                <input type="checkbox" /> 
                <div class="collapse-title text-xl font-medium">
                    <span class="label-text font-bold">Nama Sekolah: </span>
                </div>
                <div class="collapse-content"> 
                    <form action="{{ route('konten.update', ['id' => $konten->id_sekolah, 'field' => 'nama_sekolah']) }}" method="POST" class="grid gap-2">
                        @csrf
                        @method('PATCH')
                        <label class="form-control w-full gap-2">
                            @if(!empty($konten->nama_sekolah))
                                <textarea class="textarea textarea-bordered bg-white" disabled>{{ $konten->nama_sekolah }}</textarea>
                            @else
                                <p class="text-red-500">Maaf, konten belum tersedia untuk bagian ini. Tolong isi konten agar dapat ditampilkan.</p>
                            @endif
                            <input type="text" placeholder="Type here" class="input input-bordered w-full" name="nama_sekolah" />
                        </label>
                        <div class="flex justify-end items-endgap-4 gap-2">
                            <button type="submit" class="btn bg-elm w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
                                <i class=" fas fa-plus"></i>
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Logo Sekolah -->
        <div class="mt-5 px-16">
            <div class="collapse collapse-arrow bg-base-200" id="logo_sekolah">
                <input type="checkbox" /> 
                <div class="collapse-title text-xl font-medium">
                    <span class="label-text font-bold">Logo Sekolah: </span>
                </div>
                <div class="collapse-content"> 
                    <form action="{{ route('konten.update', ['id' => $konten->id_sekolah, 'field' => 'logo_sekolah']) }}" method="POST" class="grid gap-2" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <label class="form-control w-full gap-2">
                            @if(!empty($konten->logo_sekolah))
                                <textarea class="textarea textarea-bordered bg-white" disabled>{{ $konten->logo_sekolah }}</textarea>
                            @else
                                <p class="text-red-500">Maaf, konten belum tersedia untuk bagian ini. Tolong isi konten agar dapat ditampilkan.</p>
                            @endif
                            <input type="file" class="file-input file-input-bordered w-full" name="logo_sekolah" />
                        </label>
                        <div class="flex justify-end items-endgap-4 gap-2">
                            <button type="submit" class="btn bg-elm w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
                                <i class=" fas fa-plus"></i>
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Alamat Sekolah -->
        <div class="mt-5 px-16">
            <div class="collapse collapse-arrow bg-base-200" id="alamat_sekolah">
                <input type="checkbox" /> 
                <div class="collapse-title text-xl font-medium">
                    <span class="label-text font-bold">Alamat Sekolah: </span>
                </div>
                <div class="collapse-content"> 
                    <form action="{{ route('konten.update', ['id' => $konten->id_sekolah, 'field' => 'alamat_sekolah']) }}" method="POST" class="grid gap-2">
                        @csrf
                        @method('PATCH')
                        <label class="form-control w-full gap-2">
                            @if(!empty($konten->alamat_sekolah))
                                <textarea class="textarea textarea-bordered" disabled>{{ $konten->alamat_sekolah }}</textarea>
                            @else
                                <p class="text-red-500">Maaf, konten belum tersedia untuk bagian ini. Tolong isi konten agar dapat ditampilkan.</p>
                            @endif
                            <input type="text" placeholder="Type here" class="input input-bordered w-full" name="alamat_sekolah" />
                        </label>
                        <div class="flex justify-end items-endgap-4 gap-2">
                            <button type="submit" class="btn bg-elm w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
                                <i class=" fas fa-plus"></i>
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- No Telp Sekolah -->
        <div class="mt-5 px-16">
            <div class="collapse collapse-arrow bg-base-200" id="no_telp_sekolah">
                <input type="checkbox" /> 
                <div class="collapse-title text-xl font-medium">
                    <span class="label-text font-bold">No Telp Sekolah: </span>
                </div>
                <div class="collapse-content"> 
                    <form action="{{ route('konten.update', ['id' => $konten->id_sekolah, 'field' => 'no_telepon_sekolah']) }}" method="POST" class="grid gap-2">
                        @csrf
                        @method('PATCH')
                        <label class="form-control w-full gap-2">
                            @if(!empty($konten->no_telepon_sekolah))
                                <textarea class="textarea textarea-bordered" disabled>{{ $konten->no_telepon_sekolah }}</textarea>
                            @else
                                <p class="text-red-500">Maaf, konten belum tersedia untuk bagian ini. Tolong isi konten agar dapat ditampilkan.</p>
                            @endif
                            <input type="number" placeholder="Type here" class="input input-bordered w-full" name="no_telepon_sekolah" />
                        </label>
                        <div class="flex justify-end items-endgap-4 gap-2">
                            <button type="submit" class="btn bg-elm w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
                                <i class=" fas fa-plus"></i>
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Email Sekolah -->
        <div class="mt-5 px-16">
            <div class="collapse collapse-arrow bg-base-200" id="email_sekolah">
                <input type="checkbox" /> 
                <div class="collapse-title text-xl font-medium">
                    <span class="label-text font-bold">Email Sekolah: </span>
                </div>
                <div class="collapse-content"> 
                    <form action="{{ route('konten.update', ['id' => $konten->id_sekolah, 'field' => 'email_sekolah']) }}" method="POST" class="grid gap-2">
                        @csrf
                        @method('PATCH')
                        <label class="form-control w-full gap-2">
                            @if(!empty($konten->email_sekolah))
                                <textarea class="textarea textarea-bordered" disabled>{{ $konten->email_sekolah }}</textarea>
                            @else
                                <p class="text-red-500">Maaf, konten belum tersedia untuk bagian ini. Tolong isi konten agar dapat ditampilkan.</p>
                            @endif
                            <input type="email" placeholder="Type here" class="input input-bordered w-full" name="email_sekolah" />
                        </label>
                        <div class="flex justify-end items-endgap-4 gap-2">
                            <button type="submit" class="btn bg-elm w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
                                <i class=" fas fa-plus"></i>
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Nama Kepala Sekolah -->
        <div class="mt-5 px-16">
            <div class="collapse collapse-arrow bg-base-200" id="nama_kepala_sekolah">
                <input type="checkbox" /> 
                <div class="collapse-title text-xl font-medium">
                    <span class="label-text font-bold">Nama Kepala Sekolah: </span>
                </div>
                <div class="collapse-content"> 
                    <form action="{{ route('konten.update', ['id' => $konten->id_sekolah, 'field' => 'nama_kepala_sekolah']) }}" method="POST" class="grid gap-2">
                        @csrf
                        @method('PATCH')
                        <label class="form-control w-full gap-2">
                            @if(!empty($konten->nama_kepala_sekolah))
                                <textarea class="textarea textarea-bordered" disabled>{{ $konten->nama_kepala_sekolah }}</textarea>
                            @else
                                <p class="text-red-500">Maaf, konten belum tersedia untuk bagian ini. Tolong isi konten agar dapat ditampilkan.</p>
                            @endif
                            <input type="text" placeholder="Type here" class="input input-bordered w-full" name="nama_kepala_sekolah" />
                        </label>
                        <div class="flex justify-end items-endgap-4 gap-2">
                            <button type="submit" class="btn bg-elm w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
                                <i class=" fas fa-plus"></i>
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Teks Sejarah -->
        <div class="mt-5 px-16">
            <div class="collapse collapse-arrow bg-base-200" id="sejarah">
                <input type="checkbox" /> 
                <div class="collapse-title text-xl font-medium">
                    <span class="label-text font-bold">Teks Sejarah: </span>
                </div>
                <div class="collapse-content"> 
                    <form action="{{ route('konten.update', ['id' => $konten->id_sekolah, 'field' => 'sejarah']) }}" method="POST" class="grid gap-2">
                        @csrf
                        @method('PATCH')                        
                        <label class="form-control w-full gap-2">
                            @if(!empty($konten->sejarah))
                                <textarea class="textarea textarea-bordered" disabled>{{ $konten->sejarah }}</textarea>
                            @else
                                <p class="text-red-500">Maaf, konten belum tersedia untuk bagian ini. Tolong isi konten agar dapat ditampilkan.</p>
                            @endif
                            <input type="text" placeholder="Type here" class="input input-bordered w-full" name="sejarah" />
                        </label>
                        <div class="flex justify-end items-endgap-4 gap-2">
                            <button type="submit" class="btn bg-elm w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
                                <i class=" fas fa-plus"></i>
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Tautan Video Sejarah -->
        <div class="mt-5 px-16">
            <div class="collapse collapse-arrow bg-base-200" id="tautan_video_sejarah">
                <input type="checkbox" /> 
                <div class="collapse-title text-xl font-medium">
                    <span class="label-text font-bold">Tautan Video Sejarah: </span>
                </div>
                <div class="collapse-content"> 
                    <form action="{{ route('konten.update', ['id' => $konten->id_sekolah, 'field' => 'tautan_video_sejarah']) }}" method="POST" class="grid gap-2">
                        @csrf
                        @method('PATCH')                        
                        <label class="form-control w-full gap-2">
                            @if(!empty($konten->tautan_video_sejarah))
                                <textarea class="textarea textarea-bordered" disabled>{{ $konten->tautan_video_sejarah }}</textarea>
                            @else
                                <p class="text-red-500">Maaf, konten belum tersedia untuk bagian ini. Tolong isi konten agar dapat ditampilkan.</p>
                            @endif
                            <input type="text" placeholder="Type here" class="input input-bordered w-full" name="tautan_video_sejarah" />
                        </label>
                        <div class="flex justify-end items-endgap-4 gap-2">
                            <button type="submit" class="btn bg-elm w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
                                <i class=" fas fa-plus"></i>
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Teks Sambutan -->
        <div class="mt-5 px-16">
            <div class="collapse collapse-arrow bg-base-200" id="sambutan">
                <input type="checkbox" /> 
                <div class="collapse-title text-xl font-medium">
                    <span class="label-text font-bold">Teks Sambutan: </span>
                </div>
                <div class="collapse-content"> 
                    <form action="{{ route('konten.update', ['id' => $konten->id_sekolah, 'field' => 'sambutan']) }}" method="POST" class="grid gap-2">
                        @csrf
                        @method('PATCH')                        
                        <label class="form-control w-full gap-2">
                            @if(!empty($konten->sambutan))
                            <textarea class="textarea textarea-bordered" disabled>{{ $konten->sambutan }}</textarea>
                            @else
                                <p class="text-red-500">Maaf, konten belum tersedia untuk bagian ini. Tolong isi konten agar dapat ditampilkan.</p>
                            @endif
                            <input type="text" placeholder="Type here" class="input input-bordered w-full" name="sambutan" />
                        </label>
                        <div class="flex justify-end items-endgap-4 gap-2">
                            <button type="submit" class="btn bg-elm w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
                                <i class=" fas fa-plus"></i>
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Tautan Video Sambutan -->
        <div class="mt-5 px-16">
            <div class="collapse collapse-arrow bg-base-200" id="tautan_video_sambutan">
                <input type="checkbox" /> 
                <div class="collapse-title text-xl font-medium">
                    <span class="label-text font-bold">Tautan Video Sambutan: </span>
                </div>
                <div class="collapse-content"> 
                    <form action="{{ route('konten.update', ['id' => $konten->id_sekolah, 'field' => 'tautan_video_sambutan']) }}" method="POST" class="grid gap-2">
                        @csrf
                        @method('PATCH')                        
                        <label class="form-control w-full gap-2">
                            @if(!empty($konten->tautan_video_sambutan))
                            <textarea class="textarea textarea-bordered" disabled>{{ $konten->tautan_video_sambutan }}</textarea>
                            @else
                                <p class="text-red-500">Maaf, konten belum tersedia untuk bagian ini. Tolong isi konten agar dapat ditampilkan.</p>
                            @endif
                            <input type="text" placeholder="Type here" class="input input-bordered w-full" name="tautan_video_sambutan" />
                        </label>
                        <div class="flex justify-end items-endgap-4 gap-2">
                            <button type="submit" class="btn bg-elm w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
                                <i class=" fas fa-plus"></i>
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Visi -->
        <div class="mt-5 px-16">
            <div class="collapse collapse-arrow bg-base-200" id="visi">
                <input type="checkbox" /> 
                <div class="collapse-title text-xl font-medium">
                    <span class="label-text font-bold">Teks Visi: </span>
                </div>
                <div class="collapse-content"> 
                    <form action="{{ route('konten.update', ['id' => $konten->id_sekolah, 'field' => 'visi']) }}" method="POST" class="grid gap-2">
                        @csrf
                        @method('PATCH')                        
                        <label class="form-control w-full gap-2">
                            @if(!empty($konten->visi))
                                <textarea class="textarea textarea-bordered" disabled>{{ $konten->visi }}</textarea>
                            @else
                                <p class="text-red-500">Maaf, konten belum tersedia untuk bagian ini. Tolong isi konten agar dapat ditampilkan.</p>
                            @endif
                            <input type="text" placeholder="Type here" class="input input-bordered w-full" name="visi" />
                        </label>
                        <div class="flex justify-end items-endgap-4 gap-2">
                            <button type="submit" class="btn bg-elm w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
                                <i class=" fas fa-plus"></i>
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Misi -->
        <div class="mt-5 px-16">
            <div class="collapse collapse-arrow bg-base-200" id="misi">
                <input type="checkbox" /> 
                <div class="collapse-title text-xl font-medium">
                    <span class="label-text font-bold">Teks Misi: </span>
                </div>
                <div class="collapse-content"> 
                    <form action="{{ route('konten.update', ['id' => $konten->id_sekolah, 'field' => 'misi']) }}" method="POST" class="grid gap-2">
                        @csrf
                        @method('PATCH')                        
                        <label class="form-control w-full gap-2">
                            @if(!empty($konten->misi))
                            <textarea class="textarea textarea-bordered" disabled>{{ $konten->misi }}</textarea>
                            @else
                                <p class="text-red-500">Maaf, konten belum tersedia untuk bagian ini. Tolong isi konten agar dapat ditampilkan.</p>
                            @endif<input type="text" placeholder="Type here" class="input input-bordered w-full" name="misi" />
                        </label>
                        <div class="flex justify-end items-endgap-4 gap-2">
                            <button type="submit" class="btn bg-elm w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
                                <i class=" fas fa-plus"></i>
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Nis -->
        <div class="mt-5 px-16">
            <div class="collapse collapse-arrow bg-base-200" id="nis">
                <input type="checkbox" /> 
                <div class="collapse-title text-xl font-medium">
                    <span class="label-text font-bold">NIS: </span>
                </div>
                <div class="collapse-content"> 
                    <form action="{{ route('konten.update', ['id' => $konten->id_sekolah, 'field' => 'nis']) }}" method="POST" class="grid gap-2">
                        @csrf
                        @method('PATCH')                        
                        <label class="form-control w-full gap-2">
                            @if(!empty($konten->nis))
                            <textarea class="textarea textarea-bordered" disabled>{{ $konten->nis }}</textarea>
                            @else
                                <p class="text-red-500">Maaf, konten belum tersedia untuk bagian ini. Tolong isi konten agar dapat ditampilkan.</p>
                            @endif
                            <input type="number" placeholder="Type here" class="input input-bordered w-full" name="nis" />
                        </label>
                        <div class="flex justify-end items-endgap-4 gap-2">
                            <button type="submit" class="btn bg-elm w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
                                <i class=" fas fa-plus"></i>
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Status Akreditasi Sekolah -->
        <div class="mt-5 px-16">
            <div class="collapse collapse-arrow bg-base-200" id="status_akreditasi_sekolah">
                <input type="checkbox" /> 
                <div class="collapse-title text-xl font-medium">
                    <span class="label-text font-bold">Status Akreditasi Sekolah: </span>
                </div>
                <div class="collapse-content"> 
                    <form action="{{ route('konten.update', ['id' => $konten->id_sekolah, 'field' => 'status_akreditasi_sekolah']) }}" method="POST" class="grid gap-2">
                        @csrf
                        @method('PATCH')                        
                        <label class="form-control w-full gap-2">
                            @if(!empty($konten->status_akreditasi_sekolah))
                                <textarea class="textarea textarea-bordered" disabled>{{ $konten->status_akreditasi_sekolah }}</textarea>
                            @else
                                <p class="text-red-500">Maaf, konten belum tersedia untuk bagian ini. Tolong isi konten agar dapat ditampilkan.</p>
                            @endif
                            <select class="select select-bordered w-full" name="status_akreditasi_sekolah">
                                <option disabled selected>-- Pilih Status Akreditasi --</option>
                                <option value="Belum Terakreditasi">Belum Terakreditasi</option>
                                <option value="Akreditasi A">Akreditasi A</option>
                                <option value="Akreditasi B">Akreditasi B</option>
                                <option value="Akreditasi C">Akreditasi C</option>
                            </select>
                        </label>
                        <div class="flex justify-end items-endgap-4 gap-2">
                            <button type="submit" class="btn bg-elm w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
                                <i class=" fas fa-plus"></i>
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Struktur Organisasi Sekolah -->
        <div class="mt-5 px-16">
            <div class="collapse collapse-arrow bg-base-200" id="struktur_organisasi_sekolah">
                <input type="checkbox" /> 
                <div class="collapse-title text-xl font-medium">
                    <span class="label-text font-bold">Struktur Organisasi Sekolah: </span>
                </div>
                <div class="collapse-content"> 
                    <form action="{{ route('konten.update', ['id' => $konten->id_sekolah, 'field' => 'struktur_organisasi_sekolah']) }}" method="POST" class="grid gap-2" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')                        
                        <label class="form-control w-full gap-2">
                            @if(!empty($konten->struktur_organisasi_sekolah))
                                <textarea class="textarea textarea-bordered" disabled>{{ $konten->struktur_organisasi_sekolah }}</textarea>
                            @else
                                <p class="text-red-500">Maaf, konten belum tersedia untuk bagian ini. Tolong isi konten agar dapat ditampilkan.</p>
                            @endif
                            <input type="file" class="file-input file-input-bordered w-full" name="struktur_organisasi_sekolah" />
                        </label>
                        <div class="flex justify-end items-endgap-4 gap-2">
                            <button type="submit" class="btn bg-elm w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
                                <i class=" fas fa-plus"></i>
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Status Kepemilikan Tanah -->
        <div class="mt-5 px-16">
            <div class="collapse collapse-arrow bg-base-200" id="status_kepemilikan_tanah">
                <input type="checkbox" /> 
                <div class="collapse-title text-xl font-medium">
                    <span class="label-text font-bold">Status Kepemilikan Tanah: </span>
                </div>
                <div class="collapse-content"> 
                    <form action="{{ route('konten.update', ['id' => $konten->id_sekolah, 'field' => 'status_kepemilikan_tanah']) }}" method="POST" class="grid gap-2">
                        @csrf
                        @method('PATCH')
                        <label class="form-control w-full gap-2">
                            @if(!empty($konten->status_kepemilikan_tanah))
                                <textarea class="textarea textarea-bordered" disabled>{{ $konten->status_kepemilikan_tanah }}</textarea>
                            @else
                                <p class="text-red-500">Maaf, konten belum tersedia untuk bagian ini. Tolong isi konten agar dapat ditampilkan.</p>
                            @endif
                            <input type="text" placeholder="Type here" class="input input-bordered w-full" name="status_kepemilikan_tanah" />
                        </label>
                        <div class="flex justify-end items-endgap-4 gap-2">
                            <button type="submit" class="btn bg-elm w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
                                <i class=" fas fa-plus"></i>
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Tahun Didirikan -->
        <div class="mt-5 px-16">
            <div class="collapse collapse-arrow bg-base-200" id="tahun_didirikan">
                <input type="checkbox" /> 
                <div class="collapse-title text-xl font-medium">
                    <span class="label-text font-bold">Tahun Didirikan: </span>
                </div>
                <div class="collapse-content"> 
                    <form action="{{ route('konten.update', ['id' => $konten->id_sekolah, 'field' => 'tahun_didirikan']) }}" method="POST" class="grid gap-2">
                        @csrf
                        @method('PATCH')
                        <label class="form-control w-full gap-2">
                            @if(!empty($konten->tahun_didirikan))
                                <textarea class="textarea textarea-bordered" disabled>{{ $konten->tahun_didirikan }}</textarea>
                            @else
                                <p class="text-red-500">Maaf, konten belum tersedia untuk bagian ini. Tolong isi konten agar dapat ditampilkan.</p>
                            @endif
                            <input type="year" placeholder="Type here" class="input input-bordered w-full" name="tahun_didirikan" />
                        </label>
                        <div class="flex justify-end items-endgap-4 gap-2">
                            <button type="submit" class="btn bg-elm w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
                                <i class=" fas fa-plus"></i>
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Tahun Operasional -->
        <div class="mt-5 px-16">
            <div class="collapse collapse-arrow bg-base-200" id="tahun_operasional">
                <input type="checkbox" /> 
                <div class="collapse-title text-xl font-medium">
                    <span class="label-text font-bold">Tahun Operasional: </span>
                </div>
                <div class="collapse-content"> 
                    <form action="{{ route('konten.update', ['id' => $konten->id_sekolah, 'field' => 'tahun_operasional']) }}" method="POST" class="grid gap-2">
                        @csrf
                        @method('PATCH')
                        <label class="form-control w-full gap-2">
                            @if(!empty($konten->tahun_operasional))
                                <textarea class="textarea textarea-bordered" disabled>{{ $konten->tahun_operasional }}</textarea>
                            @else
                                <p class="text-red-500">Maaf, konten belum tersedia untuk bagian ini. Tolong isi konten agar dapat ditampilkan.</p>
                            @endif
                            <input type="text" placeholder="Type here" class="input input-bordered w-full" name="tahun_operasional" />
                        </label>
                        <div class="flex justify-end items-endgap-4 gap-2">
                            <button type="submit" class="btn bg-elm w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
                                <i class=" fas fa-plus"></i>
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Nomor Statistik Sekolah -->
        <div class="mt-5 px-16">
            <div class="collapse collapse-arrow bg-base-200" id="no_statistik_sekolah">
                <input type="checkbox" /> 
                <div class="collapse-title text-xl font-medium">
                    <span class="label-text font-bold">Nomor Statistik Sekolah: </span>
                </div>
                <div class="collapse-content"> 
                    <form action="{{ route('konten.update', ['id' => $konten->id_sekolah, 'field' => 'no_statistik_sekolah']) }}" method="POST" class="grid gap-2">
                        @csrf
                        @method('PATCH')
                        <label class="form-control w-full gap-2">
                            @if(!empty($konten->no_statistik_sekolah))
                            <textarea class="textarea textarea-bordered" disabled>{{ $konten->no_statistik_sekolah }}</textarea>
                            @else
                                <p class="text-red-500">Maaf, konten belum tersedia untuk bagian ini. Tolong isi konten agar dapat ditampilkan.</p>
                            @endif
                            <input type="text" placeholder="Type here" class="input input-bordered w-full" name="no_statistik_sekolah" />
                        </label>
                        <div class="flex justify-end items-endgap-4 gap-2">
                            <button type="submit" class="btn bg-elm w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
                                <i class=" fas fa-plus"></i>
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Fasilitas Lainnya -->
        <div class="mt-5 px-16">
            <div class="collapse collapse-arrow bg-base-200" id="fasilitas_lainnya">
                <input type="checkbox" /> 
                <div class="collapse-title text-xl font-medium">
                    <span class="label-text font-bold">Fasilitas Lainnya: </span>
                </div>
                <div class="collapse-content"> 
                    <form action="{{ route('konten.update', ['id' => $konten->id_sekolah, 'field' => 'fasilitas_lainnya']) }}" method="POST" class="grid gap-2">
                        @csrf
                        @method('PATCH')
                        <label class="form-control w-full gap-2">
                            @if(!empty($konten->fasilitas_lainnya))
                                <textarea class="textarea textarea-bordered" disabled>{{ $konten->fasilitas_lainnya }}</textarea>
                            @else
                                <p class="text-red-500">Maaf, konten belum tersedia untuk bagian ini. Tolong isi konten agar dapat ditampilkan.</p>
                            @endif
                            <input type="text" placeholder="Type here" class="input input-bordered w-full" name="fasilitas_lainnya" />
                        </label>
                        <div class="flex justify-end items-endgap-4 gap-2">
                            <button type="submit" class="btn bg-elm w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
                                <i class=" fas fa-plus"></i>
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Luas Tanah -->
        <div class="mt-5 px-16">
            <div class="collapse collapse-arrow bg-base-200" id="luas_tanah">
                <input type="checkbox" /> 
                <div class="collapse-title text-xl font-medium">
                    <span class="label-text font-bold">Luas Tanah: </span>
                </div>
                <div class="collapse-content"> 
                    <form action="{{ route('konten.update', ['id' => $konten->id_sekolah, 'field' => 'luas_tanah']) }}" method="POST" class="grid gap-2">
                        @csrf
                        @method('PATCH')
                        <label class="form-control w-full gap-2">
                            @if(!empty($konten->luas_tanah))
                                <textarea class="textarea textarea-bordered" disabled>{{ $konten->luas_tanah }}</textarea>
                            @else
                                <p class="text-red-500">Maaf, konten belum tersedia untuk bagian ini. Tolong isi konten agar dapat ditampilkan.</p>
                            @endif
                            <input type="text" placeholder="Type here" class="input input-bordered w-full" name="luas_tanah" />
                        </label>
                        <div class="flex justify-end items-endgap-4 gap-2">
                            <button type="submit" class="btn bg-elm w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
                                <i class=" fas fa-plus"></i>
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Nomor Sertifikat -->
        <div class="mt-5 px-16">
            <div class="collapse collapse-arrow bg-base-200" id="no_sertifikat">
                <input type="checkbox" /> 
                <div class="collapse-title text-xl font-medium">
                    <span class="label-text font-bold">Nomor Sertifikat: </span>
                </div>
                <div class="collapse-content"> 
                    <form action="{{ route('konten.update', ['id' => $konten->id_sekolah, 'field' => 'no_sertifikat']) }}" method="POST" class="grid gap-2">
                        @csrf
                        @method('PATCH')
                        <label class="form-control w-full gap-2">
                            @if(!empty($konten->no_sertifikat))
                                <textarea class="textarea textarea-bordered" disabled>{{ $konten->no_sertifikat }}</textarea>
                            @else
                                <p class="text-red-500">Maaf, konten belum tersedia untuk bagian ini. Tolong isi konten agar dapat ditampilkan.</p>
                            @endif
                            <input type="text" placeholder="Type here" class="input input-bordered w-full" name="no_sertifikat" />
                        </label>
                        <div class="flex justify-end items-endgap-4 gap-2">
                            <button type="submit" class="btn bg-elm w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
                                <i class=" fas fa-plus"></i>
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Nomor Pendirian Sekolah -->
        <div class="mt-5 px-16">
            <div class="collapse collapse-arrow bg-base-200" id="no_pendirian_sekolah">
                <input type="checkbox" /> 
                <div class="collapse-title text-xl font-medium">
                    <span class="label-text font-bold">Nomor Pendirian Sekolah: </span>
                </div>
                <div class="collapse-content"> 
                    <form action="{{ route('konten.update', ['id' => $konten->id_sekolah, 'field' => 'no_pendirian_sekolah']) }}" method="POST" class="grid gap-2">
                        @csrf
                        @method('PATCH')
                        <label class="form-control w-full gap-2">
                            @if(!empty($konten->no_pendirian_sekolah))
                                <textarea class="textarea textarea-bordered" disabled>{{ $konten->no_pendirian_sekolah }}</textarea>
                            @else
                                <p class="text-red-500">Maaf, konten belum tersedia untuk bagian ini. Tolong isi konten agar dapat ditampilkan.</p>
                            @endif
                            <input type="text" placeholder="Type here" class="input input-bordered w-full" name="no_pendirian_sekolah" />
                        </label>
                        <div class="flex justify-end items-endgap-4 gap-2">
                            <button type="submit" class="btn bg-elm w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
                                <i class=" fas fa-plus"></i>
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Status Kepemilikan Bangunan -->
        <div class="mt-5 px-16">
            <div class="collapse collapse-arrow bg-base-200" id="status_kepemilikan_bangunan">
                <input type="checkbox" /> 
                <div class="collapse-title text-xl font-medium">
                    <span class="label-text font-bold">Status Kepemilikan Bangunan: </span>
                </div>
                <div class="collapse-content"> 
                    <form action="{{ route('konten.update', ['id' => $konten->id_sekolah, 'field' => 'status_kepemilikan_bangunan']) }}" method="POST" class="grid gap-2">
                        @csrf
                        @method('PATCH')
                        <label class="form-control w-full gap-2">
                            @if(!empty($konten->status_kepemilikan_bangunan))
                                <textarea class="textarea textarea-bordered" disabled>{{ $konten->status_kepemilikan_bangunan }}</textarea>
                            @else
                                <p class="text-red-500">Maaf, konten belum tersedia untuk bagian ini. Tolong isi konten agar dapat ditampilkan.</p>
                            @endif
                            <input type="text" placeholder="Type here" class="input input-bordered w-full" name="status_kepemilikan_bangunan" />
                        </label>
                        <div class="flex justify-end items-endgap-4 gap-2">
                            <button type="submit" class="btn bg-elm w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
                                <i class=" fas fa-plus"></i>
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Sisa Lahan Seluruhnya -->
        <div class="mt-5 px-16">
            <div class="collapse collapse-arrow bg-base-200" id="sisa_lahan_seluruhnya">
                <input type="checkbox" /> 
                <div class="collapse-title text-xl font-medium">
                    <span class="label-text font-bold">Sisa Lahan Seluruhnya: </span>
                </div>
                <div class="collapse-content"> 
                    <form action="{{ route('konten.update', ['id' => $konten->id_sekolah, 'field' => 'sisa_lahan_seluruhnya']) }}" method="POST" class="grid gap-2">
                        @csrf
                        @method('PATCH')
                        <label class="form-control w-full gap-2">
                            @if(!empty($konten->sisa_lahan_seluruhnya))
                                <textarea class="textarea textarea-bordered" disabled>{{ $konten->sisa_lahan_seluruhnya }}</textarea>
                            @else
                                <p class="text-red-500">Maaf, konten belum tersedia untuk bagian ini. Tolong isi konten agar dapat ditampilkan.</p>
                            @endif
                            <input type="text" placeholder="Type here" class="input input-bordered w-full" name="sisa_lahan_seluruhnya" />
                        </label>
                        <div class="flex justify-end items-endgap-4 gap-2">
                            <button type="submit" class="btn bg-elm w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
                                <i class=" fas fa-plus"></i>
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Luas Lahan Keseluruhan -->
        <div class="mt-5 px-16">
            <div class="collapse collapse-arrow bg-base-200" id="luas_lahan_seluruhnya">
                <input type="checkbox" /> 
                <div class="collapse-title text-xl font-medium">
                    <span class="label-text font-bold">Luas Lahan Keseluruhan: </span>
                </div>
                <div class="collapse-content"> 
                    <form action="{{ route('konten.update', ['id' => $konten->id_sekolah, 'field' => 'luas_lahan_keseluruhan']) }}" method="POST" class="grid gap-2">
                        @csrf
                        @method('PATCH')
                        <label class="form-control w-full gap-2">
                            @if(!empty($konten->luas_lahan_keseluruhan))
                                <textarea class="textarea textarea-bordered" disabled>{{ $konten->luas_lahan_keseluruhan }}</textarea>
                            @else
                                <p class="text-red-500">Maaf, konten belum tersedia untuk bagian ini. Tolong isi konten agar dapat ditampilkan.</p>
                            @endif
                            <input type="text" placeholder="Type here" class="input input-bordered w-full" name="luas_lahan_keseluruhan" />
                        </label>
                        <div class="flex justify-end items-endgap-4 gap-2">
                            <button type="submit" class="btn bg-elm w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
                                <i class=" fas fa-plus"></i>
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Teks Profile -->
        <div class="mt-5 px-16">
            <div class="collapse collapse-arrow bg-base-200" id="teks_profile">
                <input type="checkbox" /> 
                <div class="collapse-title text-xl font-medium">
                    <span class="label-text font-bold">Teks Profil: </span>
                </div>
                <div class="collapse-content"> 
                    <form action="{{ route('konten.update', ['id' => $konten->id_sekolah, 'field' => 'teks_profile']) }}" method="POST" class="grid gap-2">
                        @csrf
                        @method('PATCH')
                        <label class="form-control w-full gap-2">
                            @if(!empty($konten->teks_profile))
                                <textarea class="textarea textarea-bordered" disabled>{{ $konten->teks_profile }}</textarea>
                            @else
                                <p class="text-red-500">Maaf, konten belum tersedia untuk bagian ini. Tolong isi konten agar dapat ditampilkan.</p>
                            @endif
                            <input type="text" placeholder="Type here" class="input input-bordered w-full" name="teks_profile" />
                        </label>
                        <div class="flex justify-end items-endgap-4 gap-2">
                            <button type="submit" class="btn bg-elm w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
                                <i class=" fas fa-plus"></i>
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Teks Fasilitas -->
        <div class="mt-5 px-16">
            <div class="collapse collapse-arrow bg-base-200" id="teks_fasilitas">
                <input type="checkbox" /> 
                <div class="collapse-title text-xl font-medium">
                    <span class="label-text font-bold">Teks Fasilitas: </span>
                </div>
                <div class="collapse-content"> 
                    <form action="{{ route('konten.update', ['id' => $konten->id_sekolah, 'field' => 'teks_fasilitas']) }}" method="POST" class="grid gap-2">
                        @csrf
                        @method('PATCH')
                        <label class="form-control w-full gap-2">
                            @if(!empty($konten->teks_fasilitas))
                                <textarea class="textarea textarea-bordered" disabled>{{ $konten->teks_fasilitas }}</textarea>
                            @else
                                <p class="text-red-500">Maaf, konten belum tersedia untuk bagian ini. Tolong isi konten agar dapat ditampilkan.</p>
                            @endif
                            <input type="text" placeholder="Type here" class="input input-bordered w-full" name="teks_fasilitas" />
                        </label>
                        <div class="flex justify-end items-endgap-4 gap-2">
                            <button type="submit" class="btn bg-elm w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
                                <i class=" fas fa-plus"></i>
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Teks Lokasi -->
        <div class="mt-5 px-16">
            <div class="collapse collapse-arrow bg-base-200" id="teks_lokasi">
                <input type="checkbox" /> 
                <div class="collapse-title text-xl font-medium">
                    <span class="label-text font-bold">Teks Lokasi: </span>
                </div>
                <div class="collapse-content"> 
                    <form action="{{ route('konten.update', ['id' => $konten->id_sekolah, 'field' => 'teks_lokasi']) }}" method="POST" class="grid gap-2">
                        @csrf
                        @method('PATCH')
                        <label class="form-control w-full gap-2">
                            @if(!empty($konten->teks_lokasi))
                                <textarea class="textarea textarea-bordered" disabled>{{ $konten->teks_lokasi }}</textarea>
                            @else
                                <p class="text-red-500">Maaf, konten belum tersedia untuk bagian ini. Tolong isi konten agar dapat ditampilkan.</p>
                            @endif
                            <input type="text" placeholder="Type here" class="input input-bordered w-full" name="teks_lokasi" />
                        </label>
                        <div class="flex justify-end items-endgap-4 gap-2">
                            <button type="submit" class="btn bg-elm w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
                                <i class=" fas fa-plus"></i>
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Teks Sejarah -->
        <div class="mt-5 px-16">
            <div class="collapse collapse-arrow bg-base-200" id="teks_sejarah">
                <input type="checkbox" /> 
                <div class="collapse-title text-xl font-medium">
                    <span class="label-text font-bold">Teks Sejarah: </span>
                </div>
                <div class="collapse-content"> 
                    <form action="{{ route('konten.update', ['id' => $konten->id_sekolah, 'field' => 'teks_sejarah']) }}" method="POST" class="grid gap-2">
                        @csrf
                        @method('PATCH')
                        <label class="form-control w-full gap-2">
                            @if(!empty($konten->teks_sejarah))
                                <textarea class="textarea textarea-bordered" disabled>{{ $konten->teks_sejarah }}</textarea>
                            @else
                                <p class="text-red-500">Maaf, konten belum tersedia untuk bagian ini. Tolong isi konten agar dapat ditampilkan.</p>
                            @endif
                            <input type="text" placeholder="Type here" class="input input-bordered w-full" name="teks_sejarah" />
                        </label>
                        <div class="flex justify-end items-endgap-4 gap-2">
                            <button type="submit" class="btn bg-elm w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
                                <i class=" fas fa-plus"></i>
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Teks Prestasi -->
        <div class="mt-5 px-16">
            <div class="collapse collapse-arrow bg-base-200" id="teks_prestasi">
                <input type="checkbox" /> 
                <div class="collapse-title text-xl font-medium">
                    <span class="label-text font-bold">Teks Prestasi: </span>
                </div>
                <div class="collapse-content"> 
                    <form action="{{ route('konten.update', ['id' => $konten->id_sekolah, 'field' => 'teks_prestasi']) }}" method="POST" class="grid gap-2">
                        @csrf
                        @method('PATCH')
                        <label class="form-control w-full gap-2">
                            @if(!empty($konten->teks_prestasi))
                                <textarea class="textarea textarea-bordered" disabled>{{ $konten->teks_prestasi }}</textarea>
                            @else
                                <p class="text-red-500">Maaf, konten belum tersedia untuk bagian ini. Tolong isi konten agar dapat ditampilkan.</p>
                            @endif
                            <input type="text" placeholder="Type here" class="input input-bordered w-full" name="teks_prestasi" />
                        </label>
                        <div class="flex justify-end items-endgap-4 gap-2">
                            <button type="submit" class="btn bg-elm w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
                                <i class=" fas fa-plus"></i>
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection