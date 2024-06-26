@extends('layouts.mainAdmin')

@section('main-content')

@include('shared.success-message')
@include('shared.error-message')

<div>
    <h2 class="text-black font-bold text-xl mx-5 my-2">Sarana Prasarana</h2>
</div>
<div class="flex flex-col md:flex-row justify-between items-center mx-5">
    <div class="w-full md:w-auto mb-2 md:mb-0">
        <button class="btn btn-outline w-full md:w-auto hover:animate-pulse" onclick="my_modal_add.showModal()">
            <i class="fas fa-plus"></i>
            Tambahkan Prasarana
        </button>
    </div>
</div>


<div class="grid grid-cols-1 md:grid-cols-9 shadow-xl rounded-md mt-5">
    <div class="col-span-1 md:col-span-9 row-start-2 px-4">
        <div class=" mt-5">
            <table class="table border text-center min-w-full">
                <thead>
                    <tr>
                        <th class="p-2">No.</th>
                        <th class="p-2">Nama Prasarana</th>
                        <th class="p-2 hidden md:table-cell">Jenis Prasarana</th>
                        <th class="p-2 hidden md:table-cell">Luas</th>
                        <th class="p-2 hidden md:table-cell">Kapasitas</th>
                        <th class="p-2 hidden md:table-cell">Tahun Di Bangun</th>
                        <th class="p-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($prasaranas->chunk(10) as $chunk)
                    @foreach($chunk as $key => $prasarana)
                    <tr class="hover">
                        <td class="p-2 md:table-cell">
                            {{ ($prasaranas->currentPage() - 1) * $prasaranas->perPage() + $key + 1 }}
                        </td>
                        <td class="p-2 md:table-cell">{{ $prasarana->nama_prasarana }}</td>
                        <td class="p-2 hidden md:table-cell">{{ $prasarana->jenis_prasarana }}</td>
                        <td class="p-2 hidden md:table-cell">{{ $prasarana->luas }}</td>
                        <td class="p-2 hidden md:table-cell">{{ $prasarana->kapasitas }}</td>
                        <td class="p-2 hidden md:table-cell">{{ $prasarana->tahun_dibangun }}</td>
                        <td class="p-2 md:table-cell">
                            <details class="dropdown">
                                <summary tabindex="0" role="button" class="btn btn-ghost button w-20">
                                    <i class="fas fa-circle text-[0.5rem] circle-1 transition-all duration-500"></i>
                                    <i class="fas fa-circle text-[0.5rem] circle-2 transition-all duration-500"></i>
                                    <i class="fas fa-circle text-[0.5rem] circle-3 transition-all duration-500"></i>
                                    <i class="fas fa-times font-bold text-xl hidden transition-all duration-500"></i>
                                </summary>
                                <ul tabindex="0" class="dropdown-content z-50 menu p-2 shadow bg-base-100 rounded-box w-32">
                                    <li>
                                        <button class="btn btn-ghost w-full hover:animate-pulse" onclick="window['my_modal_update_{{ $prasarana->id_prasarana }}'].showModal()">
                                            <i class="fas fa-pen-to-square"></i>
                                            Edit
                                        </button>
                                    </li>
                                    <li>
                                        <button class="btn btn-ghost w-full hover:animate-pulse" onclick="window['my_modal_view_{{ $prasarana->id_prasarana }}'].showModal()">
                                            <i class="fas fa-circle-info"></i>
                                            Detail
                                        </button>
                                    </li>
                                    <li>
                                        <button class="btn btn-ghost w-full hover:animate-pulse" onclick="window['my_modal_delete_{{ $prasarana->id_prasarana }}'].showModal()">
                                            <i class="fas fa-trash"></i>
                                            Hapus
                                        </button>
                                    </li>
                                </ul>
                            </details>
                        </td>
                    </tr>
                    @endforeach
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th class="p-2 hidden md:table-cell">No.</th>
                        <th class="p-2 hidden md:table-cell">Nama Prasarana</th>
                        <th class="p-2 hidden md:table-cell">Jenis Prasarana</th>
                        <th class="p-2 hidden md:table-cell">Luas</th>
                        <th class="p-2 hidden md:table-cell">Kapasitas</th>
                        <th class="p-2 hidden md:table-cell">Tahun Di Bangun</th>
                        <th class="p-2 hidden md:table-cell">Aksi</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>




