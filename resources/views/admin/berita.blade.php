@extends('layouts.mainAdmin')

@section('main-content')


@include('shared.success-message')
@include('shared.error-message')
<div>
    <h3 class="text-black font-bold text-xl mx-5 my-2">Pengelolaan Berita</h3>
</div>

<!-- Modal -->
<div class="flex justify-between items-center mx-5">
    <div class="flex items-center">
        <button class="btn btn-outline hover:animate-pulse" onclick="my_modal_add.showModal()">
            <i class="fas fa-plus"></i>
            Tambah Berita
        </button>
    </div>
    <div class="flex items-center">
        <div class="relative hidden md:flex mr-2">
            <select onchange="window.location.href=this.value" class="select border-b-2 border-base-300">
                <option value="{{ route('berita.index', ['perPage' => 10]) }}" {{ request()->get('perPage') == 5 ? 'selected' : '' }}>5</option>
                <option value="{{ route('berita.index', ['perPage' => 25]) }}" {{ request()->get('perPage') == 10 ? 'selected' : '' }}>10</option>
                <option value="{{ route('berita.index', ['perPage' => 50]) }}" {{ request()->get('perPage') == 25 ? 'selected' : '' }}>25</option>
                <option value="{{ route('berita.index', ['perPage' => 75]) }}" {{ request()->get('perPage') == 50 ? 'selected' : '' }}>50</option>
                <option value="{{ route('berita.index', ['perPage' => 100]) }}" {{ request()->get('perPage') == 75 ? 'selected' : '' }}>75</option>
            </select>
        </div>
        <form action="{{ route('berita.index') }}" method="GET">
            <label class="input input-bordered flex items-center gap-2 focus-within:outline-none">
                <i class="fas fa-magnifying-glass"></i>
                <input type="text" class="grow" name="search" placeholder="Cari Prestasi" />
            </label>
        </form>
    </div>
</div>
<!-- Search Bar -->

<!-- Content -->
<div class="grid grid-cols-9 shadow-xl rounded-md mt-5">
    <div class="col-span-9 row-start-4">
        <div class="mt-5">
            <table class="table border text-center">
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
                        <th>{{ ($berita->currentPage() - 1) * $berita->perPage() + $key + 1 }}</th>
                        <td>
                            <div class="grid justify-items-center">
                                <img class="max-h-20" src="{{ asset('storage/'.$brt->gambar_headline) }}" alt="">
                            </div>
                        </td>
                        <td>{{ $brt->judul_berita }}</td>
                        <td>
                            @foreach ($brt->kategori as $kategori)
                            {{ $kategori->nama_kategori }}
                            @endforeach
                        </td>
                        <td>{{ $brt->tanggal_berita }}</td>
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
                                        <button class="btn btn-ghost w-full hover:animate-pulse" onclick="my_modal_edit_{{ $brt->id_berita }}.showModal()">
                                            <i class="fas fa-pen-to-square"></i>
                                            Edit
                                        </button>
                                    </li>
                                    <!-- Edit -->
                                    <!-- View -->
                                    <li>
                                        <button class="btn btn-ghost w-full hover:animate-pulse" onclick="my_modal_view{{ $brt->id_berita }}.showModal()">
                                            <i class="fas fa-circle-info"></i>
                                            Detail
                                        </button>
                                    </li>
                                    <!-- View -->
                                    <!-- Delete -->
                                    <li>
                                        <button class="btn btn-ghost w-full hover:animate-pulse" onclick="my_modal_delete{{ $brt->id_berita }}.showModal()">
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
</div>

<!-- Pagination -->
<div class="join flex justify-center my-5">
    @if($berita->previousPageUrl())
    <a href="{{ $berita->previousPageUrl() }}" class="join-item btn">«</a>
    @else
    <button class="join-item btn disabled">«</button>
    @endif

    <button class="join-item btn">Page {{ $berita->currentPage() }}</button>

    @if($berita->nextPageUrl())
    <a href="{{ $berita->nextPageUrl() }}" class="join-item btn">»</a>
    @else
    <button class="join-item btn disabled">»</button>
    @endif
</div>




