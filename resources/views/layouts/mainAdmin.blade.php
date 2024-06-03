<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <title>Admin SMK Muhammadiyah Plus Kota Batam | {{ $title }}</title>
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    @vite('resources/css/app.css')
</head>
<style>
.overflow-x-auto::-webkit-scrollbar {
    display: none;
}


::-webkit-scrollbar {
    display: none;

}

input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

/* Menghilangkan spinner di Firefox */
input[type=number] {
    -moz-appearance: textfield;
}
</style>

<body class="font-poppins">

    <!-- Navbar -->
    <div class="flex h-max">
        <!-- Side Navbar -->
        <div class="w-20 bg-blue-500 text-white flex-none transition-all duration-300">
            <div class="flex flex-col py-4">
                <button id="toggleButton"
                    class="focus:outline-none absolute left-[0.85rem] text-xl text-center btn rounded-full transition-all duration-300 z-50 tooltip tooltip-right"
                    data-tip="Alt + O" accesskey="o">
                    <i id="toggleIcon" class="fas fa-bars transition-all duration-500"></i>
                </button>
            </div>
            <div class="flex flex-col items-center space-y-4">
                <!-- Title -->
                <div class="font-bold capitalize  hidden" id="normalTitle">
                    <h1 class="-mt-7 text-center">Content management system</h1>
                    <h1 class="mt-5 py-2 w-52 text-base border-b-2 border-white">SMK Muhammadiyah Plus Kota
                        Batam
                    </h1>
                </div>
                <!-- Title -->

                <!-- Nav -->
                <ul class="menu p-4 w-72 translate-y-3 text-white flex justify-center items-center z-50" id="menu">
                    <!-- Sidebar content here -->
                    <li class="hover:translate-y-0 @if($title == 'Dashboard') bg-blue-600 rounded-md @endif"">
                        <a href=" /admin/dashboard">
                        <div class=" w-3 flex justify-center items-center">
                            <i class="fas fa-chart-simple text-2xl font-bold"></i>
                        </div>
                        <h1 class="font-bold mx-10 hidden" id="navTitle">Dashboard</h1>
                        </a>
                    </li>
                    <li class="hover:translate-y-0 @if($title == 'Admin') bg-blue-600 rounded-md @endif">
                        <a href="/admin/admin">
                            <div class="w-3 flex justify-center items-center">
                                <i class="fas fa-user-gear text-2xl text-center font-bold"></i>
                            </div>
                            <h1 class="font-bold mx-10 hidden" id="navTitle">Admin</h1>
                        </a>
                    </li>
                    <li class="hover:translate-y-0 @if($title == 'Admin Carousel') bg-blue-600 rounded-md @endif">
                        <a href="/admin/carousels">
                            <div class=" w-3 flex justify-center items-center">
                                <i class="fas fa-film text-2xl font-bold"></i>
                            </div>
                            <h1 class="font-bold mx-10 hidden" id="navTitle">Carousel</h1>
                        </a>
                    </li>
                    <li
                        class="hover:translate-y-0 @if($title == 'Admin Sejarah Sekolah') bg-blue-600 rounded-md @endif">
                        <a href="/admin/sejarah">
                            <div class=" w-3 flex justify-center items-center">
                                <i class="fas fa-timeline text-2xl font-bold"></i>
                            </div>
                            <h1 class="font-bold mx-10 hidden" id="navTitle">Sejarah Sekolah</h1>
                        </a>
                    </li>
                    <li class="hover:translate-y-0 @if($title == 'Profile') bg-blue-600 rounded-md @endif">
                        <a href="/admin/profile/#">
                            <div class="w-3 flex justify-center items-center">
                                <i class="fas fa-school text-2xl text-center font-bold"></i>
                            </div>
                            <h1 class="font-bold mx-10 hidden" id="navTitle">Konten Website</h1>
                        </a>
                    </li>
                    <li
                        class="hover:translate-y-0 @if($title == 'Admin Program Keahlian') bg-blue-600 rounded-md @endif">
                        <a href="/admin/program-keahlian">
                            <div class="w-3 flex justify-center items-center">
                                <i class="fas fa-pen-ruler text-2xl text-center font-bold"></i>
                            </div>
                            <h1 class="font-bold mx-10 hidden" id="navTitle">Program Keahlian</h1>
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
                            <ul tabindex="0"
                                class="dropdown-content menu p-2 text-white shadow bg-blue-500 rounded-box w-52">
                                <li class="@if($title == 'Admin Guru') bg-blue-600 rounded-md @endif">
                                    <a href="/admin/guru">
                                        <i class="fas fa-chalkboard-user"></i>
                                        <h1 class="font-bold mx-5">Guru</h1>
                                    </a>
                                </li>
                                <li class="@if($title == 'Admin Pegawai') bg-blue-600 rounded-md @endif">
                                    <a href="/admin/pegawai">
                                        <i class="fas fa-clipboard-user text-2xl"></i>
                                        <h1 class="font-bold mx-5">Pegawai</h1>
                                    </a>
                                </li>
                                <li class="@if($title == 'Admin Siswa') bg-blue-600 rounded-md @endif">
                                    <a href="/admin/siswa">
                                        <i class="fas fa-users"></i>
                                        <h1 class="font-bold mx-5">Siswa</h1>
                                    </a>
                                </li>
                                <li class="@if($title == 'Admin Alumni') bg-blue-600 rounded-md @endif">
                                    <a href="/admin/alumni">
                                        <i class="fa-solid fa-graduation-cap"></i>
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
                                <li class="@if($title == 'Admin Guru') bg-blue-600 rounded-md @endif">
                                    <a href="/admin/guru">
                                        <i class="fas fa-chalkboard-user"></i>
                                        <h1 class="font-bold mx-5">Guru</h1>
                                    </a>
                                </li>
                                <li class="@if($title == 'Admin Pegawai') bg-blue-600 rounded-md @endif">
                                    <a href="/admin/pegawai">
                                        <i class="fas fa-clipboard-user text-2xl"></i>
                                        <h1 class="font-bold mx-5">Pegawai</h1>
                                    </a>
                                </li>
                                <li class="@if($title == 'Admin Siswa') bg-blue-600 rounded-md @endif">
                                    <a href="/admin/siswa">
                                        <i class="fas fa-users"></i>
                                        <h1 class="font-bold mx-5">Siswa</h1>
                                    </a>
                                </li>
                                <li class="@if($title == 'Admin Alumni') bg-blue-600 rounded-md @endif">
                                    <a href="/admin/alumni">
                                        <i class="fas fa-graduation-cap"></i>
                                        <h1 class="font-bold mx-5">Alumni</h1>
                                    </a>
                                </li>
                            </ul>
                        </details>
                    </li>
                    <li class="hover:translate-y-0">
                        <!-- W-20 -->
                        <div class="dropdown dropdown-hover -mt-3 -z-50" id="dropdown">
                            <div tabindex="0" role="button" class="btn bg-transparent border-none">
                                <div class="w-3 flex justify-center items-center text-white">
                                    <i class="fas fa-photo-film text-2xl text-center font-bold"></i>
                                </div>
                            </div>
                            <ul tabindex="0"
                                class="dropdown-content z-[1] menu p-2 text-white shadow bg-blue-500 rounded-box w-52">
                                <li class="@if($title == 'Admin Album') bg-blue-600 rounded-md @endif">
                                    <a href="/admin/album">
                                        <i class="fas fa-image"></i>
                                        <h1 class="font-bold mx-5">Album</h1>
                                    </a>
                                </li>
                                <li class="@if($title == 'Admin Foto') bg-blue-600 rounded-md @endif">
                                    <a href="/admin/foto">
                                        <i class="fas fa-image"></i>
                                        <h1 class="font-bold mx-5">Foto</h1>
                                    </a>
                                </li>
                                <li class="@if($title == 'Admin Video') bg-blue-600 rounded-md @endif">
                                    <a href="/admin/video">
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
                                <li class="@if($title == 'Admin Album') bg-blue-600 rounded-md @endif">
                                    <a href="/admin/album">
                                        <i class="fas fa-image"></i>
                                        <h1 class="font-bold mx-5">Album</h1>
                                    </a>
                                </li>
                                <li class="@if($title == 'Admin Foto') bg-blue-600 rounded-md @endif">
                                    <a href="/admin/foto">
                                        <i class="fas fa-image"></i>
                                        <h1 class="font-bold mx-5">Foto</h1>
                                    </a>
                                </li>
                                <li class="@if($title == 'Admin Video') bg-blue-600 rounded-md @endif">
                                    <a href="/admin/video">
                                        <i class="fas fa-film"></i>
                                        <h1 class="font-bold mx-5">Video</h1>
                                    </a>
                                </li>
                            </ul>
                        </details>
                    </li>
                    <li class="hover:translate-y-0">
                        <!-- W-20 -->
                        <div class="dropdown dropdown-hover -mt-3 -z-50" id="dropdown">
                            <div tabindex="0" role="button" class="btn bg-transparent border-none">
                                <div class="w-3 flex justify-center items-center text-white">
                                    <i class="fas fa-file-lines text-2xl text-center font-bold"></i>
                                </div>
                            </div>
                            <ul tabindex="0"
                                class="dropdown-content z-[1] menu p-2 text-white shadow bg-blue-500 rounded-box w-max">
                                <li class="@if($title == 'Admin Informasi PPDB') bg-blue-600 rounded-md @endif">
                                    <a href="/admin/informasiPPDB">
                                        <i class="fas fa-circle-info"></i>
                                        <h1 class="font-bold mx-5">Informasi PPDB</h1>
                                    </a>
                                </li>
                                <li class="@if($title == 'Admin Pendaftaran PPDB') bg-blue-600 rounded-md @endif">
                                    <a href="/admin/pendaftaranPPDB">
                                        <i class="fas fa-clipboard"></i>
                                        <h1 class="font-bold mx-5">Pendaftaran PPDB</h1>
                                    </a>
                                </li>
                                <li class="@if($title == 'Admin Pengumuman PPDB') bg-blue-600 rounded-md @endif">
                                    <a href="/admin/pengumumanPPDB">
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
                                <li class="@if($title == 'Admin Informasi PPDB') bg-blue-600 rounded-md @endif">
                                    <a href="/admin/informasiPPDB">
                                        <i class="fas fa-circle-info"></i>
                                        <h1 class="font-bold mx-5">Informasi PPDB</h1>
                                    </a>
                                </li>
                                <li class="@if($title == 'Admin Pendaftaran PPDB') bg-blue-600 rounded-md @endif">
                                    <a href="/admin/pendaftaranPPDB">
                                        <i class="fas fa-clipboard"></i>
                                        <h1 class="font-bold mx-5">Pendaftaran PPDB</h1>
                                    </a>
                                </li>
                                <li class="@if($title == 'Admin Pengumuman PPDB') bg-blue-600 rounded-md @endif">
                                    <a href="/admin/pengumumanPPDB">
                                        <i class="fas fa-bullhorn"></i>
                                        <h1 class="font-bold mx-5">Pengumuman PPDB</h1>
                                    </a>
                                </li>
                            </ul>
                        </details>
                    </li>

                    <li class="hover:translate-y-0">
                        <!-- W-20 -->
                        <div class="dropdown dropdown-hover -mt-3 -z-50" id="dropdown">
                            <div tabindex="0" role="button" class="btn bg-transparent border-none">
                                <div class="w-3 flex justify-center items-center text-white">
                                    <i class="fas fa-building text-2xl text-center font-bold"></i>
                                </div>
                            </div>
                            <ul tabindex="0"
                                class="dropdown-content z-[1] menu p-2 text-white shadow bg-blue-500 rounded-box w-max">
                                <li
                                    class="hover:translate-y-0 @if($title == 'Admin Sarana & Prasarana') bg-blue-600 rounded-md @endif">
                                    <a href="/admin/saranaPrasarana">
                                        <div class="w-3 flex justify-center items-center ">
                                            <i class="fas fa-building text-2xl text-center font-bold"></i>
                                        </div>
                                        <h1 class="font-bold mx-10">Sarana & Prasarana</h1>
                                    </a>
                                </li>
                                <li
                                    class="hover:translate-y-0 @if($title == 'Admin Foto Prasarana') bg-blue-600 rounded-md @endif">
                                    <a href="/admin/fotoPrasarana">
                                        <div class="w-3 flex justify-center items-center ">
                                            <i class="fas fa-building text-2xl text-center font-bold"></i>
                                        </div>
                                        <h1 class="font-bold mx-10">Gambar Prasarana</h1>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- W-20 -->
                        <details class="hidden" id="navTitle">
                            <summary>
                                <div class="w-3 flex justify-center items-center">
                                    <i class="fas fa-building text-2xl text-center font-bold"></i>
                                </div>
                                <h1 class="font-bold mx-10 hidden" id="navTitle">Prasarana</h1>
                            </summary>
                            <ul>
                                <li
                                    class="hover:translate-y-0 @if($title == 'Admin Sarana & Prasarana') bg-blue-lagoon rounded-md @endif">
                                    <a href="/admin/saranaPrasarana">
                                        <div class="w-3 flex justify-center items-center -z-50">
                                            <i class="fas fa-building text-2xl text-center font-bold"></i>
                                        </div>
                                        <h1 class="font-bold mx-10 hidden" id="navTitle">Sarana & Prasarana</h1>
                                    </a>
                                </li>
                                <li
                                    class="hover:translate-y-0 @if($title == 'Admin Foto Prasarana') bg-blue-600 rounded-md @endif">
                                    <a href="/admin/fotoPrasarana">
                                        <div class="w-3 flex justify-center items-center -z-50">
                                            <i class="fas fa-building text-2xl text-center font-bold"></i>
                                        </div>
                                        <h1 class="font-bold mx-10 hidden" id="navTitle">Gambar Prasarana</h1>
                                    </a>
                                </li>
                            </ul>
                        </details>
                    </li>
                    <li class="hover:translate-y-0 -z-50 @if($title == 'Admin Prestasi') bg-blue-600 rounded-md @endif">
                        <a href="/admin/prestasi">
                            <div class="w-3 flex justify-center items-center">
                                <i class="fas fa-trophy text-2xl text-center font-bold"></i>
                            </div>
                            <h1 class="font-bold mx-10 hidden" id="navTitle">Prestasi Siswa</h1>
                        </a>
                    </li>
                    <li class="hover:translate-y-0 @if($title == 'Admin Berita') bg-blue-600 rounded-md @endif">
                        <a href="/admin/berita">
                            <div class="w-3 flex justify-center items-center">
                                <i class="fas fa-bullhorn text-2xl text-center font-bold"></i>
                            </div>
                            <h1 class="font-bold mx-10 hidden" id="navTitle">Berita</h1>
                        </a>
                    </li>
                    <li
                        class="hover:translate-y-0 @if($title == 'Admin Ekstrakulikuler') bg-blue-600 rounded-md @endif">
                        <a href="/admin/ekstrakulikuler">
                            <div class="w-3 flex justify-center items-center">
                                <i class="fas fa-baseball-bat-ball text-2xl text-center font-bold"></i>
                            </div>
                            <h1 class="font-bold mx-10 hidden" id="navTitle">Ekstrakulikuler</h1>
                        </a>
                    </li>
                    <li class="hover:translate-y-0 @if($title == 'Admin Sosial Media') bg-blue-600 rounded-md @endif">
                        <a href="/admin/sosialMedia">
                            <div class="w-3 flex justify-center items-center">
                                <i class="fas fa-link text-2xl text-center font-bold"></i>
                            </div>
                            <h1 class="font-bold mx-10 hidden" id="navTitle">Sosial Media</h1>
                        </a>
                    </li>
                    <li class="hover:translate-y-0 @if($title == 'Admin Umpan Balik') bg-blue-600 rounded-md @endif">
                        <a href="/admin/umpanBalik">
                            <div class="w-3 flex justify-center items-center">
                                <i class="fas fa-message text-2xl text-center font-bold"></i>
                            </div>
                            <h1 class="font-bold mx-10 hidden" id="navTitle">Umpan Balik</h1>
                        </a>
                    </li>
                </ul>
                <!-- Nav -->
            </div>
        </div>
        <!-- Content -->
        <div class="flex-1 p-4">

            <div class="card card-compact bg-blue-100 w-full h-72 shadow-xl mx-auto">
                <figure>
                    <div class="avatar z-50 absolute top-12 left-5">
                        <div class="w-24 rounded-full">
                            <img src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                        </div>
                    </div>
                </figure>
                <div class="card-body h-60 sticky top-16 rounded-lg wave-effect">
                    @include('layouts.wave')
                    <h1 class="card-title font-bold text-xl uppercase absolute bottom-10 left-5 text-white">
                        Welcome {{ auth('admin')->user()->nama }}
                    </h1>
                    <div class="card-actions text-xl absolute right-12 top-5 gap-6 text-white">

                        <form id="logout-form" action="{{ route('account.logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-transparent border-0 cursor-pointer">
                                <i class="fas fa-arrow-right-from-bracket"></i>
                            </button>
                        </form>

                    </div>
                </div>
            </div>

            <div class="my-20 mx-auto">
                @yield('main-content')
            </div>
            <!-- Content -->
        </div>

        <!-- Navbar -->
        <script>
        // Sidebar
        document.addEventListener('DOMContentLoaded', function() {
            var sidebar = document.querySelector(".bg-blue-500");
            var icon = document.getElementById("toggleIcon");
            var normalTitle = document.getElementById("normalTitle");
            var menu = document.getElementById("menu");
            var dropdown = document.querySelectorAll("#dropdown");
            var navTitles = document.querySelectorAll("#navTitle");

            // Function to open sidebar
            function openSidebar() {
                sidebar.classList.add("w-72");
                sidebar.classList.remove("w-20");
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
            }

            // Function to close sidebar
            function closeSidebar() {
                sidebar.classList.remove("w-72");
                sidebar.classList.add("w-20");
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

            // Initial state: open sidebar
            openSidebar();

            document.getElementById("toggleButton").addEventListener("click", function() {
                if (sidebar.classList.contains("w-72")) {
                    closeSidebar();
                } else {
                    openSidebar();
                }
            });
        });
        // Sidebar


        // Action Button
        const buttons = document.querySelectorAll('.button');

        const handleMouseEnter = (button) => {
            button.querySelector('.circle-1').classList.add('translate-x-4');
            button.querySelector('.circle-3').classList.add('-translate-x-4');
            button.querySelector('.circle-2').classList.add('animate-ping');
        };

        const handleMouseLeave = (button) => {
            clearTimeout(button.dataset.timer);
            button.querySelector('.circle-1').classList.remove('translate-x-4');
            button.querySelector('.circle-3').classList.remove('-translate-x-4');
            button.querySelector('.circle-2').classList.remove('animate-ping');
        };

        const handleClick = (button) => {
            if (!button.dataset.clicked || button.dataset.clicked === 'false') {
                button.dataset.clicked = 'true';
                button.querySelector('.fa-times').classList.remove('hidden');
                button.querySelector('.fa-times').classList.add('animate-pulse');
                button.querySelectorAll('.fa-circle').forEach(circle => circle.classList.add('hidden'));
            } else {
                button.dataset.clicked = 'false';
                button.querySelector('.fa-times').classList.add('hidden');
                button.querySelectorAll('.fa-circle').forEach(circle => circle.classList.remove('hidden'));
            }
        };

        buttons.forEach(button => {
            button.addEventListener('mouseenter', () => handleMouseEnter(button));
            button.addEventListener('mouseleave', () => handleMouseLeave(button));
            button.addEventListener('click', () => handleClick(button));
        });

        function rotateIcon() {
            var icon = document.getElementById('plus-icon');
            icon.classList.toggle('rotate-45');
        }
        // Action Button

        // Password
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
        // Password

        // Obeject Load
        window.addEventListener('scroll', function() {
            var section = document.getElementById('.section');
            var button = document.getElementById('button');

            var sectionRect = section.getBoundingClientRect();

            if (sectionRect.top <= window.innerHeight) {
                button.classList.remove('hidden');
                button.classList.add('animate-slideInFromTop');
            } else {
                button.classList.add('hidden');
            }
        });
        // Obeject Load

        // Duplicate input file & text
        document.addEventListener("DOMContentLoaded", function() {
            const fileInputsContainer = document.getElementById('fileInputs');
            const btnAddFile = document.getElementById('btnAddFile');
            let fileInputCount = 1;

            const textInputContainer = document.getElementById('textInputContainer');
            const btnAddText = document.getElementById('btnAddText');
            let textInputCount = 1;

            btnAddFile.addEventListener('click', function() {
                const fileInputWrapper = document.createElement('div');
                fileInputWrapper.classList.add('flex', 'gap-1');

                const newLabel = document.createElement('label');
                newLabel.classList.add('input', 'bg-transparent', 'border-2', 'border-blue-400', 'flex',
                    'items-center', 'gap-2', 'w-full', 'focus-within:outline-none');

                const newFileInput = document.createElement('input');
                newFileInput.setAttribute('type', 'file');
                newFileInput.classList.add('grow', 'file-input', 'file-input-success',
                    'border-none', 'bg-transparent', 'py-2', 'file:mr-4', 'file:px-4',
                    'file:rounded-full', 'file:border-0', 'file:text-sm', 'file:font-semibold',
                    'file:bg-blue-500', 'file:text-white', 'hover:file:bg-transparent',
                    'hover:file:text-blue-400');
                newFileInput.setAttribute('placeholder', 'Pilih gambar berita');
                newFileInput.setAttribute('name', `gambar_berita[]`);

                const btnRemove = document.createElement('button');
                btnRemove.classList.add('btn', 'btn-square', 'btn-outline', 'btn-error',
                    'btn-remove');
                btnRemove.innerHTML = `<i class='fas fa-times text-lg'></i>`;
                btnRemove.addEventListener('click', function() {
                    fileInputWrapper.remove();
                });

                newLabel.appendChild(newFileInput);
                fileInputWrapper.appendChild(newLabel);
                fileInputWrapper.appendChild(btnRemove);
                fileInputsContainer.appendChild(fileInputWrapper);

                fileInputCount++;
            });

            btnAddText.addEventListener('click', function() {
                const textInputWrapper = document.createElement('div');
                textInputWrapper.classList.add('flex', 'gap-1');

                const newTextInput = document.createElement('input');
                newTextInput.setAttribute('type', 'text');
                newTextInput.classList.add('input', 'input-bordered', 'border-2', 'border-blue-400',
                    'w-full');
                newTextInput.setAttribute('placeholder', 'Kategori Berita');
                newTextInput.setAttribute('name', `kategori_berita[]`);

                const btnRemove = document.createElement('button');
                btnRemove.classList.add('btn', 'btn-square', 'btn-outline', 'btn-error',
                    'btn-remove');
                btnRemove.innerHTML =
                    `<i class='fas fa-times text-lg'></i>`;
                btnRemove.addEventListener('click', function() {
                    textInputWrapper.remove();
                });

                textInputWrapper.appendChild(newTextInput);
                textInputWrapper.appendChild(btnRemove);
                textInputContainer.appendChild(textInputWrapper);

                textInputCount++;
            });
        });

        // Ekstrakurikuler
        document.addEventListener("DOMContentLoaded", function() {
            const fileInputsEkskul = document.getElementById('fileInputsEkskul');
            const btnAddFileEkskul = document.getElementById('btnAddFileEkskul');
            let fileInputEkskulCount = 1;

            btnAddFileEkskul.addEventListener('click', function() {
                const fileInputEkskulWrapper = document.createElement('div');
                fileInputEkskulWrapper.classList.add('flex', 'gap-1');

                const newLabelEkskul = document.createElement('label');
                newLabelEkskul.classList.add('input', 'bg-transparent', 'border-2', 'border-blue-400',
                    'flex', 'items-center', 'gap-2', 'w-full', 'focus-within:outline-none');

                const newFileInputEkskul = document.createElement('input');
                newFileInputEkskul.setAttribute('type', 'file');
                newFileInputEkskul.classList.add('grow', 'file-input', 'file-input-success',
                    'border-none', 'bg-transparent', 'py-2', 'file:mr-4', 'file:px-4',
                    'file:rounded-full', 'file:border-0', 'file:text-sm', 'file:font-semibold',
                    'file:bg-blue-500', 'file:text-white', 'hover:file:bg-transparent',
                    'hover:file:text-blue-400');
                newFileInputEkskul.setAttribute('placeholder', 'Pilih gambar berita');
                newFileInputEkskul.setAttribute('name', `gambar_ekstrakurikuler[]`);

                const btnRemoveEkskul = document.createElement('button');
                btnRemoveEkskul.classList.add('btn', 'btn-square', 'btn-outline', 'btn-error',
                    'btn-remove');
                btnRemoveEkskul.innerHTML = `<i class='fas fa-times text-lg'></i>`;
                btnRemoveEkskul.addEventListener('click', function() {
                    fileInputEkskulWrapper.remove();
                });

                newLabelEkskul.appendChild(newFileInputEkskul);
                fileInputEkskulWrapper.appendChild(newLabelEkskul);
                fileInputEkskulWrapper.appendChild(btnRemoveEkskul);
                fileInputsEkskul.appendChild(fileInputEkskulWrapper);

                fileInputEkskulCount++;
            });
        });
        // Ekstrakurikuler
        // Prestasi Siswa
        document.addEventListener("DOMContentLoaded", function() {
            const fileInputsPrestasi = document.getElementById('fileInputsPrestasi');
            const btnAddFilePrestasi = document.getElementById('btnAddFilePrestasi');
            let fileInputPrestasiCount = 1;

            btnAddFilePrestasi.addEventListener('click', function() {
                const fileInputPrestasiWrapper = document.createElement('div');
                fileInputPrestasiWrapper.classList.add('flex', 'gap-1');

                const newLabelPrestasi = document.createElement('label');
                newLabelPrestasi.classList.add('input', 'bg-transparent', 'border-2', 'border-blue-400',
                    'flex', 'items-center', 'gap-2', 'w-full', 'focus-within:outline-none');

                const newFileInputPrestasi = document.createElement('input');
                newFileInputPrestasi.setAttribute('type', 'file');
                newFileInputPrestasi.classList.add('grow', 'file-input', 'file-input-success',
                    'border-none', 'bg-transparent', 'py-2', 'file:mr-4', 'file:px-4',
                    'file:rounded-full', 'file:border-0', 'file:text-sm', 'file:font-semibold',
                    'file:bg-blue-500', 'file:text-white', 'hover:file:bg-transparent',
                    'hover:file:text-blue-400');
                newFileInputPrestasi.setAttribute('placeholder', 'Pilih gambar berita');
                newFileInputPrestasi.setAttribute('name', `gambar[]`);

                const btnRemovePrestasi = document.createElement('button');
                btnRemovePrestasi.classList.add('btn', 'btn-square', 'btn-outline', 'btn-error',
                    'btn-remove');
                btnRemovePrestasi.innerHTML = `<i class='fas fa-times text-lg'></i>`;
                btnRemovePrestasi.addEventListener('click', function() {
                    fileInputPrestasiWrapper.remove();
                });

                newLabelPrestasi.appendChild(newFileInputPrestasi);
                fileInputPrestasiWrapper.appendChild(newLabelPrestasi);
                fileInputPrestasiWrapper.appendChild(btnRemovePrestasi);
                fileInputsPrestasi.appendChild(fileInputPrestasiWrapper);

                fileInputPrestasiCount++;
            });
        });
        // Prestasi Siswa

            //Duplicate foto
            function duplicateInput() {
                const container = document.getElementById('imageInputsContainer');
                const clone = container.firstElementChild.cloneNode(true);
                container.appendChild(clone);
                // Show the remove button of the newly added input
                clone.querySelector('.btn-remove').classList.remove('hidden');
            }

            function removeInput(btn) {
                const inputDiv = btn.parentNode.parentNode;
                inputDiv.parentNode.removeChild(inputDiv);
            }

        //Rich Text Editor (CKEDITOR5)
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
        //Rich Text Editor (CKEDITOR5)
        </script>
        
        <script>
        // fungsi checkbox select all
        document.addEventListener('DOMContentLoaded', function() {
            const selectAllCheckboxes = document.querySelectorAll('#select-all, #select-all-footer');
            const itemCheckboxes = document.querySelectorAll('.select-item');

            selectAllCheckboxes.forEach(selectAllCheckbox => {
                selectAllCheckbox.addEventListener('change', function(e) {
                    const isChecked = e.target.checked;
                    itemCheckboxes.forEach(checkbox => {
                        checkbox.checked = isChecked;
                    });
                });
            });
        });
        </script>
</body>

</html>