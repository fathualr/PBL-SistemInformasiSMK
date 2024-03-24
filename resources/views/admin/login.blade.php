<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script src="{{ asset('js/script.js') }}"></script>
    <title>ADMIN SMK Muhammadiyah Plus Kota Batam | {{ $title }}</title>
</head>

<body class="bg-slate-100">

    <div class="flex justify-center items-center h-screen">
        <div class="bg-elm w-10/12 h-5/6 ">
            <div class="grid grid-cols-2 h-full">
                <!-- Form Login -->
                <div class="bg-white">
                    <h1 class="font-bold text-3xl my-12 text-center">LOGIN</h1>

                    <div class="grid grid-cols-3 w-52 -mt-12 mx-auto">
                        <div class="divider"></div>
                        <div class="divider divider-success"></div>
                        <div class="divider"></div>
                    </div>

                    <form class="mt-12" action="">

                        <label
                            class="input bg-transparent border-none flex items-center gap-2 mb-5 w-1/2 mx-auto focus-within:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                                class="w-4 h-4 opacity-70">
                                <path
                                    d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM12.735 14c.618 0 1.093-.561.872-1.139a6.002 6.002 0 0 0-11.215 0c-.22.578.254 1.139.872 1.139h9.47Z" />
                            </svg>
                            <input type="text" class="grow bg-transparent border-b-2 border-elm py-2"
                                placeholder="Username" />
                        </label>

                        <label
                            class="input bg-transparent border-none flex items-center gap-2 w-1/2 mx-auto focus-within:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                                class="w-4 h-4 opacity-70">
                                <path fill-rule="evenodd"
                                    d="M14 6a4 4 0 0 1-4.899 3.899l-1.955 1.955a.5.5 0 0 1-.353.146H5v1.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-2.293a.5.5 0 0 1 .146-.353l3.955-3.955A4 4 0 1 1 14 6Zm-4-2a.75.75 0 0 0 0 1.5.5.5 0 0 1 .5.5.75.75 0 0 0 1.5 0 2 2 0 0 0-2-2Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <input type="password" class="grow border-b-2 border-elm py-2" placeholder="Password"
                                value="" />
                        </label>

                        <a href="" class="flex justify-center items-center my-20">
                            <button
                                class="btn bg-elm w-48 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">Login
                            </button>
                        </a>

                    </form>
                </div>
                <!-- Form Login -->

                <!-- Asset Login -->
                <div class="flex justify-center items-center">
                    <h1 class="absolute top-14 font-bold text-white text-2xl my-12 text-center uppercase">smk
                        Muhammadiyah
                        plus
                        kota batam</h1>
                    <div class="flex justify-center items-center">
                        <img src="{{ asset('image/Humans.png') }}" alt="" class="">
                    </div>
                </div>
                <!-- Asset Login -->
            </div>
        </div>
    </div>

</body>

</html>