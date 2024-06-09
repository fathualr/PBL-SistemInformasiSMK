@extends('layouts.main')
@section('Main')

<div class="container mx-auto p-8">

    <!-- Maps -->
    <h2 class="text-2xl font-bold mb-8 text-center divider">LOKASI SEKOLAH</h2>

    <div class="artboard artboard-horizontal phone-5 flex justify-center mx-auto" id="map"></div>
    @include('layouts.map')
    <!-- Maps -->

    <h2 class="text-2xl font-bold mb-8 text-center my-5 divider">TEMUI KAMI</h2>

    <div class="grid grid-cols-4 grid-flow-col grid-rows-4 gap-y-5 my-10">

        <div class="col-span-1 col-start-2 ">
            <a href="{{ $medsos->instagram }}" class="btn btn-outline flex justify-start items-center mx-auto h-max p-5 w-56">
                <i class="fab fa-instagram text-5xl"></i>
                Instagram
            </a>
        </div>

        <div class="col-span-1 col-start-2">
            <a href="{{ $medsos->facebook }}" class="btn btn-outline flex justify-start items-center mx-auto h-max p-5 w-56">
                <i class="fab fa-facebook text-5xl"></i>
                Facebook
            </a>
        </div>

        <div class="col-span-1 col-start-2">
            <a href="{{ $medsos->youtube }}" class="btn btn-outline flex justify-start items-center mx-auto h-max p-5 w-56">
                <i class="fab fa-youtube text-5xl"></i>
                Youtube
            </a>
        </div>

        <div class="col-span-1 col-start-2">
            <a href="{{ $medsos->tiktok }}" class="btn btn-outline flex justify-start items-center mx-auto h-max p-5 w-56">
                <i class="fab fa-tiktok text-5xl"></i>
                Tik tok
            </a>
        </div>

        <div class="col-span-1 col-start-3">
            <a href="https://mail.google.com/mail/?view=cm&fs=1&to={{ $medsos->email }}" class="btn btn-outline flex justify-start items-center mx-auto h-max p-5 w-56">
                <i class="far fa-envelope text-5xl"></i>
                Email
            </a>
        </div>

        <div class="col-span-1 col-start-3">
            <a href="tel:{{ $medsos->nomor_telepon }}" class="btn btn-outline flex justify-start items-center mx-auto h-max p-5 w-56">
                <i class="fas fa-phone text-5xl"></i>
                Telepon
            </a>
        </div>

        <div class="col-span-1 col-start-3">
            <a href="https://www.efax.com/send-fax?to={{ $medsos->fax }}" class="btn btn-outline flex justify-start items-center mx-auto h-max p-5 w-56">
                <i class="fas fa-fax text-5xl"></i>
                Fax
            </a>
        </div>

    </div>


    <h2 class="text-2xl font-bold mb-8 text-center divider">UMPAN BALIK</h2>
    <div class="grid grid-cols-2 gap-5">
        <div class="col-span-1">
            <form action="{{ route('UmpanBalik.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Nama</span>
                    </div>
                    <input type="text" placeholder="Masukkan Nama" class="input input-bordered w-full" name="nama_penulis" />
                </label>
        </div>

        <div class="col-span-1">
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Email</span>
                </div>
                <input type="text" placeholder="example@gmail.com" class="input input-bordered w-full" name="email_penulis" />
            </label>
        </div>

        <div class="col-span-2">
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Isi Pesan</span>
                </div>
                <textarea class="textarea textarea-bordered h-48" placeholder="Ketikkan Komentar Disini" name="deskripsi_pesan"></textarea>
            </label>
        </div>



        <div class="col-span-2 flex justify-center">
            <button class="btn bg-blue-400 mx-auto md:mx-0 md:w-48 h-10 rounded-sm border-none text-white mt-8 hover:text-blue-400">Kirim</button>
        </div>
        </form>
    </div>

</div>

@endsection