@extends('layouts.mainAdmin')

@section('main-content')
<!-- Third Content -->
<div class="grid grid-cols-9 rounded-md mt-10">
    @include('shared.success-message')
    @include('shared.error-message')
    <!-- Title -->
    <div class="col-span-2 my-4 mx-5 row-start-2">
        <h3 class="font-bold text-lg">Sejarah Sekolah</h3>
    </div>
    <!-- Title -->

    <!-- Modal -->
    <div class="col-span-3 row-start-3 mx-5">

        <button class="btn btn-outline w-full hover:animate-pulse" onclick="modal_add_sejarah.showModal()">
            <i class="fas fa-plus text-xl"></i>
            Tambah Deskripsi Sejarah
        </button>

    </div>
    <!-- Modal -->

    <!-- Search Bar -->
    <div class="col-span-2 row-start-3 col-start-7">
        <label class="input input-bordered flex items-center gap-2  focus-within:outline-none">
            <i class="fas fa-magnifying-glass"></i>
            <input type="text" class="grow" placeholder="Cari" />
        </label>
    </div>
    <!-- Search Bar -->

    <!-- Content -->
    <div class="col-span-9 row-start-4">
        <div class=" mt-5">
            <table class="table border text-center">
                <!-- head -->
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Judul Sejarah</th>
                        <th>Deskripsi Sejarah</th>
                        <th class="w-52">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($sejarahSekolah as $key => $sejarah)
                    <tr class="hover">
                        <th>{{ ($sejarahSekolah->currentPage() - 1) * $sejarahSekolah->perPage() + $key + 1 }}</th>
                        <td>{{ $sejarah -> judul_sejarah }}</td>
                        <td>
                            <p class="truncate w-64 mx-auto">
                                {{$sejarah -> deskripsi_sejarah}}
                            </p>
                        </td>
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
                                        <button class="btn btn-ghost w-full hover:animate-pulse" onclick="window['modal_edit_sejarah{{ $sejarah->id_sejarah }}'].showModal()">
                                            <i class="fas fa-pen-to-square"></i>
                                            Edit
                                        </button>
                                    </li>
                                    <!-- Edit -->
                                    <!-- View -->
                                    <li>
                                        <button class="btn btn-ghost w-full hover:animate-pulse" onclick="window['modal_view_sejarah{{ $sejarah->id_sejarah }}'].showModal()">
                                            <i class="fas fa-circle-info"></i>
                                            Detail
                                        </button>
                                    </li>
                                    <!-- View -->
                                    <!-- Delete -->
                                    <li>
                                        <button class="btn btn-ghost w-full hover:animate-pulse" onclick="window['modal_delete_sejarah{{ $sejarah->id_sejarah }}'].showModal()">
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
                <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Judul Sejarah</th>
                        <th>Deskripsi Sejarah</th>
                        <th class="w-52">Aksi</th>
                    </tr>
                </tfoot>
            </table>

            <!-- Pagination -->
            <div class="flex justify-center my-5 gap-2">
                @if($sejarahSekolah->previousPageUrl())
                <a href="{{ $sejarahSekolah->previousPageUrl() }}" class="btn">«</a>
                @else
                <button class="btn disabled">«</button>
                @endif
                <button class="btn">Page {{ $sejarahSekolah->currentPage() }}</button>
                @if($sejarahSekolah->nextPageUrl())
                <a href="{{ $sejarahSekolah->nextPageUrl() }}" class="btn">»</a>
                @else
                <button class="btn disabled">»</button>
                @endif
            </div>

        </div>
    </div>
    <!-- Content -->
</div>

<dialog id="modal_add_sejarah" class="modal">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Tambah Deskripsi Sejarah Sekolah</h3>
        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-success"></div>
            <div class="divider"></div>
        </div>

        <form action="{{ route('SejarahSekolah.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <i class="fas fa-heading"></i>
                <input type="text" class="grow bg-transparent py-2" placeholder="Judul Sejarah" name="judul_sejarah" />
            </label>
            <textarea class="textarea textarea-bordered border-2 border-elm w-full mb-5" placeholder="Deskripsi" name="deskripsi_sejarah"></textarea>
            <input type="file" class="file-input file-input-bordered bg-elm w-full mb-5" name="gambar_sejarah" />
            <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <i class="far fa-calendar"></i>
                <input type="date" class="grow bg-transparent py-2" placeholder="Link Video" name="tanggal_sejarah" />
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
</dialog>

