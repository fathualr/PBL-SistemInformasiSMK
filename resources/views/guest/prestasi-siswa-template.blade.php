@extends('layouts.main')

@section('Main')

<div class="grid grid-cols-2">
    <!-- Image -->
    <div class="col-span-2 my-5 w-full">
        <img class="smartphone:w-80 smartphone:h-40 tablet:w-[55rem] tablet:h-[25rem] rounded-xl mx-auto"
            src="{{ asset('storage/'.$PrestasiSiswa->gambar_prestasi) }}" alt="Nama Gambar">
    </div>
    <!-- Image -->

    <!-- Title -->
    <div class="col-span-2 text-start w-full">
        <h1 class="font-bold text-2xl">{{ $PrestasiSiswa->nama_prestasi }}</h1>
        <p class="text-sm text-slate-600 mb-10">{{ $PrestasiSiswa->created_at }}</p>
    </div>
    <!-- Title -->

    <!-- Text -->
    <div class="col-span-2 h-full w-full mb-5">
        <p>
            {!! $PrestasiSiswa->deskripsi_prestasi !!}
        </p>

        <div
            class="relative smartphone:w-screen laptop:w-[75rem] smartphone:-translate-x-9 laptop:-translate-x-3 overflow-hidden justify-center items-center smartphone:mt-10 laptop:mt-0">
            <div class="flex transition-transform duration-500" id="slider">
                @if($PrestasiSiswa->gambar->isNotEmpty())
                @foreach ($PrestasiSiswa->gambar->chunk(4) as $chunk)
                <div
                    class="smartphone:w-screen grid smartphone:grid-cols-1 smartphone:grid-flow-col  laptop:grid-cols-4 justify-center items-center laptop:p-12 laptop:min-w-full">
                    @foreach ($chunk as $gambar)
                    <div class="mx-auto smartphone:w-screen laptop:w-full laptop:-translate-x-2">
                        <button
                            class="btn bg-transparent border-none hover:bg-transparent smartphone:w-screen laptop:w-72 h-max hover:scale-110"
                            onclick="window['my_modal_view{{ $gambar->id_gambar }}'].showModal()">
                            <img src="{{ asset('storage/'. $gambar->gambar) }}"
                                class="smartphone:w-screen laptop:w-72 h-64 object-cover rounded-sm mx-auto"
                                alt="Image {{ $gambar->id_gambar }}">
                        </button>
                    </div>
                    @endforeach
                </div>
                @endforeach
                @endif
            </div>

            <button id="prevButton"
                class="border-none opacity-75 bg-blue-600 rounded-full w-12 h-12 absolute left-0 top-1/2 transform -translate-y-1/2 p-2 flex justify-center items-center"
                onclick="prevSlide()">
                <i class="fas fa-angle-left text-white"></i>
            </button>
            <button id="nextButton"
                class="border-none opacity-75 bg-blue-600 rounded-full w-12 h-12 absolute right-0 top-1/2 transform -translate-y-1/2 p-2 flex justify-center items-center"
                onclick="nextSlide()">
                <i class="fas fa-angle-right text-white"></i>
            </button>
        </div>

    </div>
    <!-- Text -->

    @foreach ($PrestasiSiswa->gambar as $gambar)
    <dialog id="my_modal_view{{ $gambar->id_gambar }}" class="modal">
        <div class="modal-box w-11/12 max-w-7xl bg-transparent shadow-none p-5">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute -top-1 -right-0">
                    <i class="fas fa-times text-2xl text-white"></i>
                </button>
            </form>
            <img src="{{ asset('storage/'. $gambar->gambar) }}" class="w-11/12 h-1/2 object-cover rounded-sm mx-auto"
                alt="Image 1">
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>
    @endforeach

</div>



@endsection