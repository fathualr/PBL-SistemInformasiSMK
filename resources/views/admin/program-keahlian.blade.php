@extends('layouts.mainAdmin')

@section('main-content')



@include('shared.success-message')
@include('shared.error-message')
<!-- Title -->
<div class="col-span-3 my-4 mx-5 row-start-2">
    <h3 class="font-bold text-lg">Program Keahlian</h3>
</div>
<!-- Title -->

<!-- Modal -->
<div class="flex justify-between items-center mx-5">
    <div class="flex items-center">
        <button class="btn btn-outline hover:animate-pulse" onclick="my_modal_add.showModal()">
            <i class="fa-solid fa-graduation-cap"></i>
            Tambah Program Keahlian
        </button>
    </div>
    <div class="flex items-center">
        <div class="relative hidden md:flex mr-2">
            <select onchange="window.location.href=this.value" class="select border-b-2 border-base-300">
                <option value="{{ route('admin.programKeahlian.index', ['perPage' => 10]) }}" {{ request()->get('perPage') == 10 ? 'selected' : '' }}>10</option>
                <option value="{{ route('admin.programKeahlian.index', ['perPage' => 25]) }}" {{ request()->get('perPage') == 25 ? 'selected' : '' }}>25</option>
                <option value="{{ route('admin.programKeahlian.index', ['perPage' => 50]) }}" {{ request()->get('perPage') == 50 ? 'selected' : '' }}>50</option>
                <option value="{{ route('admin.programKeahlian.index', ['perPage' => 75]) }}" {{ request()->get('perPage') == 75 ? 'selected' : '' }}>75</option>
                <option value="{{ route('admin.programKeahlian.index', ['perPage' => 100]) }}" {{ request()->get('perPage') == 100 ? 'selected' : '' }}>100</option>
            </select>
        </div>
        <form action="{{ route('admin.programKeahlian.index') }}" method="GET">
            <label class="input input-bordered flex items-center gap-2 focus-within:outline-none">
                <i class="fas fa-magnifying-glass"></i>
                <input type="text" class="grow" name="search" placeholder="Cari Program Keahlian" />
            </label>
        </form>
    </div>
</div>
<!-- Modal -->

<!-- Content -->
<div class="grid grid-cols-9 shadow-xl rounded-md mt-5">
    <div class="col-span-9 row-start-4">
        <div class="mt-5">
            <table class="table border text-center">
                <!-- head -->
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Program Keahlian</th>
                        <th>Deskripsi Program Keahlian</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($programKeahlian as $key => $program)
                    <tr class="hover">
                        <th class="w-8">
                            {{ ($programKeahlian->currentPage() - 1) * $programKeahlian->perPage() + $key + 1 }}
                        </th>
                        <td class="w-64">{{ $program->nama_program }}</td>
                        <td class="">
                            <p class="truncate w-48 mx-auto">{{ $program->deskripsi_program }}</p>
                        </td>
                        <td class="">
                            <details class="dropdown mx-auto">
                                <summary tabindex="0" role="button" class="btn btn-ghost button w-20">
                                    <i class="fas fa-circle text-[0.5rem] circle-1 transition-all duration-500"></i>
                                    <i class="fas fa-circle text-[0.5rem] circle-2 transition-all duration-500"></i>
                                    <i class="fas fa-circle text-[0.5rem] circle-3 transition-all duration-500"></i>
                                    <i class="fas fa-times font-bold text-xl hidden transition-all duration-500"></i>
                                </summary>
                                <ul tabindex="0" class="dropdown-content menu p-2 z-[1] shadow bg-base-100 rounded-box w-max absolute">
                                    <!-- Edit -->
                                    <li>
                                        <button class="btn btn-ghost w-full hover:animate-pulse" onclick="window['my_modal_edit{{ $program->id_program }}'].showModal()">
                                            <i class="fas fa-pen-to-square"></i>
                                            Edit
                                        </button>
                                    </li>
                                    <!-- Edit -->
                                    <!-- View -->
                                    <li>
                                        <button class="btn btn-ghost w-full hover:animate-pulse" onclick="window['my_modal_view{{ $program->id_program }}'].showModal()">
                                            <i class="fas fa-circle-info"></i>
                                            Detail
                                        </button>
                                    </li>
                                    <!-- View -->
                                    <!-- Delete -->
                                    <li>
                                        <button class="btn btn-ghost w-full hover:animate-pulse" onclick="window['my_modal_delete{{ $program->id_program }}'].showModal()">
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
                        <th>Nama</th>
                        <Th>Deskripsi</Th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
            </table>

        </div>
    </div>
