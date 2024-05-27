<?php

namespace Database\Factories;

use App\Models\Video;
use App\Models\Album;
use Illuminate\Database\Eloquent\Factories\Factory;

class VideoFactory extends Factory
{
    protected $model = Video::class;

    public function definition()
    {
        // Ambil ID album yang ada dari tabel 'album'
        $albumIds = Album::pluck('id_album')->toArray();

        return [
            'id_album' => $this->faker->randomElement($albumIds),
            'tautan_video' => 'https://www.youtube.com/watch?v=vPI-9-J2U08',
        ];
    }
}