<!-- edit modal -->
@foreach($sejarahSekolah as $key => $sejarah)
<dialog id="modal_edit_sejarah{{ $sejarah->id_sejarah }}" class="modal">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Edit Data Sejarah Sekolah</h3>
        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-success"></div>
            <div class="divider"></div>
        </div>

        <form action="{{ route('SejarahSekolah.update',['id_sejarah' => $sejarah->id_sejarah]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <i class="fas fa-heading"></i>
                <input type="text" class="grow bg-transparent py-2" placeholder="Judul Sejarah" name="judul_sejarah" value="{{$sejarah->judul_sejarah}}" />
            </label>
            <textarea class="textarea textarea-bordered border-2 border-elm w-full mb-5" placeholder="Deskripsi" name="deskripsi_sejarah">{{$sejarah->deskripsi_sejarah}}</textarea>
            <input type="file" class="file-input file-input-bordered bg-elm w-full mb-5" name="gambar_sejarah" />
            <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <i class="far fa-calendar"></i>
                <input type="date" class="grow bg-transparent py-2" placeholder="Link Video" name="tanggal_sejarah" value="{{$sejarah->tanggal_sejarah}}" />
            </label>
            <div class="flex justify-end items-end mt-20 gap-4">
                <button type="submit" class="btn bg-elm w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
                    <i class=" fas fa-pen-to-square"></i>
                    Simpan
                </button>
            </div>
        </form>

    </div>
</dialog>
<!-- edit modal -->

<!-- view modal -->
<dialog id="modal_view_sejarah{{ $sejarah->id_sejarah}}" class="modal">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Info Detail Sejarah Sekolah</h3>
        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-success"></div>
            <div class="divider"></div>
        </div>
        <div class="aspect-w-10 aspect-h-5 mb-5">
            <img class="w-full h-64" src="{{ asset('storage/'.$sejarah->gambar_sejarah) }}">
        </div>
        <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
            <i class="far fa-file-image"></i>
            <input type="text" class="grow bg-transparent py-2" placeholder="Link Galeri" name="gambar_sejarah" value="{{$sejarah->gambar_sejarah}}" disabled />
        </label>
        <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
            <i class="fas fa-heading"></i>
            <input type="text" class="grow bg-transparent py-2" placeholder="Judul Sejarah" name="judul_sejarah" value="{{$sejarah->judul_sejarah}}" disabled />
        </label>
        <textarea class="textarea textarea-bordered border-2 border-elm w-full mb-5" placeholder="Deskripsi" name="deskripsi_sejarah" disabled>{{$sejarah->deskripsi_sejarah}}</textarea>
        <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
            <i class="far fa-calendar"></i>
            <input type="text" class="grow bg-transparent py-2" placeholder="Tanggal" nama="tanggal_sejarah" value="{{$sejarah->tanggal_sejarah}}" disabled />
        </label>
    </div>
</dialog>
<!-- view modal -->

<!-- delate modal -->
<dialog id="modal_delete_sejarah{{ $sejarah->id_sejarah }}" class="modal">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Hapus Data Sejarah Sekolah</h3>
        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-success"></div>
            <div class="divider"></div>
        </div>
        <form action="{{ route ('SejarahSekolah.destroy', $sejarah->id_sejarah) }}" method="post">
            @csrf
            @method('DELETE')
            Apakah Anda Yakin Ingin Menghapus Data Ini ?
            <div class="flex justify-end items-end mt-20 gap-4">
                <button type="submit" class="btn bg-error w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-error">
                    <i class=" fas fa-trash"></i>
                    Hapus
                </button>
            </div>
        </form>
    </div>
</dialog>
<!-- delate modal -->
@endforeach

@endsection