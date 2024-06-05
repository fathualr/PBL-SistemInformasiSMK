@extends('layouts.mainAdmin')

@section('main-content')

@include('shared.success-message')
@include('shared.error-message')

<div>
    <h2 class="text-black font-bold text-xl mx-5 my-2">Galeri Foto Prasarana</h2>
</div>

<div class="flex flex-col md:flex-row justify-between items-center mx-5">
    <div class="w-full md:w-auto mb-2 md:mb-0">
        <button class="btn btn-outline w-full md:w-auto hover:animate-pulse" onclick="my_modal_add.showModal()">
            <i class="fas fa-plus"></i>
            Tambahkan Foto Prasarana
        </button>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-9 shadow-xl rounded-md mt-5">
    <div class="col-span-1 md:col-span-9 row-start-2 px-4">
        <table class="table border table-pin-rows table-pin-cols w-full text-center">
            <thead>
                <tr>
                    <th class="p-2 md:table-cell">No</th>
                    <th class="p-2 md:table-cell text-start">Nama Prasarana</th>
                    <th class="p-2 hidden md:table-cell text-start">Tautan Foto</th>
                    <th class="p-2 md:table-cell">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($foto_prasaranas->chunk(10) as $chunk)
                @foreach($chunk as $key => $foto_prasarana)
                <tr class="hover">
                    <td class="p-2 md:table-cell">
                        {{ ($foto_prasaranas->currentPage() - 1) * $foto_prasaranas->perPage() + $key + 1 }}
                    </td>
                    <td class="p-2 text-start md:table-cell">{{ $foto_prasarana->prasarana->nama_prasarana }}</td>
                    <td class="p-2 text-start hidden md:table-cell">
                        <p class="truncate w-40">
                            {{ $foto_prasarana->tautan_foto }}
                        </p>
                    </td>
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
                                    <button class="btn btn-ghost w-full hover:animate-pulse"
                                        onclick="window['my_modal_edit_{{ $foto_prasarana->id_foto_prasarana }}'].showModal()">
                                        <i class="fas fa-pen-to-square"></i>
                                        Edit
                                    </button>
                                </li>
                                <li>
                                    <button class="btn btn-ghost w-full hover:animate-pulse"
                                        onclick="window['my_modal_detail_{{ $foto_prasarana->id_foto_prasarana }}'].showModal()">
                                        <i class="fas fa-circle-info"></i>
                                        Detail
                                    </button>
                                </li>
                                <li>
                                    <button class="btn btn-ghost w-full hover:animate-pulse"
                                        onclick="window['my_modal_delete_{{ $foto_prasarana->id_foto_prasarana }}'].showModal()">
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
                    <th class="p-2 md:table-cell">No</th>
                    <th class="p-2 md:table-cell text-start">Nama Prasarana</th>
                    <th class="p-2 hidden md:table-cell text-start">Tautan Foto</th>
                    <th class="p-2 md:table-cell">Aksi</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<dialog id="my_modal_add" class="modal" onclick="if (event.target === this) this.close()">
    <div class="modal-box w-11/12 max-w-5xl">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-3">
                <i class="fas fa-times text-2xl"></i>
            </button>
        </form>
        <h3 class="font-bold text-lg">Tambahkan Foto</h3>
        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-primary"></div>
            <div class="divider"></div>
        </div>
        <form action="{{ route('admin.FotoPrasarana.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <span class="label-text -mb-4">Prasarana :</span>
            <select name="id_prasarana"
                class="select border-b-2 border-blue-400 w-full gap-2 mb-5 focus-within:outline-none px-10" required>
                <option disabled selected>Nama prasarana || Tipe prasarana</option>
                @foreach($prasaranas as $prasarana)
                @if($prasarana->nama_prasarana)
                @php
                $idPrasarana = $prasarana->id_prasarana;
                $countPhotos = isset($countExistingPhotos[$idPrasarana]) ? $countExistingPhotos[$idPrasarana] : 0;
                $disabled = $countPhotos >= $maxPhotosAllowed ? 'disabled' : '';
                @endphp
                <option value="{{ $idPrasarana }}" {{ $disabled }}>{{ $prasarana->nama_prasarana }} || [
                    {{ $prasarana->jenis_prasarana }} ]
                </option>
                @endif
                @endforeach
            </select>
            <span class="label-text -mb-4">Tautan Prasarana :</span>
            <label
                class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="file" name="tautan_foto" class="grow file-input file-input-success border-none bg-transparent py-2 file:mr-4 file:px-4 file:rounded-full file:border-0
                    file:text-sm file:font-semibold file:bg-blue-500 file:text-white
                    hover:file:bg-transparent hover:file:text-blue-400" accept="image/*" required placeholder="Logo" />
            </label>

            <div class="flex justify-end items-end mt-20 gap-4">
                <button type="reset"
                    class="btn bg-error w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-error">
                    <i class="fas fa-times"></i>
                    Reset
                </button>
                <button type="submit"
                    class="btn bg-elm w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
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

@foreach($foto_prasaranas as $foto_prasarana)
<dialog id="my_modal_edit_{{ $foto_prasarana->id_foto_prasarana }}" class="modal"
    onclick="if (event.target === this) this.close()">
    <div class="modal-box w-11/12 max-w-5xl">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-3">
                <i class="fas fa-times text-2xl"></i>
            </button>
        </form>
        <h3 class="font-bold text-lg">Edit Foto</h3>
        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-primary"></div>
            <div class="divider"></div>
        </div>
        <form action="{{ route('admin.FotoPrasarana.update', $foto_prasarana->id_foto_prasarana) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <span class="label-text -mb-4">Prasarana :</span>
            <select name="id_prasarana"
                class="select border-b-2 border-blue-400 w-full gap-2 mb-5 focus-within:outline-none px-10" required>
                <option disabled selected>Nama prasarana || Tipe prasarana</option>
                @foreach($prasaranas as $prasarana)
                @if($prasarana->nama_prasarana )
                <option value="{{ $prasarana->id_prasarana }}">{{ $prasarana->nama_prasarana }} || [
                    {{ $prasarana->jenis_prasarana }} ]
                </option>
                @endif
                @endforeach
            </select>

            <span class="label-text -mb-4">Tautan Prasarana :</span>
            <label
                class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="file" name="tautan_foto" class="grow file-input file-input-success border-none bg-transparent py-2 file:mr-4 file:px-4 file:rounded-full file:border-0
                    file:text-sm file:font-semibold file:bg-blue-500 file:text-white
                    hover:file:bg-transparent hover:file:text-blue-400" accept="image/*" required placeholder="Logo" />
            </label>

            <div class="flex justify-end items-end mt-20 gap-4">
                <button type="submit"
                    class="btn bg-elm w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
                    <i class="fas fa-pen-to-square"></i>
                    Edit
                </button>
            </div>
        </form>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>

<dialog id="my_modal_detail_{{ $foto_prasarana->id_foto_prasarana }}" class="modal"
    onclick="if (event.target === this) this.close()">
    <div class="modal-box w-11/12 max-w-5xl">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-3">
                <i class="fas fa-times text-2xl"></i>
            </button>
        </form>
        <div>
            <h3 class="font-bold text-lg">Detail Foto</h3>
            <div class="grid grid-cols-3 w-52 -mt-5">
                <div class="divider"></div>
                <div class="divider divider-primary"></div>
                <div class="divider"></div>
            </div>
            <img class="object-cover object-center w-96 h-44 max-w-full rounded-lg mx-auto"
                src="{{ asset('storage/' . $foto_prasarana->tautan_foto) }}" alt="gallery foto" />
            <span class="label-text -mb-4">Tautan Foto :</span>
            <label
                class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" name="nama_album" class="grow bg-transparent py-2" placeholder="Nama Album"
                    value="{{ $foto_prasarana->tautan_foto }}" readonly />
            </label>
        </div>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>

<dialog id="my_modal_delete_{{ $foto_prasarana->id_foto_prasarana }}" class="modal"
    onclick="if (event.target === this) this.close()">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-3">
                <i class="fas fa-times text-2xl"></i>
            </button>
        </form>
        <h3 class="font-bold text-lg">Hapus Data Foto Prasarana</h3>

        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-error"></div>
            <div class="divider"></div>
        </div>
        <form action="{{ route('admin.FotoPrasarana.destroy', $foto_prasarana->id_foto_prasarana) }}" method="post">
            @csrf
            @method('DELETE')
            <h3 class="font-bold text-lg flex justify-center items-center">Yakin Ingin Menghapus Data Ini ?</h3>
            <div class="flex justify-end items-end mt-20 gap-4">
                <button type="submit"
                    class="btn bg-error w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-error">
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
    @if($foto_prasaranas->previousPageUrl())
    <a href="{{ $foto_prasaranas->previousPageUrl() }}" class="join-item btn">«</a>
    @else
    <button class="join-item btn disabled">«</button>
    @endif

    <button class="join-item btn">Page {{ $foto_prasaranas->currentPage() }}</button>

    @if($foto_prasaranas->nextPageUrl())
    <a href="{{ $foto_prasaranas->nextPageUrl() }}" class="join-item btn">»</a>
    @else
    <button class="join-item btn disabled">»</button>
    @endif
</div>

@endsection