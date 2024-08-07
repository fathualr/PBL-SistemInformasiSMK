@extends('layouts.mainAdmin')

@section('main-content')

@include('shared.success-message')
@include('shared.error-message')

<div>
    <h2 class="text-black font-bold text-xl mx-5 my-2">Galeri Album</h2>
</div>

<div class="flex justify-between items-center mx-5">
    <div class="flex items-center">
        <button class="btn btn-outline hover:animate-pulse" onclick="my_modal_add.showModal()">
            <i class="fas fa-plus"></i>
            Tambah Album
        </button>
    </div>
    <div class="flex items-center">
        <div class="relative hidden md:flex mr-2">
            <select onchange="window.location.href=this.value" class="select border-b-2 border-base-300">
                <option value="{{ route('admin.album.index', ['perPage' => 10]) }}"
                    {{ request()->get('perPage') == 10 ? 'selected' : '' }}>10</option>
                <option value="{{ route('admin.album.index', ['perPage' => 25]) }}"
                    {{ request()->get('perPage') == 25 ? 'selected' : '' }}>25</option>
                <option value="{{ route('admin.album.index', ['perPage' => 50]) }}"
                    {{ request()->get('perPage') == 50 ? 'selected' : '' }}>50</option>
                <option value="{{ route('admin.album.index', ['perPage' => 75]) }}"
                    {{ request()->get('perPage') == 75 ? 'selected' : '' }}>75</option>
                <option value="{{ route('admin.album.index', ['perPage' => 100]) }}"
                    {{ request()->get('perPage') == 100 ? 'selected' : '' }}>100</option>
            </select>
        </div>
        <form action="{{ route('admin.album.index') }}" method="GET">
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
                        <td>Nama Album</td>
                        <td class="p-2 hidden md:table-cell">Tipe Album</td>
                        <td class="p-2 hidden md:table-cell">Deskripsi</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($albums->chunk(10) as $chunk)
                    @foreach($chunk as $key => $album)
                    <tr class="hover">
                        <td>{{ ($albums->currentPage() - 1) * $albums->perPage() + $key + 1 }}</td>
                        <td>{{ $album->nama_album }}</td>
                        <td class="p-2 hidden md:table-cell">{{ $album->tipe_album }}</td>
                        <td class="p-2 hidden md:table-cell w-96">
                            <p class="truncate w-96">{{ $album->deskripsi_album }}</p>
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
                                            onclick="window['my_modal_edit_{{ $album->id_album }}'].showModal()">
                                            <i class="fas fa-pen-to-square"></i>
                                            Edit
                                        </button>
                                    </li>
                                    <li>
                                        <button class="btn btn-ghost w-full hover:animate-pulse"
                                            onclick="window['my_modal_detail_{{ $album->id_album }}'].showModal()">
                                            <i class="fas fa-circle-info"></i>
                                            Detail
                                        </button>
                                    </li>
                                    <li>
                                        <button class="btn btn-ghost w-full hover:animate-pulse"
                                            onclick="window['my_modal_delete_{{ $album->id_album }}'].showModal()">
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
                        <td>Nama Album</td>
                        <td class="p-2 hidden md:table-cell">Tipe Album</td>
                        <td class="p-2 hidden md:table-cell">Deskripsi</td>
                        <td>Aksi</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<dialog id="my_modal_add" class="modal" onclick="if (event.target === this) this.close()">
    <div class="modal-box w-11/12 max-w-5xl py-0">
        <div class="sticky top-0 bg-white pt-5">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-0 top-3">
                    <i class="fas fa-times text-2xl"></i>
                </button>
            </form>
            <h3 class="font-bold text-lg">Tambah Album</h3>

            <div class="grid grid-cols-3 w-52 -mt-5">
                <div class="divider"></div>
                <div class="divider divider-primary"></div>
                <div class="divider"></div>
            </div>
        </div>

        <form action="{{ route('admin.album.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <span class="label-text -mb-4">Nama Album :</span>
            <label
                class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" name="nama_album" class="grow bg-transparent py-2" placeholder="Nama Album" />
            </label>
            <span class="label-text -mb-4">Tipe Album :</span>
            <select name="tipe_album"
                class="select border-b-2 border-blue-400 w-full gap-2 mb-5 focus-within:outline-none px-10">
                <option disabled selected>
                    Tipe Album
                </option>
                <option value="Foto">Foto</option>
                <option value="Video">Video</option>
            </select>
            <span class="label-text -mb-4">Thumbnail Album :</span>
            <label
                class="input bg-transparent border-2 border-blue-400 flex items-center mb-5 w-full focus-within:outline-none">
                <input type="file" name="gambar_album" class="grow file-input file-input-success border-none bg-transparent py-2 file:mr-4 file:px-4 file:rounded-full file:border-0
                    file:text-sm file:font-semibold file:bg-blue-500 file:text-white
                    hover:file:bg-transparent hover:file:text-blue-400" accept="image/*" />
            </label>
            <span class="label-text -mb-4">Deskripsi Album :</span>
            <textarea class="textarea textarea-bordered border-2 border-blue-400 w-full mb-5"
                placeholder="Deskripsi Album" name="deskripsi_album"></textarea>
            <span class="label-text -mb-6">Tanggal Unggah Album :</span>
            <label
                class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="date" name="tanggal_unggah" class="grow bg-transparent py-2"
                    placeholder="Tanggal Unggah" />
            </label>

            <div class="flex justify-end items-end my-10 gap-4">
                <button type="reset"
                    class="btn bg-error w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-error">
                    <i class="fas fa-times"></i>
                    Reset
                </button>

                <button type="submit"
                    class="btn bg-elm w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
                    <i class="fas fa-plus"></i>
                    Tambah
                </button>
            </div>
        </form>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>

@foreach($albums as $key => $album)
<dialog id="my_modal_edit_{{ $album->id_album }}" class="modal" onclick="if (event.target === this) this.close()">
    <div class="modal-box w-11/12 max-w-5xl py-0">
        <div class="sticky top-0 bg-white pt-5">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-0 top-3">
                    <i class="fas fa-times text-2xl"></i>
                </button>
            </form>
            <h3 class="font-bold text-lg">Edit Data Album</h3>

            <div class="grid grid-cols-3 w-52 -mt-5">
                <div class="divider"></div>
                <div class="divider divider-primary"></div>
                <div class="divider"></div>
            </div>
        </div>

        <form action="{{ route('admin.album.update', ['id' => $album->id_album]) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <span class="label-text -mb-4">Nama Album :</span>
            <label
                class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" name="nama_album" class="grow bg-transparent py-2" placeholder="Nama Album"
                    value="{{ $album->nama_album }}" />
            </label>
            <span class="label-text -mb-4">Tipe Album :</span>
            <select name="tipe_album"
                class="select border-b-2 border-blue-400 w-full gap-2 mb-5 focus-within:outline-none px-10">
                <option disabled>Tipe Album</option>
                <option value="Foto" {{ $album->tipe_album === 'Foto' ? 'selected' : '' }}>Foto</option>
                <option value="Video" {{ $album->tipe_album === 'Video' ? 'selected' : '' }}>Video</option>
            </select>
            <span class="label-text -mb-4">Thumbnail Album :</span>
            <label
                class="input bg-transparent border-2 border-blue-400 flex items-center mb-5 w-full focus-within:outline-none">
                <input type="file" name="gambar_album" class="grow file-input file-input-success border-none bg-transparent py-2 file:mr-4 file:px-4 file:rounded-full file:border-0
                    file:text-sm file:font-semibold file:bg-blue-500 file:text-white
                    hover:file:bg-transparent hover:file:text-blue-400" accept="image/*" />
            </label>
            <span class="label-text -mb-4">Deskripsi Album :</span>
            <textarea class="textarea textarea-bordered border-2 border-blue-400 w-full mb-5"
                placeholder="Deskripsi Album" name="deskripsi_album">{{ $album->deskripsi_album }}</textarea>
            <span class="label-text -mb-4">Tanggal Unggah Album :</span>
            <label
                class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="date" name="tanggal_unggah" class="grow bg-transparent py-2" placeholder="Tanggal Unggah"
                    value="{{ $album->tanggal_unggah }}" />
            </label>

            <div class="flex justify-end items-end my-10 gap-4">
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
@endforeach

@foreach($albums as $key => $album)
<dialog id="my_modal_detail_{{ $album->id_album }}" class="modal" onclick="if (event.target === this) this.close()">
    <div class="modal-box w-11/12 max-w-5xl py-0">
        <div class="sticky top-0 bg-white pt-5">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-0 top-3">
                    <i class="fas fa-times text-2xl"></i>
                </button>
            </form>
            <h3 class="font-bold text-lg">Detail Album</h3>

            <div class="grid grid-cols-3 w-52 -mt-5">
                <div class="divider"></div>
                <div class="divider divider-primary"></div>
                <div class="divider"></div>
            </div>
        </div>

        <form action="">
            <span class="label-text -mb-4">Nama Album :</span>
            <label
                class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" name="nama_album" class="grow bg-transparent py-2" placeholder="Nama Album"
                    value="{{ $album->nama_album }}" readonly />
            </label>
            <span class="label-text -mb-4">Tipe Album :</span>
            <label
                class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                @if($album->tipe_album === 'Foto')
                <input type="text" name="tipe_album" class="grow bg-transparent py-2" placeholder="Tipe Album Foto"
                    value="{{ $album->tipe_album }}" readonly />
                @elseif($album->tipe_album === 'Video')
                <input type="text" name="tipe_album" class="grow bg-transparent py-2" placeholder="Tipe Album Video"
                    value="{{ $album->tipe_album }}" readonly />
                @endif
            </label>
            <span class="label-text -mb-4">Tautan Thumbnail Album :</span>
            <label
                class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" name="nama_album" class="grow bg-transparent py-2" placeholder="Nama Album"
                    value="{{ $album->gambar_album }}" readonly />
            </label>
            <span class="label-text -mb-4">Deskripsi Album :</span>
            <label
                class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" name="deskripsi_album" class="grow bg-transparent py-2" placeholder="Deskripsi Album"
                    value="{{ $album->deskripsi_album }}" readonly />
            </label>
            <span class="label-text -mb-4">Tanggal Unggah Album :</span>
            <label
                class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="date" name="tanggal_unggah" class="grow bg-transparent py-2" placeholder="Tanggal Unggah"
                    value="{{ $album->tanggal_unggah }}" readonly />
            </label>
        </form>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>
@endforeach

@foreach($albums as $key => $album)
<dialog id="my_modal_delete_{{ $album->id_album }}" class="modal" onclick="if (event.target === this) this.close()">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-3">
                <i class="fas fa-times text-2xl"></i>
            </button>
        </form>
        <h3 class="font-bold text-lg">Hapus Data Album</h3>

        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-error"></div>
            <div class="divider"></div>
        </div>
        <form action="{{ route('admin.album.destroy', $album->id_album) }}" method="post">
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

<!-- Pagination -->
<div class="join flex justify-center my-5">
    @if($albums->previousPageUrl())
    <a href="{{ $albums->previousPageUrl() }}" class="join-item btn">«</a>
    @else
    <button class="join-item btn disabled">«</button>
    @endif

    <button class="join-item btn">Page {{ $albums->currentPage() }}</button>

    @if($albums->nextPageUrl())
    <a href="{{ $albums->nextPageUrl() }}" class="join-item btn">»</a>
    @else
    <button class="join-item btn disabled">»</button>
    @endif
</div>
@endsection