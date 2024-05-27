@extends('layouts.mainAdmin')

@section('main-content')

<!-- First Content -->
<div class="grid grid-cols-9 rounded-md">
    <!-- Title -->
    <div class="col-span-2 my-4 mx-5">
        <h3 class="font-bold text-lg">Video Kata Sambutan</h3>
    </div>
    <!-- Title -->

    <!-- Modal -->
    <div class="col-span-2 col-start-2 row-start-2">

        <button class="btn w-full hover:animate-pulse" onclick="my_modal_add.showModal()">
            <i class="fas fa-link"></i>
            Tambah Link Video
        </button>

    </div>
    <!-- Modal -->

    <!-- Toggle -->
    <div class="col-span-2 col-start-7 row-start-2 flex justify-center items-center gap-x-3">
        Aktif/Nonaktif Konten
        <input type="checkbox" class="toggle rounded-md" checked />
    </div>
    <!-- Toggle -->

    <!-- Content -->
    <div class="col-span-9 row-start-3">
        <div class="overflow-x-auto mt-5 px-16">
            <table class="table text-center">
                <!-- head -->
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Judul Video</th>
                        <th>Video</th>
                        <th>Tanggal Rilis</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- row 1 -->
                    <tr class="hover">
                        <th>1</th>
                        <td>Kata Sambutan</td>
                        <td class="flex justify-center items-center">
                            <p class="truncate w-64">
                                https://www.youtube.com/embed/Tc_JWD9NhKY
                            </p>
                        </td>
                        <td>24-04-2024</td>
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
                                            onclick="my_modal_edit.showModal()">
                                            <i class="fas fa-pen-to-square"></i>
                                            Edit
                                        </button>
                                    </li>
                                    <!-- Edit -->

                                    <!-- View -->
                                    <li>
                                        <button class="btn btn-ghost w-full hover:animate-pulse"
                                            onclick="my_modal_view.showModal()">
                                            <i class="fas fa-circle-info"></i>
                                            Detail
                                        </button>
                                    </li>
                                    <!-- View -->

                                    <!-- Delete -->
                                    <li>
                                        <button class="btn btn-ghost w-full hover:animate-pulse"
                                            onclick="my_modal_delete.showModal()">
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
                        <th>Judul Video</th>
                        <th>Video</th>
                        <th>Tanggal Rilis</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <!-- Content -->
</div>

<dialog id="my_modal_add" class="modal">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Tambah Video</h3>

        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-success"></div>
            <div class="divider"></div>
        </div>

        <form action="">

            <label
                class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <i class="fas fa-heading"></i>
                <input type="text" class="grow bg-transparent py-2" placeholder="Judul Video" />
            </label>


            <textarea class="textarea textarea-bordered border-2 border-elm w-full mb-5"
                placeholder="Deskripsi Video"></textarea>

            <label
                class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <i class="fas fa-link"></i>
                <input type="link" class="grow bg-transparent py-2" placeholder="Link Video" />
            </label>

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

            </div>

        </form>
    </div>
</dialog>

<dialog id="my_modal_edit" class="modal">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Edit Data Video</h3>

        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-success"></div>
            <div class="divider"></div>
        </div>
        <form action="" method="dialog">

            <label
                class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <i class="fas fa-heading"></i>
                <input type="text" class="grow bg-transparent py-2" placeholder="Judul Video" />
            </label>


            <textarea class="textarea textarea-bordered border-2 border-elm w-full mb-5"
                placeholder="Deskripsi Video"></textarea>

            <label
                class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <i class="fas fa-link"></i>
                <input type="link" class="grow bg-transparent py-2" placeholder="Link Video" />
            </label>

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

