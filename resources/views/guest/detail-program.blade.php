@extends('layouts.main')

@section('Main')

<!-- First Content -->
<h1 class="font-bold text-2xl text-center">TEKNIK KOMPUTER DAN JARINGAN</h1>

<div class="grid grid-cols-3 w-48 mx-auto -mt-3">
    <div class="divider"></div>
    <div class="divider divider-neutral"></div>
    <div class="divider"></div>
</div>

<p class="text-center">
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo aspernatur veritatis possimus nesciunt,
    totam debitis pariatur recusandae, adipisci, facilis quo sit molestiae quam vero veniam cum in at doloremque
    quibusdam.
</p>
<!-- First Content -->

<!-- Second Content -->
<div class="grid grid-rows-3 grid-cols-2 grid-flow-col gap-2 mx-auto my-32 bg-slate-200">
    <div class="row-span-3 my-24">
        <h1 class="font-bold text-xl my-10 text-center">V.M.T.S Teknik Komputer dan Jaringan</h1>
        <!-- First Collapse -->
        <div class="collapse collapse-arrow bg-base-200 mb-5 ml-10">
            <input type="checkbox" />
            <div class="collapse-title text-xl font-medium">
                Visi Program Keahlian
            </div>
            <div class="collapse-content">
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Corporis accusantium magnam deserunt
                    explicabo dolores animi temporibus aut reprehenderit enim, odit perspiciatis quibusdam adipisci ea!
                    Doloremque amet deserunt obcaecati eius laborum!</p>
            </div>
        </div>
        <!-- First Collapse -->
        <!-- Second Collapse -->
        <div class="collapse collapse-arrow bg-base-200 mb-5 ml-10">
            <input type="checkbox" />
            <div class="collapse-title text-xl font-medium">
                Misi Program Keahlian
            </div>
            <div class="collapse-content">
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Non nobis modi consequuntur eaque harum
                    aut, exercitationem fugit nisi, beatae ratione rerum atque repellendus aperiam assumenda sapiente
                    consequatur. Explicabo, ullam fuga.</p>
            </div>
        </div>
        <!-- Second Collapse -->
        <!-- Third Collapse -->
        <div class="collapse collapse-arrow bg-base-200 mb-5 ml-10">
            <input type="checkbox" />
            <div class="collapse-title text-xl font-medium">
                Tujuan Program Keahlian
            </div>
            <div class="collapse-content">
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolore tenetur autem unde deserunt ab rem
                    quidem quasi facere veniam numquam velit dicta debitis, dignissimos culpa magnam qui eligendi, ipsa
                    doloremque!</p>
            </div>
        </div>
        <!-- Third Collapse -->
        <!-- Fourth Collapse -->
        <div class="collapse collapse-arrow bg-base-200 ml-10">
            <input type="checkbox" />
            <div class="collapse-title text-xl font-medium">
                Sasaran Strategis Program Keahlian
            </div>
            <div class="collapse-content">
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sunt voluptatibus molestias quam beatae,
                    repudiandae accusamus velit suscipit alias aspernatur! Error aliquam expedita id quaerat quia ipsa
                    labore omnis officia nam.</p>
            </div>
        </div>
        <!-- Fourth Collapse -->
    </div>
    <div class="row-span-3 flex items-center justify-center my-24">
        <img src="{{ asset('image/Humans.png') }}" alt="" class="mx-auto">
    </div>
</div>
<!-- Second Content -->

<!-- Third Content -->
<h1 class="font-bold text-2xl text-center">CAPAIAN PEMBELAJARAN</h1>

<div class="grid grid-cols-3 w-48 mx-auto -mt-3">
    <div class="divider"></div>
    <div class="divider divider-neutral"></div>
    <div class="divider"></div>
</div>

<p class="text-center">
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo aspernatur veritatis possimus nesciunt,
    totam debitis pariatur recusandae, adipisci, facilis quo sit molestiae quam vero veniam cum in at doloremque
    quibusdam.