@include('shared.success-message')
@include('shared.error-message')
<div>
    <h3 class="text-black font-bold text-xl mx-5 my-2">Pengelolaan Komentar Berita</h3>
</div>

<!-- Content -->
<div class="grid grid-cols-9 shadow-xl rounded-md mt-5">
    <div class="col-span-9 row-start-4">
        <div class="mt-5">
            <table class="table border text-center">
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
                        <th>{{ ($komentar->currentPage() - 1) * $komentar->perPage() + $key + 1 }}</th>
                        <td>{{ $kmt->berita->judul_berita }}</td>
                        <td>{{ $kmt->nama_komentar }}</td>
                        <td>
                            <p class="truncate w-32">
                                {{ $kmt->teks_komentar }}
                            </p>
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
                                <ul tabindex="0" class="dropdown-content z-50 menu p-2 shadow bg-base-100 rounded-box w-32">
                                    <!-- View -->
                                    <li>
                                        <button class="btn btn-ghost w-full hover:animate-pulse" onclick="my_modal_view_komentar{{ $kmt->id_komentar }}.showModal()">
                                            <i class="fas fa-circle-info"></i>
                                            Detail
                                        </button>
                                    </li>
                                    <!-- View -->
                                    <!-- Delete -->
                                    <li>
                                        <button class="btn btn-ghost w-full hover:animate-pulse" onclick="my_modal_delete_komentar{{ $kmt->id_komentar }}.showModal()">
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
</div>

<!-- Pagination -->
<div class="join flex justify-center my-5">
    @if($komentar->previousPageUrl())
    <a href="{{ $komentar->previousPageUrl() }}" class="join-item btn">«</a>
    @else
    <button class="join-item btn disabled">«</button>
    @endif
    <button class="join-item btn">Page {{ $komentar->currentPage() }}</button>
    @if($komentar->nextPageUrl())
    <a href="{{ $komentar->nextPageUrl() }}" class="join-item btn">»</a>
    @else
    <button class="join-item btn disabled">»</button>
    @endif
</div>



<!-- Modal CREATE -->
<dialog id="my_modal_add" class="modal">
    <div class="modal-box max-w-5xl py-0">
        <div class="sticky top-0 bg-white pt-5">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-0 top-3">
                    <i class="fas fa-times text-2xl"></i>
                </button>
            </form>
            <h3 class="font-bold text-lg">Tambah Berita</h3>
            <div class="grid grid-cols-3 w-52 -mt-5">
                <div class="divider"></div>
                <div class="divider divider-primary"></div>
                <div class="divider"></div>
            </div>
        </div>

        <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid">
                <div class="label">
                    <span class="label-text">Judul Berita :</span>
                </div>
                <input type="text" class="input input-bordered border-2 border-blue-400 w-full" placeholder="Judul berita" name="judul_berita" />
                @error('judul_berita')
                <div class="label">
                    <span class="label-text-alt text-red-500">{{ $message }}</span>
                </div>
                @enderror
                <div class="label">
                    <span class="label-text">Gambar Headline :</span>
                </div>
                <label class="input bg-transparent border-2 border-blue-400 flex items-center mb-5 gap-2 w-full focus-within:outline-none">
                    <input type="file" class="file-input w-full py-2
                    file:mr-4 file:px-4 file:rounded-full file:border-0
                    file:text-sm file:font-semibold file:bg-blue-500 file:text-white
                    hover:file:bg-transparent hover:file:text-blue-400" placeholder="Pilih gambar berita" name="gambar_headline" />
                </label>
                @error('gambar_headline')
                <div class="label">
                    <span class="label-text-alt text-red-500">{{ $message }}</span>
                </div>
                @enderror
                <div class="label">
                    <span class="label-text">Gambar Berita :</span>
                </div>
                <div class="grid gap-2" id="fileInputs">
                </div>
                @error('gambar_berita[]')
                <div class="label">
                    <span class="label-text-alt text-red-500">{{ $message }}</span>
                </div>
                @enderror
                <button type="button" id="btnAddFile" class="btn bg-blue-400 text-white w-full hover:text-blue-400 mt-5">Tambah Gambar</button>
                <div class="label">
                    <span class="label-text">Isi Berita :</span>
                </div>
                <textarea class="textarea border-2 border-blue-400" id="editor" placeholder="Isi berita" name="isi_berita"></textarea>
                @error('isi_berita')
                <div class="label">
                    <span class="label-text-alt text-red-500">{{ $message }}</span>
                </div>
                @enderror
                <div class="label">
                    <span class="label-text">Kategori :</span>
                </div>
                <div class="grid gap-2" id="textInputContainer">
                    @error('kategori_berita[]')
                    <div class="label">
                        <span class="label-text-alt text-red-500">{{ $message }}</span>
                    </div>
                    @enderror
                </div>
                <button type="button" id="btnAddText" class="btn bg-blue-400 text-white w-full hover:text-blue-400 mt-5">Tambah Kategori</button>
                <div class="label">
                    <span class="label-text">Tanggal Berita :</span>
                </div>
                <input type="date" class="input border-2 border-blue-400 w-full" placeholder="" name="tanggal_berita" />
                @error('tanggal_berita')
                <div class="label">
                    <span class="label-text-alt text-red-500">{{ $message }}</span>
                </div>
                @enderror
            </div>
            <div class="flex justify-end items-end my-10 gap-4">
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

