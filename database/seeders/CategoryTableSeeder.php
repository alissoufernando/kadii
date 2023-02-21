<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $faker = Faker::create();

        $categories = [
            'Canapés',
            'Rangements',
            'Tables',
            'Sièges',
            'Coffre-fort',
            'Accessoires',
            'Bureau',
            'Meuble Maison',

        ];
        foreach ($categories as $category) {
            Category::create([
            'name'          =>  $category,
            'menu'          =>  0,
            'slug'          =>  Str::slug($category)
            ]);
        }

    }
}