<dialog id="my_modal_view" class="modal">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Info Detail Data Video</h3>

        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-success"></div>
            <div class="divider"></div>
        </div>
        <form action="">
            <label
                class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <i class="fas fa-heading"></i>
                <input type="text" class="grow bg-transparent py-2" placeholder="Judul Video" disabled />
            </label>


            <textarea class="textarea textarea-bordered border-2 border-elm w-full mb-5" placeholder="Deskripsi Video"
                disabled></textarea>

            <label
                class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <i class="fas fa-link"></i>
                <input type="link" class="grow bg-transparent py-2" placeholder="Link Video" disabled />
            </label>

            <label
                class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <i class="far fa-calendar"></i>
                <input type="date" class="grow bg-transparent py-2" placeholder="Link Video" disabled />
            </label>
        </form>
    </div>
</dialog>

<dialog id="my_modal_delete" class="modal">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Hapus Video</h3>

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
<!-- First Content -->

<!-- Second Content -->
<div class="grid grid-cols-9 shadow-xl rounded-md mt-10">
    <!-- Title -->
    <div class="col-span-2 my-4 mx-5">
        <h3 class="font-bold text-lg">Highlight Profile Sekolah</h3>
    </div>
    <!-- Title -->

    <!-- Toggle -->
    <div class="col-span-2 col-start-7 flex justify-center items-center gap-x-3">
        Aktif/Nonaktif Konten
        <input type="checkbox" class="toggle rounded-md" checked />
    </div>
    <!-- Toggle -->

    <!-- Content -->
    <div class="col-span-9 row-start-3">
        <div class="overflow-x-auto mt-5 px-16">
            <table class="table text-center">
                <!-- head -->
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Judul Kolom</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- row 1 -->
                    <tr class="hover">
                        <th>1</th>
                        <td>Profile Sekolah</td>
                        <td class="flex justify-center items-center">
                            <p class="truncate w-64">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati omnis assumenda earum
                                nihil, fuga ratione facere ducimus eaque, commodi quae odio sequi eveniet enim corrupti
                                adipisci repellendus ipsam. Nulla, sapiente!
                            </p>
                        </td>
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
                                            onclick="modal_edit_profile.showModal()">
                                            <i class="fas fa-pen-to-square"></i>
                                            Edit
                                        </button>
                                    </li>
                                    <!-- Edit -->

                                    <!-- View -->
                                    <li>
                                        <button class="btn btn-ghost w-full hover:animate-pulse"
                                            onclick="modal_view_profile.showModal()">
                                            <i class="fas fa-circle-info"></i>
                                            Detail
                                        </button>
                                    </li>
                                    <!-- View -->
                                </ul>
                            </details>
                        </td>
                    </tr>
                    <tr class="hover">
                        <th>2</th>
                        <td>Fasilitas Sekolah</td>
                        <td class="flex justify-center items-center">
                            <p class="truncate w-64">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati omnis assumenda earum
                                nihil, fuga ratione facere ducimus eaque, commodi quae odio sequi eveniet enim corrupti
                                adipisci repellendus ipsam. Nulla, sapiente!
                            </p>
                        </td>
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
                                            onclick="modal_edit_profile.showModal()">
                                            <i class="fas fa-pen-to-square"></i>
                                            Edit
                                        </button>
                                    </li>
                                    <!-- Edit -->

                                    <!-- View -->
                                    <li>
                                        <button class="btn btn-ghost w-full hover:animate-pulse"
                                            onclick="modal_view_profile.showModal()">
                                            <i class="fas fa-circle-info"></i>
                                            Detail
                                        </button>
                                    </li>
                                    <!-- View -->
                                </ul>
                            </details>
                        </td>
                    </tr>
                    <tr class="hover">
                        <th>3</th>
                        <td>Lokasi Sekolah</td>
                        <td class="flex justify-center items-center">
                            <p class="truncate w-64">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati omnis assumenda earum
                                nihil, fuga ratione facere ducimus eaque, commodi quae odio sequi eveniet enim corrupti
                                adipisci repellendus ipsam. Nulla, sapiente!
                            </p>
                        </td>
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
                                            onclick="modal_edit_profile.showModal()">
                                            <i class="fas fa-pen-to-square"></i>
                                            Edit
                                        </button>
                                    </li>
                                    <!-- Edit -->

                                    <!-- View -->
                                    <li>
                                        <button class="btn btn-ghost w-full hover:animate-pulse"
                                            onclick="modal_view_profile.showModal()">
                                            <i class="fas fa-circle-info"></i>
                                            Detail
                                        </button>
                                    </li>
                                    <!-- View -->
                                </ul>
                            </details>
                        </td>
                    </tr>
                    <tr class="hover">
                        <th>4</th>
                        <td>Sejarah Sekolah</td>
                        <td class="flex justify-center items-center">
                            <p class="truncate w-64">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati omnis assumenda earum
                                nihil, fuga ratione facere ducimus eaque, commodi quae odio sequi eveniet enim corrupti
                                adipisci repellendus ipsam. Nulla, sapiente!
                            </p>
                        </td>
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
                                            onclick="modal_edit_profile.showModal()">
                                            <i class="fas fa-pen-to-square"></i>
                                            Edit
                                        </button>
                                    </li>
                                    <!-- Edit -->

                                    <!-- View -->
                                    <li>
                                        <button class="btn btn-ghost w-full hover:animate-pulse"
                                            onclick="modal_view_profile.showModal()">
                                            <i class="fas fa-circle-info"></i>
                                            Detail
                                        </button>
                                    </li>
                                    <!-- View -->
                                </ul>
                            </details>
                        </td>
                    </tr>
                    <tr class="hover">
                        <th>5</th>
                        <td>Prestasi Sekolah</td>
                        <td class="flex justify-center items-center">
                            <p class="truncate w-64">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati omnis assumenda earum
                                nihil, fuga ratione facere ducimus eaque, commodi quae odio sequi eveniet enim corrupti
                                adipisci repellendus ipsam. Nulla, sapiente!
                            </p>
                        </td>
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
                                            onclick="modal_edit_profile.showModal()">
                                            <i class="fas fa-pen-to-square"></i>
                                            Edit
                                        </button>
                                    </li>
                                    <!-- Edit -->

                                    <!-- View -->
                                    <li>
                                        <button class="btn btn-ghost w-full hover:animate-pulse"
                                            onclick="modal_view_profile.showModal()">
                                            <i class="fas fa-circle-info"></i>
                                            Detail
                                        </button>
                                    </li>
                                    <!-- View -->
                                </ul>
                            </details>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Judul Kolom</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <!-- Content -->
