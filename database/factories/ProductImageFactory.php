<?php

namespace Database\Factories;

use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductImage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'thumbnail' => 'digital_' . $this->faker->unique()->numberBetween(1, 22) . '.jpg',
            'product_id' => mt_rand(1, 22)
        ];
    }
}
