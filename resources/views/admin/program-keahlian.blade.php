@extends('layouts.mainAdmin')

@section('main-content')

<div class="grid grid-cols-9 rounded-md">
    <!-- Title -->
    <div class="col-span-2 my-4 mx-5">
        <h3 class="font-bold text-lg">Program Keahlian</h3>
    </div>
    <!-- Title -->

    <!-- Modal -->
    <div class="col-span-4 row-start-2 grid grid-cols-2 gap-4">
        <details class="dropdown dropdown-right mx-5">
            <summary tabindex="0" role="button" class="btn btn-outline button w-full" onclick="rotateIcon()">
                <i class="fas fa-plus font-bold text-xl transition-all duration-500" id="plus-icon"></i>
                Tambah
            </summary>
            <ul tabindex="0"
                class="dropdown-content menu p-2 z-50 shadow bg-base-100 rounded-box w-max absolute -translate-x-28">
                <!-- Program Keahlian -->
                <li>
                    <button class="btn btn-ghost flex justify-start items-center hover:animate-pulse"
                        onclick="my_modal_add.showModal()">
                        <i class="fa-solid fa-plus"></i>
                        Tambah Program Keahlian
                    </button>
                </li>
                <!-- Program Keahlian -->

                <!-- Capaian Pembelajaran -->
                <li>
                    <button class="btn btn-ghost flex justify-start items-center hover:animate-pulse"
                        onclick="my_modal_capaianPembelajaran.showModal()">
                        <i class="fas fa-plus"></i>
                        Tambah Capaian Pembelajaran
                    </button>
                </li>
                <!-- Capaian Pembelajaran -->

                <!-- Peluang Kerja -->
                <li>
                    <button class="btn btn-ghost flex justify-start items-center hover:animate-pulse col-span-2"
                        onclick="my_modal_peluangKerja.showModal()">
                        <i class="fas fa-plus"></i>
                        Tambah Peluang Kerja
                    </button>
                </li>
                <!-- Peluang Kerja -->
            </ul>
        </details>

    </div>
    <!-- Modal -->

    <!-- Search Bar -->
    <div class="col-span-2 col-start-7 row-start-2">
        <label class="input input-bordered flex items-center gap-2  focus-within:outline-none">
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
                        <th>Nama Program Keahlian</th>
                        <th>Deskripsi Program Keahlian</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($programKeahlian as $index => $program)
                    <tr class="hover">
                        <th class="w-8">{{ $index + 1 }}</th>
                        <td class="w-64">{{ $program->nama_program }}</td>
                        <td class="">
                            <p class="truncate w-48 mx-auto">{{ $program->deskripsi_program }}</p>
                        </td>
                        <td class="">
                            <details class="dropdown dropdown-right mx-auto">
                                <summary tabindex="0" role="button" class="btn btn-ghost button w-20">
                                    <i class="fas fa-circle text-[0.5rem] circle-1 transition-all duration-500"></i>
                                    <i class="fas fa-circle text-[0.5rem] circle-2 transition-all duration-500"></i>
                                    <i class="fas fa-circle text-[0.5rem] circle-3 transition-all duration-500"></i>
                                    <i class="fas fa-times font-bold text-xl hidden transition-all duration-500"></i>
                                </summary>
                                <ul tabindex="0"
                                    class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-max absolute">
                                    <!-- Edit -->
                                    <li>
                                        <button class="btn btn-ghost w-full hover:animate-pulse"
                                            onclick="window['my_modal_edit{{ $program->id_program }}'].showModal()">
                                            <i class="fas fa-pen-to-square"></i>
                                            Edit
                                        </button>
                                    </li>
                                    <!-- Edit -->

                                    <!-- View -->
                                    <li>
                                        <button class="btn btn-ghost w-full hover:animate-pulse"
                                            onclick="window['my_modal_view{{ $program->id_program }}'].showModal()">
                                            <i class="fas fa-circle-info"></i>
                                            Detail
                                        </button>
                                    </li>
                                    <!-- View -->

                                    <!-- Delete -->
                                    <li>
                                        <button class="btn btn-ghost w-full hover:animate-pulse"
                                            onclick="window['my_modal_delete{{ $program->id_program }}'].showModal()">
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
                    <dialog id="my_modal_edit{{ $program->id_program }}" class="modal">
                        <div class="modal-box w-12/12 max-w-5xl">
                            <form method="dialog">
                                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                            </form>
                            <h3 class="font-bold text-lg">Edit Data Program Keahlian</h3>


                            <div class="grid grid-cols-3 w-52 -mt-5">
                                <div class="divider"></div>
                                <div class="divider divider-success"></div>
                                <div class="divider"></div>
                            </div>
                            <form action="{{ route('ProgramKeahlian.update', ['id_program' => $program->id_program]) }}"
                                method="post">
                                @csrf
                                @method('patch')
                                <label
                                    class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                                    <input type="text" name="nama_program" class="grow bg-transparent py-2"
                                        placeholder="Nama Program" value="{{ $program->nama_program }}" />
                                </label>

                                <textarea
                                    class="input border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none grow py-2"
                                    placeholder="Deskripsi Program"
                                    name="deskripsi_program">{{ $program->deskripsi_program }}</textarea>

                                <textarea
                                    class="input border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none grow py-2"
                                    placeholder="Deskripsi Peluang Kerja"
                                    name="deskripsi_peluang_kerja">{{ $program->deskripsi_peluang_kerja }}</textarea>

                                <textarea
                                    class="input border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none grow py-2"
                                    placeholder="Visi" name="visi_program">{{ $program->visi_program }}</textarea>

                                <textarea
                                    class="input border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none grow py-2"
                                    placeholder="Misi" name="misi_program">{{ $program->misi_program }}</textarea>

                                <textarea
                                    class="input border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none grow py-2"
                                    placeholder="Tujuan Program"
                                    name="tujuan_program">{{ $program->tujuan_program }}</textarea>

                                <textarea
                                    class="input border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none grow py-2"
                                    placeholder="Sasaran Program"
                                    name="sasaran_program">{{ $program->sasaran_program }}</textarea>

                                <label
                                    class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                                    <input type="file" name="logo_program"
                                        class="grow file-input file-input-success border-none bg-transparent py-2"
                                        accept="image/*" placeholder="Logo" />
                                </label>

                                <div class="flex justify-end items-end mt-20 gap-4">

                                    <button type="submit"
                                        class="btn bg-elm w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
                                        <i class=" fas fa-pen-to-square"></i>
                                        Edit
                                    </button>

                                </div>

                            </form>
                        </div>
        </div>
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
                    <div class="divider divider-success"></div>
                    <div class="divider"></div>
                </div>
                <form action="">
                    <div class="grid grid-cols-9 gap-5">

                        <!-- Program Keahlian -->
                        <div class="col-span-3">
                            <h3 class="font-bold text-lg text-center">Program Keahlian</h3>
                            <figure>
                                <div class="avatar flex justify-center items-center my-5">
                                    <div class="w-40 rounded-full border-2">
                                        <img src="{{ asset($program->logo_program) }}" />
                                    </div>
                                </div>
                            </figure>


                            <span class="my-3">Tautan Foto</span>
                            <label
                                class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                                <i class="fas fa-link"></i>
                                <input type="text" name="nama_program" class="grow bg-transparent py-2"
                                    value="{{ $program->logo_program }}" readonly />
                            </label>

                            <span class="my-3">Nama Program Keahlian</span>
                            <label
                                class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                                <input type="text" name="nama_program" class="grow bg-transparent py-2"
                                    value="{{ $program->nama_program }}" readonly />
                            </label>

                            <span class="my-3">Deskripsi Program Keahlian</span>
                            <textarea
                                class="input border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none grow py-2"
                                placeholder="Deskripsi Program" name="deskripsi_program"
                                readonly>{{ $program->deskripsi_program }}</textarea>

                            <span class="my-3">Deskripsi Peluang Kerja</span>
                            <textarea
                                class="input border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none grow py-2"
                                placeholder="Deskripsi Peluang Kerja" name="deskripsi_peluang_kerja"
                                readonly>{{ $program->deskripsi_peluang_kerja }}</textarea>

                            <span class="my-3">Visi Program Keahlian</span>
                            <textarea
                                class="input border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none grow py-2"
                                placeholder="Visi" name="visi_program" readonly>{{ $program->visi_program }}</textarea>

                            <span class="my-3">Misi Program Keahlian</span>
                            <textarea
                                class="input border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none grow py-2"
                                placeholder="Misi" name="misi_program" readonly>{{ $program->misi_program }}</textarea>

                            <span class="my-3">Tujuan Program Keahlian</span>
                            <textarea
                                class="input border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none grow py-2"
                                placeholder="Tujuan Program" name="tujuan_program"
                                readonly>{{ $program->tujuan_program }}</textarea>

                            <span class="my-3">Sasaran Program Keahlian</span>
                            <textarea
                                class="input border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none grow py-2"
                                placeholder="Sasaran Program" name="sasaran_program"
                                readonly>{{ $program->sasaran_program }}</textarea>
                        </div>
                        <!-- Program Keahlian -->

                        <!-- Capaian Pembelajaran -->
                        <div class="col-span-3">
                            @foreach($capaianPembelajaran as $capaianIndex => $capaian)
                            @if($capaian->id_program === $program->id_program)
                            <h3 class="font-bold text-lg text-center">Capaian Pembelajaran</h3>
                            <!-- First Collapse -->
                            <div class="collapse collapse-arrow bg-base-200 my-5">
                                <input type="checkbox" checked />
                                <div class="collapse-title text-xl font-medium flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        class="stroke-info shrink-0 w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                        </path>
                                    </svg>
                                    <h1 class="mx-5 text-base">ASPEK SIKAP</h1>
                                </div>
                                <div class="collapse-content">
                                    <textarea
                                        class="input border-2 border-elm flex items-center gap-2 mb-5 w-full h-48 focus-within:outline-none grow py-2"
                                        placeholder="Aspek Sikap"
                                        name="aspek_sikap">{{ $capaian->aspek_sikap }}</textarea>
                                </div>
                            </div>
                            <!-- First Collapse -->
                            <!-- Second Collapse -->
                            <div class="collapse collapse-arrow bg-base-200 mb-5">
                                <input type="checkbox" checked />
                                <div class="collapse-title text-xl font-medium flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        class="stroke-info shrink-0 w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                        </path>
                                    </svg>
                                    <h1 class="mx-5 text-base">ASPEK PENGETAHUAN</h1>
                                </div>
                                <div class="collapse-content">
                                    <textarea
                                        class="input border-2 border-elm flex items-center gap-2 mb-5 w-full h-48 focus-within:outline-none grow py-2"
                                        placeholder="Aspek Pengetahuan"
                                        name="aspek_penegtahuan">{{ $capaian->aspek_pengetahuan }}</textarea>
                                </div>
                            </div>
                            <!-- Second Collapse -->
                            <!-- Third Collapse -->
                            <div class="collapse collapse-arrow bg-base-200 mb-5">
                                <input type="checkbox" checked />
                                <div class="collapse-title text-xl font-medium flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        class="stroke-info shrink-0 w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                        </path>
                                    </svg>
                                    <h1 class="mx-5 text-base">ASPEK KETERAMPILAN UMUM</h1>
                                </div>
                                <div class="collapse-content">
                                    <textarea
                                        class="input border-2 border-elm flex items-center gap-2 mb-5 w-full h-48 focus-within:outline-none grow py-2"
                                        placeholder="Aspek Keterampilan Umum"
                                        name="aspek_keterampilan_umum">{{ $capaian->aspek_keterampilan_umum }}</textarea>
                                </div>
                            </div>
                            <!-- Third Collapse -->
                            <!-- Fourth Collapse -->
                            <div class="collapse collapse-arrow bg-base-200">
                                <input type="checkbox" checked />
                                <div class="collapse-title text-xl font-medium flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        class="stroke-info shrink-0 w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                        </path>
                                    </svg>
                                    <h1 class="mx-5 text-base">ASPEK KETERAMPILAN KHUSUS</h1>
                                </div>
                                <div class="collapse-content">
                                    <textarea
                                        class="input border-2 border-elm flex items-center gap-2 mb-5 w-full h-48 focus-within:outline-none grow py-2"
                                        placeholder="Aspek Keterampilan Khusus"
                                        name="aspek_keterampilan_khusus">{{ $capaian->aspek_keterampilan_khusus }}</textarea>
                                </div>
                            </div>
                            <!-- Fourth Collapse -->
                        </div>
                        @endif
                        @endforeach
                        <!-- Capaian Pembelajaran -->

                        <!-- Peluang Kerja -->
                        <div class="col-span-3">
                            @foreach($peluangKerja as $peluangIndex => $peluang)
                            @if($peluang->id_program === $program->id_program)
                            <h3 class="font-bold text-lg text-center">Peluang Kerja</h3>
                            <!-- First Collapse -->
                            <div class="collapse collapse-arrow bg-base-200 my-5">
                                <input type="checkbox" />
                                <div class="collapse-title text-xl font-medium flex items-center">
                                    <i class="fas fa-briefcase"></i>
                                    <h1 class="mx-5 text-base">{{ $peluang->peluang_kerja }}</h1>
                                </div>
                                <div class="collapse-content">
                                    <textarea
                                        class="input border-2 border-elm flex items-center gap-2 mb-5 w-full h-48 focus-within:outline-none grow py-2"
                                        placeholder="Aspek Sikap" name="aspek_sikap"
                                        readonly>{{ $peluang->deskripsi_pekerjaan }}</textarea>
                                </div>
                            </div>
                            <!-- First Collapse -->
                            @endif
                            @endforeach
                        </div>
                        <!-- Peluang Kerja -->

                    </div>
                </form>
            </div>
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
                <form action="{{ route('ProgramKeahlian.destroy', ['id_program' => $program->id_program]) }}"
                    method="post">
                    @csrf
                    @method('DELETE')

                    <h3 class="font-bold text-lg flex justify-center items-center">Yakin Ingin Menghapus
                        Data Ini ?</h3>

                    <div class="flex justify-end items-end mt-10 gap-4">

                        <button type="submit"
                            class="btn bg-error w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-error">
                            <i class=" fas fa-trash"></i>
                            Hapus
                        </button>

                    </div>
                </form>
            </div>
        </dialog>
        <!-- Delete Modal -->
        </tbody>
        @if ($program->count() > 5)
        <tfoot>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <Th>Deskripsi</Th>
                <th>Aksi</th>
            </tr>
        </tfoot>
        @endif
        @endforeach
        </table>
    </div>
