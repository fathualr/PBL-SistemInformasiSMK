@extends('layouts.mainAdmin')

@section('main-content')

<div class="grid grid-cols-9 shadow-xl rounded-md">

    @include('shared.success-message')
    @include('shared.error-message')
    <!-- Title -->
    <div class="col-span-2 my-4 mx-5 row-start-2">
        <h3 class="font-bold text-lg">Prestasi Siswa</h3>
    </div>
    <!-- Title -->

    <!-- Modal -->
    <div class="col-span-3 row-start-3 mx-5">
        <button class="btn btn-outline w-full hover:animate-pulse" onclick="my_modal_add.showModal()">
            <i class="fas fa-user-plus"></i>
            Tambah
        </button>
    </div>
    <!-- Modal -->

    <!-- Search Bar -->
    <div class="col-span-2 row-start-3 col-start-7">
        <label class="input input-bordered flex items-center gap-2 focus-within:outline-none">
            <i class="fas fa-magnifying-glass"></i>
            <input type="text" class="grow" placeholder="Cari" />
        </label>
    </div>
    <!-- Search Bar -->

    <!-- Content -->
    <div class="col-span-9 row-start-4 mt-5">
        <table class="table text-center">
            <!-- head -->
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Prestasi</th>
                    <th>Deskripsi Prestasi</th>
                    <th>Tanggal Prestasi</th>
                    <th>Kategori Prestasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach($prestasiSiswa as $key => $prestasi)
                <tr class="hover">
                    <th>{{ ($prestasiSiswa->currentPage() - 1) * $prestasiSiswa->perPage() + $key + 1 }}</th>
                    <td>
                        {{ $prestasi->nama_prestasi }}
                    </td>
                    <td>
                        <p class="truncate w-48 mx-auto">
                        {{ $prestasi->deskripsi_prestasi }}
                        </p>
                    </td>
                    <td>{{ $prestasi->tanggal_prestasi }}</td>
                    <td>{{ $prestasi->kategori_prestasi }}</td>
                    <td>
                        <details class="dropdown dropdown-bottom">
                            <summary tabindex="0" role="button" class="btn btn-ghost button w-20">
                                <i class="fas fa-circle text-[0.5rem] circle-1 transition-all duration-500"></i>
                                <i class="fas fa-circle text-[0.5rem] circle-2 transition-all duration-500"></i>
                                <i class="fas fa-circle text-[0.5rem] circle-3 transition-all duration-500"></i>
                                <i class="fas fa-times font-bold text-xl hidden transition-all duration-500"></i>
                            </summary>
                            <ul tabindex="0" class="dropdown-content z-50 menu p-2 shadow bg-base-100 rounded-box w-32">
                                <!-- Edit -->
                                <li>
                                    <button class="btn btn-ghost w-full hover:animate-pulse"
                                        onclick="window['my_modal_edit{{ $prestasi->id_prestasi }}'].showModal()">
                                        <i class="fas fa-pen-to-square"></i>
                                        Edit
                                    </button>
                                </li>
                                <!-- Edit -->

                                <!-- View -->
                                <li>
                                    <button class="btn btn-ghost w-full hover:animate-pulse"
                                        onclick="window['my_modal_view{{ $prestasi->id_prestasi }}'].showModal()">
                                        <i class="fas fa-circle-info"></i>
                                        Detail
                                    </button>
                                </li>
                                <!-- View -->

                                <!-- Delete -->
                                <li>
                                    <button class="btn btn-ghost w-full hover:animate-pulse"
                                        onclick="window['my_modal_delete{{ $prestasi->id_prestasi }}'].showModal()">
                                        <i class="fas fa-trash"></i>
                                        Hapus
                                    </button>
                                </li>
                                <!-- Delete -->
                            </ul>
                        </details>
                    </td>
                </tr>
                @endforeach
                
            </tbody>
            <!-- foot -->
            <tfoot>
                <tr>
                    <th>No.</th>
                    <th>Prestasi</th>
                    <th>Deskripsi Prestasi</th>
                    <th>Tanggal Prestasi</th>
                    <th>Kategori Prestasi</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
        </table>
        
        <!-- Pagination -->
        <div class="flex justify-center my-5 gap-2">
            @if($prestasiSiswa->previousPageUrl())
            <a href="{{ $prestasiSiswa->previousPageUrl() }}" class="btn">«</a>
            @else
            <button class="btn disabled">«</button>
            @endif
            <button class="btn">Page {{ $prestasiSiswa->currentPage() }}</button>
            @if($prestasiSiswa->nextPageUrl())
            <a href="{{ $prestasiSiswa->nextPageUrl() }}" class="btn">»</a>
            @else
            <button class="btn disabled">»</button>
            @endif
        </div>  

    </div>
    <!-- Content -->
</div>

