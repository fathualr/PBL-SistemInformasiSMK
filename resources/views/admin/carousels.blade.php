@extends('layouts.mainAdmin')

@section('main-content')

<div class="grid grid-cols-9 rounded-md">

    @include('shared.success-message')
    @include('shared.error-message')
    <div class="col-span-3 my-4 mx-5 row-start-2">
        <h3 class="font-bold text-lg">Pengelolaan Carousel</h3>
    </div>

    <!-- Modal -->
    <div class="col-span-3 row-start-3 mx-5">
        <button class="btn btn-outline w-full hover:animate-pulse" onclick="my_modal_add.showModal()">
            <i class="fas fa-plus text-xl"></i>
            Tambah Carousel
        </button>
    </div>
    <!-- Modal -->

    <!-- Content -->
    <div class="col-span-9 row-start-4 mt-5">
        <table class="table border-collapse border border-slate-200 text-center">
            <!-- head -->
            <thead>
                <tr>
                    <th class="w-24">No.</th>
                    <th class="w-36">Link Gambar</th>
                    <th class="w-72">Aksi</th>
                </tr>
            </thead>
            <tbody>

                @foreach($carousel as $key => $crs)
                <tr class="hover">
                    <th>{{ ($carousel->currentPage() - 1) * $carousel->perPage() + $key + 1 }}</th>
                    <td>{{ $crs->image }}</td>
                    <td>
                        <details class="dropdown dropdown-bottom">
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
                                        onclick="my_modal_view_{{ $crs->id_carousels }}.showModal()">
                                        <i class="fas fa-circle-info"></i>
                                        Detail
                                    </button>
                                </li>
                                <!-- View -->

                                <!-- Delete -->
                                <li>
                                    <button class="btn btn-ghost w-full hover:animate-pulse"
                                        onclick="my_modal_delete_{{ $crs->id_carousels }}.showModal()">
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
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
        </table>
        
        <!-- Pagination -->
        <div class="flex justify-center my-5 gap-2">
            @if($carousel->previousPageUrl())
            <a href="{{ $carousel->previousPageUrl() }}" class="btn">«</a>
            @else
            <button class="btn disabled">«</button>
            @endif

            <button class="btn">Page {{ $carousel->currentPage() }}</button>

            @if($carousel->nextPageUrl())
            <a href="{{ $carousel->nextPageUrl() }}" class="btn">»</a>
            @else
            <button class="btn disabled">»</button>
            @endif
        </div>  

    </div>
    <!-- Content -->
</div>

<dialog id="my_modal_add" class="modal">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Tambah Carousel</h3>

        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-success"></div>
            <div class="divider"></div>
        </div>

        <!--Form CREATE carousel-->
        <form action="{{ route('carousels.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="label">
                <span class="label-text">Gambar:</span>
            </div>
            <input type="file" class="file-input file-input-bordered file-input-success w-full" name="image" />
            <div class="flex justify-end items-end mt-5 gap-4">
                <button type="reset"
                    class="btn bg-error w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-error">
                    <i class="fas fa-times"></i>
                    Reset
                </button>
                <button type="submit"
                    class="btn bg-elm w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
                    <i class=" fas fa-plus"></i>
                    Tambah
                </button>
            </div>
        </form>
        <!--END Form CREATE admin-->

    </div>
</dialog>

@foreach($carousel as $crs)
<dialog id="my_modal_view_{{ $crs->id_carousels }}" class="modal">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Info Detail Carousel</h3>
        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-success"></div>
            <div class="divider"></div>
        </div>
        <div class="flex justify-center">
            <img class="w-full" src="{{ asset('storage/'. $crs->image) }}" alt="">
        </div>
    </div>
</dialog>

<dialog id="my_modal_delete_{{ $crs->id_carousel }}" class="modal">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Hapus Carousel</h3>
        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-success"></div>
            <div class="divider"></div>
        </div>
        <form action="{{ route('carousels.destroy', $crs->id_carousels) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('DELETE')
            Apakah Anda Yakin Ingin Menghapus Data Ini ?
            <div class="flex justify-end items-end mt-20 gap-4">
                <form action="/adminDelete" method="POST">
                    <button type="submit"
                        class="btn bg-error w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-error">
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