</div>
<!-- Content -->
</div>

<!-- Tambah Program Keahlian -->
<dialog id="my_modal_add" class="modal">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Tambah Program Keahlian</h3>

        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-success"></div>
            <div class="divider"></div>
        </div>

        <form action="{{ route('ProgramKeahlian.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <label
                class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" name="nama_program" class="grow bg-transparent py-2" placeholder="Nama Program" />
            </label>

            <textarea
                class="input border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none grow py-2"
                placeholder="Deskripsi Program" name="deskripsi_program"></textarea>

            <textarea
                class="input border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none grow py-2"
                placeholder="Deskripsi Peluang Kerja" name="deskripsi_peluang_kerja"></textarea>

            <textarea
                class="input border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none grow py-2"
                placeholder="Visi" name="visi_program"></textarea>

            <textarea
                class="input border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none grow py-2"
                placeholder="Misi" name="misi_program"></textarea>

            <textarea
                class="input border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none grow py-2"
                placeholder="Tujuan Program" name="tujuan_program"></textarea>

            <textarea
                class="input border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none grow py-2"
                placeholder="Sasaran Program" name="sasaran_program"></textarea>

            <label
                class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="file" name="logo_program"
                    class="grow file-input file-input-success border-none bg-transparent py-2" accept="image/*"
                    placeholder="Logo" />
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
<!-- Tambah Program Keahlian -->