<dialog id="my_modal_add" class="modal">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Tambah Data Prestasi Siswa</h3>
        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-success"></div>
            <div class="divider"></div>
        </div>

        <form action="{{ route('PrestasiSiswa.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <label
                class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="Nama Prestasi"
                    name="nama_prestasi" />
            </label>
            <label
                class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="Siswa Prestasi" name="siswa_prestasi" />
            </label>
            <textarea
                class="input border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none grow py-2"
                placeholder="Deskripsi Prestasi" name="deskripsi_prestasi"></textarea>
            <label
                class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="date" class="grow bg-transparent border-b-2 py-2" 
                    name="tanggal_prestasi" />
            </label>
            <select class="select border-elm border-2 w-full mb-5" name="kategori_prestasi">
                <option disabled selected>Pilih Kategori Prestasi</option>
                <option value="Akademik">Akademik</option>
                <option value="Olahraga">Olahraga</option>
                <option value="Seni">Seni</option>
                <option value="Lainnya">Lainnya</option>
            </select>
            <select class="select border-elm border-2 w-full mb-5" name="tingkat_prestasi">
                <option disabled selected>Pilih Tingkat Prestasi</option>
                <option value="Sekolah">Sekolah</option>
                <option value="Kabupaten">Kabupaten</option>
                <option value="Provinsi">Provinsi</option>
                <option value="Nasional">Nasional</option>
                <option value="Internasional">Internasional</option>
            </select>
            <div class="grid gap-2" id="fileInputsPrestasi">
                <label class="input bg-transparent border-2 border-elm flex items-center gap-2 w-full focus-within:outline-none">
                    <input type="file" name="gambar_prestasi"
                        class="grow file-input file-input-success border-none bg-transparent py-2"
                        accept="gambarPrestasi/*" />
                </label>
            </div>
            <button type="button" id="btnAddFilePrestasi" class="btn no-animation btn-sm mt-3 w-full">Tambah Gambar</button>
            <div class="flex justify-end items-end mt-20 gap-4">
                <button type="reset"
                    class="btn bg-error w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-error">
                    <i class="fas fa-times"></i>
                    Reset
                </button>
                <button type="submit" class="btn bg-elm w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
                    <i class=" fas fa-plus"></i>
                    Tambah
                </button>
            </div>
        </form>

    </div>
</dialog>

@foreach($prestasiSiswa as $prestasiIndex => $prestasi)
<!-- Edit Modal -->
<dialog id="my_modal_edit{{ $prestasi->id_prestasi }}" class="modal">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Edit Prestasi Siswa</h3>
        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-success"></div>
            <div class="divider"></div>
        </div>
        <form action="{{ route('PrestasiSiswa.update',  $prestasi->id_prestasi) }}"
            method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="Nama Prestasi"
                    name="nama_prestasi" value="{{ $prestasi->nama_prestasi }}"/>
            </label>

            <label
                class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" class="grow bg-transparent border-b-2 py-2" placeholder="Siswa Prestasi" name="siswa_prestasi" value="{{  $prestasi->siswa_prestasi}}"/>
            </label>

            <textarea
                class="input border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none grow py-2"
                placeholder="Deskripsi Prestasi" name="deskripsi_prestasi">{{ $prestasi->deskripsi_prestasi }}</textarea>

            <label
                class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="date" class="grow bg-transparent border-b-2 py-2"
                    name="tanggal_prestasi" value="{{ $prestasi->tanggal_prestasi }}"/>
            </label>

            <select class="select border-elm border-2 w-full mb-5" name="kategori_prestasi">
                <option disabled>Pilih Kategori Prestasi</option>
                <option value="Akademik" @if($prestasi->id_prestasi ===
                                        $prestasi->kategori_prestasi) selected @endif>Akademik</option>
                <option value="Olahraga" @if($prestasi->id_prestasi ===
                                        $prestasi->kategori_prestasi) selected @endif>Olahraga</option>
                <option value="Seni" @if($prestasi->id_prestasi ===
                                        $prestasi->kategori_prestasi) selected @endif>Seni</option>
                <option value="Lainnya" @if($prestasi->id_prestasi ===
                                        $prestasi->kategori_prestasi) selected @endif>Lainnya</option>
            </select>

            <select class="select border-elm border-2 w-full mb-5" name="tingkat_prestasi">
                <option disabled>Pilih Tingkat Prestasi</option>
                <option value="Sekolah" @if($prestasi->id_prestasi ===
                                        $prestasi->tingkat_prestasi) selected @endif>Sekolah</option>
                <option value="Kabupaten" @if($prestasi->id_prestasi ===
                                        $prestasi->tingkat_prestasi) selected @endif>Kabupaten</option>
                <option value="Provinsi" @if($prestasi->id_prestasi ===
                                        $prestasi->tingkat_prestasi) selected @endif>Provinsi</option>
                <option value="Nasional" @if($prestasi->id_prestasi ===
                                        $prestasi->tingkat_prestasi) selected @endif>Nasional</option>
                <option value="Internasional" @if($prestasi->id_prestasi ===
                                        $prestasi->tingkat_prestasi) selected @endif>Internasional</option>
            </select>

            <div class="grid gap-2">
                <label class="input bg-transparent border-2 border-elm flex items-center gap-2 w-full focus-within:outline-none">
                    <input type="file" name="gambar_prestasi"
                        class="grow file-input file-input-success border-none bg-transparent py-2"
                        accept="gambarPrestasi/*" />
                </label>
            </div>

            <button type="button" class="btn btn-outline w-full hover:animate-pulse"
                onclick="window['my_modal_edit_gambar{{ $prestasi->id_prestasi }}'].showModal()">
                <i class="fas fa-pen-to-square"></i>
                Edit Gambar Prestasi Siswa
            </button>

            <div class="flex justify-end items-end mt-10 gap-4">
                <button type="submit"
                    class="btn bg-elm w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
                    <i class="fas fa-pen-to-square"></i>
                    Edit
                </button>
            </div>
        </form>
    </div>
