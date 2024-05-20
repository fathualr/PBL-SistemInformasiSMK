@extends('layouts.mainAdmin')

@section('main-content')
<div class="grid grid-cols-9 shadow-xl rounded-md">

    <div class="col-span-3 my-4 mx-5">
        <h3 class="font-bold text-lg">Pengelolaan Ekstrakulikuler</h3>
    </div>

    <!-- Modal -->
    <div class="col-span-2 row-start-2 mx-5 w-full">
        <button class="btn btn-outline w-full hover:animate-pulse" onclick="my_modal_add.showModal()">
            <i class="fas fa-user-plus"></i>
            Tambah Ekstrakulikuler
        </button>
    </div>
    <!-- Modal -->

    <!-- Search Bar -->
    <div class="col-span-2 col-start-7 row-start-2">
        <label class="input input-bordered flex items-center gap-2 focus-within:outline-none">
            <i class="fas fa-magnifying-glass"></i>
            <input type="text" class="grow" placeholder="Cari" />
        </label>
    </div>
    <!-- Search Bar -->

    <!-- Content -->
    <div class="col-span-9 row-start-3">
        <div class="mt-5">
            <table class="table text-center">
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
                    @forelse($ekstrakulikuler as $ekskulIndex => $ekskul)
                    <tr class="hover">
                        <th>{{ $ekskulIndex + 1 }}</th>
                        <td class="flex justify-center w-48">
                            <figure class="max-w-40 max-h-40">
                                <img src="{{ asset('storage/'. $ekskul->gambar_profil_ekstrakurikuler) }}"
                                    alt="Rojek naek gojek" />
                            </figure>
                        </td>
                        <td class="w-52">{{ $ekskul->nama_ekstrakurikuler }}</td>
                        <td class="w-72">{{ $ekskul->guru->nama_guru }}</td>
                        <td>
                            <details class="dropdown dropdown-right">
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
                                            onclick="window['my_modal_edit{{ $ekskul->id_ekstrakurikuler }}'].showModal()">
                                            <i class="fas fa-pen-to-square"></i>
                                            Edit
                                        </button>
                                    </li>
                                    <!-- Edit -->

                                    <!-- View -->
                                    <li>
                                        <button class="btn btn-ghost w-full hover:animate-pulse"
                                            onclick="window['my_modal_view{{ $ekskul->id_ekstrakurikuler }}'].showModal()">
                                            <i class="fas fa-circle-info"></i>
                                            Detail
                                        </button>
                                    </li>
                                    <!-- View -->

                                    <!-- Delete -->
                                    <li>
                                        <button class="btn btn-ghost w-full hover:animate-pulse"
                                            onclick="window['my_modal_delete{{ $ekskul->id_ekstrakurikuler }}'].showModal()">
                                            <i class="fas fa-trash"></i>
                                            Hapus
                                        </button>
                                    </li>
                                    <!-- Delete -->
                                </ul>
                            </details>
                        </td>
                    </tr>

                    <!-- Edit Modal -->
                    <dialog id="my_modal_edit{{ $ekskul->id_ekstrakurikuler }}" class="modal">
                        <div class="modal-box">
                            <form method="dialog">
                                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                            </form>
                            <h3 class="font-bold text-lg">Edit Ekstrakulikuler</h3>
                            <div class="grid grid-cols-3 w-52 -mt-5">
                                <div class="divider"></div>
                                <div class="divider divider-success"></div>
                                <div class="divider"></div>
                            </div>
                            <form action="{{ route('ekstrakurikuler.update',  $ekskul->id_ekstrakurikuler) }}"
                                method="post" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="grid gap-y-5">
                                    <input type="text" class="input input-bordered input-success w-full"
                                        placeholder="Nama Ekstrakulikuler" name="nama_ekstrakurikuler"
                                        value="{{ $ekskul->nama_ekstrakurikuler }}" />

                                    <div class="grid gap-2">
                                        <label
                                            class="input bg-transparent border-2 border-elm flex items-center gap-2 w-full focus-within:outline-none">
                                            <input type="file" name="gambar_profil_ekstrakurikuler"
                                                class="grow file-input file-input-success border-none bg-transparent py-2"
                                                accept="gambarEkskul/*" placeholder="Logo"
                                                value="{{ $ekskul->gambar_profil_ekstrakurikuler }}" />
                                        </label>
                                    </div>

                                    <button type="button" class="btn btn-outline w-full hover:animate-pulse"
                                        onclick="window['my_modal_edit_gambar{{ $ekskul->id_ekstrakurikuler }}'].showModal()">
                                        <i class="fas fa-pen-to-square"></i>
                                        Edit Gambar Ekstrakulikuler
                                    </button>

                                    <select class="select select-success w-full" name="id_guru">
                                        <option disabled selected>Pembimbing Ekstrakurikuler</option>
                                        @foreach($direktoriGuru as $guruIndex => $guru)
                                        <option value="{{ $guru->id_guru }}" @if($guru->id_guru === $ekskul->id_guru)
                                            selected @endif>{{ $guru->nama_guru }}</option>
                                        @endforeach
                                    </select>

                                    <textarea class="textarea textarea-success w-full"
                                        placeholder="Deskripsi Ekstrakulikuler"
                                        name="deskripsi_ekstrakurikuler">{{ $ekskul->deskripsi_ekstrakurikuler }}</textarea>
                                    <input type="text" class="input input-bordered input-success w-full"
                                        placeholder="Tempat Ekstrakulikuler" name="tempat_ekstrakurikuler"
                                        value="{{ $ekskul->tempat_ekstrakurikuler }}" />
                                    <input type="text" class="input input-bordered input-success w-full"
                                        placeholder="Jadwal Ekstrakulikuler" name="jadwal_ekstrakurikuler"
                                        value="{{ $ekskul->jadwal_ekstrakurikuler }}" />
                                </div>
                                <div class="flex justify-end items-end mt-10 gap-4">
                                    <button type="submit"
                                        class="btn bg-elm w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
                                        <i class="fas fa-pen-to-square"></i>
                                        Edit
                                    </button>
                                </div>
                            </form>
                        </div>
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
                                <div class="divider divider-success"></div>
                                <div class="divider"></div>
                            </div>

                            <div class="label">
                                <span class="label-text">Gambar :</span>
                            </div>
                            <div class="grid gap-2" id="textInputContainer">
                                @foreach ($ekskul->gambarEkstrakurikuler as $gambar)
                                <form action="{{ route('gambarEkskul.destroy', $gambar->id_gambar_ekstrakurikuler) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="flex gap-1">
                                        <input type="text" class="input input-bordered input-success w-full"
                                            placeholder="Gambar berita" value="{{ $gambar->gambar_ekstrakurikuler }}"
                                            name="gambar_ekstrakurikuler[]" disabled />
                                        <button class="btn btn-square btn-outline btn-error btn-remove">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                </form>
                                @endforeach
                            </div>
                            <form action="{{ route('gambarEkskul.update', $gambar->id_ekstrakurikuler) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="label">
                                    <span class="label-text">Tambah Gambar:</span>
                                </div>
                                <div class="flex gap-1">
                                    <input type="file" class="file-input file-input-bordered file-input-success w-full"
                                        placeholder="Pilih gambar berita" name="gambar_ekstrakurikuler" />
                                    <button type="submit" class="btn btn-square btn-outline btn-success btn-remove">
                                        <i class="fas fa-plus text-xl"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </dialog>
                    <!-- Edit Gambar -->

                    <!-- Edit Modal -->

                    <!-- View Modal -->
                    <dialog id="my_modal_view{{ $ekskul->id_ekstrakurikuler }}" class="modal">
                        <div class="modal-box">
                            <form method="dialog">
                                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                            </form>
                            <h3 class="font-bold text-lg">Info Detail Ekstrakulikuler</h3>
                            <div class="grid grid-cols-3 w-52 -mt-5">
                                <div class="divider"></div>
                                <div class="divider divider-success"></div>
                                <div class="divider"></div>
                            </div>
                            <div class="grid gap-y-5">
                                <div class="avatar flex justify-center items-center my-5">
                                    <div class="mask mask-squircle w-36 h-36">
                                        <img src="{{ asset($ekskul->gambar_profil_ekstrakurikuler) }}"
                                            alt="Avatar Tailwind CSS Component" />
                                    </div>
                                </div>
                                <label
                                    class="input bg-transparent border-2 border-elm flex items-center gap-2 w-full focus-within:outline-none">
                                    <i class="fas fa-link"></i>
                                    <input type="text" name="gambar_profil_ekstrakurikuler"
                                        class="grow file-input file-input-success border-none bg-transparent py-2"
                                        accept="gambarEkskul/*" placeholder="Logo"
                                        value="{{ $ekskul->gambar_profil_ekstrakurikuler }}" readonly />
                                </label>
                                <input type="text" class="input input-bordered input-success w-full"
                                    placeholder="Nama Ekstrakulikuler" name="nama_ekstrakulikuler"
                                    value="{{ $ekskul->nama_ekstrakulikuler }}" readonly />
                                <select class="select select-success w-full" name="id_guru" readonly>
                                    <option disabled selected>Pembimbing Ekstrakulikuler</option>
                                    @foreach($direktoriGuru as $guru)
                                    <option value="{{ $guru->id_guru }}" @if($guru->id_guru === $ekskul->id_guru)
                                        selected @endif>{{ $guru->nama_guru }}</option>
                                    @endforeach
                                </select>
                                <textarea class="textarea textarea-success w-full"
                                    placeholder="Deskripsi Ekstrakulikuler" name="deskripsi_ekstrakurikuler"
                                    readonly>{{ $ekskul->deskripsi_ekstrakurikuler }}</textarea>
                                <input type="text" class="input input-bordered input-success w-full"
                                    placeholder="Tempat Ekstrakulikuler" name="tempat_ekstrakulikuler"
                                    value="{{ $ekskul->tempat_ekstrakulikuler }}" readonly />
                                <input type="text" class="input input-bordered input-success w-full"
                                    placeholder="Jadwal Ekstrakulikuler" name="jadwal_ekstrakulikuler"
                                    value="{{ $ekskul->jadwal_ekstrakulikuler }}" readonly />
                            </div>
                        </div>
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
                            <form
                                action="{{ route('Ekstrakulikuler.destroy', ['id_ekstrakurikuler' => $ekskul->id_ekstrakurikuler]) }}"
                                method="post">
                                @csrf
                                @method('DELETE')
                                <h3 class="font-bold text-lg flex justify-center items-center">Yakin Ingin Menghapus
                                    Data Ini ?</h3>
                                <div class="flex justify-end items-end mt-10 gap-4">
                                    <button type="submit"
                                        class="btn bg-error w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-error">
                                        <i class="fas fa-trash"></i>
                                        Hapus
                                    </button>
                                </div>
                            </form>
                        </div>
                    </dialog>
                    <!-- Delete Modal -->
                    @empty
                    <tr>
                        <td colspan="5">Tidak ada data ekstrakurikuler yang tersedia.</td>
                    </tr>
                    @endforelse
                </tbody>
                @if ($ekstrakulikuler->count() > 5)
                <tfoot>
                    <tr>
                        <th>No.</th>
                        <th class="w-48">Gambar</th>
                        <th class="w-52">Nama Ekstrakulikuler</th>
                        <th class="w-52">Pembina Ekstrakulikuler</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                @endif
            </table>
        </div>
    </div>
    <!-- Content -->
