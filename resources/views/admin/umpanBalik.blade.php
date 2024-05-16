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
        <div class="mt-5">
            <table class="table text-center">
                <!-- head -->
                <thead>
                    <tr>
                        <th>No.</th>
                        <th class="w-48">Email</th>
                        <th class="w-48">Isi Pesan</th>
                        <th class="w-32">Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $umpanBalik as $umpanIndex => $umpan )
                    <tr class="hover">
                        <th>{{ $umpanIndex + 1 }}</th>
                        <td>{{ $umpan->email_penulis }}</td>
                        <td>
                            <p class="truncate w-28 mx-auto">
                                {{ $umpan->deskripsi_pesan }}
                            </p>
                        </td>
                        <td>{{ $umpan->created_at }}</td>
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
                                            onclick="window['my_modal_view{{ $umpan->id_pesan }}'].showModal()">
                                            <i class="fas fa-circle-info"></i>
                                            Detail
                                        </button>
                                    </li>
                                    <!-- View -->

                                    <!-- Delete -->
                                    <li>
                                        <button class="btn btn-ghost w-full hover:animate-pulse"
                                            onclick="window['my_modal_delete{{ $umpan->id_pesan }}'].showModal()">
                                            <i class="fas fa-trash"></i>
                                            Hapus
                                        </button>
                                    </li>
                                    <!-- Delete -->
                                </ul>
                            </details>
                        </td>
                    </tr>

                    <!-- View Modal -->
                    <dialog id="my_modal_view{{ $umpan->id_pesan }}" class="modal">
                        <div class="modal-box w-11/12 max-w-5xl">
                            <form method="dialog">
                                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                            </form>
                            <h3 class="font-bold text-lg">Detail Umpan balik</h3>
                            <div class="grid grid-cols-3 w-52 -mt-5">
                                <div class="divider"></div>
                                <div class="divider divider-success"></div>
                                <div class="divider"></div>
                            </div>

                            <div class="grid grid-cols-2 gap-5">
                                <div class="col-span-1">

                                    <label class="form-control w-full">
                                        <div class="label">
                                            <span class="label-text">Nama</span>
                                        </div>
                                        <input type="text" placeholder="Masukkan Nama"
                                            class="input input-bordered w-full" name="nama_penulis"
                                            value="{{ $umpan->nama_penulis }}" readonly />
                                    </label>
                                </div>

                                <div class="col-span-1">
                                    <label class="form-control w-full">
                                        <div class="label">
                                            <span class="label-text">Email</span>
                                        </div>
                                        <input type="text" placeholder="example@gmail.com"
                                            class="input input-bordered w-full" name="email_penulis"
                                            value="{{ $umpan->email_penulis }}" readonly />
                                    </label>
                                </div>

                                <div class="col-span-2">
                                    <label class="form-control w-full">
                                        <div class="label">
                                            <span class="label-text">Isi Pesan</span>
                                        </div>
                                        <textarea class="textarea textarea-bordered h-48"
                                            placeholder="Ketikkan Komentar Disini" name="deskripsi_pesan"
                                            readonly>{{ $umpan->deskripsi_pesan }}</textarea>
                                    </label>
                                </div>

                            </div>

                        </div>
                    </dialog>
                    <!-- View Modal -->

                    <!-- Delete Modal -->
                    <dialog id="my_modal_delete{{ $umpan->id_pesan }}" class="modal">
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
                            <form action="{{ route('UmpanBalik.destroy', ['id_pesan' => $umpan->id_pesan]) }}"
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
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
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

@endsection
