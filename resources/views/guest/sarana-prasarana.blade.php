@extends('layouts.main')
@section('Main')

<div class="divider">
    <p class="font-bold text-xl">Sarana Prasarana</p>
</div>

<div class="grid grid-cols-3 gap-5 gap-y-20 my-24">

    <div class="mx-auto">
        <a href="/guest/sarana-prasarana-template">
            <div class="card card-compact w-full bg-base-100 shadow-xl">
                <figure class=""><img src="{{asset('image/test-ekskul.png')}}" alt="Shoes" /></figure>
                <div class="card-body bg-dark-lochinvar/70 rounded-none rounded-b-xl">
                    <p class="text-center font-bold text-white">Televisi umum</p>
                </div>
            </div>
        </a>
    </div>
    <div class="mx-auto">
        <div class="card card-compact w-full bg-base-100 shadow-xl">
            <figure class=""><img src="{{asset('image/test-ekskul.png')}}" alt="Shoes" /></figure>
            <div class="card-body bg-dark-lochinvar/70 rounded-none rounded-b-xl">
                <p class="text-center font-bold text-white">Green house</p>
            </div>
        </div>
    </div>
    <div class="mx-auto">
        <div class="card card-compact w-full bg-base-100 shadow-xl">
            <figure class=""><img src="{{asset('image/test-ekskul.png')}}" alt="Shoes" /></figure>
            <div class="card-body bg-dark-lochinvar/70 rounded-none rounded-b-xl">
                <p class="text-center font-bold text-white">Lab Biologi</p>
            </div>
        </div>
    </div>
    <div class="mx-auto">
        <div class="card card-compact w-full bg-base-100 shadow-xl">
            <figure class=""><img src="{{asset('image/test-ekskul.png')}}" alt="Shoes" /></figure>
            <div class="card-body bg-dark-lochinvar/70 rounded-none rounded-b-xl">
                <p class="text-center font-bold text-white">Panggung</p>
            </div>
        </div>
    </div>
    <div class="mx-auto">
        <div class="card card-compact w-full bg-base-100 shadow-xl">
            <figure class=""><img src="{{asset('image/test-ekskul.png')}}" alt="Shoes" /></figure>
            <div class="card-body bg-dark-lochinvar/70 rounded-none rounded-b-xl">
                <p class="text-center font-bold text-white">Cctv</p>
            </div>
        </div>
    </div>
    <div class="mx-auto">
        <div class="card card-compact w-full bg-base-100 shadow-xl">
            <figure class=""><img src="{{asset('image/test-ekskul.png')}}" alt="Shoes" /></figure>
            <div class="card-body bg-dark-lochinvar rounded-none rounded-b-xl">
                <p class="text-center font-bold text-white">Lemari terofy</p>
            </div>
        </div>
    </div>
</div>
<div class="join flex justify-center my-5">
    <button class="btn bg-green-600 font-bold text-white">Selengkapnya</button>
</div>
@endsection