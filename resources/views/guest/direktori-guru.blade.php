@extends('layouts.main')

@section('Main')

<div class="divider">
    <p class="font-bold text-xl">DIREKTORI GURU</p>
</div>
<div class="flex justify-end">
    <label class="input input-bordered flex justify-between items-center gap-2">
        <input type="text" class="grow" placeholder="Cari Guru" />
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70">
            <path fill-rule="evenodd"
                d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z"
                clip-rule="evenodd" />
        </svg>
    </label>
</div>

<div
    class="grid {{ count($direktoriGuru) > 3 ? 'grid-cols-4' : (count($direktoriGuru) > 2 ? 'grid-cols-3' : (count($direktoriGuru) > 1 ? 'grid-cols-2' : 'grid-cols-1')) }} gap-3 gap-y-10 my-24 mx-auto">

    @foreach($direktoriGuru as $guru)
    <div class="mx-auto">
        <button class="hover:scale-110 transition-all duration-300"
            onclick="window['my_modal_view{{ $guru->id_guru }}'].showModal()">
            <div class="card card-compact w-64 h-80 shadow-xl">
                <div class="h-2/5 bg-indigo-600 rounded-t-lg">
                    <div class="avatar mx-auto h-28 translate-y-[4rem]">
                        <div class="w-32 h-32 rounded-full">
                            <img src="{{ asset('storage/'.$guru->gambar_guru) }}" />
                        </div>
                    </div>
                    <div class="card-body bg-base-100">
                        <h2 class="text-center font-bold text-xl mt-16 truncate w-48 mx-auto">{{ $guru->nama_guru }}
                        </h2>
                        <p class="text-center">{{ $guru->programKeahlian->nama_program }}</p>
                        <p class="text-center">{{ $guru->nik_guru }}</p>
                    </div>
                </div>
            </div>
        </button>
    </div>

    <dialog id="my_modal_view{{ $guru->id_guru }}" class="modal">
        <div class="modal-box w-10/12 max-w-5xl">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-3 top-3">
                    <i class="fas fa-times text-2xl"></i>
                </button>
            </form>
            <h3 class="font-bold text-lg">
                <i class="far fa-id-card mr-5"></i>
                Info Detail Guru
            </h3>
            <div class="grid grid-cols-8 w-[32rem] -mt-5">
                <div class="divider"></div>
                <div class="divider divider-primary"></div>
                <div class="divider"></div>
            </div>
            <div class="grid grid-cols-3 my-10">
                <!-- Photo -->
                <div class="flex justify-center items-center">
                    <div class="avatar flex justify-center items-center my-5">
                        <div class="mask mask-squircle w-44 h-44">
                            <img src="{{ asset('storage/'.$guru->gambar_guru) }}" alt="Avatar Tailwind CSS Component" />
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
                                {{ $guru->nama_guru }}
                            </td>
                        </tr>
                        <tr>
                            <td>NIK</td>
                            <td>:</td>
                            <td>
                                {{ $guru->nik_guru }}
                            </td>
                        </tr>
                        <tr>
                            <td>Program Keahlian</td>
                            <td>:</td>
                            <td>
                                {{ $guru->programKeahlian->nama_program }}
                            </td>
                        </tr>
                        <tr>
                            <td>Tempat, Tanggal Lahir</td>
                            <td>:</td>
                            <td>
                                {{ $guru->tempat_lahir_guru }}, {{ $guru->TTL_guru }}
                            </td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>:</td>
                            <td>
                                {{ $guru->jenis_kelamin }}
                            </td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td>
                                {{ $guru->alamat_guru }}
                            </td>
                        </tr>
                        <tr>
                            <td>No. Handphone</td>
                            <td>:</td>
                            <td>
                                {{ $guru->no_hp_guru }}
                            </td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td>
                                {{ $guru->email_guru }}
                            </td>
                        </tr>
                        <tr>
                            <td>Jabatan Guru</td>
                            <td>:</td>
                            <td>
                                {{ $guru->jabatan_guru }}
                            </td>
                        </tr>
                        <tr>
                            <td>Status Guru</td>
                            <td>:</td>
                            <td>
                                {{ $guru->status_guru }}
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



@endsection