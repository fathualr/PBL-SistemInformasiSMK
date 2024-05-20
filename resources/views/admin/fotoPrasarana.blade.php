@extends('layouts.mainAdmin')

@section('main-content')
<div>
    <h2 class="text-black font-bold ml-2 mt-2 mb-2 jus">Galeri Foto Prasarana</h2>
</div>

<button class="btn mb-8 mt-4 ml-20" onclick="my_modal_add.showModal()">Tambahkan foto</button>

<div class="overflow-x-auto">
    <table class="table table-xs table-pin-rows table-pin-cols">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Prasarana</th>
                <th>Tautan Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($foto_prasaranas->chunk(10) as $chunk)
            @foreach($chunk as $key => $foto_prasarana)
            <tr>
                <td>{{ ($foto_prasaranas->currentPage() - 1) * $foto_prasaranas->perPage() + $key + 1 }}</td>
                <td>{{ $foto_prasarana->prasarana->nama_prasarana }}</td>
                <td>{{ $foto_prasarana->tautan_foto }}</td>
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
                                <button class="btn btn-ghost w-full hover:animate-pulse" onclick="window['my_modal_edit_{{ $foto_prasarana->id_foto_prasarana }}'].showModal()">
                                    <i class="fas fa-pen-to-square"></i>
                                    Edit
                                </button>
                            </li>
                            <li>
                                <button class="btn btn-ghost w-full hover:animate-pulse" onclick="window['my_modal_detail_{{ $foto_prasarana->id_foto_prasarana }}'].showModal()">
                                    <i class="fas fa-circle-info"></i>
                                    Detail
                                </button>
                            </li>
                            <li>
                                <button class="btn btn-ghost w-full hover:animate-pulse" onclick="window['my_modal_delete_{{ $foto_prasarana->id_foto_prasarana }}'].showModal()">
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
            <form action="{{ route('admin.FotoPrasarana.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <select name="id_prasarana" class="select border-b-2 border-elm w-full gap-2 mb-5 focus-within:outline-none px-10">
                    <option disabled>Nama prasarana || Tipe prasarana</option>
                    @foreach($prasaranas as $prasarana)
                    @if($prasarana->nama_prasarana)
                    <option value="{{ $prasarana->id_prasarana }}">{{ $prasarana->nama_prasarana }} || [ {{ $prasarana->jenis_prasarana }} ]</option>
                    @endif
                    @endforeach
                </select>

                <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                    <input type="file" name="tautan_foto" class="grow file-input file-input-success border-none bg-transparent py-2" accept="image/*" placeholder="Logo" />
                </label>

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

    @foreach($foto_prasaranas as $foto_prasarana)
    <dialog id="my_modal_edit_{{ $foto_prasarana->id_foto_prasarana }}" class="modal" onclick="if (event.target === this) this.close()">
        <div class="modal-box">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <h3 class="font-bold text-lg">Edit Foto</h3>
            <div class="grid grid-cols-3 w-52 -mt-5">
                <div class="divider"></div>
                <div class="divider divider-success"></div>
                <div class="divider"></div>
            </div>
            <form action="{{ route('admin.FotoPrasarana.update', $foto_prasarana->id_foto_prasarana) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <select name="id_prasarana" class="select border-b-2 border-elm w-full gap-2 mb-5 focus-within:outline-none px-10">
                    <option disabled>Nama prasarana || Tipe prasarana</option>
                    @foreach($prasaranas as $prasarana)
                    @if($prasarana->nama_prasarana )
                    <option value="{{ $prasarana->id_prasarana }}">{{ $prasarana->nama_prasarana }} || [ {{ $prasarana->jenis_prasarana }} ]</option>
                    @endif
                    @endforeach
                </select>

                <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                    <input type="file" name="tautan_foto" class="grow file-input file-input-success border-none bg-transparent py-2" accept="image/*" placeholder="Logo" />
                </label>

                <div class="flex justify-end items-end mt-20 gap-4">
                    <button type="submit" class="btn bg-elm w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
                        <i class="fas fa-pen-to-square"></i>
                        Edit
                    </button>
                </div>
            </form>
        </div>
    </dialog>

    <dialog id="my_modal_detail_{{ $foto_prasarana->id_foto_prasarana }}" class="modal" onclick="if (event.target === this) this.close()">
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
                <img class="object-cover object-center w-96 h-44 max-w-full rounded-lg mx-auto" src="{{ asset('storage/' . $foto_prasarana->tautan_foto) }}" alt="gallery foto" />
            </div>
        </div>
    </dialog>

    <dialog id="my_modal_delete_{{ $foto_prasarana->id_foto_prasarana }}" class="modal" onclick="if (event.target === this) this.close()">
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
            <form action="{{ route('admin.FotoPrasarana.destroy', $foto_prasarana->id_foto_prasarana) }}" method="post">
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