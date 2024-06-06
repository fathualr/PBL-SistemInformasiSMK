@extends('layouts.main')

@section('Main')
<h2 class="text-2xl font-bold mb-8 text-center divider">SARANA PRASARANA</h2>
<Span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia maxime ratione assumenda facilis placeat voluptatibus necessitatibus perspiciatis, distinctio sunt consequuntur aliquid mollitia perferendis quos qui architecto eos quas repudiandae non.</Span>
<div class="mt-10">
    @foreach ($prasaranas as $prasarana)
    <div class="collapse collapse-arrow border bg-base-100 mb-5">
        <input type="checkbox" />
        <div class="collapse-title text-xl font-medium">
            {{ $prasarana->nama_prasarana }}
        </div>
        <div class="collapse-content w-full">
            <div class="flex flex-col lg:flex-row w-full">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 w-full">
                    @if ($prasarana->foto_prasarana->isNotEmpty())
                    @foreach ($prasarana->foto_prasarana->slice(0, 4) as $foto_prasarana)
                    <img class="object-cover object-center w-full h-44 max-w-full rounded-lg mx-auto mt-3" src="{{ asset('storage/' . $foto_prasarana->tautan_foto) }}" alt="gallery foto" />
                    @endforeach
                    @else
                    <div class="artboard artboard-horizontal phone-1 bg-slate-400 text-center"><img src="{{ asset('image/no-image.png') }}" alt="Placeholder" class="w-full h-full object-cover rounded-sm mx-auto"></div>
                    @endif
                </div>
                <div class="divider lg:divider-horizontal"></div>
                <div class="grid flex-grow w-full">
                    <div class="overflow-x-auto w-full">
                        <table class="table table-s w-full mt-5">
                            <thead>
                                <tr>
                                    <th>Jenis Prasarana</th>
                                    <th>Luas</th>
                                    <th>Kapasitas</th>
                                    <th>Tahun Di Bangun</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $prasarana->jenis_prasarana }}</td>
                                    <td>{{ $prasarana->luas }} m2</td>
                                    <td>{{ $prasarana->kapasitas }} Org</td>
                                    <td>{{ $prasarana->tahun_dibangun }}</td>
                                    <td>{{ $prasarana->kondisi }} || {{ $prasarana->status_prasarana }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-s mt-5 w-full">
                            <thead>
                                <tr>
                                    <th>Deskripsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $prasarana->deskripsi_prasarana }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection