@extends('layouts.mainAdmin')

@section('main-content')
<div class="grid grid-cols-9 shadow-lg px-4 rounded-md">

    @include('shared.success-message')
    @include('shared.error-message')
    <div class="col-span-3 my-4 mx-5 row-start-2">
        <h3 class="font-bold text-lg">Pengelolaan Ekstrakulikuler</h3>
    </div>

    <!-- Modal -->
    <div class="col-span-3 row-start-3 mx-5 w-full">
        <button class="btn btn-outline w-full hover:animate-pulse" onclick="my_modal_add.showModal()">
            <i class="fas fa-plus"></i>
            Tambah Ekstrakulikuler
        </button>
    </div>
    <!-- Modal -->

    <!-- Content -->
    <div class="col-span-9 row-start-4">
        <div class="mt-5">
            <table class="table border text-center">
                <!-- head -->
                <thead>
                    <tr>
                        <th>No.</th>
                        <th class="w-48">Gambar</th>
                        <th class="w-52">Nama Ekstrakulikuler</th>
                        <th class="w-72">Pembina Ekstrakulikuler</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($ekstrakulikuler as $key => $ekskul)
                    <tr class="hover">
                        <th>{{ ($ekstrakulikuler->currentPage() - 1) * $ekstrakulikuler->perPage() + $key + 1 }}</th>
                        <td class="flex justify-center w-48">
                            <figure class="max-w-40 max-h-40">
                                <img src="{{ asset('storage/'. $ekskul->gambar_profil_ekstrakurikuler) }}" alt="Rojek naek gojek" />
                            </figure>
                        </td>
                        <td class="w-52">{{ $ekskul->nama_ekstrakurikuler }}</td>
                        <td class="w-72">{{ $ekskul->guru->nama_guru ?? '-' }}</td>
                        <td>
                            <details class="dropdown">
                                <summary tabindex="0" role="button" class="btn btn-ghost button w-20">
                                    <i class="fas fa-circle text-[0.5rem] circle-1 transition-all duration-500"></i>
                                    <i class="fas fa-circle text-[0.5rem] circle-2 transition-all duration-500"></i>
                                    <i class="fas fa-circle text-[0.5rem] circle-3 transition-all duration-500"></i>
                                    <i class="fas fa-times font-bold text-xl hidden transition-all duration-500"></i>
                                </summary>
                                <ul tabindex="0" class="dropdown-content z-50 menu p-2 shadow bg-base-100 rounded-box w-32">
                                    <!-- Edit -->
                                    <li>
                                        <button class="btn btn-ghost w-full hover:animate-pulse" onclick="window['my_modal_edit{{ $ekskul->id_ekstrakurikuler }}'].showModal()">
                                            <i class="fas fa-pen-to-square"></i>
                                            Edit
                                        </button>
                                    </li>
                                    <!-- Edit -->
                                    <!-- View -->
                                    <li>
                                        <button class="btn btn-ghost w-full hover:animate-pulse" onclick="window['my_modal_view{{ $ekskul->id_ekstrakurikuler }}'].showModal()">
                                            <i class="fas fa-circle-info"></i>
                                            Detail
                                        </button>
                                    </li>
                                    <!-- View -->
                                    <!-- Delete -->
                                    <li>
                                        <button class="btn btn-ghost w-full hover:animate-pulse" onclick="window['my_modal_delete{{ $ekskul->id_ekstrakurikuler }}'].showModal()">
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
                        <th class="w-48">Gambar</th>
                        <th class="w-52">Nama Ekstrakulikuler</th>
                        <th class="w-52">Pembina Ekstrakulikuler</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
            </table>

            <!-- Pagination -->
            <div class="join flex justify-center my-5">
                @if($ekstrakulikuler->previousPageUrl())
                <a href="{{ $ekstrakulikuler->previousPageUrl() }}" class="join-item btn">«</a>
                @else
                <button class="join-item btn disabled">«</button>
                @endif
                <button class="join-item btn">Page {{ $ekstrakulikuler->currentPage() }}</button>
                @if($ekstrakulikuler->nextPageUrl())
                <a href="{{ $ekstrakulikuler->nextPageUrl() }}" class="join-item btn">»</a>
                @else
                <button class="join-item btn disabled">»</button>
                @endif
            </div>

        </div>
    </div>
    <!-- Content -->