</div>

<!-- Modal CREATE -->
<dialog id="my_modal_add" class="modal">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Tambah Ekstrakulikuler</h3>
        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-success"></div>
            <div class="divider"></div>
        </div>
        <form action="{{ route('Ekstrakulikuler.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="grid gap-y-5">
                <input type="text" class="input input-bordered input-success w-full" placeholder="Nama Ekstrakulikuler"
                    name="nama_ekstrakurikuler" />
                <div class="grid gap-2" id="fileInputsEkskul">
                    <label
                        class="input bg-transparent border-2 border-elm flex items-center gap-2 w-full focus-within:outline-none">
                        <input type="file" name="gambar_profil_ekstrakurikuler"
                            class="grow file-input file-input-success border-none bg-transparent py-2"
                            accept="gambarEkskul/*" placeholder="Logo" />
                    </label>
                </div>
                <button type="button" id="btnAddFileEkskul" class="btn no-animation btn-sm mt-3">Tambah Gambar</button>
                <select class="select select-success w-full" name="id_guru">
                    <option disabled selected>Pembimbing Ekstrakulikuler</option>
                    @foreach($direktoriGuru as $guru)
                    <option value="{{ $guru->id_guru }}">{{ $guru->nama_guru }}</option>
                    @endforeach
                </select>
                <textarea class="textarea textarea-success w-full" placeholder="Deskripsi Ekstrakulikuler"
                    name="deskripsi_ekstrakurikuler"></textarea>
                <input type="text" class="input input-bordered input-success w-full"
                    placeholder="Tempat Ekstrakulikuler" name="tempat_ekstrakurikuler" />
                <input type="text" class="input input-bordered input-success w-full"
                    placeholder="Jadwal Ekstrakulikuler" name="jadwal_ekstrakurikuler" />
            </div>
            <div class="flex justify-end items-end mt-10 gap-4">
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
<!-- Modal CREATE end -->

@endsection