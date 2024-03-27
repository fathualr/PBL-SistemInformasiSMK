@extends('layouts.main')
@section('Main')

<style>
.social-media-icon {
    width: 40px;
    height: 40px;
    margin-right: 10px;
}
</style>

<div class="container mx-auto p-8">

    <h2 class="text-xl font-bold mb-8 text-center divider">Lokasi Sekolah</h2>
    <div class="artboard artboard-horizontal phone-5 bg-slate-600 flex justify-center mx-auto">667×375</div>

    <h2 class="text-xl font-bold mb-8 text-center my-5 divider">Temui Kami</h2>
    <div class="grid grid-cols-2 grid-flow-col grid-rows-4 gap-5 my-10">

        <div class="card card-side bg-base-100 shadow-xl h-32 ">
            <figure><img src="https://daisyui.com/images/stock/photo-1635805737707-575885ab0820.jpg" alt="Movie"
                    class="w-32" /></figure>
            <div class="card-body">
                <h2 class="card-title">New movie is released!</h2>
                <div class="card-actions justify-end">
                    <button class="btn btn-primary h-5">Watch</button>
                </div>
            </div>
        </div>

        <div class="card card-side bg-base-100 shadow-xl h-32 ">
            <figure><img src="https://daisyui.com/images/stock/photo-1635805737707-575885ab0820.jpg" alt="Movie"
                    class="w-32" /></figure>
            <div class="card-body">
                <h2 class="card-title">New movie is released!</h2>
                <div class="card-actions justify-end">
                    <button class="btn btn-primary h-5">Watch</button>
                </div>
            </div>
        </div>

        <div class="card card-side bg-base-100 shadow-xl h-32 ">
            <figure><img src="https://daisyui.com/images/stock/photo-1635805737707-575885ab0820.jpg" alt="Movie"
                    class="w-32" /></figure>
            <div class="card-body">
                <h2 class="card-title">New movie is released!</h2>
                <div class="card-actions justify-end">
                    <button class="btn btn-primary h-5">Watch</button>
                </div>
            </div>
        </div>

        <div class="card card-side bg-base-100 shadow-xl h-32 ">
            <figure><img src="https://daisyui.com/images/stock/photo-1635805737707-575885ab0820.jpg" alt="Movie"
                    class="w-32" /></figure>
            <div class="card-body">
                <h2 class="card-title">New movie is released!</h2>
                <div class="card-actions justify-end">
                    <button class="btn btn-primary h-5">Watch</button>
                </div>
            </div>
        </div>

        <div class="card card-side bg-base-100 shadow-xl h-32 ">
            <figure><img src="https://daisyui.com/images/stock/photo-1635805737707-575885ab0820.jpg" alt="Movie"
                    class="w-32" /></figure>
            <div class="card-body">
                <h2 class="card-title">New movie is released!</h2>
                <div class="card-actions justify-end">
                    <button class="btn btn-primary h-5">Watch</button>
                </div>
            </div>
        </div>

        <div class="card card-side bg-base-100 shadow-xl h-32 ">
            <figure><img src="https://daisyui.com/images/stock/photo-1635805737707-575885ab0820.jpg" alt="Movie"
                    class="w-32" /></figure>
            <div class="card-body">
                <h2 class="card-title">New movie is released!</h2>
                <div class="card-actions justify-end">
                    <button class="btn btn-primary h-5">Watch</button>
                </div>
            </div>
        </div>

        <div class="card card-side bg-base-100 shadow-xl h-32 ">
            <figure><img src="https://daisyui.com/images/stock/photo-1635805737707-575885ab0820.jpg" alt="Movie"
                    class="w-32" /></figure>
            <div class="card-body">
                <h2 class="card-title">New movie is released!</h2>
                <div class="card-actions justify-end">
                    <button class="btn btn-primary h-5">Watch</button>
                </div>
            </div>
        </div>

    </div>


    <h2 class="text-2xl font-bold mb-8 text-center divider">Umpan Balik</h2>
    <div class="grid grid-cols-2 gap-5">
        <div class="col-span-1">
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Nama</span>
                </div>
                <input type="text" placeholder="Type here" class="input input-bordered w-full" />
            </label>
        </div>

        <div class="col-span-1">
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Email</span>
                </div>
                <input type="text" placeholder="Type here" class="input input-bordered w-full" />
            </label>
        </div>

        <div class="col-span-2">
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">No Telp</span>
                </div>
                <input type="text" placeholder="Type here" class="input input-bordered w-full" />
            </label>
        </div>

        <div class="col-span-2">
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Isi Pesan</span>
                </div>
                <textarea class="textarea textarea-bordered h-48" placeholder="Bio"></textarea>
            </label>
        </div>

    </div>

    <div class="col-span-2 flex justify-center">
        <button
            class="btn bg-elm mx-auto md:mx-0 md:w-48 h-10 rounded-sm border-none text-white mt-8 hover:text-elm">Kirim</button>
    </div>

</div>

@endsection