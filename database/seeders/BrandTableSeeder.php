<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = [
            'Samsung',
            'Soni',
            'LG',
            'Mercedes',
            'iPhone',
            'Asus',
            'Huawei',
            'Adidas',
            'Gucci',
            'Dior',
            'Versace',

        ];
        foreach ($brands as $brand) {
            Brand::create([
                'name'          =>  $brand,
                'slug'          =>  Str::slug($brand)
            ],);
        }
    }
}
