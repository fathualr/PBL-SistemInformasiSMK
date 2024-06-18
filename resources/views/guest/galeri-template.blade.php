@extends('layouts.main')

@section('Main')

<div class="flex flex-col w-full border-opacity-50 mb-10">
    @foreach($albums as $album)
    <div class="divider smartphone:text-lg tablet:text-2xl font-bold">{{ $album->nama_album }}</div>
    <p class="my-5 text-center mx-auto">{{ $album->deskripsi_album }}</p>
    @endforeach
</div>

<div class="lg:col-span-2 grid md:grid-cols-2 lg:grid-cols-4 gap-8 md:gap-y-14 lg:gap-y-8 lg:gap-6">
    @foreach($fotos->chunk(16) as $chunk)
    @foreach($chunk as $foto)
    <button class="btn bg-transparent border-none hover:bg-transparent w-full h-max hover:scale-110" onclick="window['my_modal_view{{ $foto->id_foto }}'].showModal()">
        <img class="object-cover object-center w-96 h-44 max-w-full rounded-lg" src="{{ asset('storage/' . $foto->tautan_foto) }}" alt="gallery foto" />
    </button>
    @endforeach
    @endforeach
</div>

<div class="join flex justify-center my-5">
    @if ($fotos->onFirstPage())
    <button class="join-item btn disabled">«</button>
    @else
    <a href="{{ $fotos->previousPageUrl() }}" class="join-item btn">«</a>
    @endif

    <button class="join-item btn">Page {{ $fotos->currentPage() }}</button>

    @if ($fotos->hasMorePages())
    <a href="{{ $fotos->nextPageUrl() }}" class="join-item btn">»</a>
    @else
    <button class="join-item btn disabled">»</button>
    @endif
</div>

@foreach ($fotos as $foto)
<dialog id="my_modal_view{{ $foto->id_foto }}" class="modal">
    <div class="modal-box w-11/12 max-w-7xl bg-transparent shadow-none p-5">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute -top-1 -right-0">
                <i class="fas fa-times text-2xl text-white"></i>
            </button>
        </form>
        <img src="{{ asset('storage/'. $foto->tautan_foto) }}" class="w-11/12 h-1/2 object-cover rounded-sm mx-auto" alt="Image 1">
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>
@endforeach
@endsection