</p>

<div class="grid grid-cols-2">
    <div class="col-span-2 w-[50rem] mx-auto my-7">
        <!-- First Collapse -->
        <div class="collapse collapse-arrow bg-base-200 mb-5">
            <input type="checkbox" checked />
            <div class="collapse-title text-xl font-medium flex">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    class="stroke-info shrink-0 w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <h1 class="mx-5 text-base">ASPEK SIKAP</h1>
            </div>
            <div class="collapse-content">
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Corporis accusantium magnam deserunt
                    explicabo dolores animi temporibus aut reprehenderit enim, odit perspiciatis quibusdam adipisci ea!
                    Doloremque amet deserunt obcaecati eius laborum!</p>
            </div>
        </div>
        <!-- First Collapse -->
        <!-- Second Collapse -->
        <div class="collapse collapse-arrow bg-base-200 mb-5">
            <input type="checkbox" />
            <div class="collapse-title text-xl font-medium flex">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    class="stroke-info shrink-0 w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <h1 class="mx-5 text-base">ASPEK PENGETAHUAN</h1>
            </div>
            <div class="collapse-content">
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Non nobis modi consequuntur eaque harum
                    aut, exercitationem fugit nisi, beatae ratione rerum atque repellendus aperiam assumenda sapiente
                    consequatur. Explicabo, ullam fuga.</p>
            </div>
        </div>
        <!-- Second Collapse -->
        <!-- Third Collapse -->
        <div class="collapse collapse-arrow bg-base-200 mb-5">
            <input type="checkbox" />
            <div class="collapse-title text-xl font-medium flex">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    class="stroke-info shrink-0 w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <h1 class="mx-5 text-base">ASPEK KETERAMPILAN UMUM</h1>
            </div>
            <div class="collapse-content">
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolore tenetur autem unde deserunt ab rem
                    quidem quasi facere veniam numquam velit dicta debitis, dignissimos culpa magnam qui eligendi, ipsa
                    doloremque!</p>
            </div>
        </div>
        <!-- Third Collapse -->
        <!-- Fourth Collapse -->
        <div class="collapse collapse-arrow bg-base-200">
            <input type="checkbox" />
            <div class="collapse-title text-xl font-medium flex">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    class="stroke-info shrink-0 w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <h1 class="mx-5 text-base">ASPEK KETERAMPILAN KHUSUS</h1>
            </div>
            <div class="collapse-content">
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sunt voluptatibus molestias quam beatae,
                    repudiandae accusamus velit suscipit alias aspernatur! Error aliquam expedita id quaerat quia ipsa
                    labore omnis officia nam.</p>
            </div>
        </div>
        <!-- Fourth Collapse -->
    </div>
</div>
<!-- Third Content -->

<!-- Fourth Content -->
<h1 class="font-bold text-2xl text-center mt-32">PELUANG KERJA</h1>

<div class="grid grid-cols-3 w-48 mx-auto -mt-3">
    <div class="divider"></div>
    <div class="divider divider-neutral"></div>
    <div class="divider"></div>
</div>

<p class="text-center">
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo aspernatur veritatis possimus nesciunt,
    totam debitis pariatur recusandae, adipisci, facilis quo sit molestiae quam vero veniam cum in at doloremque
    quibusdam.
</p>

