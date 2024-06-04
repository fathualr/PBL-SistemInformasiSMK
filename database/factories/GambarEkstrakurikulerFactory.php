<?php

namespace Database\Factories;

use App\Models\GambarEkstrakurikuler;
use Illuminate\Database\Eloquent\Factories\Factory;

class GambarEkstrakurikulerFactory extends Factory
{
    protected $model = GambarEkstrakurikuler::class;

    public function definition()
    
    {

        $images = [
            'image/Ekstrakurikuler/dxznqiBxPcVTuFu4hn72LGqHhqZvDge7OcyyUUSP.png',
            'image/Ekstrakurikuler/tPrE7oVLPezQazwC63a9n55aQzsAvRmr6vryy6H3.jpg',
            'image/Ekstrakurikuler/asIp0XqSnufIWP7RbKSXUlUDWiSlIOeeFClBoEcj.jpg',
            'image/Ekstrakurikuler/zsPwscvd3xHB5qTaxFf9QeneuC2KwJubl8lIHEKA.jpg',
            'image/Ekstrakurikuler/r7SKu6iEBspJn9PudBR9LKjwmBPUFrR5rUcnzklT.jpg',
            'image/Ekstrakurikuler/5PT1bNCKaeppv6aElEYFDMgNKpt9eB0WhiiSJwTf.jpg',
            'image/Ekstrakurikuler/FMuA0pRVnXBxG34UWTHcSGCAqmFkzDZNPtYlHDTK.jpg',
            'image/Ekstrakurikuler/FMuA0pRVnXBxG34UWTHcSGCAqmFkzDZNPtYlHDTK.jpg'
        ];

        return [
            'id_ekstrakurikuler' => $this->faker->numberBetween(1, 5),
            'gambar_ekstrakurikuler' => $this->faker->randomElement($images),
        ];
    }
}
