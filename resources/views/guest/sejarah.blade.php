@extends('layouts.main')

@section('Main')
<ul class="timeline timeline-snap-icon max-md:timeline-compact timeline-vertical">
    @foreach ($sejarahSekolah as $index => $sejarah)
    <li>
        <div class="timeline-middle flex justify-center items-center -mt-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
                <path fill-rule="evenodd"
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                    clip-rule="evenodd" />
            </svg>
        </div>
        <div class="{{ $index % 2 == 0 ? 'timeline-start md:text-end mb-10' : 'timeline-end my-10 mx-auto' }}">
            <time class="font-mono italic">{{ $sejarah->tanggal_sejarah }}</time>
            <div class="text-lg font-black">{{ $sejarah->judul_sejarah }}</div>
            <p>
                {!! $sejarah->deskripsi_sejarah !!}
            </p>
        </div>
        <div class="{{ $index % 2 == 0 ? 'timeline-end my-10 mx-auto' : 'timeline-start md:text-end mb-10' }}">
            <img src="{{ asset('storage/'.$sejarah->gambar_sejarah) }}" alt="" class="w-[36rem] h-80">
        </div>
        <hr />
    </li>
    @endforeach
</ul>
@endsection