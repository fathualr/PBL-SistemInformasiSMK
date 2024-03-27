<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin SMK Muhammadiyah Plus Kota Batam | {{ $title }}</title>
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    <script src="{{ asset('js/script.js') }}"></script>
    @vite('resources/css/app.css')
</head>
<style>
#cardBG {
    background-image: url('{{ asset("assets/wave.svg") }}');
    background-size: cover;
}
</style>

<body>

    <!-- Navbar -->
    <div class="flex h-max">
        <!-- Side Navbar -->
        <div class="w-20 bg-elm text-white flex-none transition-all duration-300">
            <div class="flex flex-col py-4">
                <button id="toggleButton"
                    class="focus:outline-none absolute left-[0.85rem] text-xl text-center btn rounded-full transition-all duration-300 z-50">
                    <i id="toggleIcon" class="fas fa-bars transition-all duration-500"></i>
                </button>
            </div>
            <div class="flex flex-col items-center space-y-4">
                <!-- Title -->
                <div class="font-bold capitalize  hidden" id="normalTitle">
                    <h1 class="-mt-7 text-center">Content management system</h1>
                    <h1 class="mt-5 py-2 w-52 text-xl border-b-2 border-white">SMK Muhammadiyah Plus Kota
                        Batam
                    </h1>
                </div>
                <!-- Title -->

                <!-- Nav -->
                <ul class="menu p-4 w-72 translate-y-3 text-white flex justify-center items-center" id="menu">
                    <!-- Sidebar content here -->
                    <li class="hover:translate-y-0 @if($title == 'Dashboard') bg-blue-lagoon rounded-md @endif"">
                        <a>
                            <div class=" w-3 flex justify-center items-center">
                        <i class="fas fa-chart-simple text-2xl font-bold"></i>
            </div>
            <h1 class="font-bold mx-10 hidden" id="navTitle">Dashboard</h1>
            </a>
            </li>
            <li class="hover:translate-y-0">
                <a>
                    <div class=" w-3 flex justify-center items-center">
                        <i class="fas fa-house text-2xl font-bold"></i>
                    </div>
                    <h1 class="font-bold mx-10 hidden" id="navTitle">Beranda</h1>
                </a>
            </li>
            <li class="hover:translate-y-0">
                <a href="">
                    <div class="w-3 flex justify-center items-center">
                        <i class="fas fa-school text-2xl text-center font-bold"></i>
                    </div>
                    <h1 class="font-bold mx-10 hidden" id="navTitle">Profile Sekolah</h1>
                </a>
            </li>
            <li class="hover:translate-y-0">
                <!-- W-20 -->
                <div class="dropdown dropdown-hover -mt-1" id="dropdown">
                    <div tabindex="0" role="button" class="btn bg-transparent border-none">
                        <div class="w-3 flex justify-center items-center text-white">
                            <i class="fas fa-folder-open text-2xl text-center font-bold"></i>
                        </div>
                    </div>
                    <ul tabindex="0" class="dropdown-content z-[1] menu p-2 text-white shadow bg-elm rounded-box w-52">
                        <li>
                            <a>
                                <i class="fas fa-image"></i>
                                <h1 class="font-bold mx-5">Guru</h1>
                            </a>
                        </li>
                        <li>
                            <a>
                                <i class="fas fa-image"></i>
                                <h1 class="font-bold mx-5">Staff</h1>
                            </a>
                        </li>
                        <li>
                            <a>
                                <i class="fas fa-image"></i>
                                <h1 class="font-bold mx-5">Siswa</h1>
                            </a>
                        </li>
                        <li>
                            <a>
                                <i class="fas fa-image"></i>
                                <h1 class="font-bold mx-5">Alumni</h1>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- W-20 -->
                <details class="hidden" id="navTitle">
                    <summary>
                        <div class="w-3 flex justify-center items-center">
                            <i class="fas fa-folder-open text-2xl text-center font-bold"></i>
                        </div>
                        <h1 class="font-bold mx-10 hidden" id="navTitle">Direktori</h1>
                    </summary>
                    <ul>
                        <li>
                            <a>
                                <i class="fas fa-image"></i>
                                <h1 class="font-bold mx-5">Guru</h1>
                            </a>
                        </li>
                        <li>
                            <a>
                                <i class="fas fa-image"></i>
                                <h1 class="font-bold mx-5">Staff</h1>
                            </a>
                        </li>
                        <li>
                            <a>
                                <i class="fas fa-image"></i>
                                <h1 class="font-bold mx-5">Siswa</h1>
                            </a>
                        </li>
                        <li>
                            <a>
                                <i class="fas fa-image"></i>
                                <h1 class="font-bold mx-5">Alumni</h1>
                            </a>
                        </li>
                    </ul>
                </details>
            </li>
            <li class="hover:translate-y-0">
                <!-- W-20 -->
                <div class="dropdown dropdown-hover -mt-3" id="dropdown">
                    <div tabindex="0" role="button" class="btn bg-transparent border-none">
                        <div class="w-3 flex justify-center items-center text-white">
                            <i class="fas fa-photo-film text-2xl text-center font-bold"></i>
                        </div>
                    </div>
                    <ul tabindex="0" class="dropdown-content z-[1] menu p-2 text-white shadow bg-elm rounded-box w-52">
                        <li>
                            <a>
                                <i class="fas fa-image"></i>
                                <h1 class="font-bold mx-5">Foto</h1>
                            </a>
                        </li>
                        <li>
                            <a>
                                <i class="fas fa-film"></i>
                                <h1 class="font-bold mx-5">Video</h1>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- W-20 -->
                <details class="hidden" id="navTitle">
                    <summary>
                        <div class="w-3  flex justify-center items-center">
                            <i class="fas fa-photo-film text-2xl text-center font-bold"></i>
                        </div>
                        <h1 class="font-bold mx-10 hidden" id="navTitle">Galeri</h1>
                    </summary>
                    <ul>
                        <li>
                            <a>
                                <i class="fas fa-image"></i>
                                <h1 class="font-bold mx-5">Foto</h1>
                            </a>
                        </li>
                        <li>
                            <a>
                                <i class="fas fa-film"></i>
                                <h1 class="font-bold mx-5">Video</h1>
                            </a>
                        </li>
                    </ul>
                </details>
            </li>
            <li class="hover:translate-y-0">
                <!-- W-20 -->
                <div class="dropdown dropdown-hover -mt-3" id="dropdown">
                    <div tabindex="0" role="button" class="btn bg-transparent border-none">
                        <div class="w-3 flex justify-center items-center text-white">
                            <i class="fas fa-file-lines text-2xl text-center font-bold"></i>
                        </div>
                    </div>
                    <ul tabindex="0" class="dropdown-content z-[1] menu p-2 text-white shadow bg-elm rounded-box w-max">
                        <li>
                            <a>
                                <i class="fas fa-circle-info"></i>
                                <h1 class="font-bold mx-5">Informasi & Pendaftaran</h1>
                            </a>
                        </li>
                        <li>
                            <a>
                                <i class="fas fa-bullhorn"></i>
                                <h1 class="font-bold mx-5">Pengumuman PPDB</h1>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- W-20 -->
                <details class="hidden" id="navTitle">
                    <summary>
                        <div class="w-3 flex justify-center items-center">
                            <i class="fas fa-file-lines text-2xl text-center font-bold"></i>
                        </div>
                        <h1 class="font-bold mx-10 hidden" id="navTitle">PPDB</h1>
                    </summary>
                    <ul>
                        <li>
                            <a>
                                <i class="fas fa-circle-info"></i>
                                <h1 class="font-bold mx-5">Informasi & Pendaftaran</h1>
                            </a>
                        </li>
                        <li>
                            <a>
                                <i class="fas fa-bullhorn"></i>
                                <h1 class="font-bold mx-5">Pengumuman PPDB</h1>
                            </a>
                        </li>
                    </ul>
                </details>
            </li>
            <li class="hover:translate-y-0">
                <a>
                    <div class="w-3 flex justify-center items-center">
                        <i class="fas fa-building text-2xl text-center font-bold"></i>
                    </div>
                    <h1 class="font-bold mx-10 hidden" id="navTitle">Sarana & Prasarana</h1>
                </a>
            </li>
            <li class="hover:translate-y-0">
                <a>
                    <div class="w-3 flex justify-center items-center">
                        <i class="fas fa-trophy text-2xl text-center font-bold"></i>
                    </div>
                    <h1 class="font-bold mx-10 hidden" id="navTitle">Prestasi Siswa</h1>
                </a>
            </li>
            <li class="hover:translate-y-0">
                <a>
                    <div class="w-3 flex justify-center items-center">
                        <i class="fas fa-bullhorn text-2xl text-center font-bold"></i>
                    </div>
                    <h1 class="font-bold mx-10 hidden" id="navTitle">Berita</h1>
                </a>
            </li>
            <li class="hover:translate-y-0">
                <a>
                    <div class="w-3 flex justify-center items-center">
                        <i class="fas fa-baseball-bat-ball text-2xl text-center font-bold"></i>
                    </div>
                    <h1 class="font-bold mx-10 hidden" id="navTitle">Ekstrakulikuler</h1>
                </a>
            </li>
            <li class="hover:translate-y-0">
                <a>
                    <div class="w-3 flex justify-center items-center">
                        <i class="fas fa-link text-2xl text-center font-bold"></i>
                    </div>
                    <h1 class="font-bold mx-10 hidden" id="navTitle">Sosial Media</h1>
                </a>
            </li>
            </ul>
            <!-- Nav -->
        </div>
    </div>
    <!-- Content -->
    <div class="flex-1 p-4">
        <div class="card card-compact bg-transparent w-[60rem] h-72 shadow-xl mx-auto image-full">
            <figure>
                <div class="avatar z-50 absolute top-12 left-5">
                    <div class="w-24 rounded-full">
                        <img src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                    </div>
                </div>
            </figure>
            <div class="card-body h-60 sticky top-16 rounded-lg" id="cardBG">
                <h1 class="card-title font-bold text-xl uppercase absolute bottom-10 left-5 text-white">welcome admin
                </h1>
            </div>
        </div>
    </div>
    </div>
    <!-- Content -->
    </div>
    <!-- Navbar -->

    @yield('main-content')




    <script>
    document.getElementById("toggleButton").addEventListener("click", function() {
        var sidebar = document.querySelector(".bg-elm");
        var icon = document.getElementById("toggleIcon");
        var normalTitle = document.getElementById("normalTitle");
        var menu = document.getElementById("menu");
        var dropdown = document.querySelectorAll("#dropdown");
        var navTitles = document.querySelectorAll("#navTitle");
        sidebar.classList.toggle("w-20");
        sidebar.classList.toggle("w-72");

        if (sidebar.classList.contains("w-72")) {
            document.getElementById("toggleButton").classList.remove("left-[0.85rem]");
            document.getElementById("toggleButton").classList.add("left-[16.5rem]");
            icon.classList.add("rotate-180");
            icon.classList.remove("fa-bars");
            icon.classList.add("fa-x");
            normalTitle.classList.remove("hidden");
            menu.classList.remove("flex");
            menu.classList.remove("justify-center");
            menu.classList.remove("items-center");
            dropdown.forEach(function(dropdown) {
                dropdown.classList.add("hidden");
            });
            navTitles.forEach(function(navTitle) {
                navTitle.classList.remove("hidden");
            });
        } else {
            document.getElementById("toggleButton").classList.add("left-[0.85rem]");
            document.getElementById("toggleButton").classList.remove("left-[16.5rem]");
            icon.classList.remove("rotate-180");
            icon.classList.remove("fa-x");
            icon.classList.add("fa-bars");
            normalTitle.classList.add("hidden");
            menu.classList.add("flex");
            menu.classList.add("justify-center");
            menu.classList.add("items-center");
            dropdown.forEach(function(dropdown) {
                dropdown.classList.remove("hidden");
            });
            navTitles.forEach(function(navTitle) {
                navTitle.classList.add("hidden");
            });
        }
    });
    </script>
</body>

</html>