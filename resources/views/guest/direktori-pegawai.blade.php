@extends('layouts.main')

@section('Main')

<div class="divider">
    <p class="font-bold text-xl">DIREKTORI PEGAWAI</p>
</div>
<div class="flex justify-end">
    <label class="input input-bordered flex justify-between items-center gap-2">
        <input type="text" class="grow" placeholder="Cari Pegawai" />
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70">
            <path fill-rule="evenodd"
                d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z"
                clip-rule="evenodd" />
        </svg>
    </label>
</div>

<div class="grid grid-cols-4 gap-3 gap-y-10 my-24">
    @foreach ( $direktoriPegawai as $pegawaiIndex => $pegawai )
    <div class="mx-auto">
        <button class="hover:scale-110 transition-all duration-300"
            onclick="window['my_modal_view{{ $pegawai->id_pegawai }}'].showModal()">
            <div class="card card-compact w-64 h-80 shadow-xl">
                <div class="h-2/5 bg-indigo-600 rounded-t-lg">
                    <div class=" avatar mx-auto h-28 translate-y-[4rem] translate-x-16">
                        <div class="w-32 h-32 rounded-full">
                            <img src="{{ asset('storage/'.$pegawai->gambar_pegawai) }}" />
                        </div>
                    </div>

                    <div class="card-body bg-base-100">
                        <h2 class="text-center font-bold text-xl mt-16 truncate w-48 mx-auto">
                            {{ $pegawai->nama_pegawai }}
                        </h2>
                        <p class="text-center truncate w-60">{{ $pegawai->jabatan_pegawai }}</p>
                        <p class="text-center">{{ $pegawai->nik_pegawai }}</p>
                    </div>
                </div>
            </div>
        </button>
    </div>


    <dialog id="my_modal_view{{ $pegawai->id_pegawai }}" class="modal">
        <div class="modal-box w-10/12 max-w-5xl">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-3 top-3">
                    <i class="fas fa-times text-2xl"></i>
                </button>
            </form>
            <h3 class="font-bold text-lg">
                <i class="far fa-id-card mr-5"></i>
                Info Detail Pegawai
            </h3>
            <div class="grid grid-cols-8 w-[32rem] -mt-5">
                <div class="divider"></div>
                <div class="divider divider-success"></div>
                <div class="divider"></div>
            </div>

            <div class="grid grid-cols-3 my-10">
                <!-- Photo -->
                <div class="flex justify-center items-center">
                    <div class="avatar flex justify-center items-center my-5">
                        <div class="mask mask-squircle w-44 h-44">
                            <img src="{{ asset('storage/'.$pegawai->gambar_pegawai) }}"
                                alt="Avatar Tailwind CSS Component" />
                        </div>
                    </div>
                    <div class="divider divider-horizontal translate-x-8"></div>
                </div>
                <!-- Photo -->
                <!-- Information -->
                <div class="col-span-2">
                    <table class="w-full">
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td>
                                {{ $pegawai->nama_pegawai }}
                            </td>
                        </tr>
                        <tr>
                            <td>NIK</td>
                            <td>:</td>
                            <td>
                                {{ $pegawai->nik_pegawai }}
                            </td>
                        </tr>
                        <tr>
                            <td>Tempat, Tanggal Lahir</td>
                            <td>:</td>
                            <td>
                                {{ $pegawai->tempat_lahir_pegawai }}, {{ $pegawai->TTL_pegawai }}
                            </td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>:</td>
                            <td>
                                {{ $pegawai->jenis_kelamin }}
                            </td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td>
                                {{ $pegawai->alamat_pegawai }}
                            </td>
                        </tr>
                        <tr>
                            <td>No. Handphone</td>
                            <td>:</td>
                            <td>
                                {{ $pegawai->no_hp_pegawai }}
                            </td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td>
                                {{ $pegawai->email_pegawai }}
                            </td>
                        </tr>
                        <tr>
                            <td>Jabatan pegawai</td>
                            <td>:</td>
                            <td>
                                {{ $pegawai->jabatan_pegawai }}
                            </td>
                        </tr>
                        <tr>
                            <td>Status pegawai</td>
                            <td>:</td>
                            <td>
                                {{ $pegawai->status_pegawai }}
                            </td>
                        </tr>
                    </table>
                </div>
                <!-- Information -->
            </div>
        </div>

        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>


    </dialog>
    @endforeach

</div>

<div class="join flex justify-center my-5">
    <button class="join-item btn">«</button>
    <button class="join-item btn">Page 1</button>
    <button class="join-item btn">»</button>
</div>

@endsection