<?php

namespace Database\Factories;

use App\Models\Carousels;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarouselsFactory extends Factory
{
    protected $model = Carousels::class;

    public function definition()
    {
        $images = [
            'image/gambarCarousel/Y0SNE9yNzUjwcxM7BOC32WhsWGehtKZEXi0X6yZE.jpg',
            'image/gambarCarousel/5wInYTSoKs59G9tR5FyxODIy0N5p2xcZ6gVrBpsY.jpg',
            'image/gambarCarousel/vYPQ7PmFQtRnoFqUfAuqQbwFqYWIqOlFY44q7xuh.jpg',
            'image/gambarCarousel/OLnn9EPbD9xaxs1gGAHlGetCRDhG9Qzf32SaOVzo.jpg'
        ];

        return [
            'image' => $this->faker->randomElement($images),
        ];
    }
}
