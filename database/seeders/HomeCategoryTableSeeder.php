<?php

namespace Database\Seeders;

use App\Models\HomeCategory;
use Illuminate\Database\Seeder;

class HomeCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cats=implode(',', array(1, 2, 3));
       
        HomeCategory::create([
            'sel_categories'          =>  $cats,
            'no_of_products'   =>  8,
        ]);
    }
}