</div>

<dialog id="modal_edit_profile" class="modal">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Edit Data Profile Sekolah</h3>

        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-success"></div>
            <div class="divider"></div>
        </div>
        <form action="">
            <label
                class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <i class="fas fa-heading"></i>
                <input type="text" class="grow bg-transparent py-2" placeholder="Profile Sekolah" disabled />
            </label>


            <textarea class="textarea textarea-bordered border-2 border-elm w-full mb-5"
                placeholder="Deskripsi"></textarea>

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

<dialog id="modal_view_profile" class="modal">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Info Detail Profile Sekolah</h3>

        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-success"></div>
            <div class="divider"></div>
        </div>
        <form action="">
            <label
                class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <i class="fas fa-heading"></i>
                <input type="text" class="grow bg-transparent py-2" placeholder="Profile Sekolah" disabled />
            </label>


            <textarea class="textarea textarea-bordered border-2 border-elm w-full mb-5" placeholder="Deskripsi"
                disabled></textarea>


        </form>
    </div>
</dialog>
<!-- Second Content -->

<!-- Third Content -->
<div class="grid grid-cols-9 shadow-xl rounded-md mt-10">
    <!-- Title -->
    <div class="col-span-2 my-4 mx-5">
        <h3 class="font-bold text-lg">Berita Sekolah</h3>
    </div>
    <!-- Title -->

    <!-- Modal -->
    <div class="col-span-2 col-start-2 row-start-2">

        <button class="btn w-full hover:animate-pulse" onclick="modal_add_berita.showModal()">
            <i class="fas fa-plus"></i>
            Tambah Berita
        </button>

    </div>
    <!-- Modal -->

    <!-- Toggle -->
    <div class="col-span-2 row-start-2 col-start-7 flex justify-center items-center gap-x-3">
        Aktif/Nonaktif Konten
        <input type="checkbox" class="toggle rounded-md" checked />
    </div>
    <!-- Toggle -->

    <!-- Content -->
    <div class="col-span-9 row-start-3">
        <div class="overflow-x-auto mt-5 px-16">
            <table class="table text-center">
                <!-- head -->
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Judul Berita</th>
                        <th>Link Gambar</th>
                        <th>Deskripsi Berita</th>
                        <th class="w-52">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- row 1 -->
                    <tr class="hover">
                        <th>1</th>
                        <td>Kegiatan Belajar mengajar di Rumah</td>
                        <td>
                            <p class="truncate w-64">
                                image/Humans.svg
                            </p>
                        </td>
                        <td>
                            <p class="truncate w-64">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati omnis assumenda earum
                                nihil, fuga ratione facere ducimus eaque, commodi quae odio sequi eveniet enim corrupti
                                adipisci repellendus ipsam. Nulla, sapiente!
                            </p>
                        </td>
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
                                            onclick="modal_edit_berita.showModal()">
                                            <i class="fas fa-pen-to-square"></i>
                                            Edit
                                        </button>
                                    </li>
                                    <!-- Edit -->

                                    <!-- View -->
                                    <li>
                                        <button class="btn btn-ghost w-full hover:animate-pulse"
                                            onclick="modal_view_berita.showModal()">
                                            <i class="fas fa-circle-info"></i>
                                            Detail
                                        </button>
                                    </li>
                                    <!-- View -->

                                    <!-- Delete -->
                                    <li>
                                        <button class="btn btn-ghost w-full hover:animate-pulse"
                                            onclick="modal_delete_berita.showModal()">
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
                        <th>Judul Berita</th>
                        <th>Link Gambar</th>
                        <th>Deskripsi Berita</th>
                        <th class="w-52">Aksi</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <!-- Content -->