<!-- MODAL BERITA-->
@foreach($berita as $brt)
<!-- Modal EDIT -->
<dialog id="my_modal_edit_{{ $brt->id_berita }}" class="modal">
    <div class="modal-box w-11/12 max-w-5xl py-0">
        <div class="sticky top-0 bg-white pt-5">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-0 top-3">
                    <i class="fas fa-times text-2xl"></i>
                </button>
            </form>
            <h3 class="font-bold text-lg">Edit Berita</h3>
            <div class="grid grid-cols-3 w-52 -mt-5">
                <div class="divider"></div>
                <div class="divider divider-primary"></div>
                <div class="divider"></div>
            </div>
        </div>

        <form action="{{ route('berita.update', $brt->id_berita) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="grid">

                <div class="label">
                    <span class="label-text">Judul :</span>
                </div>
                <input type="text" class="input border-2 border-blue-400 w-full" value="{{ $brt->judul_berita }}" name="judul_berita" />
                @error('judul_berita')
                <div class="label">
                    <span class="label-text-alt text-red-500">{{ $message }}</span>
                </div>
                @enderror

                <div class="label">
                    <span class="label-text">Gambar Headline :</span>
                </div>
                <label class="input bg-transparent border-2 border-blue-400 flex items-center mb-5 gap-2 w-full focus-within:outline-none">
                    <input type="file" class="file-input w-full py-2
                    file:mr-4 file:px-4 file:rounded-full file:border-0
                    file:text-sm file:font-semibold file:bg-blue-500 file:text-white
                    hover:file:bg-transparent hover:file:text-blue-400" placeholder="Pilih gambar berita" name="gambar_headline" />
                </label>
                @error('gambar_headline')
                <div class="label">
                    <span class="label-text-alt text-red-500">{{ $message }}</span>
                </div>
                @enderror

                <div class="label">
                    <span class="label-text">Gambar Berita :</span>
                </div>
                <button type="button" class="btn no-animation btn-sm" onclick="my_modal_view_gambar{{ $brt->id_berita }}.showModal()">Edit Gambar</button>

                <div class="label">
                    <span class="label-text">Isi Berita :</span>
                </div>
                <textarea class="textarea border-2 border-blue-400 w-full" id="editor2" placeholder="Isi berita" name="isi_berita">{{ $brt->isi_berita }}</textarea>
                @error('isi_berita')
                <div class="label">
                    <span class="label-text-alt text-red-500">{{ $message }}</span>
                </div>
                @enderror

                <div class="label">
                    <span class="label-text">Kategori :</span>
                </div>
                <button type="button" class="btn no-animation btn-sm" onclick="my_modal_view_kategori{{ $brt->id_berita }}.showModal()">Edit Kategori</button>

                <div class="label">
                    <span class="label-text">Tanggal Berita :</span>
                </div>
                <input type="date" class="input border-2 border-blue-400 w-full" value="{{ $brt->tanggal_berita }}" name="tanggal_berita" />
                @error('tanggal_berita')
                <div class="label">
                    <span class="label-text-alt text-red-500">{{ $message }}</span>
                </div>
                @enderror

            </div>
            <div class="flex justify-end items-end my-10 gap-4">
                <button type="submit" class="btn bg-elm w-60 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
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
<!-- Modal EDIT end -->

