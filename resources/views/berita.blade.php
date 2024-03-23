@extends('layouts.main')
@section('Main')

<div class="divider">
    <p class="font-bold text-xl">Berita</p>
</div>

<div class="grid grid-cols-2">
<p class="font-bold " style="font-size: larger;">BERITA</p>
</div>

<div class="grid grid-cols-3 gap-2 gap-y-20 my-10">
<div class="card w-80 bg-base-100">
  <figure><img src="https://daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg" alt="Shoes" /></figure>
  <div class="card-body">
    <h2 class="card-title">lele asiq asiq lele</h2>
    <p>Tentang juara ternak lele</p>
  </div>
</div>
<div class="card w-80 bg-base-100">
  <figure><img src="https://daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg" alt="Shoes" /></figure>
  <div class="card-body">
    <h2 class="card-title">Shoes!</h2>
    <p>If a dog chews shoes whose shoes does he choose?</p>
  </div>
</div><div class="card w-80 bg-base-100">
  <figure><img src="https://daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg" alt="Shoes" /></figure>
  <div class="card-body">
    <h2 class="card-title">Shoes!</h2>
    <p>If a dog chews shoes whose shoes does he choose?</p>
  </div>
</div>
</div>



<div class="grid lg:grid-rows-3 grid-cols-2 lg:grid-cols-4 lg:grid-flow-col lg:gap-4 mt-8">
    <div class=" lg:row-span-3 col-span-2 mx-auto lg:mx-0">
        <div class="aspect-w-16 aspect-h-9">
            <iframe class="w-full h-full lg:h-96" src="https://www.youtube.com/watch?v=zwD5Qpnhnx0"></iframe>
        </div>
    </div>
    <!-- Title -->
    <div class="col-span-2 overflow-x-auto">
        <div class="card w-full ">
            <div class="card-body">
                <h1 class="card-title text-lg">
                    Lorem ipsum
                </h1>
            </div>
        </div>
    </div>
    <div class="lg:row-span-2 col-span-2 -mt-10 lg:-mt-0">
        <div class="card w-full">
            <div class="card-body">
                <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Porro, error fugiat? Repellendus
                    consequuntur provident iure at. Aut nobis quasi amet. Iure dolorum placeat corporis eaque tenetur
                    distinctio id voluptatum maxime.
                </p>
                <div class="card-actions justify-start mt-7">
                    <button class="btn bg-elm w-48 h-10 rounded-sm border-none text-white mt-auto hover:text-elm">Lebih
                        Lanjut</button>
                </div>
            </div>
        </div>
    </div>
</div>
<br>

<br>
    <div class="grid grid-cols-3 gap-2 gap-y-20 my-30">
<div class="card w-80 bg-base-100">
  <figure><img src="https://daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg" alt="Shoes" /></figure>
  <div class="card-body">
    <h2 class="card-title">lele asiq asiq lele</h2>
    <p>Tentang juara ternak lele</p>
  </div>
</div>
<div class="card w-80 bg-base-100">
  <figure><img src="https://daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg" alt="Shoes" /></figure>
  <div class="card-body">
    <h2 class="card-title">Shoes!</h2>
    <p>If a dog chews shoes whose shoes does he choose?</p>
  </div>
</div><div class="card w-80 bg-base-100">
  <figure><img src="https://daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg" alt="Shoes" /></figure>
  <div class="card-body">
    <h2 class="card-title">Shoes!</h2>
    <p>If a dog chews shoes whose shoes does he choose?</p>
  </div>
</div>
</div>
<div class="card w-80 bg-base-100">
  <figure><img src="https://daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg" alt="Shoes" /></figure>
  <div class="card-body">
    <h2 class="card-title">lele asiq asiq lele</h2>
    <p>Tentang juara ternak lele</p>
  </div>
</div>


<div class="grid grid-cols-2">
<p class="font-bold " style="font-size: larger;">recent post</p>
  </div>

<div class="badge badge-outline">default</div>
<div class="badge badge-primary badge-outline">primary</div>
<div class="badge badge-secondary badge-outline">secondary</div>
<div class="badge badge-accent badge-outline">accent</div>
<p></p>
<div class="badge badge-outline">default</div>
<div class="badge badge-primary badge-outline">primary</div>
<div class="badge badge-secondary badge-outline">secondary</div>
<div class="badge badge-accent badge-outline">accent</div>
</div>

@endsection
