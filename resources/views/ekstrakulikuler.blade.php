@extends('layouts.main')

@section('Main')

<div class="divider">
    <p class="font-bold text-xl">EKSTRAKULIKULER</p>
</div>

<div class="grid grid-cols-3 gap-4 gap-y-14 my-24">

    <div class="mx-auto">
        <div class="card card-compact w-full bg-base-100 shadow-xl">
            <figure class=""><img src="{{asset('image/test-ekskul.png')}}" alt="Shoes" /></figure>
            <p class="absolute bottom-28 font-bold ml-5 text-white">$organisasi</p>
            <div class="card-body">
                <table class="">
                    <tr>
                        <td class="font-bold">Pembimbing</td>
                        <td>:</td>
                        <td>$nama</td>
                    </tr>
                    <tr>
                        <td class="font-bold">Hari</td>
                        <td>:</td>
                        <td>$hari</td>
                    </tr>
                    <tr>
                        <td class="font-bold">Waktu</td>
                        <td>:</td>
                        <td>15:00 - 17:00</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="mx-auto">
        <div class="card card-compact w-full bg-base-100 shadow-xl">
            <figure class=""><img src="{{asset('image/test-ekskul.png')}}" alt="Shoes" /></figure>
            <p class="absolute bottom-28 font-bold ml-5 text-white">$organisasi</p>
            <div class="card-body">
                <table class="">
                    <tr>
                        <td class="font-bold">Pembimbing</td>
                        <td>:</td>
                        <td>$nama</td>
                    </tr>
                    <tr>
                        <td class="font-bold">Hari</td>
                        <td>:</td>
                        <td>$hari</td>
                    </tr>
                    <tr>
                        <td class="font-bold">Waktu</td>
                        <td>:</td>
                        <td>15:00 - 17:00</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="mx-auto">
        <div class="card card-compact w-full bg-base-100 shadow-xl">
            <figure class=""><img src="{{asset('image/test-ekskul.png')}}" alt="Shoes" /></figure>
            <p class="absolute bottom-28 font-bold ml-5 text-white">$organisasi</p>
            <div class="card-body">
                <table class="">
                    <tr>
                        <td class="font-bold">Pembimbing</td>
                        <td>:</td>
                        <td>$nama</td>
                    </tr>
                    <tr>
                        <td class="font-bold">Hari</td>
                        <td>:</td>
                        <td>$hari</td>
                    </tr>
                    <tr>
                        <td class="font-bold">Waktu</td>
                        <td>:</td>
                        <td>15:00 - 17:00</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="mx-auto">
        <div class="card card-compact w-full bg-base-100 shadow-xl">
            <figure class=""><img src="{{asset('image/test-ekskul.png')}}" alt="Shoes" /></figure>
            <p class="absolute bottom-28 font-bold ml-5 text-white">$organisasi</p>
            <div class="card-body">
                <table class="">
                    <tr>
                        <td class="font-bold">Pembimbing</td>
                        <td>:</td>
                        <td>$nama</td>
                    </tr>
                    <tr>
                        <td class="font-bold">Hari</td>
                        <td>:</td>
                        <td>$hari</td>
                    </tr>
                    <tr>
                        <td class="font-bold">Waktu</td>
                        <td>:</td>
                        <td>15:00 - 17:00</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection