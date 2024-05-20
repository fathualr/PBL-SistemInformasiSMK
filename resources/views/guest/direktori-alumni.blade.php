@extends('layouts.main')

@section('Main')

<div class="divider">
    <p class="font-bold text-xl">DIREKTORI ALUMNI</p>
</div>

<div class="grid grid-cols-8">

    <!-- Search Box -->
    <div class="col-span-1 col-start-8">
        <div class="flex justify-end">
            <label class="input input-bordered flex justify-between items-center gap-2">
                <input type="text" class="grow" placeholder="Cari Alumni" />
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                    class="w-4 h-4 opacity-70">
                    <path fill-rule="evenodd"
                        d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z"
                        clip-rule="evenodd" />
                </svg>
            </label>
        </div>
    </div>
    <!-- Search Box -->
</div>
<!-- Content -->
<div class="grid grid-cols-4">
    @foreach($direktoriAlumni as $alumni)

    <div class="card w-72 bg-base-300 shadow-xl mt-5">
        <figure class="px-10 pt-10">
            <img src="{{ asset($alumni->gambar_alumni) }}" alt="Shoes" class="rounded-full w-32 h-32 mt-5" />
        </figure>

        <div class="card-body items-center text-center">

            <label class="form-control w-full max-w-xs pointer-events-none">
                <div class="label">
                    <span class="label-text font-bold">Nama</span>
                </div>
                <input type="text" placeholder="Type here"
                    class="input pointer-events-none bg-transparent w-full text-sm focus-within:outline-none"
                    value="{{ $alumni->nama_alumni }}" readonly />
            </label>

            <label class="form-control w-full pointer-events-none">
                <div class="label">
                    <span class="label-text font-bold">Tempat, Tanggal Lahir</span>
                </div>
                <input type="text" placeholder="Type here"
                    class="input pointer-events-none bg-transparent w-full text-sm focus-within:outline-none"
                    value="{{ $alumni->tempat_lahir_alumni }}, {{ $alumni->TTL_alumni }}" readonly />
            </label>


            <label class="form-control w-full max-w-xs pointer-events-none">
                <div class="label">
                    <span class="label-text font-bold">Tahun Kelulusan</span>
                </div>
                <input type="text" placeholder="Type here"
                    class="input pointer-events-none bg-transparent w-full text-sm focus-within:outline-none"
                    value="{{ $alumni->tahun_kelulusan_alumni }}" readonly />
            </label>

            <label class="form-control w-full max-w-xs pointer-events-none">
                <div class="label">
                    <span class="label-text font-bold">Alamat</span>
                </div>
                <input type="text" placeholder="Type here"
                    class="input pointer-events-none bg-transparent w-full text-sm focus-within:outline-none"
                    value="{{ $alumni->alamat_alumni }}" readonly />
            </label>

        </div>
    </div>

    @endforeach
</div>
<!-- Content -->

@endsection