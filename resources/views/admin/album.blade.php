@extends('layouts.mainAdmin')

@section('main-content')

<div>
    <h2 class="text-black font-bold ml-2 mt-2 mb-2 jus">Galeri Album</h2>
</div>

<button class="btn mb-8 mt-4 ml-20" onclick="my_modal_add.showModal()">Tambahkan Album</button>

<div class="">
    <table class="table table-xs table-pin-rows table-pin-cols">
        <thead>
            <tr>
                <th class="w-8">No</th>
                <td class="w-8">Nama Album</td>
                <td class="w-8">Tipe Album</td>
                <td class="w-8">Gambar Album</td>
                <td class="w-44">Deskripsi</td>
                <td class="w-8">Tanggal unggah</td>
                <td class="w-8">Aksi</td>
            </tr>
        </thead>
        <tbody>
            @foreach($albums->chunk(10) as $chunk)
            @foreach($chunk as $key => $album)
            <tr>
                <td>{{ ($albums->currentPage() - 1) * $albums->perPage() + $key + 1 }}</td>
                <td>{{ $album->nama_album }}</td>
                <td>{{ $album->tipe_album }}</td>
                <td>{{ $album->gambar_album }}</td>
                <td class="w-44">
                    <p class="truncate w-[30rem]">{{ $album->deskripsi_album }}</p>
                </td>
                <td>{{ $album->tanggal_unggah }}</td>
                <td>
                    <details class="dropdown dropdown-right">
                        <summary tabindex="0" role="button" class="btn btn-ghost button w-20">
                            <i class="fas fa-circle text-[0.5rem] circle-1 transition-all duration-500"></i>
                            <i class="fas fa-circle text-[0.5rem] circle-2 transition-all duration-500"></i>
                            <i class="fas fa-circle text-[0.5rem] circle-3 transition-all duration-500"></i>
                            <i class="fas fa-times font-bold text-xl hidden transition-all duration-500"></i>
                        </summary>
                        <ul tabindex="0" class="dropdown-content z-50 menu p-2 shadow bg-base-100 rounded-box w-32">
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
    </table>
</div>

<dialog id="my_modal_add" class="modal" onclick="if (event.target === this) this.close()">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Tambah Album</h3>

        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-success"></div>
            <div class="divider"></div>
        </div>

        <form action="{{ route('admin.album.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <label
                class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" name="nama_album" class="grow bg-transparent py-2" placeholder="Nama Album" />
            </label>

            <select name="tipe_album"
                class="select border-b-2 border-elm w-full gap-2 mb-5 focus-within:outline-none px-10">
                <option disabled selected>
                    Tipe Album
                </option>
                <option value="Foto">Foto</option>
                <option value="Video">Video</option>
            </select>

            <label
                class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="file" name="gambar_album" class="grow bg-transparent py-2" accept="image/*" />
            </label>

            <label
                class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" name="deskripsi_album" class="grow bg-transparent py-2"
                    placeholder="Deskripsi Album" />
            </label>

            <label
                class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="date" name="tanggal_unggah" class="grow bg-transparent py-2"
                    placeholder="Tanggal Unggah" />
            </label>

            <div class="flex justify-end items-end mt-20 gap-4">
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
</dialog>

@foreach($albums as $key => $album)
<dialog id="my_modal_edit_{{ $album->id_album }}" class="modal" onclick="if (event.target === this) this.close()">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Edit Data Album</h3>

        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-success"></div>
            <div class="divider"></div>
        </div>
        <form action="{{ route('admin.album.update', ['id' => $album->id_album]) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <label
                class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" name="nama_album" class="grow bg-transparent py-2" placeholder="Nama Album"
                    value="{{ $album->nama_album }}" />
            </label>

            <select name="tipe_album"
                class="select border-b-2 border-elm w-full gap-2 mb-5 focus-within:outline-none px-10">
                <option disabled>Tipe Album</option>
                <option value="Foto" {{ $album->tipe_album === 'Foto' ? 'selected' : '' }}>Foto</option>
                <option value="Video" {{ $album->tipe_album === 'Video' ? 'selected' : '' }}>Video</option>
            </select>

            <label
                class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="file" name="gambar_album" class="grow bg-transparent py-2" accept="image/*" />
            </label>

            <label
                class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" name="deskripsi_album" class="grow bg-transparent py-2" placeholder="Deskripsi Album"
                    value="{{ $album->deskripsi_album }}" />
            </label>

            <label
                class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="date" name="tanggal_unggah" class="grow bg-transparent py-2" placeholder="Tanggal Unggah"
                    value="{{ $album->tanggal_unggah }}" />
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
</dialog>
@endforeach

@foreach($albums as $key => $album)
<dialog id="my_modal_detail_{{ $album->id_album }}" class="modal" onclick="if (event.target === this) this.close()">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Detail Album</h3>

        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-success"></div>
            <div class="divider"></div>
        </div>

        <form action="">
            <label
                class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" name="nama_album" class="grow bg-transparent py-2" placeholder="Nama Album"
                    value="{{ $album->nama_album }}" disabled />
            </label>

            <label
                class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                @if($album->tipe_album === 'Foto')
                <input type="text" name="tipe_album" class="grow bg-transparent py-2" placeholder="Tipe Album Foto"
                    value="{{ $album->tipe_album }}" disabled />
                @elseif($album->tipe_album === 'Video')
                <input type="text" name="tipe_album" class="grow bg-transparent py-2" placeholder="Tipe Album Video"
                    value="{{ $album->tipe_album }}" disabled />
                @endif
            </label>

            <label
                class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" name="deskripsi_album" class="grow bg-transparent py-2" placeholder="Deskripsi Album"
                    value="{{ $album->deskripsi_album }}" disabled />
            </label>

            <label
                class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="date" name="tanggal_unggah" class="grow bg-transparent py-2" placeholder="Tanggal Unggah"
                    value="{{ $album->tanggal_unggah }}" disabled />
            </label>
        </form>
    </div>
</dialog>
@endforeach

@foreach($albums as $key => $album)
<dialog id="my_modal_delete_{{ $album->id_album }}" class="modal" onclick="if (event.target === this) this.close()">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Hapus Data Administrator</h3>

        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-success"></div>
            <div class="divider"></div>
        </div>
        <form action="{{ route('admin.album.destroy', $album->id_album) }}" method="post">
            @csrf
            @method('DELETE')
            Apakah Anda Yakin Ingin Menghapus Data Ini ?

            <div class="flex justify-end items-end mt-20 gap-4">
                <button type="submit"
                    class="btn bg-error w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-error">
                    <i class="fas fa-trash"></i>
                    Hapus
                </button>
            </div>
        </form>
    </div>
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