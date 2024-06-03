@extends('layouts.main')

@section('Main')

<h1 class="font-bold text-2xl text-center uppercase">{{ $program->nama_program }}</h1>

<div class="grid grid-cols-3 w-48 mx-auto -mt-3">
    <div class="divider"></div>
    <div class="divider divider-neutral"></div>
    <div class="divider"></div>
</div>

<p class="text-center">
    {{ $program->deskripsi_program }}
</p>

<div class="grid grid-rows-3 grid-cols-2 grid-flow-col gap-2 mx-auto my-32 bg-slate-200">
    <div class="row-span-3 my-24">
        <h1 class="font-bold text-xl my-10 text-center">V.M.T.S {{ $program->nama_program }}</h1>
        <div class="collapse collapse-arrow bg-base-200 mb-5 ml-10">
            <input type="checkbox" />
            <div class="collapse-title text-xl font-medium">
                Visi Program Keahlian
            </div>
            <div class="collapse-content">
                <p>{{ $program->visi_program }}</p>
            </div>
        </div>
        <div class="collapse collapse-arrow bg-base-200 mb-5 ml-10">
            <input type="checkbox" />
            <div class="collapse-title text-xl font-medium">
                Misi Program Keahlian
            </div>
            <div class="collapse-content">
                <p>{{ $program->misi_program }}</p>
            </div>
        </div>
        <div class="collapse collapse-arrow bg-base-200 mb-5 ml-10">
            <input type="checkbox" />
            <div class="collapse-title text-xl font-medium">
                Tujuan Program Keahlian
            </div>
            <div class="collapse-content">
                <p>{{ $program->tujuan_program }}</p>
            </div>
        </div>
        <div class="collapse collapse-arrow bg-base-200 ml-10">
            <input type="checkbox" />
            <div class="collapse-title text-xl font-medium">
                Sasaran Strategis Program Keahlian
            </div>
            <div class="collapse-content">
                <p>{{ $program->sasaran_program }}</p>
            </div>
        </div>
    </div>
    <div class="row-span-3 flex items-center justify-center my-24">
        <img src="{{ asset('image/Humans.png') }}" alt="" class="mx-auto">
    </div>
</div>

<h1 class="font-bold text-2xl text-center">CAPAIAN PEMBELAJARAN</h1>

<div class="grid grid-cols-3 w-48 mx-auto -mt-3">
    <div class="divider"></div>
    <div class="divider divider-neutral"></div>
    <div class="divider"></div>
</div>

<p class="text-center">
    {{ $program->capaianPembelajaran->deskripsi_capaian_pembelajaran }}
</p>

<div class="grid grid-cols-2">
    <div class="col-span-2 w-[50rem] mx-auto my-7">
        <!-- First Collapse -->
        <div class="collapse collapse-arrow bg-base-200 mb-5">
            <input type="checkbox" />
            <div class="collapse-title text-xl font-medium flex">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    class="stroke-info shrink-0 w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <h1 class="mx-5 text-base">ASPEK SIKAP</h1>
            </div>
            <div class="collapse-content">
                <p>{{ $program->capaianPembelajaran->aspek_sikap }}</p>
            </div>
        </div>
        <!-- First Collapse -->
        <!-- Second Collapse -->
        <div class="collapse collapse-arrow bg-base-200 mb-5">
            <input type="checkbox" />
            <div class="collapse-title text-xl font-medium flex">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    class="stroke-info shrink-0 w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <h1 class="mx-5 text-base">ASPEK PENGETAHUAN</h1>
            </div>
            <div class="collapse-content">
                <p>{{ $program->capaianPembelajaran->aspek_pengetahuan }}</p>
            </div>
        </div>
        <!-- Second Collapse -->
        <!-- Third Collapse -->
        <div class="collapse collapse-arrow bg-base-200 mb-5">
            <input type="checkbox" />
            <div class="collapse-title text-xl font-medium flex">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    class="stroke-info shrink-0 w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <h1 class="mx-5 text-base">ASPEK KETERAMPILAN UMUM</h1>
            </div>
            <div class="collapse-content">
                <p>{{ $program->capaianPembelajaran->aspek_keterampilan_umum }}</p>
            </div>
        </div>
        <!-- Third Collapse -->
        <!-- Fourth Collapse -->
        <div class="collapse collapse-arrow bg-base-200">
            <input type="checkbox" />
            <div class="collapse-title text-xl font-medium flex">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    class="stroke-info shrink-0 w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <h1 class="mx-5 text-base">ASPEK KETERAMPILAN KHUSUS</h1>
            </div>
            <div class="collapse-content">
                <p>{{ $program->capaianPembelajaran->aspek_keterampilan_khusus }}</p>
            </div>
        </div>
        <!-- Fourth Collapse -->
    </div>
</div>
<!-- Third Content -->

<!-- Fourth Content -->
<h1 class="font-bold text-2xl text-center mt-32">PELUANG KERJA</h1>
<div class="grid grid-cols-3 w-48 mx-auto -mt-3">
    <div class="divider"></div>
    <div class="divider divider-neutral"></div>
    <div class="divider"></div>
</div>

<p class="text-center">
    {{ $program->deskripsi_peluang_kerja }}
</p>

<div class="grid grid-cols-9 gap-2 my-10 bg-slate-200">
    @forelse ($program->peluangKerja as $peluang)
    <div class="col-span-3 my-10 mx-auto">
        <div class="card w-96 h-96 bg-base-100 shadow-xl rounded-none">
            <div class="card-body">
                <h2 class="card-title font-bold my-5">{{ $peluang->peluang_kerja }}</h2>
                <p class="overflow-y-auto h-20">
                    {{ $peluang->deskripsi_pekerjaan }}
                </p>
            </div>
        </div>
    </div>
    @empty
    <div class="col-span-9 my-10 mx-auto">
        Data tidak ada
    </div>
    @endforelse

</div>
<!-- Fourth Content -->

@endsection