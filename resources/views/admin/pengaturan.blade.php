@extends('layouts.mainAdmin')

@section('main-content')

<div class="grid grid-cols-9 grid-rows-2 bg-slate-100 shadow-xl rounded-md">
    <!-- Title -->
    <div class="col-span-2 my-4 mx-5">
        <h3 class="font-bold text-lg">Pengaturan Admin</h3>
    </div>
    <!-- Title -->

    <div class="col-span-2 row-span-2 row-start-2 flex justify-center items-center my-5">
        <figure>
            <div class="avatar">
                <div class="w-24 rounded-full">
                    <img src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                </div>
            </div>
        </figure>
    </div>

    <div class="col-span-2 row-start-3 flex justify-center items-center">
        <button class="btn w-48 hover:animate-pulse" onclick="modal_editPhoto.showModal()">
            <i class="fas fa-pen-to-square"></i>
            Edit Foto
        </button>
    </div>

    <div class="col-span-4 col-start-3 row-start-2 justify-center items-center">
        <label
            class="input bg-transparent border-none flex items-center gap-2 mb-5 w-1/2 mx-auto focus-within:outline-none">
            <i class="fas fa-user"></i>
            <input type="text" class="grow bg-transparent border-b-2 border-elm py-2" placeholder="Username" />
        </label>

        <label class="input bg-transparent border-none flex items-center gap-2 w-1/2 mx-auto focus-within:outline-none">
            <i class="fas fa-lock"></i>
            <input type="password" class="grow border-b-2 border-elm py-2" placeholder="Password" value="" />
        </label>

    </div>

    <div class=" col-span-2 col-start-7 row-start-3 flex justify-center items-center">
        <button class="btn w-48 my-5 mx-auto bg-elm border-none text-white hover:text-elm hover:animate-pulse"
            onclick="modal_edit.showModal()">
            <i class="fas fa-pen-to-square"></i>
            Edit
        </button>
    </div>

</div>

<dialog id="modal_edit" class="modal">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Edit Data</h3>

        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-success"></div>
            <div class="divider"></div>
        </div>

        <form action="">

            <label
                class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <i class="fas fa-user"></i>
                <input type="text" class="grow bg-transparent py-2" placeholder="Username" />
            </label>

            <label
                class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <i class="fas fa-lock"></i>
                <input type="password" class="grow py-2" id="passwordInput" placeholder="Password" value="" />
                <i class="fas fa-eye absolute right-10" id="togglePassword"></i>
            </label>

            <div class="flex justify-end items-end mt-20 gap-4">

                <a href="" class="">
                    <button type="submit"
                        class="btn bg-elm w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
                        <i class=" fas fa-pen-to-square"></i>
                        Edit
                    </button>
                </a>

            </div>

        </form>
    </div>
</dialog>

<dialog id="modal_editPhoto" class="modal">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Edit Foto</h3>

        <div class="grid grid-cols-3 w-52 -mt-5">
            <div class="divider"></div>
            <div class="divider divider-success"></div>
            <div class="divider"></div>
        </div>

        <form action="">

            <figure>
                <div class="avatar flex justify-center items-center my-5">
                    <div class="w-24 rounded-full">
                        <img src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                    </div>
                </div>
            </figure>

            <label
                class="input bg-transparent border-2 border-elm flex items-center gap-2 mb-5 w-full focus-within:outline-none">
                <i class="fas fa-link"></i>
                <input type="link" class="grow bg-transparent py-2" placeholder="Link Galeri" />
            </label>

            <div class="flex justify-end items-end mt-20 gap-4">

                <a href="" class="">
                    <button type="submit"
                        class="btn bg-elm w-32 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">
                        <i class=" fas fa-pen-to-square"></i>
                        Edit
                    </button>
                </a>

            </div>

        </form>
    </div>
</dialog>

@endsection