<!-- Tambah Capaian Pembelajaran -->
<dialog id="my_modal_capaianPembelajaran" class="modal">
    <div class="modal-box w-11/12 max-w-5xl">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Tambah Capaian Pembelajaran</h3>

        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-success"></div>
            <div class="divider"></div>
        </div>

        <form action="{{ route('CapaianPembelajaran.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <select class="select border-elm border-2 w-full mb-5" name="id_program">
                <option disabled selected>Pilih Program Keahlian</option>
                @foreach($programKeahlian as $index => $program)
                <option value="{{ $program->id_program }}">{{ $program->nama_program }}</option>
                @endforeach
            </select>
            <textarea
                class="input border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none grow py-2"
                placeholder="Deskripsi Capaian Pembelajaran" name="deskripsi_capaian_pembelajaran"></textarea>

            <!-- First Collapse -->
            <div class="collapse collapse-arrow bg-base-200 mb-5">
                <input type="checkbox" />
                <div class="collapse-title text-xl font-medium flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="stroke-info shrink-0 w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h1 class="mx-5 text-base">ASPEK SIKAP</h1>
                </div>
                <div class="collapse-content">
                    <textarea
                        class="input border-2 border-elm flex items-center gap-2 mb-5 w-full h-48 focus-within:outline-none grow py-2"
                        placeholder="Aspek Sikap" name="aspek_sikap"></textarea>
                </div>
            </div>
            <!-- First Collapse -->
            <!-- Second Collapse -->
            <div class="collapse collapse-arrow bg-base-200 mb-5">
                <input type="checkbox" />
                <div class="collapse-title text-xl font-medium flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="stroke-info shrink-0 w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h1 class="mx-5 text-base">ASPEK PENGETAHUAN</h1>
                </div>
                <div class="collapse-content">
                    <textarea
                        class="input border-2 border-elm flex items-center gap-2 mb-5 w-full h-48 focus-within:outline-none grow py-2"
                        placeholder="Aspek Pengetahuan" name="aspek_pengetahuan"></textarea>
                </div>
            </div>
            <!-- Second Collapse -->
            <!-- Third Collapse -->
            <div class="collapse collapse-arrow bg-base-200 mb-5">
                <input type="checkbox" />
                <div class="collapse-title text-xl font-medium flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="stroke-info shrink-0 w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h1 class="mx-5 text-base">ASPEK KETERAMPILAN UMUM</h1>
                </div>
                <div class="collapse-content">
                    <textarea
                        class="input border-2 border-elm flex items-center gap-2 mb-5 w-full h-48 focus-within:outline-none grow py-2"
                        placeholder="Aspek Keterampilan Umum" name="aspek_keterampilan_umum"></textarea>
                </div>
            </div>
            <!-- Third Collapse -->
            <!-- Fourth Collapse -->
            <div class="collapse collapse-arrow bg-base-200">
                <input type="checkbox" />
                <div class="collapse-title text-xl font-medium flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="stroke-info shrink-0 w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h1 class="mx-5 text-base">ASPEK KETERAMPILAN KHUSUS</h1>
                </div>
                <div class="collapse-content">
                    <textarea
                        class="input border-2 border-elm flex items-center gap-2 mb-5 w-full h-48 focus-within:outline-none grow py-2"
                        placeholder="Aspek Keterampilan Khusus" name="aspek_keterampilan_khusus"></textarea>
                </div>
            </div>
            <!-- Fourth Collapse -->

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
<!-- Tambah Capaian Pembelajaran -->

