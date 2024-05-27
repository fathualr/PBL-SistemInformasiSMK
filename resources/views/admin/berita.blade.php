@extends('layouts.mainAdmin')

@section('main-content')

<div class="grid grid-cols-9 rounded-md">

    @include('shared.success-message')
    @include('shared.error-message')
    <div class="col-span-2 my-4 mx-5 row-start-2">
        <h3 class="font-bold text-lg">Pengelolaan Berita</h3>
    </div>

    <!-- Modal -->
    <div class="col-span-2 row-start-3 mx-5">
        <button class="btn btn-outline w-full hover:animate-pulse" onclick="my_modal_add.showModal()">
            <i class="fas fa-plus text-xl"></i>
            Tambah Berita
        </button>
    </div>
    <!-- Modal -->

    <!-- Search Bar -->
    <div class="col-span-2 col-start-7 row-start-3">
        <label class="input input-bordered flex items-center gap-2  focus-within:outline-none">
            <i class="fas fa-magnifying-glass"></i>
            <input type="text" class="grow" placeholder="Cari" />
        </label>
    </div>
    <!-- Search Bar -->

    <!-- Content -->
    <div class="col-span-9 row-start-4">
        <div class="mt-5">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Gambar Headline</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Tanggal Upload</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($berita as $key => $brt)
                    <tr class="hover">
                        <th>{{ $key + 1 }}</th>
                        <td>
                            <p class="truncate w-20 mx-auto">
                                {{ $brt->gambar_headline }}
                            </p>
                        </td>
                        <td>{{ $brt->judul_berita }}</td>
                        <td>
                            @foreach ($brt->kategori as $kategori)
                            {{ $kategori->nama_kategori }}
                            @endforeach
                        </td>
                        <td>{{ $brt->tanggal_berita }}</td>
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
                                            onclick="my_modal_edit_{{ $brt->id_berita }}.showModal()">
                                            <i class="fas fa-pen-to-square"></i>
                                            Edit
                                        </button>
                                    </li>
                                    <!-- Edit -->
                                    <!-- View -->
                                    <li>
                                        <button class="btn btn-ghost w-full hover:animate-pulse"
                                            onclick="my_modal_view{{ $brt->id_berita }}.showModal()">
                                            <i class="fas fa-circle-info"></i>
                                            Detail
                                        </button>
                                    </li>
                                    <!-- View -->
                                    <!-- Delete -->
                                    <li>
                                        <button class="btn btn-ghost w-full hover:animate-pulse"
                                            onclick="my_modal_delete{{ $brt->id_berita }}.showModal()">
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
                        <th>Gambar Headline</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Tanggal Upload</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <!-- Content -->

    <div class="col-span-3 mt-16 mb-4 mx-5 row-start-5">
        <h3 class="font-bold text-lg">Pengelolaan Komentar Berita</h3>
    </div>

    <!-- Content -->
    <div class="col-span-9 row-start-6">
        <div class="overflow-x-auto mt-5 px-16">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Judul Berita</th>
                        <th>Nama</th>
                        <th>Komentar</th>
                        <th>Waktu</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($komentar as $key => $kmt)
                    <tr class="hover">
                        <th>{{ $key + 1 }}</th>
                        <td>{{ $kmt->berita->judul_berita }}</td>
                        <td>{{ $kmt->nama_komentar }}</td>
                        <td class="truncate">
                            {{ $kmt->teks_komentar }}
                        </td>
                        <td>{{ $kmt->created_at->format('d M Y H:i:s') }}</td>
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
                                    <!-- View -->
                                    <li>
                                        <button class="btn btn-ghost w-full hover:animate-pulse"
                                            onclick="my_modal_view_komentar{{ $kmt->id_komentar }}.showModal()">
                                            <i class="fas fa-circle-info"></i>
                                            Detail
                                        </button>
                                    </li>
                                    <!-- View -->
                                    <!-- Delete -->
                                    <li>
                                        <button class="btn btn-ghost w-full hover:animate-pulse"
                                            onclick="my_modal_delete_komentar{{ $kmt->id_komentar }}.showModal()">
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
                        <th>Judul Berita</th>
                        <th>Nama</th>
                        <th>Komentar</th>
                        <th>Waktu</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <!-- Content -->
</div>