</div>

<dialog id="modal_add_berita" class="modal">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Tambah Berita Sekolah</h3>

        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-success"></div>
            <div class="divider"></div>
        </div>
        <form action="">
            <label
                class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <i class="fas fa-heading"></i>
                <input type="text" class="grow bg-transparent py-2" placeholder="Judul Berita" />
            </label>

            <input type="file" class="file-input file-input-bordered bg-elm w-full mb-5" />

            <textarea class="textarea textarea-bordered border-2 border-elm w-full mb-5"
                placeholder="Deskripsi"></textarea>

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

<dialog id="modal_edit_berita" class="modal">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Edit Data Berita Sekolah</h3>

        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-success"></div>
            <div class="divider"></div>
        </div>
        <form action="">
            <label
                class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <i class="fas fa-heading"></i>
                <input type="text" class="grow bg-transparent py-2" placeholder="Judul Berita" />
            </label>

            <input type="file" class="file-input file-input-bordered bg-elm w-full mb-5" />

            <textarea class="textarea textarea-bordered border-2 border-elm w-full mb-5"
                placeholder="Deskripsi"></textarea>

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

<dialog id="modal_view_berita" class="modal">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Info Detail Berita Sekolah</h3>

        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-success"></div>
            <div class="divider"></div>
        </div>
        <form action="">
            <label
                class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <i class="fas fa-heading"></i>
                <input type="text" class="grow bg-transparent py-2" placeholder="Judul Berita" disabled />
            </label>

            <div class="aspect-w-10 aspect-h-5 mb-5">
                <img class="w-full h-64" src="{{ asset('image/Humans.svg') }}">
            </div>

            <label
                class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <i class="far fa-file-image"></i>
                <input type="text" class="grow bg-transparent py-2" placeholder="Link Galeri" disabled />
            </label>

            <textarea class="textarea textarea-bordered border-2 border-elm w-full mb-5" placeholder="Deskripsi"
                disabled></textarea>
        </form>
    </div>