<dialog id="my_modal_add" class="modal">
    <div class="modal-box max-w-full sm:max-w-md md:max-w-lg lg:max-w-xl xl:max-w-2xl py-0">
        <div class="sticky top-0 bg-white pt-5">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-0 top-3">
                    <i class="fas fa-times text-2xl"></i>
                </button>
            </form>
            <h3 class="font-bold text-lg">Tambahkan Data Prasarana</h3>
            <div class="grid grid-cols-3 w-full sm:w-52 -mt-5">
                <div class="divider"></div>
                <div class="divider divider-primary"></div>
                <div class="divider"></div>
            </div>
        </div>

        <form action="{{ route('admin.SaranaPrasarana.store') }}" method="POST">
            @csrf
            <div class="">
                <span class="label-text -mb-4">Nama Prasarana :</span>
                <label class="input bg-transparent border-2 border-blue-400 flex items-center mb-5 gap-2 focus-within:outline-none">
                    <input type="text" name="nama_prasarana" class="grow bg-transparent py-2" placeholder="Nama Prasarana" required />
                </label>
                <span class="label-text -mb-4">Jenis Prasarana :</span>
                <label class="input bg-transparent border-2 border-blue-400 flex items-center mb-5 gap-2 focus-within:outline-none">
                    <input type="text" name="jenis_prasarana" class="grow bg-transparent py-2" placeholder="Jenis Prasarana" required />
                </label>
                <span class="label-text -mb-4">Deskripsi Prasarana :</span>
                <textarea name="deskripsi_prasarana" class="textarea border-2 border-blue-400 w-full h-28" placeholder="Deskripsi Prasarana" required></textarea>
                <span class="label-text -mb-4">Luas Prasarana :</span>
                <label class="input bg-transparent border-2 border-blue-400 flex items-center mb-5 gap-2 focus-within:outline-none">
                    <input type="number" name="luas" class="grow bg-transparent py-2" placeholder="Luas (m²)" required />
                </label>
                <span class="label-text -mb-4">Kapasitas Prasarana :</span>
                <label class="input bg-transparent border-2 border-blue-400 flex items-center mb-5 gap-2 focus-within:outline-none">
                    <input type="number" name="kapasitas" class="grow bg-transparent py-2" placeholder="Kapasitas" required />
                </label>
                <span class="label-text -mb-4">Tahun Dibangun Prasarana :</span>
                <label class="input bg-transparent border-2 border-blue-400 flex items-center mb-5 gap-2 focus-within:outline-none">
                    <input type="date" name="tahun_dibangun" class="grow bg-transparent py-2" required />
                </label>
                <span class="label-text -mb-4">Kondisi Prasarana :</span>
                <label class="input bg-transparent border-2 border-blue-400 flex items-center mb-5 gap-2 focus-within:outline-none">
                    <select name="kondisi" class="grow bg-transparent py-2" required>
                        <option value="Baik">Baik</option>
                        <option value="Perlu Perbaikan">Perlu Perbaikan</option>
                        <option value="Dalam Perbaikan">Dalam Perbaikan</option>
                    </select>
                </label>
                <span class="label-text -mb-4">Status Prasarana :</span>
                <label class="input bg-transparent border-2 border-blue-400 flex items-center mb-5 gap-2 focus-within:outline-none">
                    <select name="status_prasarana" class="grow bg-transparent py-2" required>
                        <option value="Aktif">Aktif</option>
                        <option value="Tidak Aktif">Tidak Aktif</option>
                    </select>
                </label>
            </div>
            <div class="flex justify-end items-end my-10 gap-4">
                <button type="reset" class="btn bg-error w-32 h-10 rounded-sm border-none text-white hover:text-error">
                    <i class="fas fa-times"></i>
                    Reset
                </button>
                <button type="submit" class="btn bg-elm w-32 h-10 rounded-sm border-none text-white hover:text-elm">
                    <i class=" fas fa-plus"></i>
                    Tambah
                </button>
            </div>
        </form>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>

