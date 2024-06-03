@extends('layouts.mainAdmin')

@section('main-content')
<div>
    <h2 class="text-black font-bold text-xl ml-2 mt-2 mb-2">Galeri Foto</h2>
</div>

<div class="flex flex-col md:flex-row justify-between items-center">
    <div class="w-full md:w-auto mb-2 md:mb-0">
        <button class="btn btn-outline w-full md:w-auto hover:animate-pulse" onclick="my_modal_add.showModal()">Tambahkan foto</button>
    </div>
</div>

<div class="grid grid-cols-9 shadow-xl rounded-md mt-5 overflow-x-auto">
    <div class="col-span-9 row-start-2">
        <table class="table table-xs table-pin-rows table-pin-cols w-full">
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
                <tr>
                    <td>{{ ($fotos->currentPage() - 1) * $fotos->perPage() + $key + 1 }}</td>
                    <td>{{ $foto->album->nama_album }}</td>
                    <td>{{ $foto->tautan_foto }}</td>
                    <td>
                        <details class="dropdown">
                            <summary tabindex="0" role="button" class="btn btn-ghost button w-20">
                                <i class="fas fa-circle text-[0.5rem] circle-1 transition-all duration-500"></i>
                                <i class="fas fa-circle text-[0.5rem] circle-2 transition-all duration-500"></i>
                                <i class="fas fa-circle text-[0.5rem] circle-3 transition-all duration-500"></i>
                                <i class="fas fa-times font-bold text-xl hidden transition-all duration-500"></i>
                            </summary>
                            <ul tabindex="0" class="dropdown-content z-50 menu p-2 shadow bg-base-100 rounded-box w-32">
                                <li>
                                    <button class="btn btn-ghost w-full hover:animate-pulse" onclick="window['my_modal_detail_{{ $foto->id_foto }}'].showModal()">
                                        <i class="fas fa-circle-info"></i>
                                        Detail
                                    </button>
                                </li>
                                <li>
                                    <button class="btn btn-ghost w-full hover:animate-pulse" onclick="window['my_modal_delete_{{ $foto->id_foto }}'].showModal()">
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

<dialog id="my_modal_add" class="modal" onclick="if (event.target === this) this.close()">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Tambahkan foto</h3>
        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-success"></div>
            <div class="divider"></div>
        </div>
        <h4 class="font-bold text-sm mb-1">Pilih Album</h4>
        <form action="{{ route('admin.foto.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <select name="id_album" class="select border-b-2 border-elm w-full gap-2 mb-5 focus-within:outline-none px-10" required>
                <option disabled selected>Nama Album || Tipe Album</option>
                @foreach($albums as $album)
                @if($album->tipe_album === 'Foto')
                <option value="{{ $album->id_album }}">{{ $album->nama_album }} || [ {{ $album->tipe_album }} ]</option>
                @endif
                @endforeach
            </select>

            <div id="imageInputsContainer">
                <div class="w-full">
                    <div class="flex gap-1">
                        <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                            <input type="file" name="tautan_foto[]" class="grow file-input file-input-success border-none bg-transparent py-2" accept="image/*" required />
                        </label>
                        <!-- Button for removing input -->
                        <button class="btn btn-square btn-outline btn-success btn-remove hidden" onclick="removeInput(this)">
                            <i class='fas fa-times'></i>
                        </button>
                    </div>
                </div>
            </div>

            <button type="button" class="btn bg-elm w-full h-10 rounded-sm border-none text-white mt-auto hover:text-elm" onclick="duplicateInput()">
                <i class="fas fa-plus"></i>
                Tambah Foto
            </button>

            <div class="flex justify-end items-end mt-20 gap-4">
                <button type="reset" class="btn bg-error w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-error">
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

@foreach($fotos as $foto)
<dialog id="my_modal_detail_{{ $foto->id_foto }}" class="modal" onclick="if (event.target === this) this.close()">
    <div class="modal-box flex justify-center items-center">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <div>
            <h3 class="font-bold text-lg">Detail Foto</h3>
            <div class="grid grid-cols-3 w-52 -mt-5">
                <div class="divider"></div>
                <div class="divider divider-success"></div>
                <div class="divider"></div>
            </div>
            <img class="object-cover object-center w-96 h-44 max-w-full rounded-lg mx-auto" src="{{ asset('/' . $foto->tautan_foto) }}" alt="gallery foto" />
        </div>
    </div>
</dialog>

<dialog id="my_modal_delete_{{ $foto->id_foto }}" class="modal" onclick="if (event.target === this) this.close()">
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
        <form action="{{ route('admin.foto.destroy', $foto->id_foto) }}" method="post">
            @csrf
            @method('DELETE')
            Apakah Anda Yakin Ingin Menghapus Data Ini ?

            <div class="flex justify-end items-end mt-20 gap-4">
                <button type="submit" class="btn bg-error w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-error">
                    <i class="fas fa-trash"></i>
                    Hapus
                </button>
            </div>
        </form>
    </div>
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