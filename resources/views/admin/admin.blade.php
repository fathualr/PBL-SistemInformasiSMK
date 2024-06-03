@extends('layouts.mainAdmin')

@section('main-content')

<div class="grid grid-cols-9 shadow-lg rounded-md px-4">
    @include('shared.success-message')
    @include('shared.error-message')

    <div class="col-span-4 my-4 mx-5 row-start-2">
        <h3 class="font-bold text-lg">Pengelolaan Admin</h3>
    </div>

    <!-- Modal -->
    <div class="col-span-3 row-start-3 mx-5">
        <button class="btn btn-outline w-full hover:animate-pulse" onclick="my_modal_add.showModal()">
            <i class="fas fa-user-plus"></i>
            Tambah Data
        </button>
    </div>
    <!-- Modal -->

    <!-- Content -->
    <div class="col-span-9 row-start-4 mt-5">
        <table class="table border-collapse border border-slate-200 text-center">
            <!-- head -->
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($admin as $key => $adm)
                <tr class="hover">
                    <th>{{ ($admin->currentPage() - 1) * $admin->perPage() + $key + 1 }}</th>
                    <td>{{ $adm->nama }}</td>
                    <td>{{ $adm->username }}</td>
                    <td>{{ $adm->role }}</td>
                    <td>
                        <details class="dropdown dropdown-bottom">
                            <summary tabindex="0" role="button" class="btn btn-ghost button w-20">
                                <i class="fas fa-circle text-[0.5rem] circle-1 transition-all duration-500"></i>
                                <i class="fas fa-circle text-[0.5rem] circle-2 transition-all duration-500"></i>
                                <i class="fas fa-circle text-[0.5rem] circle-3 transition-all duration-500"></i>
                                <i class="fas fa-times font-bold text-xl hidden transition-all duration-500"></i>
                            </summary>
                            <ul tabindex="0" class="dropdown-content z-50 menu p-2 shadow bg-base-100 rounded-box w-32">
                                <!-- Edit -->
                                <li>
                                    <button class="btn btn-ghost w-full hover:animate-pulse" onclick="my_modal_edit_{{ $adm->id_admin }}.showModal()">
                                        <i class="fas fa-pen-to-square"></i>
                                        Edit
                                    </button>
                                </li>
                                <!-- Edit -->

                                <!-- View -->
                                <li>
                                    <button class="btn btn-ghost w-full hover:animate-pulse" onclick="my_modal_view_{{ $adm->id_admin }}.showModal()">
                                        <i class="fas fa-circle-info"></i>
                                        Detail
                                    </button>
                                </li>
                                <!-- View -->

                                <!-- Delete -->
                                <li>
                                    <button class="btn btn-ghost w-full hover:animate-pulse" onclick="my_modal_delete_{{ $adm->id_admin }}.showModal()">
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
                    <th>Username</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
        </table>

        <!-- Pagination -->
        <div class="join flex justify-center my-5">
            @if($admin->previousPageUrl())
            <a href="{{ $admin->previousPageUrl() }}" class="join-item btn">«</a>
            @else
            <button class="join-item btn disabled">«</button>
            @endif

            <button class="join-item btn">Page {{ $admin->currentPage() }}</button>

            @if($admin->nextPageUrl())
            <a href="{{ $admin->nextPageUrl() }}" class="join-item btn">»</a>
            @else
            <button class="join-item btn disabled">»</button>
            @endif
        </div>

    </div>
    <!-- Content -->
</div>