<!-- Modal CREATE -->
<dialog id="my_modal_add" class="modal">
    <div class="modal-box max-w-5xl">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Tambah Berita</h3>
        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-success"></div>
            <div class="divider"></div>
        </div>

        <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid">
                <div class="label">
                    <span class="label-text">Judul:</span>
                </div>
                <input type="text" class="input input-bordered input-success w-full" placeholder="Judul berita"
                    name="judul_berita" />
                @error('judul_berita')
                <div class="label">
                    <span class="label-text-alt text-red-500">{{ $message }}</span>
                </div>
                @enderror
                <div class="label">
                    <span class="label-text">Gambar Headline:</span>
                </div>
                <input type="file" class="file-input file-input-bordered file-input-success w-full"
                    placeholder="Pilih gambar berita" name="gambar_headline" />
                @error('gambar_headline')
                <div class="label">
                    <span class="label-text-alt text-red-500">{{ $message }}</span>
                </div>
                @enderror
                <div class="label">
                    <span class="label-text">Gambar Berita:</span>
                </div>
                <div class="grid gap-2" id="fileInputs">
                    <input type="file" class="file-input file-input-bordered file-input-success w-full"
                        placeholder="Pilih gambar berita" name="gambar_berita[]" />
                </div>
                @error('gambar_berita[]')
                <div class="label">
                    <span class="label-text-alt text-red-500">{{ $message }}</span>
                </div>
                @enderror
                <button type="button" id="btnAddFile" class="btn no-animation btn-sm mt-3">Tambah Gambar</button>
                <div class="label">
                    <span class="label-text">Isi Berita:</span>
                </div>
                <textarea class="" id="editor" placeholder="Isi berita" name="isi_berita"></textarea>
                @error('isi_berita')
                <div class="label">
                    <span class="label-text-alt text-red-500">{{ $message }}</span>
                </div>
                @enderror
                <div class="label">
                    <span class="label-text">Kategori:</span>
                </div>
                <div class="grid gap-2" id="textInputContainer">
                    <input type="text" class="input input-bordered input-success w-full" placeholder="Kategori berita"
                        name="kategori_berita[]" />
                    @error('kategori_berita[]')
                    <div class="label">
                        <span class="label-text-alt text-red-500">{{ $message }}</span>
                    </div>
                    @enderror
                </div>
                <button type="button" id="btnAddText" class="btn no-animation btn-sm mt-3">Tambah Kategori</button>
                <div class="label">
                    <span class="label-text">Tanggal Berita:</span>
                </div>
                <input type="date" class="input input-bordered input-success w-full" placeholder=""
                    name="tanggal_berita" />
                @error('tanggal_berita')
                <div class="label">
                    <span class="label-text-alt text-red-500">{{ $message }}</span>
                </div>
                @enderror
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

<!-- MODAL BERITA-->
@foreach($berita as $brt)
<!-- Modal EDIT -->
<dialog id="my_modal_edit_{{ $brt->id_berita }}" class="modal">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Edit Berita</h3>
        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-success"></div>
            <div class="divider"></div>
        </div>

        <form action="{{ route('berita.update', $brt->id_berita) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="grid">

                <div class="label">
                    <span class="label-text">Judul:</span>
                </div>
                <input type="text" class="input input-bordered input-success w-full" value="{{ $brt->judul_berita }}"
                    name="judul_berita" />
                @error('judul_berita')
                <div class="label">
                    <span class="label-text-alt text-red-500">{{ $message }}</span>
                </div>
                @enderror

                <div class="label">
                    <span class="label-text">Gambar Headline:</span>
                </div>
                <input type="file" class="file-input file-input-bordered file-input-success w-full"
                    placeholder="Pilih gambar berita" name="gambar_headline" />
                @error('gambar_headline')
                <div class="label">
                    <span class="label-text-alt text-red-500">{{ $message }}</span>
                </div>
                @enderror

                <div class="label">
                    <span class="label-text">Gambar Berita:</span>
                </div>
                <button type="button" class="btn no-animation btn-sm"
                    onclick="my_modal_view_gambar{{ $brt->id_berita }}.showModal()">Edit Gambar</button>

                <div class="label">
                    <span class="label-text">Isi Berita:</span>
                </div>
                <textarea class="textarea textarea-success w-full" placeholder="Isi berita"
                    name="isi_berita">{{ $brt->isi_berita }}</textarea>
                @error('isi_berita')
                <div class="label">
                    <span class="label-text-alt text-red-500">{{ $message }}</span>
                </div>
                @enderror

                <div class="label">
                    <span class="label-text">Kategori:</span>
                </div>
                <button type="button" class="btn no-animation btn-sm"
                    onclick="my_modal_view_kategori{{ $brt->id_berita }}.showModal()">Edit Kategori</button>

                <div class="label">
                    <span class="label-text">Tanggal Berita:</span>
                </div>
                <input type="date" class="input input-bordered input-success w-full" value="{{ $brt->tanggal_berita }}"
                    name="tanggal_berita" />
                @error('tanggal_berita')
                <div class="label">
                    <span class="label-text-alt text-red-500">{{ $message }}</span>
                </div>
                @enderror

            </div>
            <div class="flex justify-end items-end mt-10 gap-4">
                <button type="submit"
                    class="btn bg-elm w-60 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
                    <i class=" fas fa-plus"></i>
                    Simpan perubahan
                </button>
            </div>
        </form>

    </div>
