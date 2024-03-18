@extends('layouts.main')
@section('Main')

<?php

$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

$total_pages = 3;

$previous_page = ($current_page > 1) ? ($current_page - 1) : 1;
$next_page = ($current_page < $total_pages) ? ($current_page + 1) : $total_pages;
?>

<div class="grid grid-cols-1 gap-y-10">

<div class="card lg:card-side bg-base-100 shadow-xl">
  <img src="https://daisyui.com/images/stock/photo-1494232410401-ad00d5433cfa.jpg" alt="Album" />
  <div class="card-body">
    <h2 class="card-title text-2xl font-bold my-5">JUARA 1 LOMBA CERDAS CERMAT</h2>
    <p>Tim TRPL SMK Negeri meraih juara 1 dalam Lomba Cerdas Cermat yang diadakan pada tanggal XX/XX/XXXX. Prestasi ini menunjukkan keunggulan siswa-siswi dalam bidang pengetahuan umum dan kemampuan berpikir cepat.</p>
    <div class="card-actions justify-end">
      <button class="btn bg-elm mx-auto md:mx-0 md:w-48 h-10 rounded-sm border-none text-white mt-8 hover:text-elm">READ MORE >></button>
    </div>
  </div>
</div>

<div class="card lg:card-side bg-base-100 shadow-xl">
  <img src="https://daisyui.com/images/stock/photo-1494232410401-ad00d5433cfa.jpg" alt="Album" />
  <div class="card-body">
    <h2 class="card-title text-2xl font-bold my-5">JUARA 1 LOMBA CERDAS CERMAT</h2>
    <p>Tim TRPL SMK Negeri meraih juara 1 dalam Lomba Cerdas Cermat yang diadakan pada tanggal XX/XX/XXXX. Prestasi ini menunjukkan keunggulan siswa-siswi dalam bidang pengetahuan umum dan kemampuan berpikir cepat.</p>
    <div class="card-actions justify-end">
      <button class="btn bg-elm mx-auto md:mx-0 md:w-48 h-10 rounded-sm border-none text-white mt-8 hover:text-elm">READ MORE >></button>
    </div>
  </div>
</div>

<div class="card lg:card-side bg-base-100 shadow-xl">
  <img src="https://daisyui.com/images/stock/photo-1494232410401-ad00d5433cfa.jpg" alt="Album" />
  <div class="card-body">
    <h2 class="card-title text-2xl font-bold my-5">JUARA 1 LOMBA CERDAS CERMAT</h2>
    <p>Tim TRPL SMK Negeri meraih juara 1 dalam Lomba Cerdas Cermat yang diadakan pada tanggal XX/XX/XXXX. Prestasi ini menunjukkan keunggulan siswa-siswi dalam bidang pengetahuan umum dan kemampuan berpikir cepat.</p>
    <div class="card-actions justify-end">
      <button class="btn bg-elm mx-auto md:mx-0 md:w-48 h-10 rounded-sm border-none text-white mt-8 hover:text-elm">READ MORE >></button>
    </div>
  </div>
</div>

</div>

<div class="join flex justify-center my-16">
  <a href="?page=<?php echo $previous_page; ?>" class="join-item btn" <?php if ($current_page == 1) echo "disabled"; ?>>«</a>
  <button class="join-item btn"><?php echo "Page $current_page"; ?></button>
  <a href="?page=<?php echo $next_page; ?>" class="join-item btn" <?php if ($current_page == $total_pages) echo "disabled"; ?>>»</a>
</div>


@endsection