<!-- Modal EDIT Gambar -->
<dialog id="my_modal_view_gambar{{ $brt->id_berita }}" class="modal">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Edit Gambar Berita ({{ $brt->judul_berita }})</h3>
        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-primary"></div>
            <div class="divider"></div>
        </div>

        <div class="label">
            <span class="label-text">Gambar :</span>
        </div>
        <div class="grid gap-2" id="textInputContainer">
            @foreach ($brt->gambar as $gambar)
            <form action="{{ route('gambarBerita.destroy', $gambar->id_gambar) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="flex gap-1">
                    <input type="text" class="input input-bordered input-success w-full" placeholder="Gambar berita" value="{{ $gambar->tautan_gambar }}" name="gambar_berita[]" disabled />
                    <button class="btn btn-square btn-outline btn-error btn-remove">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
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
                <span class="label-text">Tambah Gambar :</span>
            </div>
            <div class="flex gap-1">
                <label class="input bg-transparent border-2 border-blue-400 flex items-center mb-5 gap-2 w-full focus-within:outline-none">
                    <input type="file" class="file-input w-full py-2
                    file:mr-4 file:px-4 file:rounded-full file:border-0
                    file:text-sm file:font-semibold file:bg-blue-500 file:text-white
                    hover:file:bg-transparent hover:file:text-blue-400" placeholder="Pilih gambar berita" name="tautan_gambar" />
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
            <div class="divider divider-primary"></div>
            <div class="divider"></div>
        </div>

        <div class="label">
            <span class="label-text">Kategori :</span>
        </div>
        <div class="grid gap-2" id="textInputContainer">
            @foreach ($brt->kategori as $kategori)
            <form action="{{ route('kategoriBerita.destroy', $kategori->id_kategori) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('DELETE')
                <div class="flex gap-1">
                    <input type="text" class="input border-2 border-blue-400 w-full" placeholder="Kategori berita" value="{{ $kategori->nama_kategori }}" name="kategori_berita[]" disabled />
                    <button type="submit" class="btn btn-square btn-outline btn-error btn-remove">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
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
                <span class="label-text">Tambah Kategori :</span>
            </div>
            <div class="flex gap-1">
                <input type="text" class="input border-2 border-blue-400 w-full" placeholder="Kategori berita" name="nama_kategori" />
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
<!-- Modal EDIT Kategori end -->

