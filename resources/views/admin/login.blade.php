<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <script src="{{ asset('js/script.js') }}"></script>
    <title>ADMIN SMK Muhammadiyah Plus Kota Batam | {{ $title }}</title>
</head>

<body class="bg-slate-100 font-poppins">

    <div class="flex justify-center items-center h-screen">
        <div class="bg-blue-400 w-10/12 h-5/6 ">
            <div class="grid grid-cols-2 h-full">
                <!-- Form Login -->
                <div class="bg-white">
                    <h1 class="font-bold text-3xl my-12 text-center">LOGIN</h1>

                    <div class="grid grid-cols-3 w-52 -mt-12 mx-auto">
                        <div class="divider"></div>
                        <div class="divider divider-primary"></div>
                        <div class="divider"></div>
                    </div>

                    <form class="mt-12 font-poppins" action="">

                        <label
                            class="input bg-transparent border-none flex items-center gap-2 mb-5 w-1/2 mx-auto focus-within:outline-none">
                            <i class="fas fa-user"></i>
                            <input type="text" class="grow bg-transparent border-b-2 border-blue-500 py-2"
                                placeholder="Username" />
                        </label>

                        <label
                            class="input bg-transparent border-none flex items-center gap-2 w-1/2 mx-auto focus-within:outline-none">
                            <i class="fas fa-lock"></i>
                            <input type="password" class="grow border-b-2 border-blue-500 py-2" id="passwordInput"
                                placeholder="Password" value="" />
                            <i class="fas fa-eye absolute translate-x-60" id="togglePassword"></i>
                        </label>

                        <a href="admin/dashboard" class="flex justify-center items-center mt-20">
                            <button
                                class="btn bg-blue-500 w-48 h-10 rounded-sm border-none text-white mt-auto hover:text-blue-500">Login
                            </button>
                        </a>
                        <a href="" class="flex justify-center items-center mt-5 text-sm text-blue-600">
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