<dialog id="my_modal_add" class="modal">
    <div class="modal-box w-11/12 max-w-5xl">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-4 top-4">
                <i class="fas fa-times text-xl"></i>
            </button>
        </form>
        <h3 class="font-bold text-lg">Tambah Administrator</h3>

        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-primary"></div>
            <div class="divider"></div>
        </div>

        <!--Form CREATE admin-->
        <form action="{{ route('admin.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-2 grid-flow-row gap-4">

                <div class="">
                    <div class="label">
                        <span class="label-text">Nama :</span>
                    </div>
                    <label class="input bg-transparent border-2 border-blue-600 flex items-center gap-2 w-full focus-within:outline-none">
                        <input type="text" class="grow bg-transparent py-2" placeholder="Nama" name="nama" />
                    </label>
                    @error('nama')
                    <div class="label">
                        <span class="label-text-alt text-red-500">{{ $message }}</span>
                    </div>
                    @enderror
                </div>

                <div class="">
                    <div class="label">
                        <span class="label-text">Username :</span>
                    </div>
                    <label class="input bg-transparent border-2 border-blue-600 flex items-center gap-2 w-full focus-within:outline-none">
                        <input type="text" class="grow bg-transparent py-2" placeholder="Username" name="username" />
                    </label>
                    @error('username')
                    <div class="label">
                        <span class="label-text-alt text-red-500">{{ $message }}</span>
                    </div>
                    @enderror
                </div>

                <div class="">
                    <div class="label">
                        <span class="label-text">Password :</span>
                    </div>
                    <label class="input bg-transparent border-2 border-blue-600 flex items-center gap-2 w-full focus-within:outline-none">
                        <input type="password" class="grow py-2" id="passwordInput" placeholder="Password" name="password" />
                        <i class="fas fa-eye" id="togglePassword"></i>
                    </label>
                    @error('password')
                    <div class="label">
                        <span class="label-text-alt text-red-500">{{ $message }}</span>
                    </div>
                    @enderror
                </div>

                <div class="">
                    <div class="label">
                        <span class="label-text">Role :</span>
                    </div>
                    <select class="select border-b-2 border-blue-600 w-full focus-within:outline-none px-10" name="role">
                        <option value="" disabled selected>Role</option>
                        <option value="Master">Master</option>
                        <option value="Admin">Admin</option>
                    </select>
                    @error('role')
                    <div class="label">
                        <span class="label-text-alt text-red-500">{{ $message }}</span>
                    </div>
                    @enderror
                </div>

            </div>
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
        <!--END Form CREATE admin-->
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>

@foreach ($admin as $adm)
<dialog id="my_modal_edit_{{ $adm->id_admin }}" class="modal">
    <div class="modal-box w-11/12 max-w-5xl">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Edit Administrator</h3>

        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-primary"></div>
            <div class="divider"></div>
        </div>

        <!--Form EDIT admin-->
        <form action="{{ route('admin.update', $adm->id_admin) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="grid grid-cols-2 grid-flow-row gap-4">

                <div class="">
                    <div class="label">
                        <span class="label-text">Nama :</span>
                    </div>
                    <label class="input bg-transparent border-2 border-blue-600 flex items-center gap-2 w-full focus-within:outline-none">
                        <input type="text" class="grow bg-transparent py-2" value="{{ $adm->nama }}" name="nama" />
                    </label>
                    @error('nama')
                    <div class="label">
                        <span class="label-text-alt text-red-500">{{ $message }}</span>
                    </div>
                    @enderror
                </div>

                <div class="">
                    <div class="label">
                        <span class="label-text">Username :</span>
                    </div>
                    <label class="input bg-transparent border-2 border-blue-600 flex items-center gap-2 w-full focus-within:outline-none">
                        <input type="text" class="grow bg-transparent py-2" value="{{ $adm->username }}" name="username" />
                    </label>
                    @error('username')
                    <div class="label">
                        <span class="label-text-alt text-red-500">{{ $message }}</span>
                    </div>
                    @enderror
                </div>

                <div class="">
                    <div class="label">
                        <span class="label-text">Password :</span>
                    </div>
                    <label class="input bg-transparent border-2 border-blue-600 flex items-center gap-2 w-full focus-within:outline-none">
                        <input type="password" class="grow py-2" id="passwordInput" placeholder="******" value="" name="password" />
                        <i class="fas fa-eye" id="togglePassword"></i>
                    </label>
                    @error('password')
                    <div class="label">
                        <span class="label-text-alt text-red-500">{{ $message }}</span>
                    </div>
                    @enderror
                </div>

                <div class="">
                    <div class="label">
                        <span class="label-text">Role :</span>
                    </div>
                    <select class="select border-b-2 border-blue-600 w-full focus-within:outline-none px-10" name="role">
                        <option value="Master" @if ($adm->role == 'Master') selected @endif>Master</option>
                        <option value="Admin" @if ($adm->role == 'Admin') selected @endif>Admin</option>
                    </select>
                    @error('role')
                    <div class="label">
                        <span class="label-text-alt text-red-500">{{ $message }}</span>
                    </div>
                    @enderror
                </div>

                <div class="col-span-2 flex justify-end items-end mt-20 gap-4">
                    <button type="submit" class="btn bg-elm w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
                        <i class=" fas fa-pen-to-square"></i>
                        Edit
                    </button>
                </div>
            </div>
        </form>
        <!--END form EDIT admin-->

    </div>