</dialog><!-- Modal EDIT end -->

<!-- Modal EDIT Gambar -->
<dialog id="my_modal_view_gambar{{ $brt->id_berita }}" class="modal">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Edit Gambar Berita ({{ $brt->judul_berita }})</h3>
        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-success"></div>
            <div class="divider"></div>
        </div>

        <div class="label">
            <span class="label-text">Gambar:</span>
        </div>
        <div class="grid gap-2" id="textInputContainer">
            @foreach ($brt->gambar as $gambar)
            <form action="{{ route('gambarBerita.destroy', $gambar->id_gambar) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="flex gap-1">
                    <input type="text" class="input input-bordered input-success w-full" placeholder="Gambar berita"
                        value="{{ $gambar->tautan_gambar }}" name="gambar_berita[]" disabled />
                    <button class="btn btn-square btn-outline btn-error btn-remove">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </form>
            @endforeach
        </div>
        <form action="{{ route('gambarBerita.update', $brt->id_berita) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="label">
                <span class="label-text">Tambah Gambar:</span>
            </div>
            <div class="flex gap-1">
                <input type="file" class="file-input file-input-bordered file-input-success w-full"
                    placeholder="Pilih gambar berita" name="tautan_gambar" />
                <button type="submit" class="btn btn-square btn-outline btn-success btn-remove">
                    <i class="fas fa-plus text-xl"></i>
                </button>
            </div>
        </form>

    </div>
</dialog><!-- Modal EDIT Gambar end -->

<!-- Modal EDIT kategori -->
<dialog id="my_modal_view_kategori{{ $brt->id_berita }}" class="modal">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Edit Kategori Berita ({{ $brt->judul_berita }})</h3>
        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-success"></div>
            <div class="divider"></div>
        </div>

        <div class="label">
            <span class="label-text">Kategori:</span>
        </div>
        <div class="grid gap-2" id="textInputContainer">
            @foreach ($brt->kategori as $kategori)
            <form action="{{ route('kategoriBerita.destroy', $kategori->id_kategori) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('DELETE')
                <div class="flex gap-1">
                    <input type="text" class="input input-bordered input-success w-full" placeholder="Kategori berita"
                        value="{{ $kategori->nama_kategori }}" name="kategori_berita[]" disabled />
                    <button type="submit" class="btn btn-square btn-outline btn-error btn-remove">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </form>
            @endforeach
        </div>
        <form action="{{ route('kategoriBerita.update', $brt->id_berita) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="label">
                <span class="label-text">Tambah Kategori:</span>
            </div>
            <div class="flex gap-1">
                <input type="text" class="input input-bordered input-success w-full" placeholder="Kategori berita"
                    name="nama_kategori" />
                <button type="submit" class="btn btn-square btn-outline btn-success btn-remove">
                    <i class="fas fa-plus text-xl"></i>
                </button>
            </div>
        </form>

    </div>
</dialog><!-- Modal EDIT Kategori end -->