</div>

<!-- Modal CREATE -->
<dialog id="my_modal_add" class="modal">
    <div class="modal-box w-11/12 max-w-5xl">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Tambah Ekstrakulikuler</h3>
        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-primary"></div>
            <div class="divider"></div>
        </div>

        <form action="{{ route('Ekstrakulikuler.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="grid gap-y-5">
                <span class="label-text -mb-4">Nama Ekstrakurikuler :</span>
                <input type="text" class="input border-2 border-blue-400 w-full" placeholder="Nama Ekstrakulikuler" name="nama_ekstrakurikuler" />
                <span class="label-text -mb-4">Gambar Headline Ekstrakurikuler :</span>
                <div class="grid gap-2" id="fileInputsEkskul">
                    <label class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 w-full focus-within:outline-none">
                        <input type="file" name="gambar_profil_ekstrakurikuler" class="grow file-input file-input-success border-none bg-transparent py-2 file:mr-4 file:px-4 file:rounded-full file:border-0
                    file:text-sm file:font-semibold file:bg-blue-500 file:text-white
                    hover:file:bg-transparent hover:file:text-blue-400" accept="gambarEkskul/*" placeholder="Logo" />
                    </label>
                </div>
                <button type="button" id="btnAddFileEkskul" class="btn no-animation btn-sm mt-3">Tambah Gambar</button>
                <span class="label-text -mb-4">Guru Pembimbing :</span>
                <select class="select border-b-2 border-blue-400 w-full" name="id_guru">
                    <option value="" selected>Pembimbing Ekstrakulikuler</option>

                    @foreach($gurus as $guru)
                    <option value="{{ $guru->id_guru }}">{{ $guru->nama_guru }}</option>
                    @endforeach

                </select>
                <span class="label-text -mb-4">Deskripsi Ekstrakurikuler :</span>
                <textarea class="textarea border-2 border-blue-400 w-full" placeholder="Deskripsi Ekstrakulikuler" name="deskripsi_ekstrakurikuler"></textarea>
                <span class="label-text -mb-4">Tempat Kegiatan Ekstrakurikuler :</span>
                <input type="text" class="input border-2 border-blue-400 w-full" placeholder="Tempat Ekstrakulikuler" name="tempat_ekstrakurikuler" />
                <span class="label-text -mb-4">Jadwal Ekstrakurikuler :</span>
                <input type="text" class="input border-2 border-blue-400 w-full" placeholder="Jadwal Ekstrakulikuler" name="jadwal_ekstrakurikuler" />
            </div>
            <div class="flex justify-end items-end mt-10 gap-4">
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
<!-- Modal CREATE end -->

<!-- Edit Modal -->
@foreach($ekstrakulikuler as $key => $ekskul)
<dialog id="my_modal_edit{{ $ekskul->id_ekstrakurikuler }}" class="modal">
    <div class="modal-box w-11/12 max-w-5xl">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Edit Ekstrakulikuler</h3>
        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-primary"></div>
            <div class="divider"></div>
        </div>

        <form action="{{ route('ekstrakurikuler.update',  $ekskul->id_ekstrakurikuler) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="grid gap-y-5">
                <span class="label-text -mb-4">Nama Ekstrakurikuler :</span>
                <input type="text" class="input border-2 border-blue-400 w-full" placeholder="Nama Ekstrakulikuler" name="nama_ekstrakurikuler" value="{{ $ekskul->nama_ekstrakurikuler }}" />
                <span class="label-text -mb-4">Gambar Headline Ekstrakurikuler :</span>
                <div class="grid gap-2">
                    <label class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 w-full focus-within:outline-none">
                        <input type="file" name="gambar_profil_ekstrakurikuler" class="grow file-input file-input-success border-none bg-transparent py-2 file:mr-4 file:px-4 file:rounded-full file:border-0
                    file:text-sm file:font-semibold file:bg-blue-500 file:text-white
                    hover:file:bg-transparent hover:file:text-blue-400" accept="gambarEkskul/*" placeholder="Logo" value="{{ $ekskul->gambar_profil_ekstrakurikuler }}" />
                    </label>
                </div>
                <button type="button" class="btn btn-outline w-full hover:animate-pulse" onclick="window['my_modal_edit_gambar{{ $ekskul->id_ekstrakurikuler }}'].showModal()">
                    <i class="fas fa-pen-to-square"></i>
                    Edit Gambar Ekstrakulikuler
                </button>
                <span class="label-text -mb-4">Guru Pembimbing :</span>
                <select class="select border-b-2 border-blue-400 w-full" name="id_guru">
                    <option value="" selected>Pembimbing Ekstrakurikuler</option>

                    @foreach($gurus as $guruIndex => $guru)
                    <option value="{{ $guru->id_guru }}" {{ $ekskul->id_guru === $guru->id_guru ? 'selected' : '' }}>
                        {{ $guru->nama_guru }}
                    </option>
                    @endforeach

                </select>
                <span class="label-text -mb-4">Deskripsi Ekstrakurikuler :</span>
                <textarea class="textarea border-2 border-blue-400 w-full" placeholder="Deskripsi Ekstrakulikuler" name="deskripsi_ekstrakurikuler">{{ $ekskul->deskripsi_ekstrakurikuler }}</textarea>
                <span class="label-text -mb-4">Tempat Kegiatan Ekstrakurikuler :</span>
                <input type="text" class="input border-2 border-blue-400 w-full" placeholder="Tempat Ekstrakulikuler" name="tempat_ekstrakurikuler" value="{{ $ekskul->tempat_ekstrakurikuler }}" />
                <span class="label-text -mb-4">Jadwal Ekstrakurikuler :</span>
                <input type="text" class="input border-2 border-blue-400 w-full" placeholder="Jadwal Ekstrakulikuler" name="jadwal_ekstrakurikuler" value="{{ $ekskul->jadwal_ekstrakurikuler }}" />
            </div>
            <div class="flex justify-end items-end mt-10 gap-4">
                <button type="submit" class="btn bg-elm w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
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

<!-- Edit Gambar -->
<dialog id="my_modal_edit_gambar{{ $ekskul->id_ekstrakurikuler }}" class="modal">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Edit Gambar Ekstrakulikuler</h3>
        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-primary"></div>
            <div class="divider"></div>
        </div>
        <div class="label">
            <span class="label-text">Gambar :</span>
        </div>
        <div class="grid gap-2" id="textInputContainer">

            @foreach ($ekskul->gambar as $gambar)
            <form action="{{ route('gambarEkskul.destroy', $gambar->id_gambar_ekstrakurikuler) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="flex gap-1">
                    <input type="text" class="input input-success w-full" placeholder="Gambar berita" value="{{ $gambar->gambar_ekstrakurikuler }}" name="gambar_ekstrakurikuler[]" disabled />
                    <button class="btn btn-square btn-outline btn-error btn-remove">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </form>
            @endforeach

        </div>
        <form action="{{ route('gambarEkskul.update', $ekskul->id_ekstrakurikuler) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="label">
                <span class="label-text">Tambah Gambar:</span>
            </div>
            <div class="flex gap-1">
                <label class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 w-full focus-within:outline-none">
                    <input type="file" class="file-input w-full py-2 file:mr-4 file:px-4 file:rounded-full file:border-0
                    file:text-sm file:font-semibold file:bg-blue-500 file:text-white
                    hover:file:bg-transparent hover:file:text-blue-400" placeholder="Pilih gambar berita" name="gambar_ekstrakurikuler" />
                </label>
                <button type="submit" class="btn btn-square bg-blue-400 text-white hover:text-blue-400">
                    <i class="fas fa-plus text-xl"></i>
                </button>
            </div>
        </form>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>
<!-- Edit Gambar -->
<!-- Edit Modal -->

<!-- View Modal -->
<dialog id="my_modal_view{{ $ekskul->id_ekstrakurikuler }}" class="modal">
    <div class="modal-box w-11/12 max-w-5xl">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Info Detail Ekstrakulikuler</h3>
        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-primary"></div>
            <div class="divider"></div>
        </div>
        <div class="grid gap-y-5">
            <div class="avatar flex justify-center items-center my-5">
                <div class="mask mask-squircle w-36 h-36">
                    <img src="{{ asset('storage/'.$ekskul->gambar_profil_ekstrakurikuler) }}" alt="Avatar Tailwind CSS Component" />
                </div>
            </div>
            <span class="label-text -mb-4">Tautan Foto Headline Ekstrakurikuler :</span>
            <label class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 w-full focus-within:outline-none">
                <input type="text" name="gambar_profil_ekstrakurikuler" class="grow file-input file-input-success border-none bg-transparent py-2" accept="gambarEkskul/*" placeholder="Logo" value="{{ $ekskul->gambar_profil_ekstrakurikuler }}" readonly />
            </label>
            <span class="label-text -mb-4">Nama Ekstrakurikuler :</span>
            <input type="text" class="input border-2 border-blue-400 w-full" placeholder="Nama Ekstrakulikuler" name="nama_ekstrakulikuler" value="{{ $ekskul->nama_ekstrakurikuler }}" readonly />
            <span class="label-text -mb-4">Jadwal Ekstrakurikuler :</span>
            <input type="text" class="input border-2 border-blue-400 w-full" placeholder="Jadwal Ekstrakulikuler" name="id_guru" value="{{ $ekskul->guru->nama_guru ?? '-' }}" readonly />
            <span class="label-text -mb-4">Deskripsi Ekstrakurikuler :</span>
            <textarea class="textarea border-2 border-blue-400 w-full" placeholder="Deskripsi Ekstrakulikuler" name="deskripsi_ekstrakurikuler" readonly>{{ $ekskul->deskripsi_ekstrakurikuler }}</textarea>
            <span class="label-text -mb-4">Tempat Ekstrakurikuler :</span>
            <input type="text" class="input border-2 border-blue-400 w-full" placeholder="Tempat Ekstrakulikuler" name="tempat_ekstrakulikuler" value="{{ $ekskul->tempat_ekstrakurikuler }}" readonly />
            <span class="label-text -mb-4">Jadwal Ekstrakurikuler :</span>
            <input type="text" class="input border-2 border-blue-400 w-full" placeholder="Jadwal Ekstrakulikuler" name="jadwal_ekstrakulikuler" value="{{ $ekskul->jadwal_ekstrakurikuler }}" readonly />

            <span class="label-text -mb-4">Tautan Foto Ekstrakurikuler :</span>
            @foreach ($ekskul->gambar as $gambar)
            <input type="text" class="input border-2 border-blue-400 w-full" placeholder="Gambar berita" value="{{ $gambar->gambar_ekstrakurikuler }}" name="gambar_ekstrakurikuler[]" disabled />
            @endforeach
        </div>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>
<!-- View Modal -->

<!-- Delete Modal -->
<dialog id="my_modal_delete{{ $ekskul->id_ekstrakurikuler }}" class="modal">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Hapus Data</h3>
        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-error"></div>
            <div class="divider"></div>
        </div>

        <form action="{{ route('Ekstrakulikuler.destroy', $ekskul->id_ekstrakurikuler) }}" method="post">
            @csrf
            @method('DELETE')
            <h3 class="font-bold text-lg flex justify-center items-center">Yakin Ingin Menghapus Data Ini ?</h3>
            <div class="flex justify-end items-end mt-10 gap-4">
                <button type="submit" class="btn bg-error w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-error">
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
<!-- Delete Modal -->

@endsection