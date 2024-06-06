@extends('layouts.mainAdmin')

@section('main-content')
<!-- Third Content -->
@include('shared.success-message')
@include('shared.error-message')
<!-- Title -->
<div>
    <h3 class="text-black font-bold text-xl mx-5 my-2">Sejarah Sekolah</h3>
</div>

<div class="flex justify-start items-center w-64 mx-5">
    <button class="btn btn-outline w-full hover:animate-pulse" onclick="modal_add_sejarah.showModal()">
        <i class="fas fa-plus text-xl"></i>
        Tambah Deskripsi Sejarah
    </button>
</div>

<div class="grid grid-cols-9 shadow-xl rounded-md mt-5">
    <div class="col-span-9 row-start-4">
        <div class="mt-5">
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
                                <ul tabindex="0"
                                    class="dropdown-content z-50 menu p-2 shadow bg-base-100 rounded-box w-32">
                                    <!-- Edit -->
                                    <li>
                                        <button class="btn btn-ghost w-full hover:animate-pulse"
                                            onclick="window['modal_edit_sejarah{{ $sejarah->id_sejarah }}'].showModal()">
                                            <i class="fas fa-pen-to-square"></i>
                                            Edit
                                        </button>
                                    </li>
                                    <!-- Edit -->
                                    <!-- View -->
                                    <li>
                                        <button class="btn btn-ghost w-full hover:animate-pulse"
                                            onclick="window['modal_view_sejarah{{ $sejarah->id_sejarah }}'].showModal()">
                                            <i class="fas fa-circle-info"></i>
                                            Detail
                                        </button>
                                    </li>
                                    <!-- View -->
                                    <!-- Delete -->
                                    <li>
                                        <button class="btn btn-ghost w-full hover:animate-pulse"
                                            onclick="window['modal_delete_sejarah{{ $sejarah->id_sejarah }}'].showModal()">
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
        </div>
    </div>
</div>

<!-- Pagination -->
<div class="join flex justify-center my-5">
    @if($sejarahSekolah->previousPageUrl())
    <a href="{{ $sejarahSekolah->previousPageUrl() }}" class="join-item btn">«</a>
    @else
    <button class="join-item btn disabled">«</button>
    @endif
    <button class="join-item btn">Page {{ $sejarahSekolah->currentPage() }}</button>
    @if($sejarahSekolah->nextPageUrl())
    <a href="{{ $sejarahSekolah->nextPageUrl() }}" class="join-item btn">»</a>
    @else
    <button class="join-item btn disabled">»</button>
    @endif
</div>



<dialog id="modal_add_sejarah" class="modal">
    <div class="modal-box w-11/12 max-w-5xl py-0">
        <div class="sticky top-0 bg-white pt-5">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-0 top-3">
                    <i class="fas fa-times text-2xl"></i>
                </button>
            </form>
            <h3 class="font-bold text-lg">Tambah Deskripsi Sejarah Sekolah</h3>
            <div class="grid grid-cols-3 w-52 -mt-5">
                <div class="divider"></div>
                <div class="divider divider-primary"></div>
                <div class="divider"></div>
            </div>
        </div>

        <form action="{{ route('SejarahSekolah.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="label">
                <span class="label-text">Judul Sejarah :</span>
            </div>
            <label
                class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" class="grow bg-transparent py-2" placeholder="Judul Sejarah" name="judul_sejarah" />
            </label>
            <div class="label">
                <span class="label-text">Tanggal Sejarah :</span>
            </div>
            <label
                class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="date" class="grow bg-transparent py-2" placeholder="Link Video" name="tanggal_sejarah" />
            </label>
            <div class="label">
                <span class="label-text">Deskripsi Sejarah :</span>
            </div>
            <textarea class="textarea textarea-bordered border-2 border-blue-400 w-full mb-5" placeholder="Deskripsi"
                id="editor" name="deskripsi_sejarah"></textarea>
            <div class="label">
                <span class="label-text">Dokumentasi Sejarah :</span>
            </div>
            <label
                class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="file" name="gambar_sejarah" id="tautan_dokumen" class="grow file-input file-input-success border-none bg-transparent py-2
                    file:mr-4 file:px-4 file:rounded-full file:border-0
                    file:text-sm file:font-semibold file:bg-blue-500 file:text-white
                    hover:file:bg-transparent hover:file:text-blue-400" required />
            </label>
            <div class="flex justify-end items-end my-10 gap-4">
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