<!-- Tambah Peluang Kerja -->
<dialog id="my_modal_peluangKerja" class="modal">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Tambah Peluang Kerja</h3>

        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-success"></div>
            <div class="divider"></div>
        </div>

        <form action="{{ route('PeluangKerja.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <select class="select border-elm border-2 w-full mb-5" name="id_program">
                <option disabled selected>Pilih Program Keahlian</option>
                @foreach($programKeahlian as $index => $program)
                <option value="{{ $program->id_program }}">{{ $program->nama_program }}</option>
                @endforeach
            </select>

            <label
                class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <input type="text" name="peluang_kerja" class="grow bg-transparent py-2" placeholder="Peluang Kerja" />
            </label>

            <textarea
                class="input border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none grow py-2"
                placeholder="Deskripsi Pekerjaan" name="deskripsi_pekerjaan"></textarea>

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
<!-- Tambah Peluang Kerja -->

<!-- Capaian Pembelajaran -->
<div class="grid grid-cols-9 rounded-md my-10">
    <!-- Title -->
    <div class="col-span-2 my-4 mx-5">
        <h3 class="font-bold text-lg">Capaian Pembelajaran</h3>
    </div>
    <!-- Title -->

    <!-- Content -->
    <div class="col-span-9 row-start-3">
        <div class="mt-5">
            <table class="table text-center">
                <!-- head -->
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Program Keahlian</th>
                        <th>Deskripsi Capaian Pembelajaran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($capaianPembelajaran as $capaianIndex => $capaian)
                    @foreach($programKeahlian as $index => $program)
                    @if($capaian->id_program === $program->id_program)
                    <tr class="hover">
                        <th class="w-8">{{ $capaianIndex + 1 }}</th>
                        <td class="w-64">{{ $program->nama_program }}</td>
                        <td class="">
                            <p class="truncate w-48 mx-auto">{{ $capaian->deskripsi_capaian_pembelajaran }}</p>
                        </td>
                        <td class="">
                            <details class="dropdown dropdown-right mx-auto">
                                <summary tabindex="0" role="button" class="btn btn-ghost button w-20">
                                    <i class="fas fa-circle text-[0.5rem] circle-1 transition-all duration-500"></i>
                                    <i class="fas fa-circle text-[0.5rem] circle-2 transition-all duration-500"></i>
                                    <i class="fas fa-circle text-[0.5rem] circle-3 transition-all duration-500"></i>
                                    <i class="fas fa-times font-bold text-xl hidden transition-all duration-500"></i>
                                </summary>
                                <ul tabindex="0"
                                    class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-max absolute">
                                    <!-- Edit -->
                                    <li>
                                        <button class="btn btn-ghost w-full hover:animate-pulse"
                                            onclick="window['modal_edit_capaian{{ $capaian->id_capaian_pembelajaran }}'].showModal()">
                                            <i class="fas fa-pen-to-square"></i>
                                            Edit
                                        </button>
                                    </li>
                                    <!-- Edit -->

                                    <!-- Delete -->
                                    <li>
                                        <button class="btn btn-ghost w-full hover:animate-pulse"
                                            onclick="window['modal_delete_capaian{{ $capaian->id_capaian_pembelajaran }}'].showModal()">
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
                    <dialog id="modal_edit_capaian{{ $capaian->id_capaian_pembelajaran }}" class="modal">
                        <div class="modal-box w-12/12 max-w-5xl">
                            <form method="dialog">
                                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                            </form>
                            <h3 class="font-bold text-lg">Edit Data Capaian Pembelajaran</h3>


                            <div class="grid grid-cols-3 w-52 -mt-5">
                                <div class="divider"></div>
                                <div class="divider divider-success"></div>
                                <div class="divider"></div>
                            </div>
                            <form
                                action="{{ route('CapaianPembelajaran.update', ['id_capaian_pembelajaran' => $capaian->id_capaian_pembelajaran]) }}"
                                method="post" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <select class="select border-elm border-2 w-full mb-5" name="id_program">
                                    <option disabled>Pilih Program Keahlian</option>
                                    @foreach($programKeahlian as $index => $program)
                                    <option value="{{ $program->id_program }}" @if($program->id_program ===
                                        $capaian->id_program) selected @endif>
                                        {{ $program->nama_program }}
                                    </option>
                                    @endforeach
                                </select>
                                <textarea
                                    class="input border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none grow py-2"
                                    placeholder="Deskripsi Capaian Pembelajaran"
                                    name="deskripsi_capaian_pembelajaran">{{ $capaian->deskripsi_capaian_pembelajaran }}</textarea>

                                <!-- First Collapse -->
                                <div class="collapse collapse-arrow bg-base-200 mb-5">
                                    <input type="checkbox" />
                                    <div class="collapse-title text-xl font-medium flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            class="stroke-info shrink-0 w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                            </path>
                                        </svg>
                                        <h1 class="mx-5 text-base">ASPEK SIKAP</h1>
                                    </div>
                                    <div class="collapse-content">
                                        <textarea
                                            class="input border-2 border-elm flex items-center gap-2 mb-5 w-full h-48 focus-within:outline-none grow py-2"
                                            placeholder="Aspek Sikap"
                                            name="aspek_sikap">{{ $capaian->aspek_sikap }}</textarea>
                                    </div>
                                </div>
                                <!-- First Collapse -->
                                <!-- Second Collapse -->
                                <div class="collapse collapse-arrow bg-base-200 mb-5">
                                    <input type="checkbox" />
                                    <div class="collapse-title text-xl font-medium flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            class="stroke-info shrink-0 w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                            </path>
                                        </svg>
                                        <h1 class="mx-5 text-base">ASPEK PENGETAHUAN</h1>
                                    </div>
                                    <div class="collapse-content">
                                        <textarea
                                            class="input border-2 border-elm flex items-center gap-2 mb-5 w-full h-48 focus-within:outline-none grow py-2"
                                            placeholder="Aspek Pengetahuan"
                                            name="aspek_pengetahuan">{{ $capaian->aspek_pengetahuan }}</textarea>
                                    </div>
                                </div>
                                <!-- Second Collapse -->
                                <!-- Third Collapse -->
                                <div class="collapse collapse-arrow bg-base-200 mb-5">
                                    <input type="checkbox" />
                                    <div class="collapse-title text-xl font-medium flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            class="stroke-info shrink-0 w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                            </path>
                                        </svg>
                                        <h1 class="mx-5 text-base">ASPEK KETERAMPILAN UMUM</h1>
                                    </div>
                                    <div class="collapse-content">
                                        <textarea
                                            class="input border-2 border-elm flex items-center gap-2 mb-5 w-full h-48 focus-within:outline-none grow py-2"
                                            placeholder="Aspek Keterampilan Umum"
                                            name="aspek_keterampilan_umum">{{ $capaian->aspek_keterampilan_umum }}</textarea>
                                    </div>
                                </div>
                                <!-- Third Collapse -->
                                <!-- Fourth Collapse -->
                                <div class="collapse collapse-arrow bg-base-200">
                                    <input type="checkbox" />
                                    <div class="collapse-title text-xl font-medium flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            class="stroke-info shrink-0 w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                            </path>
                                        </svg>
                                        <h1 class="mx-5 text-base">ASPEK KETERAMPILAN KHUSUS</h1>
                                    </div>
                                    <div class="collapse-content">
                                        <textarea
                                            class="input border-2 border-elm flex items-center gap-2 mb-5 w-full h-48 focus-within:outline-none grow py-2"
                                            placeholder="Aspek Keterampilan Khusus"
                                            name="aspek_keterampilan_khusus">{{ $capaian->aspek_keterampilan_khusus }}</textarea>
                                    </div>
                                </div>
                                <!-- Fourth Collapse -->

                                <div class="flex justify-end items-end mt-20 gap-4">

                                    <button type="submit"
                                        class="btn bg-elm w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
                                        <i class=" fas fa-pen-to-square"></i>
                                        Edit
                                    </button>

                                </div>
                            </form>
                        </div>
        </div>
        </dialog>
        <!-- Edit Modal -->

        <!-- Delete Modal -->
        <dialog id="modal_delete_capaian{{ $capaian->id_capaian_pembelajaran }}" class="modal">
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
                    action="{{ route('CapaianPembelajaran.destroy', ['id_capaian_pembelajaran' => $capaian->id_capaian_pembelajaran]) }}"
                    method="post">
                    @csrf
                    @method('DELETE')

                    <h3 class="font-bold text-lg flex justify-center items-center">Yakin Ingin Menghapus
                        Data Ini ?</h3>

                    <div class="flex justify-end items-end mt-10 gap-4">

                        <button type="submit"
                            class="btn bg-error w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-error">
                            <i class=" fas fa-trash"></i>
                            Hapus
                        </button>

                    </div>
                </form>
            </div>
        </dialog>
        <!-- Delete Modal -->

        </tbody>
        @if ($program->count() > 5)
        <tfoot>
            <tr>
                <th>
                    <label>
                        <input type="checkbox" class="checkbox" />
                    </label>
                </th>
                <th>No.</th>
                <th>Nama</th>
                <Th>Deskripsi</Th>
                <th>Aksi</th>
            </tr>
        </tfoot>
        @endif
        @endif
        @endforeach
        @endforeach
        </table>
    </div>