<div class="grid grid-cols-3 gap-2 my-10 bg-slate-200">
    <!-- First Content -->
    <div class="my-10 mx-auto">
        <div class="card w-96 h-96 bg-base-100 shadow-xl rounded-none">
            <div class="card-body">
                <h2 class="card-title font-bold my-5">Teknisi Jaringan Komputer</h2>
                <p class="overflow-y-auto h-20">Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse numquam
                    sequi nisi quae sint, ipsam
                    minima vel natus reiciendis, doloremque facere eos, amet laboriosam nesciunt reprehenderit sit
                    explicabo eligendi. Harum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel quaerat
                    debitis, sunt, voluptatibus consectetur minus ex atque quod saepe soluta non, natus porro sapiente!
                    Sed impedit fugiat ex accusantium eligendi.
                    Ipsa deleniti libero perspiciatis nihil vel et, animi itaque beatae, voluptatibus veniam ea dolore
                    recusandae perferendis cum ut sequi eaque harum. Nam commodi mollitia facilis molestiae culpa eius
                    aperiam aut.
                    Fugit, dolor quisquam repellat quas molestias harum vitae minus magni cumque inventore! Accusantium
                    dolorem suscipit eos adipisci deserunt dicta porro consequatur? Beatae minus exercitationem facilis
                    earum error saepe dolor aut.
                    Soluta ducimus sapiente adipisci optio harum fuga, quasi at iste aspernatur odit molestiae officiis
                    explicabo. Tempore veritatis minus nisi dolor, ex vitae voluptatem ipsam, quisquam culpa deleniti
                    voluptatum, ratione aspernatur.
                    Ad ut eum dolorum enim tenetur dolorem labore harum illum quis laudantium, quibusdam nesciunt
                    voluptates magnam eaque accusamus architecto perspiciatis temporibus facere suscipit maxime quos
                    repudiandae recusandae tempora laboriosam. Odit.
                    Consequatur rerum alias eos, dignissimos soluta cupiditate officia. Veniam, ab ex consequatur
                    nesciunt animi quod saepe quasi provident, tenetur nam similique modi illo porro ipsa voluptate
                    minima! Ad, inventore tenetur.
                    Repellat ipsum quis, autem impedit perferendis beatae quae accusantium assumenda quo! Minus magni
                    veniam iusto id, praesentium explicabo deleniti saepe earum animi. Unde excepturi quae atque
                    sapiente voluptatem totam eos?
                    Non, blanditiis excepturi. Nam at provident minus nobis suscipit sit ipsam aut, voluptatum eveniet
                    quia praesentium corrupti maxime quos ab doloremque commodi! Rem totam fuga omnis illo labore
                    numquam ratione!
                    Fuga reiciendis dignissimos maxime doloribus voluptatem asperiores aliquam voluptatum explicabo
                    omnis qui, excepturi consequatur deserunt. Incidunt alias velit porro a. Labore ullam saepe
                    doloremque non eligendi natus culpa explicabo velit.
                    Voluptas aliquam animi esse et autem odio, culpa suscipit rem. Aliquam, impedit totam! Ab incidunt
                    perferendis, temporibus, distinctio et iusto ducimus saepe reprehenderit, autem sequi nesciunt
                    dolores illum minus facilis.</p>
            </div>
        </div>
    </div>
    <!-- First Content -->

    <!-- Second Content -->
    <div class="my-10 mx-auto">
        <div class="card w-96 h-96 bg-base-100 shadow-xl rounded-none">
            <div class="card-body">
                <h2 class="card-title font-bold my-5">Administrator Sistem</h2>
                <p class="overflow-y-auto h-20">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis, ut
                    eligendi est saepe quos vitae
                    consectetur amet debitis dolor temporibus accusamus iste nihil porro natus culpa quod cupiditate
                    nostrum voluptatibus.</p>
            </div>
        </div>
    </div>
    <!-- Second Content -->

    <!-- Third Content -->
    <div class="my-10 mx-auto">
        <div class="card w-96 h-96 bg-base-100 shadow-xl rounded-none">
            <div class="card-body">
                <h2 class="card-title font-bold my-5">Konsultan TI</h2>
                <p class="overflow-y-auto h-20">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid
                    accusamus, aperiam est deserunt cum
                    possimus sunt numquam harum eum neque, aut laborum consequatur corrupti, odio dolorum? Corrupti
                    provident quasi similique?</p>
            </div>
        </div>
    </div>
    <!-- Third Content -->
</div>

<!-- Fourth Content -->

@endsection