<!-- edit modal -->
@foreach($sejarahSekolah as $key => $sejarah)
<dialog id="modal_edit_sejarah{{ $sejarah->id_sejarah }}" class="modal">
    <div class="modal-box w-11/12 max-w-5xl py-0">
        <div class="sticky top-0 bg-white pt-5">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-0 top-3">
                    <i class="fas fa-times text-2xl"></i>
                </button>
            </form>
            <h3 class="font-bold text-lg">Edit Data Sejarah Sekolah</h3>
            <div class="grid grid-cols-3 w-52 -mt-5">
                <div class="divider"></div>
                <div class="divider divider-primary"></div>
                <div class="divider"></div>
            </div>
        </div>

        <form action="{{ route('SejarahSekolah.update',['id_sejarah' => $sejarah->id_sejarah]) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="label">
                <span class="label-text">Judul Sejarah :</span>
            </div>
            <label
                class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" class="grow bg-transparent py-2" placeholder="Judul Sejarah" name="judul_sejarah"
                    value="{{$sejarah->judul_sejarah}}" />
            </label>
            <div class="label">
                <span class="label-text">Tanggal Sejarah :</span>
            </div>
            <label
                class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="date" class="grow bg-transparent py-2" placeholder="Link Video" name="tanggal_sejarah"
                    value="{{$sejarah->tanggal_sejarah}}" />
            </label>
            <div class="label">
                <span class="label-text">Deskripsi Sejarah :</span>
            </div>
            <textarea class="textarea textarea-bordered border-2 border-blue-400 w-full mb-5" id="editor3"
                placeholder="Deskripsi" name="deskripsi_sejarah">{{$sejarah->deskripsi_sejarah}}</textarea>
            <div class="label">
                <span class="label-text">Dokumentasi Sejarah :</span>
            </div>
            <label
                class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="file" name="gambar_sejarah" id="tautan_dokumen" class="grow file-input file-input-success border-none bg-transparent py-2
                    file:mr-4 file:px-4 file:rounded-full file:border-0
                    file:text-sm file:font-semibold file:bg-blue-500 file:text-white
                    hover:file:bg-transparent hover:file:text-blue-400" />
            </label>
            <div class="flex justify-end items-end my-10 gap-4">
                <button type="submit"
                    class="btn bg-elm w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
                    <i class=" fas fa-pen-to-square"></i>
                    Edit
                </button>
            </div>
        </form>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>
<!-- edit modal -->

<!-- view modal -->
<dialog id="modal_view_sejarah{{ $sejarah->id_sejarah}}" class="modal">
    <div class="modal-box w-11/12 max-w-5xl py-0">
        <div class="sticky top-0 bg-white pt-5">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-0 top-3">
                    <i class="fas fa-times text-2xl"></i>
                </button>
            </form>
            <h3 class="font-bold text-lg">Info Detail Sejarah Sekolah</h3>
            <div class="grid grid-cols-3 w-52 -mt-5">
                <div class="divider"></div>
                <div class="divider divider-primary"></div>
                <div class="divider"></div>
            </div>
        </div>
        <div class="grid">
            <div class="label">
                <span class="label-text">Dokumentasi Sejarah :</span>
            </div>
            <div class="aspect-w-10 aspect-h-5 mb-5">
                <img class="w-full h-64 rounded-md" src="{{ asset('storage/'.$sejarah->gambar_sejarah) }}">
            </div>
            <div class="label">
                <span class="label-text">Tautan Foto :</span>
            </div>
            <label
                class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" class="grow bg-transparent py-2" placeholder="Link Galeri" name="gambar_sejarah"
                    value="{{$sejarah->gambar_sejarah}}" disabled />
            </label>
            <div class="label">
                <span class="label-text">Judul Sejarah :</span>
            </div>
            <label
                class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" class="grow bg-transparent py-2" placeholder="Judul Sejarah" name="judul_sejarah"
                    value="{{$sejarah->judul_sejarah}}" readonly />
            </label>
            <div class="label">
                <span class="label-text">Tanggal Sejarah :</span>
            </div>
            <label
                class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" class="grow bg-transparent py-2" placeholder="Tanggal" nama="tanggal_sejarah"
                    value="{{$sejarah->tanggal_sejarah}}" disabled />
            </label>
            <div class="label">
                <span class="label-text">Deskripsi Sejarah :</span>
            </div>
            <label
                class="input bg-transparent border-2 border-blue-400 gap-2 mb-5 w-full h-max p-5 focus-within:outline-none">
                <p>{!! $sejarah->deskripsi_sejarah !!}</p>
            </label>
        </div>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>
<!-- view modal -->

<!-- delate modal -->
<dialog id="modal_delete_sejarah{{ $sejarah->id_sejarah }}" class="modal">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-3">
                <i class="fas fa-times text-2xl"></i>
            </button>
        </form>
        <h3 class="font-bold text-lg">Hapus Data Sejarah Sekolah</h3>
        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-error"></div>
            <div class="divider"></div>
        </div>
        <form action="{{ route ('SejarahSekolah.destroy', $sejarah->id_sejarah) }}" method="post">
            @csrf
            @method('DELETE')
            <h3 class="font-bold text-lg flex justify-center items-center">Yakin Ingin Menghapus
                Data Ini ?</h3>
            <div class="flex justify-end items-end mt-20 gap-4">
                <button type="submit"
                    class="btn bg-error w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-error">
                    <i class=" fas fa-trash"></i>
                    Hapus
                </button>
            </div>
        </form>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>
<!-- delate modal -->
@endforeach

@endsection