@extends('layouts.mainAdmin')

@section('main-content')

<div class="grid grid-cols-9 shadow-xl rounded-md">

    <div class="col-span-3 my-4 mx-5">
        <h3 class="font-bold text-lg">Pengelolaan Umpan Balik</h3>
    </div>

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
        <div class="overflow-x-auto mt-5 px-16">
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
                        <th>Email</th>
                        <th>Judul</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="hover">
                        <th>
                            <label>
                                <input type="checkbox" class="checkbox" />
                            </label>
                        </th>
                        <th>1</th>
                        <td>$email</td>
                        <td>$judul</td>
                        <td>$tanggal</td>
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
                        <th>
                        </th>
                        <th>No.</th>
                        <th>Email</th>
                        <th>Judul</th>
                        <th>Tanggal</th>
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
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Tambah Berita</h3>
        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-success"></div>
            <div class="divider"></div>
        </div>
        <form action="">
            <div class="grid gap-y-5">
                <input type="text" class="input input-bordered input-success w-full" placeholder="Judul berita" />
                <input type="file" class="file-input file-input-bordered file-input-success w-full" placeholder="Pilih gambar berita" />
                <textarea class="textarea textarea-success w-full" placeholder="Isi berita"></textarea>
                <input type="text" class="input input-bordered input-success w-full" placeholder="Kategori berita" />
                <input type="date" class="input input-bordered input-success w-full" placeholder="" />
            </div>
            <div class="flex justify-end items-end mt-10 gap-4">
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
<!-- Modal CREATE end -->

<!-- Modal VIEW -->
<dialog id="my_modal_view" class="modal">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Detail Umpan balik</h3>
        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-success"></div>
            <div class="divider"></div>
        </div>
        <div>
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Nama:</span>
                </div>
                <input type="text" placeholder="$nama" class="input input-bordered w-full" disabled/>
            </label>
        </div>
        <div>
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Email:</span>
                </div>
                <input type="text" placeholder="$email" class="input input-bordered w-full" disabled/>
            </label>
        </div>
        <div>
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Judul:</span>
                </div>
                <input type="text" placeholder="$judul" class="input input-bordered w-full" disabled/>
            </label>
        </div>
        <div>
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Deskripsi:</span>
                </div>
                <input type="text" placeholder="$deskripsi" class="input input-bordered w-full" disabled/>
            </label>
        </div>
        <div>
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Tanggal:</span>
                </div>
                <input type="text" placeholder="$tanggal" class="input input-bordered w-full" disabled/>
            </label>
        </div>
    </div>
</dialog>
<!-- Modal VIEW end -->

<!-- Modal DELETE -->
<dialog id="my_modal_delete" class="modal">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Hapus Umpan Balik</h3>
        <div class="flex justify-end items-end gap-4">
            <a href="" class="">
                <button type="submit"
                    class="btn bg-error w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-error">
                    Hapus
                </button>
            </a>
        </div>
    </div>
</dialog>
<!-- Modal DELETE end -->

@endsection