</dialog>

<dialog id="my_modal_view_{{ $adm->id_admin }}" class="modal">
    <div class="modal-box w-11/12 max-w-5xl">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Info Detail Data Administrator</h3>
        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-primary"></div>
            <div class="divider"></div>
        </div>
        <div class="grid grid-cols-2 grid-flow-row gap-4">

            <div class="">
                <div class="label">
                    <span class="label-text">Nama :</span>
                </div>
                <label class="input bg-transparent border-2 border-blue-600 flex items-center gap-2 w-full focus-within:outline-none">
                    <input type="text" class="grow bg-transparent py-2" value="{{ $adm->nama }}" name="nama" readonly />
                </label>
                @error('nama')
                <div class="label">
                    <span class="label-text-alt text-red-500">{{ $message }}</span>
                </div>
                @enderror
            </div>

            <div class="">
                <div class="label">
                    <span class="label-text">Username :</span>
                </div>
                <label class="input bg-transparent border-2 border-blue-600 flex items-center gap-2 w-full focus-within:outline-none">
                    <input type="text" class="grow bg-transparent py-2" value="{{ $adm->username }}" name="username" readonly />
                </label>
                @error('username')
                <div class="label">
                    <span class="label-text-alt text-red-500">{{ $message }}</span>
                </div>
                @enderror
            </div>

            <div class="">
                <div class="label">
                    <span class="label-text">Password :</span>
                </div>
                <label class="input bg-transparent border-2 border-blue-600 flex items-center gap-2 w-full focus-within:outline-none">
                    <input type="password" class="grow py-2" id="passwordInput" placeholder="******" value="" name="password" readonly />
                    <i class="fas fa-eye" id="togglePassword"></i>
                </label>
                @error('password')
                <div class="label">
                    <span class="label-text-alt text-red-500">{{ $message }}</span>
                </div>
                @enderror
            </div>

            <div class="">
                <div class="label">
                    <span class="label-text">Role :</span>
                </div>
                <select class="pointer-events-none select border-b-2 border-blue-600 w-full focus-within:outline-none px-10" name="role">
                    <option value="Master" @if ($adm->role == 'Master') selected @endif>Master</option>
                    <option value="Admin" @if ($adm->role == 'Admin') selected @endif>Admin</option>
                </select>
                @error('role')
                <div class="label">
                    <span class="label-text-alt text-red-500">{{ $message }}</span>
                </div>
                @enderror
            </div>
        </div>
    </div>
</dialog>

<dialog id="my_modal_delete_{{ $adm->id_admin }}" class="modal">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Hapus Data Administrator</h3>
        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-error"></div>
            <div class="divider"></div>
        </div>
        <form action="{{ route('admin.destroy', $adm->id_admin )}}" method="POST">
            @csrf
            @method('DELETE')
            <h3 class="font-bold text-lg flex justify-center items-center">Yakin Ingin Menghapus
                Data Ini ?</h3>
            <div class="flex justify-end items-end mt-20 gap-4">
                <form action="/adminDelete" method="POST">
                    <button type="submit" class="btn bg-error w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-error">
                        <i class=" fas fa-trash"></i>
                        Hapus
                    </button>
                </form>
            </div>
        </form>
    </div>
</dialog>
@endforeach

@endsection