@extends('layouts.mainAdmin')

@section('main-content')
<div>
    <h2 class="text-black font-bold ml-2 mt-2 mb-2 jus">Galeri video</h2>
</div>

<button class="btn mb-8 mt-4 ml-20" onclick="my_modal_add.showModal()">Tambahkan video</button>

<div class="overflow-x-auto">
    <table class="table table-xs table-pin-rows table-pin-cols">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Album</th>
                <th>Tautan video</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($videos->chunk(10) as $chunk)
            @foreach($chunk as $key => $video)
            <tr>
                <td>{{ ($videos->currentPage() - 1) * $videos->perPage() + $key + 1 }}</td>
                <td>{{ $video->album->nama_album }}</td>
                <td>{{ $video->tautan_video }}</td>
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
                                <button class="btn btn-ghost w-full hover:animate-pulse" onclick="window['my_modal_edit_{{ $video->id_video }}'].showModal()">
                                    <i class="fas fa-pen-to-square"></i>
                                    Edit
                                </button>
                            </li>
                            <li>
                                <button class="btn btn-ghost w-full hover:animate-pulse" onclick="window['my_modal_detail_{{ $video->id_video }}'].showModal()">
                                    <i class="fas fa-circle-info"></i>
                                    Detail
                                </button>
                            </li>
                            <li>
                                <button class="btn btn-ghost w-full hover:animate-pulse" onclick="window['my_modal_delete_{{ $video->id_video }}'].showModal()">
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
            <h3 class="font-bold text-lg">Tambahkan video</h3>
            <div class="grid grid-cols-3 w-52 -mt-5">
                <div class="divider"></div>
                <div class="divider divider-success"></div>
                <div class="divider"></div>
            </div>
            <form action="{{ route('admin.video.store') }}" method="POST">
                @csrf

                <select name="id_album" class="select border-b-2 border-elm w-full gap-2 mb-5 focus-within:outline-none px-10">
                    <option disabled>Nama Album || Tipe Album</option>
                    @foreach($albums as $album)
                    @if($album->tipe_album === 'Video')
                    <option value="{{ $album->id_album }}">{{ $album->nama_album }} || [ {{ $album->tipe_album }} ]</option>
                    @endif
                    @endforeach
                </select>

                <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                    <input type="text" name="tautan_video" class="grow file-input file-input-success border-none bg-transparent py-2" placeholder="Copy & Paste Link Di Sini" />
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


    @foreach($videos as $video)
    <dialog id="my_modal_edit_{{ $video->id_video }}" class="modal" onclick="if (event.target === this) this.close()">
        <div class="modal-box">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <h3 class="font-bold text-lg">Edit video</h3>
            <div class="grid grid-cols-3 w-52 -mt-5">
                <div class="divider"></div>
                <div class="divider divider-success"></div>
                <div class="divider"></div>
            </div>
            <form action="{{ route('admin.video.update', $video->id_video) }}" method="POST">
                @csrf
                @method('PATCH')

                <select name="id_album" class="select border-b-2 border-elm w-full gap-2 mb-5 focus-within:outline-none px-10">
                    <option disabled>Nama Album || Tipe Album</option>
                    @foreach($albums as $album)
                    @if($album->tipe_album === 'Video')
                    <option value="{{ $album->id_album }}">{{ $album->nama_album }} || [ {{ $album->tipe_album }} ]</option>
                    @endif
                    @endforeach
                </select>

                <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                    <input type="text" name="tautan_video" class="grow file-input file-input-success border-none bg-transparent py-2" placeholder="Copy & Paste Link Di Sini" value="{{ $video->tautan_video }}" />
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
    @endforeach


    @foreach($videos as $video)
    <dialog id="my_modal_detail_{{ $video->id_video }}" class="modal" onclick="if (event.target === this) this.close()">
        <div class="modal-box flex justify-center items-center">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <div>
                <h3 class="font-bold text-lg">Detail video</h3>
                <div class="grid grid-cols-3 w-52 -mt-5">
                    <div class="divider"></div>
                    <div class="divider divider-success"></div>
                    <div class="divider"></div>
                </div>
                <div class="w-96 h-52">
                    <iframe class="w-96 h-52" src="{{ $video->embed_link }}" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </dialog>
    @endforeach


    @foreach($videos as $video)
    <dialog id="my_modal_delete_{{ $video->id_video }}" class="modal" onclick="if (event.target === this) this.close()">
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
            <form action="{{ route('admin.video.destroy', $video->id_video) }}" method="post">
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
        @if($videos->previousPageUrl())
        <a href="{{ $videos->previousPageUrl() }}" class="join-item btn">«</a>
        @else
        <button class="join-item btn disabled">«</button>
        @endif

        <button class="join-item btn">Page {{ $videos->currentPage() }}</button>

        @if($videos->nextPageUrl())
        <a href="{{ $videos->nextPageUrl() }}" class="join-item btn">»</a>
        @else
        <button class="join-item btn disabled">»</button>
        @endif
    </div>

    @endsection