<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $productName = $faker->unique()->words($nb = 4, $asText = true);
        // $Categorys = Category::all()->pluck('id')->toArray();

        for ($i = 0; $i < 10; $i++) {
            Product::create([
                'sku' => 'DIGI' . $faker->unique()->numberBetween(100, 500),
                'name' => $productName,
                'slug' => Str::slug($faker->unique()->words($nb = 2, $asText = true)),
                'description' => $faker->text(500),
                'quantity' => $faker->numberBetween(100, 200),
                'quantity_alert' => $faker->numberBetween(100, 200),
                'status_stock' => 'instock',
                'normal_price' => mt_rand(1000, 10000),
                'sale_price' => mt_rand(999, 5000) - 182,
                'status' => $faker->randomElement(array(true, false)),
                'featured' => $faker->randomElement(array(true, false)),
                'categorie_id' => Category::all()->random()->id,
            ]);
        }
    }
}
