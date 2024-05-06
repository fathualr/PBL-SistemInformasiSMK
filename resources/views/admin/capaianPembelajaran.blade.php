@extends('layouts.mainAdmin')

@section('main-content')

<div class="grid grid-cols-9 shadow-xl rounded-md">
    <!-- Title -->
    <div class="col-span-2 my-4 mx-5">
        <h3 class="font-bold text-lg">Capaian Pembelajaran</h3>
    </div>
    <!-- Title -->

    <!-- Modal -->
    <div class="col-span-4 col-start-2 row-start-2 grid grid-cols-2 gap-4">
        <button class="btn w-full hover:animate-pulse" onclick="my_modal_add.showModal()">
            <i class="fa-solid fa-plus"></i>
            Tambah Capaian Pembelajaran
        </button>
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
        <div class="mt-5 px-16">
            <table class="table text-center">
                <!-- head -->
                <thead>
                    <tr>
                        <th>
                            <label>
                                <input type="checkbox" class="checkbox" />
                            </label>
                        </th>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($capaianPembelajaran as $index => $capaian)
                    @foreach($programKeahlian as $index => $program)
                    <tr class="hover">
                        <th class="w-8">
                            <label>
                                <input type="checkbox" class="checkbox" />
                            </label>
                        </th>
                        <th class="w-8">{{ $index + 1 }}</th>
                        <td class="w-48 ">{{ $program->nama_program }}</td>
                        <td class="">
                            <p class="truncate w-48 mx-auto">{{ $capaian->deskripsi_capaian_pembelajaran }}
                            </p>
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
                                            onclick="window['my_modal_edit{{ $capaian->id_capaian_pembelajaran }}'].showModal()">
                                            <i class="fas fa-pen-to-square"></i>
                                            Edit
                                        </button>
                                    </li>
                                    <!-- Edit -->

                                    <!-- View -->
                                    <li>
                                        <button class="btn btn-ghost w-full hover:animate-pulse"
                                            onclick="window['my_modal_view{{ $capaian->id_capaian_pembelajaran }}'].showModal()">
                                            <i class="fas fa-circle-info"></i>
                                            Detail
                                        </button>
                                    </li>
                                    <!-- View -->

                                    <!-- Delete -->
                                    <li>
                                        <button class="btn btn-ghost w-full hover:animate-pulse"
                                            onclick="window['my_modal_delete{{ $capaian->id_capaian_pembelajaran }}'].showModal()">
                                            <i class="fas fa-trash"></i>
                                            Hapus
                                        </button>
                                    </li>
                                    <!-- Delete -->
                                </ul>
                            </details>
                        </td>
                    </tr>

                    <!-- Delete Modal -->
                    <dialog id="my_modal_delete{{ $capaian->id_capaian_pembelajaran }}" class="modal">
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
                @if ($capaianPembelajaran->count() > 5)
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
                @endforeach
                @endforeach
            </table>
        </div>
    </div>
    <!-- Content -->
</div>

<!-- Tambah Capaian Pembelajaran -->
<dialog id="my_modal_add" class="modal">
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

@endsection