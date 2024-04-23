@extends('layouts.main')

@section('Main')

<div class="divider">
    <p class="font-bold text-xl">DIREKTORI SISWA</p>
</div>
<div class="flex justify-end">
    <label class="input input-bordered flex justify-between items-center gap-2">
        <input type="text" class="grow" placeholder="Cari Guru" />
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70">
            <path fill-rule="evenodd" d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z" clip-rule="evenodd" />
        </svg>
    </label>
</div>

<div class="grid grid-cols-4 gap-3 gap-y-10 my-24">

    <div class="mx-auto">
        <div class="card card-compact w-64 h-80 shadow-xl">
            <div class="h-2/5 bg-indigo-600 rounded-t-lg">
                <div class=" avatar mx-auto h-28 translate-y-[4rem] translate-x-16">
                    <div class="w-32 h-32 rounded-full">
                        <img src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg"/>
                    </div>
                </div>
                
                <div class="card-body bg-base-100">
                    <h2 class="text-center font-bold text-xl mt-10">$nama</h2>
                    <p class="text-center">$programKeahlian</p>
                    <p class="text-center">$NIP</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="mx-auto">
        <div class="card card-compact w-64 h-80 shadow-xl">
            <div class="h-2/5 bg-indigo-600 rounded-t-lg">
                <div class=" avatar mx-auto h-28 translate-y-[4rem] translate-x-16">
                    <div class="w-32 h-32 rounded-full">
                        <img src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg"/>
                    </div>
                </div>
                
                <div class="card-body bg-base-100">
                    <h2 class="text-center font-bold text-xl mt-10">$nama</h2>
                    <p class="text-center">$programKeahlian</p>
                    <p class="text-center">$NIP</p>
                </div>
            </div>
        </div>
    </div>

    <div class="mx-auto">
        <div class="card card-compact w-64 h-80 shadow-xl">
            <div class="h-2/5 bg-indigo-600 rounded-t-lg">
                <div class=" avatar mx-auto h-28 translate-y-[4rem] translate-x-16">
                    <div class="w-32 h-32 rounded-full">
                        <img src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg"/>
                    </div>
                </div>
                
                <div class="card-body bg-base-100">
                    <h2 class="text-center font-bold text-xl mt-10">$nama</h2>
                    <p class="text-center">$programKeahlian</p>
                    <p class="text-center">$NIP</p>
                </div>
            </div>
        </div>
    </div>

    <div class="mx-auto">
        <div class="card card-compact w-64 h-80 shadow-xl">
            <div class="h-2/5 bg-indigo-600 rounded-t-lg">
                <div class=" avatar mx-auto h-28 translate-y-[4rem] translate-x-16">
                    <div class="w-32 h-32 rounded-full">
                        <img src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg"/>
                    </div>
                </div>
                
                <div class="card-body bg-base-100">
                    <h2 class="text-center font-bold text-xl mt-10">$nama</h2>
                    <p class="text-center">$programKeahlian</p>
                    <p class="text-center">$NIP</p>
                </div>
            </div>
        </div>
    </div>

    <div class="mx-auto">
        <div class="card card-compact w-64 h-80 shadow-xl">
            <div class="h-2/5 bg-indigo-600 rounded-t-lg">
                <div class=" avatar mx-auto h-28 translate-y-[4rem] translate-x-16">
                    <div class="w-32 h-32 rounded-full">
                        <img src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg"/>
                    </div>
                </div>
                
                <div class="card-body bg-base-100">
                    <h2 class="text-center font-bold text-xl mt-10">$nama</h2>
                    <p class="text-center">$programKeahlian</p>
                    <p class="text-center">$NIP</p>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="join flex justify-center my-5">
    <button class="join-item btn">«</button>
    <button class="join-item btn">Page 22</button>
    <button class="join-item btn">»</button>
</div>

@endsection