@extends('layouts.mainAdmin')

@section('main-content')

<div class="grid grid-cols-9 shadow-xl rounded-md">

    <!-- Modal -->
    <div class="col-span-2 col-start-2">

        <button class="btn w-full hover:animate-pulse" onclick="my_modal_add.showModal()">
            <i class="fas fa-user-plus"></i>
            Tambah
        </button>

    </div>
    <!-- Modal -->

    <!-- Search Bar -->
    <div class="col-span-2 col-start-7">
        <label class="input input-bordered flex items-center gap-2  focus-within:outline-none">
            <i class="fas fa-magnifying-glass"></i>
            <input type="text" class="grow" placeholder="Cari" />
        </label>
    </div>
    <!-- Search Bar -->

    <!-- Content -->
    <div class="col-span-9 row-start-2">
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
                        <th>Nama</th>
                        <th>Role</th>
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
                        <td>Cy Ganderton</td>
                        <td>Master</td>
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
                    <!-- row 2 -->
                    <tr class="hover">
                        <th>
                            <label>
                                <input type="checkbox" class="checkbox" />
                            </label>
                        </th>
                        <th>2</th>
                        <td>Hart Hagerty</td>
                        <td>Admin PPDB</td>
                        <td>
                            <details class="dropdown dropdown-right">
                                <summary tabindex="0" role="button" class="btn btn-ghost button w-20">
                                    <i class="fas fa-circle text-[0.5rem] circle-1 transition-all duration-500"></i>
                                    <i class="fas fa-circle text-[0.5rem] circle-2 transition-all duration-500"></i>
                                    <i class="fas fa-circle text-[0.5rem] circle-3 transition-all duration-500"></i>
                                    <i class="fas fa-times font-bold text-xl hidden transition-all duration-500"></i>
                                </summary>
                                <ul tabindex="0"
                                    class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-32">
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
                    <!-- row 3 -->
                    <tr class="hover">
                        <th>
                            <label>
                                <input type="checkbox" class="checkbox" />
                            </label>
                        </th>
                        <th>3</th>
                        <td>Brice Swyre</td>
                        <td>Admin Direktori</td>
                        <td>
                            <details class="dropdown dropdown-right">
                                <summary tabindex="0" role="button" class="btn btn-ghost button w-20">
                                    <i class="fas fa-circle text-[0.5rem] circle-1 transition-all duration-500"></i>
                                    <i class="fas fa-circle text-[0.5rem] circle-2 transition-all duration-500"></i>
                                    <i class="fas fa-circle text-[0.5rem] circle-3 transition-all duration-500"></i>
                                    <i class="fas fa-times font-bold text-xl hidden transition-all duration-500"></i>
                                </summary>
                                <ul tabindex="0"
                                    class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-32">
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
                        <th>
                            <label>
                                <input type="checkbox" class="checkbox" />
                            </label>
                        </th>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Role</th>
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
        <h3 class="font-bold text-lg">Tambah Administrator</h3>

        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-success"></div>
            <div class="divider"></div>
        </div>

        <form action="" id="add-form">

            <label
                class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <i class="fas fa-user"></i>
                <input type="text" class="grow bg-transparent py-2" placeholder="Username" />
            </label>

            <label
                class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <i class="fas fa-lock"></i>
                <input type="password" class="grow py-2" id="passwordInput" placeholder="Password" value="" />
                <i class="fas fa-eye absolute right-10" id="togglePassword"></i>
            </label>

            <select class="select border-b-2 border-elm w-full focus-within:outline-none px-10">
                <option disabled selected>
                    Pilih Role Untuk Admin
                </option>
                <option>Master</option>
                <option>Admin PPDB</option>
                <option>Admin Direktori</option>
                <option>Admin Program Keahlian</option>
                <option>Admin Ekstrakulikuler</option>
            </select>

            <div class="flex justify-end items-end mt-20 gap-4">

                <button type="reset"
                    class="btn bg-error w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-error">
                    <i class="fas fa-times"></i>
                    Reset
                </button>

                <a href="" class="">
                    <button type="submit"
                        class="btn bg-elm w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-elm"
                        id="submit-button">
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
        <h3 class="font-bold text-lg">Edit Data Administrator</h3>

        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-success"></div>
            <div class="divider"></div>
        </div>
        <form action="" method="dialog" id="edit-form">

            <label
                class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <i class="fas fa-user"></i>
                <input type="text" class="grow bg-transparent py-2" placeholder="Username" />
            </label>

            <label
                class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <i class="fas fa-lock"></i>
                <input type="password" class="grow py-2" placeholder="Password" value="" />
            </label>

            <select class="select border-b-2 border-elm w-full focus-within:outline-none px-10">
                <option disabled selected>
                    Pilih Role Untuk Admin
                </option>
                <option>Master</option>
                <option>Admin PPDB</option>
                <option>Admin Direktori</option>
                <option>Admin Program Keahlian</option>
                <option>Admin Ekstrakulikuler</option>
            </select>

            <div class="flex justify-end items-end mt-20 gap-4">

                <a href="" class="">
                    <button type="submit"
                        class="btn bg-elm w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-elm"
                        id="edit-button">
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
        <h3 class="font-bold text-lg">Info Detail Data Administrator</h3>

        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-success"></div>
            <div class="divider"></div>
        </div>
        <form action="">
            <label
                class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <i class="fas fa-user"></i>
                <input type="text" class="grow bg-transparent py-2" placeholder="Username" />
            </label>

            <label
                class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <i class="fas fa-lock"></i>
                <input type="password" class="grow py-2" id="passwordInput" placeholder="Password" value="asdfd" />
                <i class="fas fa-eye absolute right-10" id="togglePassword"></i>
            </label>
        </form>
    </div>
</dialog>

<dialog id="my_modal_delete" class="modal">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Hapus Data Administrator</h3>

        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-success"></div>
            <div class="divider"></div>
        </div>
        <form action="" id="delete-form">
            Apakah Anda Yakin Ingin Menghapus Data Ini ?

            <div class="flex justify-end items-end mt-20 gap-4">

                <a href="" class="">
                    <button type="submit"
                        class="btn bg-error w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-error"
                        id="delete-button">
                        <i class=" fas fa-trash"></i>
                        Hapus
                    </button>
                </a>

            </div>
        </form>
    </div>
</dialog>

<!-- Toast -->

<!-- Toast Add -->
<div id="toastAdd" class="toast toast-top toast-center bg-white p-4 rounded-md shadow-md border border-gray-300 hidden">
    <div class="flex justify-center items-center">
        <div class="mr-2 text-elm">
            <i class="fas fa-check"></i>
        </div>
        <div id="toast-message-add">

        </div>
    </div>
</div>
<!-- Toast Add -->

<!-- Toast Edit -->
<div id="toastEdit"
    class="toast toast-top toast-center bg-white p-4 rounded-md shadow-md border border-gray-300 hidden">
    <div class="flex justify-center items-center">
        <div class="mr-2 text-elm">
            <i class="fas fa-check"></i>
        </div>
        <div id="toast-message-edit">

        </div>
    </div>
</div>
<!-- Toast Edit -->

<!-- Toast Delete -->
<div id="toastDelete"
    class="toast toast-top toast-center bg-white p-4 rounded-md shadow-md border border-gray-300 hidden">
    <div class="flex justify-center items-center">
        <div class="mr-2 text-elm">
            <i class="fas fa-check"></i>
        </div>
        <div id="toast-message-delete">

        </div>
    </div>
</div>
<!-- Toast Delete -->

<!-- Toast -->
@endsection