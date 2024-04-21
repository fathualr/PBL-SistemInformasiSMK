<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
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

                    <form class="mt-12 font-poppins" action="">

                        <label
                            class="input bg-transparent border-none flex items-center gap-2 mb-5 w-1/2 mx-auto focus-within:outline-none">
                            <i class="fas fa-user"></i>
                            <input type="text" class="grow bg-transparent border-b-2 border-elm py-2"
                                placeholder="Username" />
                        </label>

                        <label
                            class="input bg-transparent border-none flex items-center gap-2 w-1/2 mx-auto focus-within:outline-none">
                            <i class="fas fa-lock"></i>
                            <input type="password" class="grow border-b-2 border-elm py-2" id="passwordInput"
                                placeholder="Password" value="" />
                            <i class="fas fa-eye absolute translate-x-60" id="togglePassword"></i>
                        </label>

                        <a href="admin/dashboard" class="flex justify-center items-center mt-20">
                            <button
                                class="btn bg-elm w-48 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">Login
                            </button>
                        </a>
                        <a href="" class="flex justify-center items-center mt-5 text-sm text-elm">
                            Lupa Password ?
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
                        <img src="{{ asset('image/Humans.svg') }}" alt="" class="w-96">
                    </div>
                </div>
                <!-- Asset Login -->
            </div>
        </div>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const togglePassword = document.getElementById("togglePassword");
        const passwordInput = document.getElementById("passwordInput");

        togglePassword.addEventListener("click", function() {
            const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
            passwordInput.setAttribute("type", type);

            if (type === "password") {
                togglePassword.classList.remove("fa-eye-slash");
                togglePassword.classList.add("fa-eye");
            } else {
                togglePassword.classList.remove("fa-eye");
                togglePassword.classList.add("fa-eye-slash");
            }
        });
    });
    </script>
</body>

</html>