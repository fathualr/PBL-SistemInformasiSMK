@extends('layouts.main')

@section('Main')

<!-- Main Section -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h1 class="font-bold text-2xl text-center">{{ $ekstrakulikuler->nama_ekstrakurikuler }}</h1>

            <div class="grid grid-cols-3 w-6/12 mx-auto">
                <div class="divider"></div>
                <div class="divider divider-primary"></div>
                <div class="divider"></div>
            </div>
        </div>

        <section class="p-8 bg-gray-100">
            <div class="container mx-auto flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-8 md:mb-0">
                    <h2 class="text-2xl font-bold mb-4">Tentang Ekstrakurikuler Ini</h2>
                    <p class="text-gray-700 overflow-auto h-72">Lorem ipsum dolor, sit amet consectetur adipisicing
                        elit.
                        Ipsum possimus
                        tempore dolore sit corrupti dolorum id reiciendis doloribus, dolor magnam iusto numquam
                        voluptate hic quibusdam dolores! Laudantium quasi nihil eveniet!
                        Tenetur nisi consequuntur quo quas provident vitae officiis sapiente, sunt laudantium veritatis
                        nam, corrupti ducimus et temporibus. Reiciendis voluptate sit beatae, quis aperiam doloremque,
                        pariatur, id iusto recusandae fugit laboriosam!
                        Ipsa, explicabo! Distinctio eligendi cum nulla harum delectus perspiciatis error voluptas velit
                        accusantium beatae ipsam dolorem quasi quas reiciendis obcaecati ratione eos sit facilis eum,
                        dolor at iure magnam id!
                        Ullam nihil eligendi dolorum laboriosam, aperiam commodi eaque nostrum debitis vitae eos
                        excepturi, odit enim dignissimos deleniti! Deleniti a totam saepe, enim corrupti laborum vel
                        natus magni rem, eveniet unde.
                        Cupiditate voluptas soluta rem quos harum quia architecto atque accusamus recusandae minima,
                        exercitationem eaque perspiciatis cum libero dolores dignissimos magni, ipsum magnam quod!
                        Dignissimos quia, impedit blanditiis ullam eos libero.
                        Non eius eos, laudantium debitis quasi necessitatibus corrupti natus enim sint voluptas cumque
                        iusto unde voluptatum amet! Unde voluptatibus odit laborum, officia cupiditate in totam nostrum
                        libero. Distinctio, necessitatibus quis?
                        Autem molestias veniam, cumque nulla quasi ab nihil numquam nisi, accusantium commodi pariatur
                        et corporis laudantium inventore dolorum blanditiis odit placeat sunt, illum expedita tempora
                        suscipit laborum? Accusamus, aliquam nobis?
                        Sed ratione aperiam optio beatae corrupti possimus amet, quidem alias asperiores rem explicabo
                        ex quod eum, quibusdam temporibus? Ducimus maiores in ea adipisci, perspiciatis officiis
                        sapiente laudantium dicta minima voluptatum!
                        Aspernatur itaque quo quis labore sint. Odit ipsum esse dignissimos distinctio placeat neque
                        minima, veritatis, sit, repellendus architecto at veniam nemo. Est dignissimos voluptates aut
                        natus! Nisi vero itaque officia?
                        Error dolores soluta nihil assumenda in veniam, voluptatibus enim consequatur commodi ullam eius
                        obcaecati! Aliquid optio libero magnam non, perspiciatis cumque accusamus exercitationem
                        officia, vel, quasi quaerat qui deserunt nobis.</p>
                </div>
                <div class="md:w-1/2 flex justify-center md:justify-end">
                    <div class="flex space-x-4">
                        <div class="h-48 w-48">
                            <!-- Logo Ekstrakurikuler -->
                            <p class="text-gray-400 text-center">Logo Ekstrakurikuler</p>
                            <img class="mask mask-squircle mx-auto w-40 h-40" src="https://img.daisyui.com/images/stock/photo-1567653418876-5bb0e566e1c2.jpg" />
                        </div>
                        <div class="h-48 w-48 items-center justify-center">
                            <!-- Foto Pembimbing -->
                            <p class="text-gray-400 text-center">Guru Pembimbing</p>
                            <img class="mask mask-squircle mx-auto w-40 h-40" src="https://img.daisyui.com/images/stock/photo-1567653418876-5bb0e566e1c2.jpg" />
                            <p class="text-gray-400 text-center">{{ $ekstrakulikuler->guru->nama_guru }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
</section>

<div class="relative w-full overflow-hidden">
    <div class="text-center">
        <h1 class="font-bold text-2xl text-center">Foto Kegiatan</h1>

        <div class="grid grid-cols-3 w-6/12 mx-auto">
            <div class="divider"></div>
            <div class="divider divider-primary"></div>
            <div class="divider"></div>
        </div>
    </div>
    <div class="flex transition-transform duration-[1500ms]" id="slider" style="width: 300%;">
        <div class="w-full grid grid-cols-4 justify-center items-center">
            <button class="btn bg-transparent border-none hover:bg-transparent w-full h-max hover:scale-110" onclick="window['my_modal_view{{ $ekstrakulikuler->id_gambar_ekstrakurikuler }}'].showModal()">
                <img src="{{ asset('storage/'. $ekstrakulikuler->gambar_profil_ekstrakurikuler) }}" class="w-64 h-64 object-cover rounded-sm mx-auto" alt="Image 1">
            </button>
            <button class="btn bg-transparent border-none hover:bg-transparent w-full h-max hover:scale-110" onclick="window['my_modal_view{{ $ekstrakulikuler->id_gambar_ekstrakurikuler }}'].showModal()">
                <img src="{{ asset('storage/'. $ekstrakulikuler->gambar_profil_ekstrakurikuler) }}" class="w-64 h-64 object-cover rounded-sm mx-auto" alt="Image 1">
            </button>
            <button class="btn bg-transparent border-none hover:bg-transparent w-full h-max hover:scale-110" onclick="window['my_modal_view{{ $ekstrakulikuler->id_gambar_ekstrakurikuler }}'].showModal()">
                <img src="{{ asset('storage/'. $ekstrakulikuler->gambar_profil_ekstrakurikuler) }}" class="w-64 h-64 object-cover rounded-sm mx-auto" alt="Image 1">
            </button>
            <button class="btn bg-transparent border-none hover:bg-transparent w-full h-max hover:scale-110" onclick="window['my_modal_view{{ $ekstrakulikuler->id_gambar_ekstrakurikuler }}'].showModal()">
                <img src="{{ asset('storage/'. $ekstrakulikuler->gambar_profil_ekstrakurikuler) }}" class="w-64 h-64 object-cover rounded-sm mx-auto" alt="Image 1">
            </button>
        </div>
        <div class="w-full grid grid-cols-4 justify-center items-center">
            <button class="btn bg-transparent border-none hover:bg-transparent w-full h-max hover:scale-110" onclick="window['my_modal_view{{ $ekstrakulikuler->id_gambar_ekstrakurikuler }}'].showModal()">
                <img src="{{ asset('storage/'. $ekstrakulikuler->gambar_profil_ekstrakurikuler) }}" class="w-64 h-64 object-cover rounded-sm mx-auto" alt="Image 1">
            </button>
            <button class="btn bg-transparent border-none hover:bg-transparent w-full h-max hover:scale-110" onclick="window['my_modal_view{{ $ekstrakulikuler->id_gambar_ekstrakurikuler }}'].showModal()">
                <img src="{{ asset('storage/'. $ekstrakulikuler->gambar_profil_ekstrakurikuler) }}" class="w-64 h-64 object-cover rounded-sm mx-auto" alt="Image 1">
            </button>
            <button class="btn bg-transparent border-none hover:bg-transparent w-full h-max hover:scale-110" onclick="window['my_modal_view{{ $ekstrakulikuler->id_gambar_ekstrakurikuler }}'].showModal()">
                <img src="{{ asset('storage/'. $ekstrakulikuler->gambar_profil_ekstrakurikuler) }}" class="w-64 h-64 object-cover rounded-sm mx-auto" alt="Image 1">
            </button>
            <button class="btn bg-transparent border-none hover:bg-transparent w-full h-max hover:scale-110" onclick="window['my_modal_view{{ $ekstrakulikuler->id_gambar_ekstrakurikuler }}'].showModal()">
                <img src="{{ asset('storage/'. $ekstrakulikuler->gambar_profil_ekstrakurikuler) }}" class="w-64 h-64 object-cover rounded-sm mx-auto" alt="Image 1">
            </button>
        </div>
        <div class="w-full grid grid-cols-4 justify-center items-center">
            <button class="btn bg-transparent border-none hover:bg-transparent w-full h-max hover:scale-110" onclick="window['my_modal_view{{ $ekstrakulikuler->id_gambar_ekstrakurikuler }}'].showModal()">
                <img src="{{ asset('storage/'. $ekstrakulikuler->gambar_profil_ekstrakurikuler) }}" class="w-64 h-64 object-cover rounded-sm mx-auto" alt="Image 1">
            </button>
            <button class="btn bg-transparent border-none hover:bg-transparent w-full h-max hover:scale-110" onclick="window['my_modal_view{{ $ekstrakulikuler->id_gambar_ekstrakurikuler }}'].showModal()">
                <img src="{{ asset('storage/'. $ekstrakulikuler->gambar_profil_ekstrakurikuler) }}" class="w-64 h-64 object-cover rounded-sm mx-auto" alt="Image 1">
            </button>
            <button class="btn bg-transparent border-none hover:bg-transparent w-full h-max hover:scale-110" onclick="window['my_modal_view{{ $ekstrakulikuler->id_gambar_ekstrakurikuler }}'].showModal()">
                <img src="{{ asset('storage/'. $ekstrakulikuler->gambar_profil_ekstrakurikuler) }}" class="w-64 h-64 object-cover rounded-sm mx-auto" alt="Image 1">
            </button>
            <button class="btn bg-transparent border-none hover:bg-transparent w-full h-max hover:scale-110" onclick="window['my_modal_view{{ $ekstrakulikuler->id_gambar_ekstrakurikuler }}'].showModal()">
                <img src="{{ asset('storage/'. $ekstrakulikuler->gambar_profil_ekstrakurikuler) }}" class="w-64 h-64 object-cover rounded-sm mx-auto" alt="Image 1">
            </button>
        </div>
    </div>
    <button class="border-none opacity-75 bg-blue-600 rounded-full w-12 h-12 absolute left-5 top-1/2 transform p-2 flex justify-center items-center" onclick="prevSlide()">
        <i class="fas fa-angle-left text-white"></i>
    </button>
    <button class="border-none opacity-75 bg-blue-600 rounded-full w-12 h-12 absolute right-5 top-1/2 transform p-2 flex justify-center items-center" onclick="nextSlide()">
        <i class="fas fa-angle-right text-white"></i>
    </button>
</div>

<dialog id="my_modal_view{{ $ekstrakulikuler->id_gambar_ekstrakurikuler }}" class="modal">
    <div class="modal-box w-11/12 max-w-7xl bg-transparent shadow-none p-5">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute -top-1 -right-0">
                <i class="fas fa-times text-2xl text-white"></i>
            </button>
        </form>
        <img src="{{ asset('storage/'. $ekstrakulikuler->gambar_profil_ekstrakurikuler) }}" class="w-11/12 h-1/2 object-cover rounded-sm mx-auto" alt="Image 1">
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>

<script>
    let currentIndex = 0;
    let autoSlideInterval;

    function showSlide(index) {
        const slider = document.getElementById('slider');
        const slides = slider.children;
        const totalSlides = slides.length;

        if (index >= totalSlides) {
            currentIndex = 0;
        } else if (index < 0) {
            currentIndex = totalSlides - 1;
        } else {
            currentIndex = index;
        }

        slider.style.transform = `translateX(-${currentIndex * 100 / totalSlides}%)`;
    }

    function nextSlide() {
        showSlide(currentIndex + 1);
    }

    function prevSlide() {
        showSlide(currentIndex - 1);
    }

    function startAutoSlide() {
        autoSlideInterval = setInterval(() => {
            nextSlide();
        }, 2500);
    }

    function stopAutoSlide() {
        clearInterval(autoSlideInterval);
    }

    document.addEventListener('DOMContentLoaded', () => {
        showSlide(currentIndex);
        startAutoSlide();
    });

    document.getElementById('slider').addEventListener('mouseenter', stopAutoSlide);
    document.getElementById('slider').addEventListener('mouseleave', startAutoSlide);
</script>

@endsection