@foreach ($prasaranas as $prasarana)
<dialog id="my_modal_update_{{ $prasarana->id_prasarana }}" class="modal">
    <div class="modal-box max-w-full sm:max-w-md md:max-w-lg lg:max-w-xl xl:max-w-2xl py-0">
        <div class="sticky top-0 bg-white pt-5">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-0 top-3">
                    <i class="fas fa-times text-2xl"></i>
                </button>
            </form>
            <h3 class="font-bold text-lg">Info Edit Data</h3>
            <div class="grid grid-cols-3 w-full sm:w-52 -mt-5">
                <div class="divider"></div>
                <div class="divider divider-primary"></div>
                <div class="divider"></div>
            </div>
        </div>

        <form method="POST" action="{{ route('admin.SaranaPrasarana.update', $prasarana->id_prasarana) }}">
            @csrf
            @method('PATCH')
            <div class="">
                <span class="label-text -mb-4">Nama Prasarana :</span>
                <label class="input bg-transparent border-2 border-blue-400 flex items-center mb-5 gap-2 focus-within:outline-none">
                    <input type="text" name="nama_prasarana" class="grow bg-transparent py-2" placeholder="Nama Prasarana" value="{{ $prasarana->nama_prasarana }}" required />
                </label>
                <span class="label-text -mb-4">Jenis Prasarana :</span>
                <label class="input bg-transparent border-2 border-blue-400 flex items-center mb-5 gap-2 focus-within:outline-none">
                    <input type="text" name="jenis_prasarana" class="grow bg-transparent py-2" placeholder="Jenis Prasarana" value="{{ $prasarana->jenis_prasarana }}" required />
                </label>
                <span class="label-text -mb-4">Deskripsi Prasarana :</span>
                <textarea name="deskripsi_prasarana" class="textarea border-2 border-blue-400 w-full h-28" placeholder="Deskripsi Prasarana" required>{{ $prasarana->deskripsi_prasarana }}</textarea>
                <span class="label-text -mb-4">Luas Prasarana :</span>
                <label class="input bg-transparent border-2 border-blue-400 flex items-center mb-5 gap-2 focus-within:outline-none">
                    <input type="number" name="luas" class="grow bg-transparent py-2" placeholder="Luas (m²)" value="{{ $prasarana->luas }}" required />
                </label>
                <span class="label-text -mb-4">Kapasitas Prasarana :</span>
                <label class="input bg-transparent border-2 border-blue-400 flex items-center mb-5 gap-2 focus-within:outline-none">
                    <input type="number" name="kapasitas" class="grow bg-transparent py-2" placeholder="Kapasitas" value="{{ $prasarana->kapasitas }}" required />
                </label>
                <span class="label-text -mb-4">Tahun Dibangun Prasarana :</span>
                <label class="input bg-transparent border-2 border-blue-400 flex items-center mb-5 gap-2 focus-within:outline-none">
                    <input type="date" name="tahun_dibangun" class="grow bg-transparent py-2" value="{{ $prasarana->tahun_dibangun }}" required />
                </label>
                <span class="label-text -mb-4">Kondisi Prasarana :</span>
                <label class="input bg-transparent border-2 border-blue-400 flex items-center mb-5 gap-2 focus-within:outline-none">
                    <select name="kondisi" class="grow bg-transparent py-2" required>
                        <option value="Baik" {{ $prasarana->kondisi == 'Baik' ? 'selected' : '' }}>Baik</option>
                        <option value="Perlu Perbaikan" {{ $prasarana->kondisi == 'Perlu Perbaikan' ? 'selected' : '' }}>Perlu Perbaikan</option>
                        <option value="Dalam Perbaikan" {{ $prasarana->kondisi == 'Dalam Perbaikan' ? 'selected' : '' }}>Dalam Perbaikan</option>
                    </select>
                </label>
                <span class="label-text -mb-4">Status Prasarana :</span>
                <label class="input bg-transparent border-2 border-blue-400 flex items-center mb-5 gap-2 focus-within:outline-none">
                    <select name="status_prasarana" class="grow bg-transparent py-2" required>
                        <option value="Aktif" {{ $prasarana->status_prasarana == 'Aktif' ? 'selected' : '' }}>Aktif
                        </option>
                        <option value="Tidak Aktif" {{ $prasarana->status_prasarana == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                    </select>
                </label>
            </div>
            <div class="flex justify-end items-end my-10 gap-4">
                <button type="submit" class="btn bg-elm w-32 h-10 rounded-sm border-none text-white hover:text-elm">
                    <i class="fas fa-save"></i>
                    Update
                </button>
            </div>
        </form>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>

<dialog id="my_modal_view_{{ $prasarana->id_prasarana }}" class="modal">
    <div class="modal-box max-w-full sm:max-w-md md:max-w-lg lg:max-w-xl xl:max-w-5xl py-0">
        <div class="sticky top-0 bg-white pt-5">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-0 top-3">
                    <i class="fas fa-times text-2xl"></i>
                </button>
            </form>
            <h3 class="font-bold text-lg">Info Detail Prasarana</h3>
            <div class="grid grid-cols-3 w-full sm:w-52 -mt-5">
                <div class="divider"></div>
                <div class="divider divider-primary"></div>
                <div class="divider"></div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <table class="w-full">
                <tbody>
                    <tr>
                        <td class="font-bold">Nama Prasarana</td>
                        <td>: {{ $prasarana->nama_prasarana }}</td>
                    </tr>
                    <tr>
                        <td class="font-bold">Jenis Prasarana</td>
                        <td>: {{ $prasarana->jenis_prasarana }}</td>
                    </tr>
                    <tr>
                        <td class="font-bold">Luas</td>
                        <td>: {{ $prasarana->luas }} m2</td>
                    </tr>
                    <tr>
                        <td class="font-bold">Kapasitas</td>
                        <td>: {{ $prasarana->kapasitas }} Org</td>
                    </tr>
                    <tr>
                        <td class="font-bold">Tahun Di Bangun</td>
                        <td>: {{ $prasarana->tahun_dibangun }}</td>
                    </tr>
                    <tr>
                        <td class="font-bold">Status Gedung</td>
                        <td>: {{ $prasarana->kondisi }} {{ $prasarana->status_prasarana }}</td>
                    </tr>
                </tbody>
            </table>
            <table class="w-full">
                <tbody>
                    <tr>
                        <td class="font-bold align-text-top">Deskripsi</td>
                        <td class="align-text-top">:</td>
                        <td class="align-text-top text-justify">{{ $prasarana->deskripsi_prasarana }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <h3 class="font-bold text-lg mt-8">Gambar Prasarana</h3>
        <div class="grid grid-cols-3 w-full sm:w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-primary"></div>
            <div class="divider"></div>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-10">
            @if ($prasarana->foto_prasarana->isNotEmpty())
            @foreach ($prasarana->foto_prasarana as $foto_prasarana)
            <img class="object-cover object-center w-full h-44 rounded-lg mx-auto" src="{{ asset('storage/' . $foto_prasarana->tautan_foto) }}" alt="gallery foto" />
            @endforeach
            @else
            <p class="text-center col-span-full">Foto Tidak Tersedia</p>
            @endif
        </div>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>

<dialog id="my_modal_delete_{{ $prasarana->id_prasarana }}" class="modal">
    <div class="modal-box max-w-full sm:max-w-md md:max-w-lg lg:max-w-xl xl:max-w-2xl">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-3">
                <i class="fas fa-times text-2xl"></i>
            </button>
        </form>
        <h3 class="font-bold text-lg">Hapus Data</h3>
        <div class="grid grid-cols-3 w-full sm:w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-error"></div>
            <div class="divider"></div>
        </div>
        <form action="{{ route('admin.SaranaPrasarana.destroy', $prasarana->id_prasarana) }}" method="post">
            @csrf
            @method('DELETE')
            <h3 class="font-bold text-lg flex justify-center items-center">Yakin Ingin Menghapus Data Ini ?</h3>
            <div class="flex justify-end items-end mt-10 gap-4">
                <button type="submit" class="btn bg-error w-32 h-10 rounded-sm border-none text-white hover:text-error">
                    <i class="fas fa-trash"></i>
                    Hapus
                </button>
            </div>
        </form>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>
@endforeach


<div class="join flex justify-center my-5">
    @if($prasaranas->previousPageUrl())
    <a href="{{ $prasaranas->previousPageUrl() }}" class="join-item btn">«</a>
    @else
    <button class="join-item btn disabled">«</button>
    @endif

    <button class="join-item btn">Page {{ $prasaranas->currentPage() }}</button>

    @if($prasaranas->nextPageUrl())
    <a href="{{ $prasaranas->nextPageUrl() }}" class="join-item btn">»</a>
    @else
    <button class="join-item btn disabled">»</button>
    @endif
</div>
@endsection