</dialog>

<!-- Edit Gambar -->
<dialog id="my_modal_edit_gambar{{ $prestasi->id_prestasi }}" class="modal">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Edit Gambar Ekstrakulikuler</h3>
        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-success"></div>
            <div class="divider"></div>
        </div>
        <div class="label">
            <span class="label-text">Gambar :</span>
        </div>
        <div class="grid gap-2" id="textInputContainer">
            @foreach ($prestasi->gambar as $gambar)
            <form action="{{ route('GambarPrestasi.destroy', $gambar->id_gambar) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="flex gap-1">
                    <input type="text" class="input input-bordered input-success w-full" placeholder="Gambar berita" value="{{ $gambar->gambar }}" name="gambar[]" disabled />
                    <button class="btn btn-square btn-outline btn-error btn-remove">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </form>
            @endforeach
        </div>
        <form action="{{ route('GambarPrestasi.update', $prestasi->id_prestasi) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="label">
                <span class="label-text">Tambah Gambar:</span>
            </div>
            <div class="flex gap-1">
                <input type="file" class="file-input file-input-bordered file-input-success w-full" placeholder="Pilih gambar berita" name="gambar" />
                <button type="submit" class="btn btn-square btn-outline btn-success btn-remove">
                    <i class="fas fa-plus text-xl"></i>
                </button>
            </div>
        </form>
    </div>
</dialog>
    <!-- Edit Gambar -->

<!-- View Modal -->
<dialog id="my_modal_view{{ $prestasi->id_prestasi }}" class="modal">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Detail Prestasi Siswa</h3>
        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-success"></div>
            <div class="divider"></div>
        </div>
        <div>
            <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" class="grow bg-transparent border-b-2 py-2" value="{{ $prestasi->nama_prestasi }}" disabled/>
            </label>

            <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" class="grow bg-transparent border-b-2 py-2" value="{{  $prestasi->siswa_prestasi}}" disabled/>
            </label>

            <textarea class="input border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none grow py-2" disabled>{{ $prestasi->deskripsi_prestasi }}</textarea>

            <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="date" class="grow bg-transparent border-b-2 py-2" value="{{ $prestasi->tanggal_prestasi }}" disabled/>
            </label>

            <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" class="grow bg-transparent border-b-2 py-2" value="{{ $prestasi->kategori_prestasi }}" disabled/>
            </label>

            <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" class="grow bg-transparent border-b-2 py-2" value="{{ $prestasi->tingkat_prestasi }}" disabled/>
            </label>

            <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" class="grow bg-transparent border-b-2 py-2" value="{{ $prestasi->gambar_prestasi }}" disabled/>
            </label>

            <div class="grid gap-2">
                @if ($prestasi->gambar->isEmpty())
                <div class="flex justify-center">
                    <p class="text-xs text-red-500">Tidak ada gambar yang tersedia.</p>
                </div>
                @else
                @foreach ($prestasi->gambar as $gambar)
                <input type="text" class="input input-bordered input-success w-full" placeholder="Kategori berita" value="{{ $gambar->gambar }}" name="tautan_gambar" disabled />
                @endforeach
                @endif
            </div>

        </div>
    </div>
</dialog>
<!-- View Modal -->
    
<!-- Delete Modal -->
<dialog id="my_modal_delete{{ $prestasi->id_prestasi }}" class="modal">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Hapus Data</h3>
        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-error"></div>
            <div class="divider"></div>
        </div>
        <form action="{{ route('PrestasiSiswa.destroy', $prestasi->id_prestasi) }}" method="post">
            @csrf
            @method('DELETE')
            <h3 class="font-bold text-lg flex justify-center items-center">Yakin Ingin Menghapus Data Ini ?</h3>
            <div class="flex justify-end items-end mt-10 gap-4">
                <button type="submit" class="btn bg-error w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-error">
                    <i class="fas fa-trash"></i>
                    Hapus
                </button>
            </div>
        </form>
    </div>
</dialog>
<!-- Delete Modal -->
@endforeach

@endsection