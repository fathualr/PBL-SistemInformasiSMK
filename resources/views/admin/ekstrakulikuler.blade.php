@extends('layouts.mainAdmin')

@section('main-content')

<div class="grid grid-cols-9 shadow-xl rounded-md">

    <div class="col-span-3 my-4 mx-5">
        <h3 class="font-bold text-lg">Pengelolaan Ekstrakulikuler</h3>
    </div>

    <!-- Modal -->
    <div class="col-span-2 col-start-2 row-start-2">
        <button class="btn w-full hover:animate-pulse" onclick="my_modal_add.showModal()">
            <i class="fas fa-user-plus"></i>
            Tambah Ekstrakulikuler
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
                        <th>Gambar</th>
                        <th>Nama</th>
                        <th>Pembina</th>
                        <th>Jadwal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- row 1 -->
                    <tr class="hover">
                        <th>
                            <label>
                                <input type="checkbox" class="checkbox" />
                            </label>
                        </th>
                        <th>1</th>
                        <td class="flex justify-center">
                            <figure class="max-w-40 max-h-40"><img src="{{asset('image/test-ekskul.png')}}" alt="Shoes" /></figure>
                        </td>
                        <td>$nama</td>
                        <td>$pembina</td>
                        <td>$jadwal</td>
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
                <thead>
                    <tr>
                        <th>
                        </th>
                        <th>No.</th>
                        <td>Gambar</td>
                        <td>Nama</td>
                        <td>Pembina</td>
                        <td>Jadwal</th>
                        <td>Aksi</td>
                    </tr>
                </thead>
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
        <form action="">
            <div class="grid gap-y-5">
                <input type="text" class="input input-bordered input-success w-full" placeholder="Nama Ekstrakulikuler" />
                <input type="file" class="file-input file-input-bordered file-input-success w-full" placeholder="Pilih gambar berita" />
                <select class="select select-success w-full">
                    <option disabled selected>Pembimbing Ekstrakulikuler</option>
                    <option>pembimbing 1</option>
                    <option>pembimbing 2</option>
                    <option>pembimbing 3</option>
                </select>
                <textarea class="textarea textarea-success w-full" placeholder="Deskripsi Ekstrakulikuler"></textarea>
                <input type="text" class="input input-bordered input-success w-full" placeholder="Tempat Ekstrakulikuler" />
                <input type="text" class="input input-bordered input-success w-full" placeholder="Jadwal Ekstrakulikuler" />
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

<!-- Modal EDIT -->
<dialog id="my_modal_edit" class="modal">
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
        <form action="">
            <div class="grid gap-y-5">
                <input type="text" class="input input-bordered input-success w-full" placeholder="$nama" />
                <input type="file" class="file-input file-input-bordered file-input-success w-full" placeholder="Pilih gambar ekskul" />
                <select class="select select-success w-full">
                    <option disabled selected>Pembimbing Ekstrakulikuler</option>
                    <option>pembimbing 1</option>
                    <option>pembimbing 2</option>
                    <option>pembimbing 3</option>
                </select>
                <textarea class="textarea textarea-success w-full" placeholder="$deskripsi"></textarea>
                <input type="text" class="input input-bordered input-success w-full" placeholder="$tempat" />
                <input type="text" class="input input-bordered input-success w-full" placeholder="$jadwal" />
            </div>
            <div class="flex justify-end items-end mt-10 gap-4">
                <a href="" class="">
                    <button type="submit"
                        class="btn bg-elm w-60 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
                        <i class=" fas fa-plus"></i>
                        Simpan perubahan
                    </button>
                </a>
            </div>
        </form>
    </div>
</dialog>
<!-- Modal EDIT end -->

<!-- Modal VIEW -->
<dialog id="my_modal_view" class="modal">
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
        <div>
            <figure class="w-full flex justify-center mb-10"><img src="{{asset('image/test-ekskul.png')}}" alt="Shoes" /></figure>
            <p>$DeskripsiEkstrakulikuler</p>
            <p>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Porro aliquam esse veritatis, animi praesentium tempore? Eligendi aperiam adipisci totam sit deserunt laboriosam accusamus? Iure rem hic quas dolore officiis omnis.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur dolorum distinctio necessitatibus commodi illo explicabo sit animi, non saepe eum minus quibusdam iure repellendus delectus corporis debitis amet iusto dignissimos.
            </p>
            <label class="form-control w-full">
                <div class="label mt-5">
                    <span class="label-text">Pembimbing:</span>
                </div>
                <input type="text" placeholder="$pembimbing" class="input input-bordered input-sm w-full" disabled/>
            </label>
            <label class="form-control w-full">
                <div class="label mt-5">
                    <span class="label-text">Jadwal:</span>
                </div>
                <input type="text" placeholder="$jadwal" class="input input-bordered input-sm w-full" disabled/>
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
        <h3 class="font-bold text-lg">Hapus Ekstrakulikuler</h3>
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