<!-- Modal VIEW -->
<dialog id="my_modal_view{{ $brt->id_berita }}" class="modal">
    <div class="modal-box w-11/12 max-w-5xl py-0">
        <div class="sticky top-0 bg-white pt-5">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-0 top-3">
                    <i class="fas fa-times text-2xl"></i>
                </button>
            </form>
            <h3 class="font-bold text-lg">Detail Berita</h3>
            <div class="grid grid-cols-3 w-52 -mt-5">
                <div class="divider"></div>
                <div class="divider divider-primary"></div>
                <div class="divider"></div>
            </div>
        </div>

        <div class="grid">

            <div class="label">
                <span class="label-text">Judul :</span>
            </div>
            <input type="text" class="input border-2 border-blue-400 w-full" value="{{ $brt->judul_berita }}" name="judul_berita" readonly />

            <div class="label">
                <span class="label-text">Gambar Headline :</span>
            </div>
            <input type="text" class="input border-2 border-blue-400 w-full" placeholder="Kategori berita" value="{{ $brt->gambar_headline }}" name="gambar_headline" readonly />

            <div class="label">
                <span class="label-text">Gambar Berita :</span>
            </div>
            <div class="grid gap-2">
                @if ($brt->gambar->isEmpty())
                <div class="flex justify-center">
                    <p class="text-xs text-red-500">Tidak ada gambar yang tersedia.</p>
                </div>
                @else
                @foreach ($brt->gambar as $gambar)
                <input type="text" class="input border-2 border-blue-400 w-full" placeholder="Kategori berita" value="{{ $gambar->tautan_gambar }}" name="tautan_gambar" readonly />
                @endforeach
                @endif
            </div>

            <div class="label">
                <span class="label-text">Isi Berita :</span>
            </div>
            <label class="input bg-transparent border-2 border-blue-400 gap-2 mb-5 w-full h-max p-5 focus-within:outline-none">
                <p>{!! $brt->isi_berita !!}</p>
            </label>
            <div class="label">
                <span class="label-text">Kategori :</span>
            </div>
            <div class="grid gap-2">
                @if ($brt->kategori->isEmpty())
                <div class="flex justify-center">
                    <p class="text-xs text-red-500">Tidak ada kategori yang tersedia.</p>
                </div>
                @else
                @foreach ($brt->kategori as $kategori)
                <input type="text" class="input border-2 border-blue-400 w-full" placeholder="Kategori berita" value="{{ $kategori->nama_kategori }}" name="kategori_berita" readonly />
                @endforeach
                @endif
            </div>

            <div class="label">
                <span class="label-text">Tanggal Berita :</span>
            </div>
            <input type="date" class="input border-2 border-blue-400 w-full mb-10" value="{{ $brt->tanggal_berita }}" name="tanggal_berita" readonly />
        </div>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>
<!-- Modal VIEW end -->

<!-- Modal DELETE -->
<dialog id="my_modal_delete{{ $brt->id_berita }}" class="modal">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-3">
                <i class="fas fa-times text-2xl"></i>
            </button>
        </form>
        <h3 class="font-bold text-lg">Hapus Data Berita</h3>
        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-error"></div>
            <div class="divider"></div>
        </div>

        <h3 class="font-bold text-lg flex justify-center items-center">Yakin Ingin Menghapus Data
            Ini ?</h3>
        <div class="flex justify-end items-end gap-4">
            <form action="{{ route('berita.destroy', $brt->id_berita) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="flex justify-end items-end mt-10 gap-4">
                    <button type="submit" class="btn bg-error w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-error">
                        <i class="fas fa-trash"></i> Hapus
                    </button>
                </div>
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
            <div class="divider divider-primary"></div>
            <div class="divider"></div>
        </div>
        <div class="grid">
            <div class="label">
                <span class="label-text">Judul :</span>
            </div>
            <input type="text" class="input border-2 border-blue-400 w-full" value="{{ $kmt->berita->judul_berita }}" readonly />
            <div class="label">
                <span class="label-text">Nama :</span>
            </div>
            <input type="text" class="input border-2 border-blue-400 w-full" value="{{ $kmt->nama_komentar }}" readonly />
            <div class="label">
                <span class="label-text">Komentar :</span>
            </div>
            <input type="text" class="input border-2 border-blue-400 w-full" value="{{ $kmt->teks_komentar }}" readonly />
            <div class="label">
                <span class="label-text">Waktu :</span>
            </div>
            <input type="text" class="input border-2 border-blue-400 w-full" value="{{ $kmt->created_at }}" readonly />
        </div>
    </div>
</dialog>
<!-- Modal VIEW end -->

<!-- Modal DELETE -->
<dialog id="my_modal_delete_komentar{{ $kmt->id_komentar }}" class="modal">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Hapus Komentar Berita</h3>
        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-error"></div>
            <div class="divider"></div>
        </div>

        <h3 class="font-bold text-lg flex justify-center items-center">Yakin Ingin Menghapus Data Ini ?</h3>
        <div class="flex justify-end items-end gap-4">
            <form action="{{ route('komentarBerita.destroy', $kmt->id_komentar) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn bg-error w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-error">
                    <i class=" fas fa-trash"></i>Hapus
                </button>
            </form>
        </div>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog><!-- Modal DELETE end -->
<!-- Modal KOMENTAR BERITA end -->
@endforeach

@endsection