</dialog>

<dialog id="modal_delete_galeri" class="modal">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Hapus Berita</h3>

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

<!-- Fourth Content -->
<div class="grid grid-cols-9 shadow-xl rounded-md mt-10">
    <!-- Title -->
    <div class="col-span-2 my-4 mx-5">
        <h3 class="font-bold text-lg">Galeri Sekolah</h3>
    </div>
    <!-- Title -->

    <!-- Modal -->
    <div class="col-span-2 col-start-2 row-start-2">

        <button class="btn w-full hover:animate-pulse" onclick="modal_add_galeri.showModal()">
            <i class="fas fa-plus"></i>
            Tambah Galeri
        </button>

    </div>
    <!-- Modal -->

    <!-- Toggle -->
    <div class="col-span-2 row-start-2 col-start-7 flex justify-center items-center gap-x-3">
        Aktif/Nonaktif Konten
        <input type="checkbox" class="toggle rounded-md" checked />
    </div>
    <!-- Toggle -->

    <!-- Content -->
    <div class="col-span-9 row-start-3">
        <div class="overflow-x-auto mt-5 px-16">
            <table class="table text-center">
                <!-- head -->
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Link Gambar</th>
                        <th>Tanggal Rilis</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- row 1 -->
                    <tr class="hover">
                        <th>1</th>
                        <td>
                            <p class="truncate w-64">
                                image/Humans.svg
                            </p>
                        </td>
                        <td>24-04-2024</td>
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
                                            onclick="modal_edit_galeri.showModal()">
                                            <i class="fas fa-pen-to-square"></i>
                                            Edit
                                        </button>
                                    </li>
                                    <!-- Edit -->

                                    <!-- View -->
                                    <li>
                                        <button class="btn btn-ghost w-full hover:animate-pulse"
                                            onclick="modal_view_galeri.showModal()">
                                            <i class="fas fa-circle-info"></i>
                                            Detail
                                        </button>
                                    </li>
                                    <!-- View -->

                                    <!-- Delete -->
                                    <li>
                                        <button class="btn btn-ghost w-full hover:animate-pulse"
                                            onclick="modal_delete_galeri.showModal()">
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
                        <th>Link Gambar</th>
                        <th>Tanggal Rilis</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <!-- Content -->
</div>

<dialog id="modal_add_galeri" class="modal">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Tambah Galeri Sekolah</h3>

        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-success"></div>
            <div class="divider"></div>
        </div>
        <form action="">

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

<dialog id="modal_edit_galeri" class="modal">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Edit Data Galeri Sekolah</h3>

        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-success"></div>
            <div class="divider"></div>
        </div>
        <form action="">
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

<dialog id="modal_view_galeri" class="modal">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Info Detail Galeri Sekolah</h3>

        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-success"></div>
            <div class="divider"></div>
        </div>
        <form action="">
            <div class="aspect-w-10 aspect-h-5 mb-5">
                <img class="w-full h-64" src="{{ asset('image/Humans.svg') }}">
            </div>

            <label
                class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <i class="far fa-file-image"></i>
                <input type="text" class="grow bg-transparent py-2" placeholder="Link Galeri" />
            </label>
            <label
                class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <i class="far fa-calendar"></i>
                <input type="date" class="grow bg-transparent py-2" placeholder="" />
            </label>

        </form>
    </div>
</dialog>

<dialog id="modal_delete_galeri" class="modal">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Hapus Galeri</h3>

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
<!-- Fourth Content -->

@endsection