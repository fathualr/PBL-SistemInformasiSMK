@extends('layouts.main')

@section('Main')

<div class="divider">
    <p class="font-bold text-2xl">DIREKTORI ALUMNI</p>
</div>

<div class="flex justify-between items-center mx-5">
    <div class="flex items-center">
        <div class="dropdown dropdown-hover">
            <div tabindex="0" role="button" class="btn btn-outline w-full m-1">
                <i class="fas fa-list"></i>
                Tahun Kelulusan
            </div>
            <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-48">
                <li>
                    <a href="{{ route('guest.alumni.index', array_merge(request()->query(), ['tahun_kelulusan' => null])) }}" class="font-bold">
                        Tampilkan Semua
                    </a>
                </li>
                @foreach($tahun_kelulusan_list as $tahun)
                <li>
                    <a href="{{ route('guest.alumni.index', array_merge(request()->query(), ['tahun_kelulusan' => $tahun])) }}">
                        {{ $tahun }}
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="flex items-center">
        <div class="relative hidden md:flex mr-2">
            <select onchange="window.location.href=this.value" class="select border-b-2 border-base-300">
                <option value="{{ route('guest.alumni.index', array_merge(request()->query(), ['perPage' => 10])) }}" {{ request()->get('perPage') == 10 ? 'selected' : '' }}>10</option>
                <option value="{{ route('guest.alumni.index', array_merge(request()->query(), ['perPage' => 25])) }}" {{ request()->get('perPage') == 25 ? 'selected' : '' }}>25</option>
                <option value="{{ route('guest.alumni.index', array_merge(request()->query(), ['perPage' => 50])) }}" {{ request()->get('perPage') == 50 ? 'selected' : '' }}>50</option>
                <option value="{{ route('guest.alumni.index', array_merge(request()->query(), ['perPage' => 75])) }}" {{ request()->get('perPage') == 75 ? 'selected' : '' }}>75</option>
                <option value="{{ route('guest.alumni.index', array_merge(request()->query(), ['perPage' => 100])) }}" {{ request()->get('perPage') == 100 ? 'selected' : '' }}>100</option>
            </select>
        </div>
        <form action="{{ route('guest.alumni.index') }}" method="GET">
            <label class="input input-bordered flex items-center gap-2 focus-within:outline-none">
                <i class="fas fa-magnifying-glass"></i>
                <input type="text" class="grow" name="search" value="{{ request()->get('search') }}" placeholder="Cari" />
            </label>
        </form>
    </div>
</div>

<!-- Content -->
<div class="my-10">
    <table class="table text-center">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Tahun Kelulusan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($direktoriAlumni as $alumni)
            <tr class="hover">
                <td>
                    <div class="flex justify-start items-start text-start gap-4">
                        <div class="avatar">
                            <div class="mask mask-squircle w-12 h-12">
                                <img src="{{ asset('storage/'.$alumni->gambar_alumni) }}" alt="Avatar Tailwind CSS Component" />
                            </div>
                        </div>
                        <div>
                            <div class="font-bold">{{ $alumni->nama_alumni }}</div>
                            <div class="text-sm opacity-50">{{ $alumni->email_alumni }}</div>
                        </div>
                    </div>
                </td>
                <td>{{ $alumni->alamat_alumni }}</td>
                <td>{{ $alumni->tahun_kelulusan_alumni }}</td>
                <th>
                    <button class="btn" onclick="window['my_modal_4{{ $alumni->id_alumni }}'].showModal()">
                        <i class="fas fa-eye text-xl"></i>
                    </button>
                </th>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Tahun Kelulusan</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
    </table>
</div>

<div class="join flex justify-center my-5">
    @if($direktoriAlumni->previousPageUrl())
    <a href="{{ $direktoriAlumni->previousPageUrl() }}" class="join-item btn">«</a>
    @else
    <button class="join-item btn disabled">«</button>
    @endif
    <button class="join-item btn">Page {{ $direktoriAlumni->currentPage() }}</button>
    @if($direktoriAlumni->nextPageUrl())
    <a href="{{ $direktoriAlumni->nextPageUrl() }}" class="join-item btn">»</a>
    @else
    <button class="join-item btn disabled">»</button>
    @endif
</div>

@foreach($direktoriAlumni as $alumni)
<dialog id="my_modal_4{{ $alumni->id_alumni }}" class="modal">
    <div class="modal-box w-10/12 max-w-5xl">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-3 top-3">
                <i class="fas fa-times text-2xl"></i>
            </button>
        </form>
        <h3 class="font-bold text-lg">
            <i class="far fa-id-card mr-5"></i>
            Info Detail alumni
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
                        <img src="{{ asset('storage/'.$alumni->gambar_alumni) }}" alt="Avatar Tailwind CSS Component" />
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
                        <td>{{ $alumni->nama_alumni }}</td>
                    </tr>
                    <tr>
                        <td>Tempat, Tanggal Lahir</td>
                        <td>:</td>
                        <td>{{ $alumni->tempat_lahir_alumni }}, {{ $alumni->TTL_alumni }}</td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td>{{ $alumni->jenis_kelamin_alumni }}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td>{{ $alumni->alamat_alumni }}</td>
                    </tr>
                    <tr>
                        <td>No. Handphone</td>
                        <td>:</td>
                        <td>{{ $alumni->no_hp_alumni }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td>{{ $alumni->email_alumni }}</td>
                    </tr>
                    <tr>
                        <td>Tahun Kelulusan Alumni</td>
                        <td>:</td>
                        <td>{{ $alumni->tahun_kelulusan_alumni }}</td>
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

@endsection