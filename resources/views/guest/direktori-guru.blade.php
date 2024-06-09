@extends('layouts.main')

@section('Main')

<div class="divider">
    <p class="font-bold text-2xl">DIREKTORI GURU</p>
</div>

<div class="flex justify-between items-center mx-5">
    <div class="flex items-center">
        <div class="dropdown dropdown-hover">
            <div tabindex="0" role="button" class="btn btn-outline w-full m-1">
                <i class="fas fa-list"></i>
                Program Keahlian
            </div>
            <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-max">
                <li>
                    <a href="{{ route('guest.guru.index', array_merge(request()->query(), ['nama_program' => null])) }}" class="font-bold">
                        Tampilkan Semua
                    </a>
                </li>
                @foreach($programKeahlian as $program)
                <li>
                    <a href="{{ route('guest.guru.index', array_merge(request()->query(), ['nama_program' => $program->nama_program])) }}">
                        {{ $program->nama_program }}
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="flex items-center">
        <div class="relative hidden md:flex mr-2">
            <select onchange="window.location.href=this.value" class="select border-b-2 border-base-300">
                <option value="{{ route('guest.guru.index', array_merge(request()->query(), ['perPage' => 12])) }}" {{ request()->get('perPage') == 12 ? 'selected' : '' }}>12</option>
                <option value="{{ route('guest.guru.index', array_merge(request()->query(), ['perPage' => 24])) }}" {{ request()->get('perPage') == 24 ? 'selected' : '' }}>24</option>
                <option value="{{ route('guest.guru.index', array_merge(request()->query(), ['perPage' => 36])) }}" {{ request()->get('perPage') == 36 ? 'selected' : '' }}>36</option>
                <option value="{{ route('guest.guru.index', array_merge(request()->query(), ['perPage' => 60])) }}" {{ request()->get('perPage') == 60 ? 'selected' : '' }}>60</option>
                <option value="{{ route('guest.guru.index', array_merge(request()->query(), ['perPage' => 96])) }}" {{ request()->get('perPage') == 96 ? 'selected' : '' }}>96</option>
            </select>
        </div>
        <form action="{{ route('guest.guru.index') }}" method="GET">
            <label class="input input-bordered flex items-center gap-2 focus-within:outline-none">
                <i class="fas fa-magnifying-glass"></i>
                <input type="text" class="grow" name="search" value="{{ request()->get('search') }}" placeholder="Cari" />
            </label>
        </form>
    </div>
</div>

<div class="grid {{ count($direktoriGuru) > 3 ? 'grid-cols-4' : (count($direktoriGuru) > 2 ? 'grid-cols-3' : (count($direktoriGuru) > 1 ? 'grid-cols-2' : 'grid-cols-1')) }} gap-3 gap-y-10 my-16 mx-auto">
    @foreach($direktoriGuru as $guru)
    <div class="mx-auto">
        <button class="hover:scale-110 transition-all duration-300" onclick="window['my_modal_view{{ $guru->id_guru }}'].showModal()">
            <div class="card card-compact w-64 h-80 shadow-xl">
                <figure>
                    <img src="{{ asset('storage/' . $guru->gambar_guru) }}" class="h-28 w-full object-cover blur-sm" alt="Shoes" />
                </figure>
                <div class="h-2/5 bg-indigo-600 rounded-t-lg">
                    <div class="avatar absolute mx-auto h-28 -translate-y-12 -translate-x-16">
                        <div class="w-32 h-32 rounded-full">
                            <img src="{{ asset('storage/'.$guru->gambar_guru) }}" />
                        </div>
                    </div>
                    <div class="card-body bg-base-100">
                        <h2 class="text-center font-bold text-xl mt-16 truncate w-48 mx-auto">{{ $guru->nama_guru }}
                        </h2>
                        <p class="text-center">{{ $guru->programKeahlian ? $guru->programKeahlian->nama_program : '-' }}
                        </p>
                        <p class="text-center">{{ $guru->nik_guru }}</p>
                    </div>
                </div>
            </div>
        </button>
    </div>
    @endforeach

    @foreach($direktoriGuru as $guru)
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
                                {{ $guru->programKeahlian ? $guru->programKeahlian->nama_program : '-' }}
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

<div class="join flex justify-center my-5">
    @if($direktoriGuru->previousPageUrl())
    <a href="{{ $direktoriGuru->previousPageUrl() }}" class="join-item btn">«</a>
    @else
    <button class="join-item btn disabled">«</button>
    @endif
    <button class="join-item btn">Page {{ $direktoriGuru->currentPage() }}</button>
    @if($direktoriGuru->nextPageUrl())
    <a href="{{ $direktoriGuru->nextPageUrl() }}" class="join-item btn">»</a>
    @else
    <button class="join-item btn disabled">»</button>
    @endif
</div>

@endsection