</div>
<!-- Content -->
</div>
<!-- Capaian Pembelajaran -->

<!-- Peluang Kerja -->
<div class="grid grid-cols-9 rounded-md my-10">
    <!-- Title -->
    <div class="col-span-2 my-4 mx-5">
        <h3 class="font-bold text-lg">Peluang Kerja</h3>
    </div>
    <!-- Title -->

    <!-- Content -->
    <div class="col-span-9 row-start-3">
        <div class="mt-5">
            <table class="table text-center">
                <!-- head -->
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Program Keahlian</th>
                        <th>Peluang Kerja</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($peluangKerja as $peluangIndex => $peluang)
                    @foreach($programKeahlian as $index => $program)
                    @if($peluang->id_program === $program->id_program)
                    <tr class="hover">
                        <th class="w-8">{{ $peluangIndex + 1 }}</th>
                        <td class="w-64">{{ $program->nama_program }}</td>
                        <td class="">
                            <p class="truncate w-48 mx-auto">{{ $peluang->peluang_kerja }}</p>
                        </td>
                        <td class="">
                            <details class="dropdown dropdown-right mx-auto">
                                <summary tabindex="0" role="button" class="btn btn-ghost button w-20">
                                    <i class="fas fa-circle text-[0.5rem] circle-1 transition-all duration-500"></i>
                                    <i class="fas fa-circle text-[0.5rem] circle-2 transition-all duration-500"></i>
                                    <i class="fas fa-circle text-[0.5rem] circle-3 transition-all duration-500"></i>
                                    <i class="fas fa-times font-bold text-xl hidden transition-all duration-500"></i>
                                </summary>
                                <ul tabindex="0"
                                    class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-max absolute">
                                    <!-- Edit -->
                                    <li>
                                        <button class="btn btn-ghost w-full hover:animate-pulse"
                                            onclick="window['modal_edit_peluangKerja{{ $peluang->id_peluang_kerja }}'].showModal()">
                                            <i class="fas fa-pen-to-square"></i>
                                            Edit
                                        </button>
                                    </li>
                                    <!-- Edit -->

                                    <!-- Delete -->
                                    <li>
                                        <button class="btn btn-ghost w-full hover:animate-pulse"
                                            onclick="window['modal_delete_peluangKerja{{ $peluang->id_peluang_kerja }}'].showModal()">
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
                    <dialog id="modal_edit_peluangKerja{{ $peluang->id_peluang_kerja }}" class="modal">
                        <div class="modal-box w-12/12 max-w-5xl">
                            <form method="dialog">
                                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                            </form>
                            <h3 class="font-bold text-lg">Edit Data Peluang Kerja</h3>


                            <div class="grid grid-cols-3 w-52 -mt-5">
                                <div class="divider"></div>
                                <div class="divider divider-success"></div>
                                <div class="divider"></div>
                            </div>
                            <form
                                action="{{ route('PeluangKerja.update', ['id_peluang_kerja' => $peluang->id_peluang_kerja]) }}"
                                method="post" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <select class="select border-elm border-2 w-full mb-5" name="id_program">
                                    <option disabled>Pilih Program Keahlian</option>
                                    @foreach($programKeahlian as $index => $program)
                                    <option value="{{ $program->id_program }}" @if($program->id_program ===
                                        $peluang->id_program) selected @endif>
                                        {{ $program->nama_program }}
                                    </option>
                                    @endforeach
                                </select>

                                <textarea
                                    class="input border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none grow py-2"
                                    placeholder="Deskripsi Peluang Kerja"
                                    name="deskripsi_peluang_kerja">{{ $peluang->deskripsi_peluang_kerja }}</textarea>

                                <label
                                    class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                                    <input type="text" name="peluang_kerja" class="grow bg-transparent py-2"
                                        placeholder="Peluang Kerja" value="{{ $peluang->peluang_kerja }}" />
                                </label>

                                <textarea
                                    class="input border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none grow py-2"
                                    placeholder="Deskripsi Pekerjaan"
                                    name="deskripsi_pekerjaan">{{ $peluang->deskripsi_pekerjaan }}</textarea>

                                <div class="flex justify-end items-end mt-20 gap-4">

                                    <button type="submit"
                                        class="btn bg-elm w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
                                        <i class=" fas fa-pen-to-square"></i>
                                        Edit
                                    </button>

                                </div>
                            </form>
                        </div>
        </div>
        </dialog>
        <!-- Edit Modal -->

        <!-- Delete Modal -->
        <dialog id="modal_delete_peluangKerja{{ $peluang->id_peluang_kerja }}" class="modal">
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
                <form action="{{ route('PeluangKerja.destroy', ['id_peluang_kerja' => $peluang->id_peluang_kerja]) }}"
                    method="post">
                    @csrf
                    @method('DELETE')

                    <h3 class="font-bold text-lg flex justify-center items-center">Yakin Ingin Menghapus
                        Data Ini ?</h3>

                    <div class="flex justify-end items-end mt-10 gap-4">

                        <button type="submit"
                            class="btn bg-error w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-error">
                            <i class=" fas fa-trash"></i>
                            Hapus
                        </button>

                    </div>
                </form>
            </div>
        </dialog>
        <!-- Delete Modal -->

        </tbody>
        @if ($program->count() > 5)
        <tfoot>
            <tr>
                <th>
                    <label>
                        <input type="checkbox" class="checkbox" />
                    </label>
                </th>
                <th>No.</th>
                <th>Nama</th>
                <Th>Deskripsi</Th>
                <th>Aksi</th>
            </tr>
        </tfoot>
        @endif
        @endif
        @endforeach
        @endforeach
        </table>
    </div>
</div>
<!-- Content -->
</div>
<!-- Peluang Kerja -->

@endsection