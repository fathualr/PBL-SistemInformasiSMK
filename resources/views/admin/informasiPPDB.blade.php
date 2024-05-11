@extends('layouts.mainAdmin')

@section('main-content')

<div class="mb-10">
    <div>
        <h2 class="text-black font-bold ml-2 mt-2 mb-8">Informasi PPDB</h2>
    </div>
    <div class="col-span-2 col-start-2">
        <details class="dropdown dropdown-right mx-5 z-50">
            <summary tabindex="0" role="button" class="btn btn-outline button w-max" onclick="rotateIcon()">
                <i class="fas fa-plus font-bold text-xl transition-all duration-500" id="plus-icon"></i>
                Tambah
            </summary>
            <ul tabindex="0" class="dropdown-content menu p-2 z-50 shadow bg-base-100 rounded-box w-max absolute">
                <li>
                    <button class="btn btn-ghost flex justify-start items-center hover:animate-pulse" onclick="my_modal_add_informasi.showModal()">
                        <i class="fa-solid fa-plus"></i>
                        Tambah Informasi PPDB
                    </button>
                </li>

                <li>
                    <button class="btn btn-ghost flex justify-start items-center hover:animate-pulse" onclick="my_modal_add_alur.showModal()">
                        <i class="fas fa-plus"></i>
                        Tambah Alur PPDB
                    </button>
                </li>
            </ul>
        </details>
    </div>

    <div class="grid grid-cols-9 shadow-xl rounded-md">
        <div class="col-span-9 row-start-2">
            <div class="mt-5">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th class="w-20">No.</th>
                            <th class="text-left pl-10">Deskripsi PPDB</th>
                            <Th class="w-20">Aksi</Th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($informasi as $key => $informasi_ppdb)
                        <tr class="hover">
                            <th class="w-20">{{ $key + 1 }}</th>
                            <td class="text-left pl-10">{{ $informasi_ppdb->deskripsi_ppdb }}</td>
                            <td>
                                <details class="dropdown dropdown-right">
                                    <summary tabindex="0" role="button" class="btn btn-ghost button w-20">
                                        <i class="fas fa-circle text-[0.5rem] circle-1 transition-all duration-500"></i>
                                        <i class="fas fa-circle text-[0.5rem] circle-2 transition-all duration-500"></i>
                                        <i class="fas fa-circle text-[0.5rem] circle-3 transition-all duration-500"></i>
                                        <i class="fas fa-times font-bold text-xl hidden transition-all duration-500"></i>
                                    </summary>
                                    <ul tabindex="0" class="dropdown-content z-50 menu p-2 shadow bg-base-100 rounded-box w-32">
                                        <li>
                                            <button class="btn btn-ghost w-full hover:animate-pulse" onclick="window['my_modal_edit_informasi_{{ $informasi_ppdb->id_ppdb }}'].showModal()">
                                                <i class="fas fa-pen-to-square"></i>
                                                Edit
                                            </button>
                                        </li>
                                        <li>
                                            <button class="btn btn-ghost w-full hover:animate-pulse" onclick="window['my_modal_view_informasi_{{ $informasi_ppdb->id_ppdb }}'].showModal()">
                                                <i class="fas fa-circle-info"></i>
                                                Detail
                                            </button>
                                        </li>
                                        <li>
                                            <button class="btn btn-ghost w-full hover:animate-pulse" onclick="window['my_modal_delete_informasi_{{ $informasi_ppdb->id_ppdb }}'].showModal()">
                                                <i class="fas fa-trash"></i>
                                                Hapus
                                            </button>
                                        </li>
                                    </ul>
                                </details>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="w-20">No.</th>
                            <th class="text-left pl-10">Deskripsi PPDB</th>
                            <th class="w-20">Aksi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <dialog id="my_modal_add_informasi" class="modal" onclick="if (event.target === this) this.close()">
        <div class="modal-box">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <h3 class="font-bold text-lg">Tambah Informasi PPDB</h3>

            <div class="grid grid-cols-3 w-52 -mt-5">
                <div class="divider"></div>
                <div class="divider divider-success"></div>
                <div class="divider"></div>
            </div>

            <form action="{{ route('admin.informasiPPDB.store') }}" method="post">
                @csrf
                <textarea name="deskripsi_ppdb" class="input border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none grow bg-transparent py-2" placeholder="Deskripsi Informasi PPDB"></textarea>
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

    @foreach($informasi as $key => $informasi_ppdb)
    <dialog id="my_modal_edit_informasi_{{ $informasi_ppdb->id_ppdb }}" class="modal" onclick="if (event.target === this) this.close()">
        <div class="modal-box">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <h3 class="font-bold text-lg">Edit Data</h3>
            <div class="grid grid-cols-3 w-52 -mt-5">
                <div class="divider"></div>
                <div class="divider divider-success"></div>
                <div class="divider"></div>
            </div>
            <form action="{{ route('admin.informasiPPDB.update', $informasi_ppdb->id_ppdb) }}" method="post">
                @csrf
                @method('PATCH')
                <textarea name="deskripsi_ppdb" class="input border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none grow bg-transparent py-2" placeholder="Deskripsi Informasi PPDB">{{ $informasi_ppdb->deskripsi_ppdb }}</textarea>
                <div class="flex justify-end items-end mt-20 gap-4">
                    <button type="submit" class="btn bg-elm w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
                        <i class="fas fa-pen-to-square"></i>
                        Edit
                    </button>
                </div>
            </form>
        </div>
    </dialog>

    <dialog id="my_modal_view_informasi_{{ $informasi_ppdb->id_ppdb }}" class="modal" onclick="if (event.target === this) this.close()">
        <div class="modal-box">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <h3 class="font-bold text-lg">Detail Deskripsi Informasi PPDB</h3>
            <div class="grid grid-cols-3 w-52 -mt-5">
                <div class="divider"></div>
                <div class="divider divider-success"></div>
                <div class="divider"></div>
            </div>
            <form action="">
                <textarea name="deskripsi_ppdb" class="input border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none grow bg-transparent py-2" placeholder="Deskripsi Informasi PPDB" readonly>{{ $informasi_ppdb->deskripsi_ppdb }}</textarea>
            </form>
        </div>
    </dialog>

    <dialog id="my_modal_delete_informasi_{{ $informasi_ppdb->id_ppdb }}" class="modal" onclick="if (event.target === this) this.close()">
        <div class="modal-box">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <h3 class="font-bold text-lg">Hapus Data Informasi PPDB</h3>
            <div class="grid grid-cols-3 w-52 -mt-5">
                <div class="divider"></div>
                <div class="divider divider-success"></div>
                <div class="divider"></div>
            </div>
            <form action="{{ route('admin.informasiPPDB.destroy', $informasi_ppdb->id_ppdb) }}" method="post">
                @csrf
                @method('DELETE')
                Apakah Anda Yakin Ingin Menghapus Data Ini ?

                <div class="flex justify-end items-end mt-20 gap-4">
                    <button type="submit" class="btn bg-error w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-error">
                        <i class="fas fa-trash"></i>
                        Hapus
                    </button>
                </div>
            </form>
        </div>
    </dialog>
