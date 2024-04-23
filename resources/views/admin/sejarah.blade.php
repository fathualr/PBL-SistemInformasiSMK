@extends('layouts.mainAdmin')

@section('main-content')
<!-- Third Content -->
<div class="grid grid-cols-9 shadow-xl rounded-md mt-10">
    <!-- Title -->
    <div class="col-span-2 my-4 mx-5">
        <h3 class="font-bold text-lg">Sejarah Sekolah</h3>
    </div>
    <!-- Title -->

    <!-- Modal -->
    <div class="col-span-2 col-start-2 row-start-2">

        <button class="btn w-full hover:animate-pulse" onclick="modal_add_sejarah.showModal()">
            <i class="fas fa-plus"></i>
            Tambah Deskripsi Sejarah
        </button>

    </div>
    <!-- Modal -->

    <!-- Search Bar -->
    <div class="col-span-2 row-start-2 col-start-7">
        <label class="input input-bordered flex items-center gap-2  focus-within:outline-none">
            <i class="fas fa-magnifying-glass"></i>
            <input type="text" class="grow" placeholder="Cari" />
        </label>
    </div>
    <!-- Search Bar -->

    <!-- Content -->
    <div class="col-span-9 row-start-3">
        <div class="overflow-x-auto mt-5 px-16">
            <table class="table text-center">
                <!-- head -->
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Judul Sejarah</th>
                        <th>Deskripsi Sejarah</th>
                        <th>Gambar</th>
                        <th>Tanggal</th>
                        <th class="w-52">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- row 1 -->
                    <tr class="hover">
                        <th>1</th>
                        <td>Baru Dibangun</td>
                        <td>
                            <p class="truncate w-64 mx-auto">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati omnis assumenda earum
                                nihil, fuga ratione facere ducimus eaque, commodi quae odio sequi eveniet enim corrupti
                                adipisci repellendus ipsam. Nulla, sapiente!
                            </p>
                        </td>
                        <td>
                            <p class="truncate w-64 mx-auto">
                                image/Humans.svg
                            </p>
                        </td>
                        <td>26 Januari 2024</td>
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
                                            onclick="modal_edit_sejarah.showModal()">
                                            <i class="fas fa-pen-to-square"></i>
                                            Edit
                                        </button>
                                    </li>
                                    <!-- Edit -->

                                    <!-- View -->
                                    <li>
                                        <button class="btn btn-ghost w-full hover:animate-pulse"
                                            onclick="modal_view_sejarah.showModal()">
                                            <i class="fas fa-circle-info"></i>
                                            Detail
                                        </button>
                                    </li>
                                    <!-- View -->

                                    <!-- Delete -->
                                    <li>
                                        <button class="btn btn-ghost w-full hover:animate-pulse"
                                            onclick="modal_delete_sejarah.showModal()">
                                            <i class="fas fa-trash"></i>
                                            Hapus
                                        </button>
                                    </li>
                                    <!-- Delete -->
                                </ul>
                            </details>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Judul Sejarah</th>
                        <th>Deskripsi Sejarah</th>
                        <th>Gambar</th>
                        <th>Tanggal</th>
                        <th class="w-52">Aksi</th>
                    </tr>
                </tfoot>
            </table>
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
        <form action="">
            <label
                class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <i class="fas fa-heading"></i>
                <input type="text" class="grow bg-transparent py-2" placeholder="Judul Sejarah" />
            </label>

            <textarea class="textarea textarea-bordered border-2 border-elm w-full mb-5"
                placeholder="Deskripsi"></textarea>

            <input type="file" class="file-input file-input-bordered bg-elm w-full mb-5" />

            <label
                class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <i class="far fa-calendar"></i>
                <input type="date" class="grow bg-transparent py-2" placeholder="Link Video" />
            </label>

            <div class="flex justify-end items-end mt-20 gap-4">

                <button type="reset"
                    class="btn bg-error w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-error">
                    <i class="fas fa-times"></i>
                    Reset
                </button>

                <a href="" class="">
                    <button type="submit"
                        class="btn bg-elm w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
                        <i class=" fas fa-plus"></i>
                        Tambah
                    </button>
                </a>
                </a>

            </div>
        </form>
    </div>
</dialog>

<dialog id="modal_edit_sejarah" class="modal">
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
        <form action="">
            <label
                class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <i class="fas fa-heading"></i>
                <input type="text" class="grow bg-transparent py-2" placeholder="Judul Sejarah" />
            </label>

            <textarea class="textarea textarea-bordered border-2 border-elm w-full mb-5"
                placeholder="Deskripsi"></textarea>

            <input type="file" class="file-input file-input-bordered bg-elm w-full mb-5" />

            <label
                class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <i class="far fa-calendar"></i>
                <input type="date" class="grow bg-transparent py-2" placeholder="Link Video" />
            </label>

            <div class="flex justify-end items-end mt-20 gap-4">

                <a href="" class="">
                    <button type="submit"
                        class="btn bg-elm w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
                        <i class=" fas fa-pen-to-square"></i>
                        Edit
                    </button>
                </a>

            </div>
        </form>
    </div>
</dialog>

<dialog id="modal_view_sejarah" class="modal">
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
        <form action="">
            <label
                class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <i class="fas fa-heading"></i>
                <input type="text" class="grow bg-transparent py-2" placeholder="Judul Sejarah" disabled />
            </label>

            <textarea class="textarea textarea-bordered border-2 border-elm w-full mb-5" placeholder="Deskripsi"
                disabled></textarea>

            <div class="aspect-w-10 aspect-h-5 mb-5">
                <img class="w-full h-64" src="{{ asset('image/Humans.svg') }}">
            </div>

            <label
                class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <i class="far fa-file-image"></i>
                <input type="text" class="grow bg-transparent py-2" placeholder="Link Galeri" disabled />
            </label>

            <label
                class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <i class="far fa-calendar"></i>
                <input type="text" class="grow bg-transparent py-2" placeholder="Tanggal" disabled />
            </label>
        </form>
    </div>
</dialog>

<dialog id="modal_delete_sejarah" class="modal">
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
        <form action="">
            Apakah Anda Yakin Ingin Menghapus Data Ini ?

            <div class="flex justify-end items-end mt-20 gap-4">

                <a href="" class="">
                    <button type="submit"
                        class="btn bg-error w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-error">
                        <i class=" fas fa-trash"></i>
                        Hapus
                    </button>
                </a>

            </div>
        </form>
    </div>
</dialog>
<!-- Third Content -->
@endsection