</div>

<!-- Pagination -->
<div class="join flex justify-center my-5">
    @if($programKeahlian->previousPageUrl())
    <a href="{{ $programKeahlian->previousPageUrl() }}" class="join-item btn">«</a>
    @else
    <button class="join-item btn disabled">«</button>
    @endif
    <button class="join-item btn">Page {{ $programKeahlian->currentPage() }}</button>
    @if($programKeahlian->nextPageUrl())
    <a href="{{ $programKeahlian->nextPageUrl() }}" class="join-item btn">»</a>
    @else
    <button class="join-item btn disabled">»</button>
    @endif
</div>


<!-- Tambah Program Keahlian -->
<dialog id="my_modal_add" class="modal">
    <div class="modal-box w-11/12 max-w-5xl">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Tambah Program Keahlian</h3>
        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-primary"></div>
            <div class="divider"></div>
        </div>

        <form action="{{ route('ProgramKeahlian.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <label class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" name="nama_program" class="grow bg-transparent py-2" placeholder="Nama Program" />
            </label>
            <textarea class="input border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none grow py-2" placeholder="Deskripsi Program" name="deskripsi_program"></textarea>
            <textarea class="input border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none grow py-2" placeholder="Deskripsi Peluang Kerja" name="deskripsi_peluang_kerja"></textarea>
            <textarea class="input border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none grow py-2" placeholder="Visi" name="visi_program"></textarea>
            <textarea class="input border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none grow py-2" placeholder="Misi" name="misi_program"></textarea>
            <textarea class="input border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none grow py-2" placeholder="Tujuan Program" name="tujuan_program"></textarea>
            <textarea class="input border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none grow py-2" placeholder="Sasaran Program" name="sasaran_program"></textarea>
            <label class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="file" name="logo_program" id="tautan_dokumen" class="grow file-input file-input-success border-none bg-transparent py-2
                    file:mr-4 file:px-4 file:rounded-full file:border-0
                    file:text-sm file:font-semibold file:bg-blue-500 file:text-white
                    hover:file:bg-transparent hover:file:text-blue-400" accept="image/*" required />
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
<!-- Tambah Program Keahlian -->

<!-- Edit Modal -->
@foreach($programKeahlian as $index => $program)
<dialog id="my_modal_edit{{ $program->id_program }}" class="modal">
    <div class="modal-box w-12/12 max-w-5xl">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Edit Data Program Keahlian</h3>
        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-primary"></div>
            <div class="divider"></div>
        </div>

        <form action="{{ route('ProgramKeahlian.update', $program->id_program)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="grid gap-5">
                <span class="label-text -mb-4">Nama Program :</span>
                <label class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 w-full focus-within:outline-none">
                    <input type="text" name="nama_program" class="grow bg-transparent py-2" placeholder="Nama Program" value="{{ $program->nama_program }}" />
                </label>
                <span class="label-text -mb-4">Deskripsi Program Keahlian :</span>
                <textarea class="input border-2 border-blue-400 flex items-center gap-2 w-full focus-within:outline-none grow h-28 py-2" placeholder="Deskripsi Program" name="deskripsi_program">{{ $program->deskripsi_program }}</textarea>
                <span class="label-text -mb-4">Deskripsi Peluang Kerja :</span>
                <textarea class="input border-2 border-blue-400 flex items-center gap-2 w-full focus-within:outline-none grow h-28 py-2" placeholder="Deskripsi Peluang Kerja" name="deskripsi_peluang_kerja">{{ $program->deskripsi_peluang_kerja }}</textarea>
                <span class="label-text -mb-4">Visi Program :</span>
                <textarea class="input border-2 border-blue-400 flex items-center gap-2 w-full focus-within:outline-none grow h-28 py-2" placeholder="Visi" name="visi_program">{{ $program->visi_program }}</textarea>
                <span class="label-text -mb-4">Misi Program :</span>
                <textarea class="input border-2 border-blue-400 flex items-center gap-2 w-full focus-within:outline-none grow h-28 py-2" placeholder="Misi" name="misi_program">{{ $program->misi_program }}</textarea>
                <span class="label-text -mb-4">Tujuan Program :</span>
                <textarea class="input border-2 border-blue-400 flex items-center gap-2 w-full focus-within:outline-none grow h-28 py-2" placeholder="Tujuan Program" name="tujuan_program">{{ $program->tujuan_program }}</textarea>
                <span class="label-text -mb-4">Sasaran Program :</span>
                <textarea class="input border-2 border-blue-400 flex items-center gap-2 w-full focus-within:outline-none grow h-28 py-2" placeholder="Sasaran Program" name="sasaran_program">{{ $program->sasaran_program }}</textarea>
                <span class="label-text -mb-4">Logo Program :</span>
                <label class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                    <input type="file" name="logo_program" id="tautan_dokumen" class="grow file-input file-input-success border-none bg-transparent py-2
                    file:mr-4 file:px-4 file:rounded-full file:border-0
                    file:text-sm file:font-semibold file:bg-blue-500 file:text-white
                    hover:file:bg-transparent hover:file:text-blue-400" accept="image/*" required />
                </label>
                <button type="button" class="btn no-animation btn-sm w-full" onclick="my_modal_edit_capaian{{ $program->id_program }}.showModal()">Edit Capaian
                    Pembelajaran</button>
                <button type="button" class="btn no-animation btn-sm w-full" onclick="my_modal_edit_peluang{{ $program->id_program }}.showModal()">Edit Peluang Kerja</button>
                <div class="flex justify-end items-end mt-20 gap-4">
                    <button type="submit" class="btn bg-elm w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
                        <i class=" fas fa-pen-to-square"></i>
                        Edit
                    </button>
                </div>
            </div>
        </form>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>

<!-- Edit Capaian Modal -->
<dialog id="my_modal_edit_capaian{{ $program->id_program }}" class="modal">
    <div class="modal-box w-12/12 max-w-5xl">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Edit Data Capaian Pembelajaran</h3>
        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-primary"></div>
            <div class="divider"></div>
        </div>

        <form action="{{ route('CapaianPembelajaran.update', $program->id_program) }}" method="post">
            @csrf
            @method('patch')
            <span class="label-text -mb-4">Deskripsi Capaian Pembelajaran :</span>
            <textarea class="input border-2 border-blue-400 flex items-center gap-2 mb-5 w-full h-28 focus-within:outline-none grow py-2" placeholder="Deskripsi Capaian Pembelajaran" name="deskripsi_capaian_pembelajaran">{{ $program->capaianPembelajaran->deskripsi_capaian_pembelajaran }}</textarea>
            <span class="label-text -mb-4">Aspek Sikap :</span>
            <textarea class="input border-2 border-blue-400 flex items-center gap-2 mb-5 w-full h-28 focus-within:outline-none grow py-2" placeholder="Aspek Sikap" name="aspek_sikap">{{ $program->capaianPembelajaran->aspek_sikap }}</textarea>
            <span class="label-text -mb-4">Aspek Pengetahuan :</span>
            <textarea class="input border-2 border-blue-400 flex items-center gap-2 mb-5 w-full h-28 focus-within:outline-none grow py-2" placeholder="Aspek Pengetahuan" name="aspek_pengetahuan">{{ $program->capaianPembelajaran->aspek_pengetahuan }}</textarea>
            <span class="label-text -mb-4">Aspek Keterampilan Umum :</span>
            <textarea class="input border-2 border-blue-400 flex items-center gap-2 mb-5 w-full h-28 focus-within:outline-none grow py-2" placeholder="Aspek Keterampilan Umum" name="aspek_keterampilan_umum">{{ $program->capaianPembelajaran->aspek_keterampilan_umum }}</textarea>
            <span class="label-text -mb-4">Aspek Keterampilan Khusus :</span>
            <textarea class="input border-2 border-blue-400 flex items-center gap-2 mb-5 w-full h-28 focus-within:outline-none grow py-2" placeholder="Aspek Keterampilan Khusus" name="aspek_keterampilan_khusus">{{ $program->capaianPembelajaran->aspek_keterampilan_khusus }}</textarea>
            <div class="flex justify-end items-end mt-20 gap-4">
                <button type="submit" class="btn bg-elm w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
                    <i class="fas fa-pen-to-square"></i>
                    Simpan
                </button>
            </div>
        </form>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>

<!-- Edit Peluang Modal -->
<dialog id="my_modal_edit_peluang{{ $program->id_program }}" class="modal">
    <div class="modal-box w-12/12 max-w-5xl">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Edit Data Peluang Kerja</h3>
        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-primary"></div>
            <div class="divider"></div>
        </div>
        <div class="grid gap-2">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th>Peluang Kerja</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($program->peluangKerja as $peluang)
                    <form action="{{ route('PeluangKerja.destroy', $peluang->id_peluang_kerja) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <tr>
                            <td>{{ $peluang->peluang_kerja }}</td>
                            <td>{{ $peluang->deskripsi_pekerjaan }}</td>
                            <td>
                                <button type="submit" class="btn btn-square btn-outline btn-error btn-remove">
                                    <i class="fas fa-times text-lg"></i>
                                </button>
                            </td>
                        </tr>
                    </form>
                    @endforeach

                </tbody>
            </table>
        </div>

        <form class="grid gap-5" action="{{ route('PeluangKerja.update', $program->id_program) }}" method="POST">
            @csrf
            @method('PATCH')
            <span class="label-text -mb-4">Tambah Peluang :</span>
            <label class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 w-full focus-within:outline-none">
                <input type="text" name="peluang_kerja" class="grow bg-transparent py-2" placeholder="Peluang Kerja" />
            </label>
            <span class="label-text -mb-4">Deskripsi Peluang Kerja :</span>
            <textarea class="input border-2 border-blue-400 flex items-center gap-2 w-full focus-within:outline-none grow py-2" placeholder="Deskripsi Pekerjaan" name="deskripsi_pekerjaan"></textarea>
            <div class="flex justify-end items-end gap-4">
                <button type="submit" class="btn bg-elm w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
                    <i class="fas fa-plus"></i>
                    Tambah
                </button>
            </div>
        </form>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>
<!-- Edit Modal -->

<!-- View Modal -->
<dialog id="my_modal_view{{ $program->id_program }}" class="modal">
    <div class="modal-box w-12/12 max-w-7xl">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Info Detail Data</h3>
        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-primary"></div>
            <div class="divider"></div>
        </div>
        <div class="grid">
            <!-- Program Keahlian -->
            <h3 class="font-bold text-lg text-center">Program Keahlian</h3>
            <figure>
                <div class="avatar flex justify-center items-center my-5">
                    <div class="w-40 rounded-full border-2">
                        <img src="{{ asset('storage/'.$program->logo_program) }}" />
                    </div>
                </div>
            </figure>
            <span class="my-3">Tautan Foto</span>
            <label class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 w-full focus-within:outline-none">
                <i class="fas fa-link"></i>
                <input type="text" name="nama_program" class="grow bg-transparent py-2" value="{{ $program->logo_program }}" readonly />
            </label>
            <span class="my-3">Nama Program Keahlian</span>
            <label class="input bg-transparent border-2 border-blue-400 flex items-center gap-2 w-full focus-within:outline-none">
                <input type="text" name="nama_program" class="grow bg-transparent py-2" value="{{ $program->nama_program }}" readonly />
            </label>
            <span class="my-3">Deskripsi Program Keahlian</span>
            <textarea class="input border-2 border-blue-400 flex items-center gap-2 w-full focus-within:outline-none grow py-2" placeholder="Deskripsi Program" name="deskripsi_program" readonly>{{ $program->deskripsi_program }}</textarea>
            <span class="my-3">Deskripsi Peluang Kerja</span>
            <textarea class="input border-2 border-blue-400 flex items-center gap-2 w-full focus-within:outline-none grow py-2" placeholder="Deskripsi Peluang Kerja" name="deskripsi_peluang_kerja" readonly>{{ $program->deskripsi_peluang_kerja }}</textarea>
            <span class="my-3">Visi Program Keahlian</span>
            <textarea class="input border-2 border-blue-400 flex items-center gap-2 w-full focus-within:outline-none grow py-2" placeholder="Visi" name="visi_program" readonly>{{ $program->visi_program }}</textarea>
            <span class="my-3">Misi Program Keahlian</span>
            <textarea class="input border-2 border-blue-400 flex items-center gap-2 w-full focus-within:outline-none grow py-2" placeholder="Misi" name="misi_program" readonly>{{ $program->misi_program }}</textarea>
            <span class="my-3">Tujuan Program Keahlian</span>
            <textarea class="input border-2 border-blue-400 flex items-center gap-2 w-full focus-within:outline-none grow py-2" placeholder="Tujuan Program" name="tujuan_program" readonly>{{ $program->tujuan_program }}</textarea>
            <span class="my-3">Sasaran Program Keahlian</span>
            <textarea class="input border-2 border-blue-400 flex items-center gap-2 w-full focus-within:outline-none grow py-2" placeholder="Sasaran Program" name="sasaran_program" readonly>{{ $program->sasaran_program }}</textarea>
            <!-- Program Keahlian -->

            <!-- Capaian Pembelajaran -->
            <h3 class="font-bold text-lg text-center my-5 divider">Capaian Pembelajaran</h3>
            <h1 class="mx-5 text-base">ASPEK SIKAP</h1>
            <textarea class="input border-2 border-blue-400 flex items-center gap-2 mb-5 w-full h-48 focus-within:outline-none grow py-2" placeholder="Deskripsi Program" name="deskripsi_program" readonly>{{ $program->capaianPembelajaran->aspek_sikap }}</textarea>
            <h1 class="mx-5 text-base">ASPEK PENGETAHUAN</h1>
            <textarea class="input border-2 border-blue-400 flex items-center gap-2 mb-5 w-full h-48 focus-within:outline-none grow py-2" placeholder="Deskripsi Program" name="deskripsi_program" readonly>{{ $program->capaianPembelajaran->aspek_pengetahuan }}</textarea>
            <h1 class="mx-5 text-base">ASPEK KETERAMPILAN UMUM</h1>
            <textarea class="input border-2 border-blue-400 flex items-center gap-2 mb-5 w-full h-48 focus-within:outline-none grow py-2" placeholder="Deskripsi Program" name="deskripsi_program" readonly>{{ $program->capaianPembelajaran->aspek_keterampilan_umum }}</textarea>
            <h1 class="mx-5 text-base">ASPEK KETERAMPILAN KHUSUS</h1>
            <textarea class="input border-2 border-blue-400 flex items-center gap-2 mb-5 w-full h-48 focus-within:outline-none grow py-2" placeholder="Deskripsi Program" name="deskripsi_program" readonly>{{ $program->capaianPembelajaran->aspek_keterampilan_khusus }}</textarea>
        </div>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>
<!-- View Modal -->

<!-- Delete Modal -->
<dialog id="my_modal_delete{{ $program->id_program }}" class="modal">
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

        <form action="{{ route('ProgramKeahlian.destroy', $program->id_program) }}" method="POST">
            @csrf
            @method('DELETE')
            <h3 class="font-bold text-lg flex justify-center items-center">Yakin Ingin Menghapus Data Ini ?</h3>
            <div class="flex justify-end items-end mt-10 gap-4">
                <button type="submit" class="btn bg-error w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-error">
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
@endforeach
<!-- Delete Modal -->

@endsection