</div>
@endforeach

<div class="mt-20">
    <div>
        <h2 class="text-black font-bold ml-2 mt-2 mb-8">Alur PPDB</h2>
    </div>
    <div class="grid grid-cols-9 shadow-xl rounded-md">
        <div class="col-span-9 row-start-2">
            <div class="mt-5">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th class="w-20">No.</th>
                            <th class="text-left pl-10 w-52">Judul Alur</th>
                            <Th class="text-left pl-10 w-52">Tanggal Alur</Th>
                            <Th class="text-left pl-10">Deskripsi Alur</Th>
                            <Th class="w-20">Aksi</Th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($alurs as $key => $alur_ppdb)
                        <tr class="hover">
                            <th class="w-20">{{ $key + 1 }}</th>
                            <td class="text-left pl-10 w-52">{{ $alur_ppdb->judul_alur }}</td>
                            <td class="text-left pl-10 w-52">{{ $alur_ppdb->tanggal_alur }}</td>
                            <td class="text-left pl-10">{{ $alur_ppdb->deskripsi_alur }}</td>
                            <td>
                                <details class="dropdown dropdown-right">
                                    <summary tabindex="0" role="button" class="btn btn-ghost button w-20">
                                        <i class="fas fa-circle text-[0.5rem] circle-1 transition-all duration-500"></i>
                                        <i class="fas fa-circle text-[0.5rem] circle-2 transition-all duration-500"></i>
                                        <i class="fas fa-circle text-[0.5rem] circle-3 transition-all duration-500"></i>
                                        <i class="fas fa-times font-bold text-xl hidden transition-all duration-500"></i>
                                    </summary>
                                    <ul tabindex="0" class="dropdown-content z-50 menu p-2 shadow bg-base-100 rounded-box w-32">
                                        <li>
                                            <button class="btn btn-ghost w-full hover:animate-pulse" onclick="window['my_modal_edit_alur_{{ $alur_ppdb->id_alur }}'].showModal()">
                                                <i class="fas fa-pen-to-square"></i>
                                                Edit
                                            </button>
                                        </li>
                                        <li>
                                            <button class="btn btn-ghost w-full hover:animate-pulse" onclick="window['my_modal_view_alur_{{ $alur_ppdb->id_alur }}'].showModal()">
                                                <i class="fas fa-circle-info"></i>
                                                Detail
                                            </button>
                                        </li>
                                        <li>
                                            <button class="btn btn-ghost w-full hover:animate-pulse" onclick="window['my_modal_delete_alur_{{ $alur_ppdb->id_alur }}'].showModal()">
                                                <i class="fas fa-trash"></i>
                                                Hapus
                                            </button>
                                        </li>
                                    </ul>
                                </details>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="w-20">No.</th>
                            <th class="text-left pl-10 w-52">Judul Alur</th>
                            <Th class="text-left pl-10 w-52">Tanggal Alur</Th>
                            <Th class="text-left pl-10">Deskripsi Alur</Th>
                            <Th class="w-20">Aksi</Th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <dialog id="my_modal_add_alur" class="modal">
        <div class="modal-box">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <h3 class="font-bold text-lg">Tambah Alur PPDB</h3>

            <div class="grid grid-cols-3 w-52 -mt-5">
                <div class="divider"></div>
                <div class="divider divider-success"></div>
                <div class="divider"></div>
            </div>

            <form action="{{ route('admin.alurPPDB.store') }}" method="post">
                @csrf

                <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                    <input type="text" name="judul_alur" class="grow bg-transparent py-2" placeholder="Judul Alur" />
                </label>

                <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                    <input type="date" name="tanggal_alur" class="grow bg-transparent py-2" placeholder="Tanggal Alur" />
                </label>

                <textarea name="deskripsi_alur" class="input border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none grow bg-transparent py-2" placeholder="Deskripsi Alur"></textarea>

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

    @foreach($alurs as $key => $alur_ppdb)
    <dialog id="my_modal_edit_alur_{{ $alur_ppdb->id_alur }}" class="modal" onclick="if (event.target === this) this.close()">
        <div class="modal-box">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <h3 class="font-bold text-lg">Edit Data</h3>
            <form action="{{ route('admin.alurPPDB.update', $alur_ppdb->id_alur) }}" method="post">
                @csrf
                @method('PATCH')

                <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                    <input type="text" name="judul_alur" class="grow bg-transparent py-2" value="{{ $alur_ppdb->judul_alur }}" />
                </label>

                <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                    <input type="date" name="tanggal_alur" class="grow bg-transparent py-2" value="{{ $alur_ppdb->tanggal_alur }}" />
                </label>

                <textarea name="deskripsi_alur" class="input border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none grow bg-transparent py-2">{{ $alur_ppdb->deskripsi_alur }}</textarea>

                <div class="flex justify-end items-end mt-20 gap-4">
                    <button type="submit" class="btn bg-elm w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
                        <i class="fas fa-pen-to-square"></i>
                        Edit
                    </button>
                </div>
            </form>
        </div>
    </dialog>

    <dialog id="my_modal_view_alur_{{ $alur_ppdb->id_alur }}" class="modal" onclick="if (event.target === this) this.close()">
        <div class="modal-box">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <h3 class="font-bold text-lg">Info Detail Data</h3>
            <form action="">
                <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                    <input type="text" name="judul_alur" class="grow bg-transparent py-2" value="{{ $alur_ppdb->judul_alur }}" readonly />
                </label>

                <label class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                    <input type="date" name="tanggal_alur" class="grow bg-transparent py-2" value="{{ $alur_ppdb->tanggal_alur }}" readonly />
                </label>

                <textarea name="deskripsi_alur" class="input border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none grow bg-transparent py-2" readonly>{{ $alur_ppdb->deskripsi_alur }}</textarea>
            </form>
        </div>
    </dialog>

    <dialog id="my_modal_delete_alur_{{ $alur_ppdb->id_alur }}" class="modal" onclick="if (event.target === this) this.close()">
        <div class="modal-box">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <h3 class="font-bold text-lg">Hapus Data Alur PPDB</h3>
            <form action="{{ route('admin.alurPPDB.destroy', $alur_ppdb->id_alur) }}" method="post">
                @csrf
                @method('DELETE')
                Apakah Anda Yakin Ingin Menghapus Data Ini ?

                <div class="flex justify-end items-end mt-20 gap-4">
                    <button type="submit" class="btn bg-error w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-error">
                        <i class="fas fa-trash"></i>
                        Hapus
                    </button>
                </div>
            </form>
        </div>
    </dialog>
    @endforeach

    @endsection