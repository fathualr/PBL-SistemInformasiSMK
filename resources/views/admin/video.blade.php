@extends('layouts.mainAdmin')

@section('main-content')

@include('shared.success-message')
@include('shared.error-message')

<div>
    <h2 class="text-black font-bold text-xl mx-5 my-2">Galeri video</h2>
</div>

<div class="flex justify-between items-center mx-5">
    <div class="flex items-center">
        <button class="btn btn-outline hover:animate-pulse" onclick="my_modal_add.showModal()">
            <i class="fas fa-plus"></i>
            Tambah Video
        </button>
    </div>
    <div class="flex items-center">
        <div class="relative hidden md:flex mr-2">
            <select onchange="window.location.href=this.value" class="select border-b-2 border-base-300">
                <option value="{{ route('admin.video.index', ['perPage' => 10]) }}" {{ request()->get('perPage') == 10 ? 'selected' : '' }}>10</option>
                <option value="{{ route('admin.video.index', ['perPage' => 25]) }}" {{ request()->get('perPage') == 25 ? 'selected' : '' }}>25</option>
                <option value="{{ route('admin.video.index', ['perPage' => 50]) }}" {{ request()->get('perPage') == 50 ? 'selected' : '' }}>50</option>
                <option value="{{ route('admin.video.index', ['perPage' => 75]) }}" {{ request()->get('perPage') == 75 ? 'selected' : '' }}>75</option>
                <option value="{{ route('admin.video.index', ['perPage' => 100]) }}" {{ request()->get('perPage') == 100 ? 'selected' : '' }}>100</option>
            </select>
        </div>
        <form action="{{ route('admin.video.index') }}" method="GET">
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
                    <th>Tautan video</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($videos->chunk(10) as $chunk)
                @foreach($chunk as $key => $video)
                <tr class="hover">
                    <td>{{ ($videos->currentPage() - 1) * $videos->perPage() + $key + 1 }}</td>
                    <td>{{ $video->album->nama_album }}</td>
                    <td>{{ $video->tautan_video }}</td>
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
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Nama Album</th>
                    <th>Tautan video</th>
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
        <h3 class="font-bold text-lg">Tambahkan video</h3>
        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-primary"></div>
            <div class="divider"></div>
        </div>
        <form action="{{ route('admin.video.store') }}" method="POST">
            @csrf
            <span class="label-text -mb-4">Pilih Album :</span>
            <select name="id_album" class="select border-b-2 border-blue-400 w-full gap-2 mb-5 focus-within:outline-none px-10">
                <option disabled>Nama Album || Tipe Album</option>
                @foreach($albums as $album)
                @if($album->tipe_album === 'Video')
                <option value="{{ $album->id_album }}">{{ $album->nama_album }} || [ {{ $album->tipe_album }} ]</option>
                @endif
                @endforeach
            </select>
            <span class="label-text -mb-4">Tautan Video :</span>
            <label class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
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
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>


@foreach($videos as $video)
<dialog id="my_modal_detail_{{ $video->id_video }}" class="modal" onclick="if (event.target === this) this.close()">
    <div class="modal-box w-11/12 max-w-5xl">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-3">
                <i class="fas fa-times text-2xl"></i>
            </button>
        </form>
        <div>
            <h3 class="font-bold text-lg">Detail video</h3>
            <div class="grid grid-cols-3 w-52 -mt-5">
                <div class="divider"></div>
                <div class="divider divider-primary"></div>
                <div class="divider"></div>
            </div>
            <div class="w-96 h-52 mx-auto">
                <iframe class="w-full h-full rounded-md" src="{{ $video->embed_link }}" allowfullscreen></iframe>
            </div>

            <span class="label-text -mb-4">Tautan Foto :</span>
            <label class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" name="nama_album" class="grow bg-transparent py-2" placeholder="Nama Album" value="{{ $video->embed_link }}" readonly />
            </label>
        </div>
    </div>
</dialog>

<dialog id="my_modal_delete_{{ $video->id_video }}" class="modal" onclick="if (event.target === this) this.close()">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-3">
                <i class="fas fa-times text-2xl"></i>
            </button>
        </form>
        <h3 class="font-bold text-lg">Hapus Data Video</h3>

        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-error"></div>
            <div class="divider"></div>
        </div>
        <form action="{{ route('admin.video.destroy', $video->id_video) }}" method="post">
            @csrf
            @method('DELETE')
            <h3 class="font-bold text-lg flex justify-center items-center">Yakin Ingin Menghapus Data Ini ?</h3>
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

<div class="flex justify-center my-5">
    @if($videos->previousPageUrl())
    <a href="{{ $videos->previousPageUrl() }}" class="btn">«</a>
    @else
    <button class="btn disabled">«</button>
    @endif

    <button class="btn">Page {{ $videos->currentPage() }}</button>

    @if($videos->nextPageUrl())
    <a href="{{ $videos->nextPageUrl() }}" class="btn">»</a>
    @else
    <button class="btn disabled">»</button>
    @endif
</div>
@endsection