<!-- Modal VIEW -->
<dialog id="my_modal_view{{ $brt->id_berita }}" class="modal">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Detail Berita</h3>
        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-success"></div>
            <div class="divider"></div>
        </div>

        <div class="grid">

            <div class="label">
                <span class="label-text">Judul:</span>
            </div>
            <input type="text" class="input input-bordered input-success w-full" value="{{ $brt->judul_berita }}"
                name="judul_berita" disabled />

            <div class="label">
                <span class="label-text">Gambar Headline:</span>
            </div>
            <input type="text" class="input input-bordered input-success w-full" placeholder="Kategori berita"
                value="{{ $brt->gambar_headline }}" name="gambar_headline" disabled />

            <div class="label">
                <span class="label-text">Gambar Berita:</span>
            </div>
            <div class="grid gap-2">
                @if ($brt->gambar->isEmpty())
                <div class="flex justify-center">
                    <p class="text-xs text-red-500">Tidak ada gambar yang tersedia.</p>
                </div>
                @else
                @foreach ($brt->gambar as $gambar)
                <input type="text" class="input input-bordered input-success w-full" placeholder="Kategori berita"
                    value="{{ $gambar->tautan_gambar }}" name="tautan_gambar" disabled />
                @endforeach
                @endif
            </div>

            <div class="label">
                <span class="label-text">Isi Berita:</span>
            </div>
            <textarea class="textarea textarea-success w-full" placeholder="Isi berita" name="isi_berita"
                disabled>{{ $brt->isi_berita }}</textarea>

            <div class="label">
                <span class="label-text">Kategori:</span>
            </div>
            <div class="grid gap-2">
                @if ($brt->kategori->isEmpty())
                <div class="flex justify-center">
                    <p class="text-xs text-red-500">Tidak ada kategori yang tersedia.</p>
                </div>
                @else
                @foreach ($brt->kategori as $kategori)
                <input type="text" class="input input-bordered input-success w-full" placeholder="Kategori berita"
                    value="{{ $kategori->nama_kategori }}" name="kategori_berita" disabled />
                @endforeach
                @endif
            </div>

            <div class="label">
                <span class="label-text">Tanggal Berita:</span>
            </div>
            <input type="date" class="input input-bordered input-success w-full" value="{{ $brt->tanggal_berita }}"
                name="tanggal_berita" disabled />

        </div>
    </div>
</dialog><!-- Modal VIEW end -->

<!-- Modal DELETE -->
<dialog id="my_modal_delete{{ $brt->id_berita }}" class="modal">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Hapus Berita</h3>
        <div class="flex justify-end items-end gap-4">
            <form action="{{ route('berita.destroy', $brt->id_berita) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="btn bg-error w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-error">
                    Hapus
                </button>
            </form>
        </div>
    </div>
</dialog><!-- Modal DELETE end -->
@endforeach
<!-- MODAL BERITA end-->

<!-- MODAL KOMENTAR BERITA -->
@foreach($komentar as $kmt)
<!-- Modal VIEW -->
<dialog id="my_modal_view_komentar{{ $kmt->id_komentar }}" class="modal">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Detail Komentar Berita</h3>
        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-success"></div>
            <div class="divider"></div>
        </div>
        <div class="grid">
            <div class="label">
                <span class="label-text">Judul:</span>
            </div>
            <input type="text" class="input input-bordered input-success w-full"
                value="{{ $kmt->berita->judul_berita }}" disabled />
            <div class="label">
                <span class="label-text">Nama:</span>
            </div>
            <input type="text" class="input input-bordered input-success w-full" value="{{ $kmt->nama_komentar }}"
                disabled />
            <div class="label">
                <span class="label-text">Komentar:</span>
            </div>
            <input type="text" class="input input-bordered input-success w-full" value="{{ $kmt->teks_komentar }}"
                disabled />
            <div class="label">
                <span class="label-text">Waktu:</span>
            </div>
            <input type="text" class="input input-bordered input-success w-full" value="{{ $kmt->created_at }}"
                disabled />
        </div>
    </div>
</dialog><!-- Modal VIEW end -->

<!-- Modal DELETE -->
<dialog id="my_modal_delete_komentar{{ $kmt->id_komentar }}" class="modal">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Hapus Komentar Berita</h3>
        <div class="flex justify-end items-end gap-4">
            <form action="{{ route('komentarBerita.destroy', $kmt->id_komentar) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="btn bg-error w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-error">
                    Hapus
                </button>
            </form>
        </div>
    </div>
</dialog><!-- Modal DELETE end -->
<!-- Modal KOMENTAR BERITA end -->
@endforeach

@endsection