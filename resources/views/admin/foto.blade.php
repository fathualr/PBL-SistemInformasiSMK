@extends('layouts.mainAdmin')

@section('main-content')

@include('shared.success-message')
@include('shared.error-message')

<div>
    <h2 class="text-black font-bold text-xl mx-5 my-2">Galeri Foto</h2>
</div>

<div class="flex justify-between items-center mx-5">
    <div class="flex items-center">
        <button class="btn btn-outline hover:animate-pulse" onclick="my_modal_add.showModal()">
            <i class="fas fa-plus"></i>
            Tambah Foto
        </button>
    </div>
    <div class="flex items-center">
        <div class="relative hidden md:flex mr-2">
            <select onchange="window.location.href=this.value" class="select border-b-2 border-base-300">
                <option value="{{ route('admin.foto.index', ['perPage' => 10]) }}"
                    {{ request()->get('perPage') == 10 ? 'selected' : '' }}>10</option>
                <option value="{{ route('admin.foto.index', ['perPage' => 25]) }}"
                    {{ request()->get('perPage') == 25 ? 'selected' : '' }}>25</option>
                <option value="{{ route('admin.foto.index', ['perPage' => 50]) }}"
                    {{ request()->get('perPage') == 50 ? 'selected' : '' }}>50</option>
                <option value="{{ route('admin.foto.index', ['perPage' => 75]) }}"
                    {{ request()->get('perPage') == 75 ? 'selected' : '' }}>75</option>
                <option value="{{ route('admin.foto.index', ['perPage' => 100]) }}"
                    {{ request()->get('perPage') == 100 ? 'selected' : '' }}>100</option>
            </select>
        </div>
        <form action="{{ route('admin.foto.index') }}" method="GET">
            <label class="input input-bordered flex items-center gap-2 focus-within:outline-none">
                <i class="fas fa-magnifying-glass"></i>
                <input type="text" class="grow" name="search" placeholder="Cari Nama Album" />
            </label>
        </form>
    </div>
</div>

<div class="grid grid-cols-9 shadow-xl rounded-md mt-5">
    <div class="col-span-9 row-start-4">
        <div class="mt-5">
            <table class="table border text-center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Album</th>
                        <th>Tautan Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($fotos->chunk(10) as $chunk)
                    @foreach($chunk as $key => $foto)
                    <tr class="hover">
                        <td>{{ ($fotos->currentPage() - 1) * $fotos->perPage() + $key + 1 }}</td>
                        <td>{{ $foto->album->nama_album }}</td>
                        <td>
                            <p class="truncate w-64">
                                {{ $foto->tautan_foto }}
                            </p>
                        </td>
                        <td>
                            <details class="dropdown">
                                <summary tabindex="0" role="button" class="btn btn-ghost button w-20">
                                    <i class="fas fa-circle text-[0.5rem] circle-1 transition-all duration-500"></i>
                                    <i class="fas fa-circle text-[0.5rem] circle-2 transition-all duration-500"></i>
                                    <i class="fas fa-circle text-[0.5rem] circle-3 transition-all duration-500"></i>
                                    <i class="fas fa-times font-bold text-xl hidden transition-all duration-500"></i>
                                </summary>
                                <ul tabindex="0"
                                    class="dropdown-content z-50 menu p-2 shadow bg-base-100 rounded-box w-32">
                                    <li>
                                        <button class="btn btn-ghost w-full hover:animate-pulse"
                                            onclick="window['my_modal_detail_{{ $foto->id_foto }}'].showModal()">
                                            <i class="fas fa-circle-info"></i>
                                            Detail
                                        </button>
                                    </li>
                                    <li>
                                        <button class="btn btn-ghost w-full hover:animate-pulse"
                                            onclick="window['my_modal_delete_{{ $foto->id_foto }}'].showModal()">
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
                        <th>No</th>
                        <th>Nama Album</th>
                        <th>Tautan Foto</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<dialog id="my_modal_add" class="modal" onclick="if (event.target === this) this.close()">
    <div class="modal-box w-11/12 max-w-5xl">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-3">
                <i class="fas fa-times text-2xl"></i>
            </button>
        </form>
        <h3 class="font-bold text-lg">Tambahkan foto</h3>
        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-primary"></div>
            <div class="divider"></div>
        </div>
        <form action="{{ route('admin.foto.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <span class="label-text -mb-4">Pilih Album :</span>
            <select name="id_album"
                class="select border-b-2 border-blue-400 w-full gap-2 mb-5 focus-within:outline-none px-10" required>
                <option disabled selected>Nama Album || Tipe Album</option>
                @foreach($albums as $album)
                @if($album->tipe_album === 'Foto')
                <option value="{{ $album->id_album }}">{{ $album->nama_album }} || [ {{ $album->tipe_album }} ]</option>
                @endif
                @endforeach
            </select>
            <span class="label-text -mb-4">Tautan Foto :</span>
            <div id="imageInputsContainer">
                <div class="w-full">
                    <div class="flex gap-1">
                        <label
                            class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                            <input type="file" name="tautan_foto[]" class="grow file-input file-input-success border-none bg-transparent py-2 file:mr-4 file:px-4 file:rounded-full file:border-0
                    file:text-sm file:font-semibold file:bg-blue-500 file:text-white
                    hover:file:bg-transparent hover:file:text-blue-400" accept="image/*" required />
                        </label>
                        <!-- Button for removing input -->
                        <button class="btn btn-square btn-outline btn-error btn-remove hidden"
                            onclick="removeInput(this)">
                            <i class='fas fa-times'></i>
                        </button>
                    </div>
                </div>
            </div>

            <button type="button"
                class="btn bg-blue-400 w-full h-10 rounded-sm border-none text-white mt-auto hover:text-blue-400"
                onclick="duplicateInput()">
                <i class="fas fa-plus"></i>
                Tambah Foto
            </button>

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

@foreach($fotos as $foto)
<dialog id="my_modal_detail_{{ $foto->id_foto }}" class="modal" onclick="if (event.target === this) this.close()">
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
            <img class="object-cover object-center w-96 h-44 max-w-full rounded-lg mx-auto mb-5"
                src="{{ asset('storage/' . $foto->tautan_foto) }}" alt="gallery foto" />
            <span class="label-text -mb-4">Tautan Foto :</span>
            <label
                class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" name="nama_album" class="grow bg-transparent py-2" placeholder="Nama Album"
                    value="{{ $foto->tautan_foto }}" readonly />
            </label>
        </div>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>

<dialog id="my_modal_delete_{{ $foto->id_foto }}" class="modal" onclick="if (event.target === this) this.close()">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-3">
                <i class="fas fa-times text-2xl"></i>
            </button>
        </form>
        <h3 class="font-bold text-lg">Hapus Data Foto</h3>

        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-error"></div>
            <div class="divider"></div>
        </div>
        <form action="{{ route('admin.foto.destroy', $foto->id_foto) }}" method="post">
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
    @if($fotos->previousPageUrl())
    <a href="{{ $fotos->previousPageUrl() }}" class="join-item btn">«</a>
    @else
    <button class="join-item btn disabled">«</button>
    @endif

    <button class="join-item btn">Page {{ $fotos->currentPage() }}</button>

    @if($fotos->nextPageUrl())
    <a href="{{ $fotos->nextPageUrl() }}" class="join-item btn">»</a>
    @else
    <button class="join-item btn disabled">»</button>
    @endif
</div>

@endsection