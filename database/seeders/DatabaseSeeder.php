<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            // SettingSeeder::class,
            AttributeSeeder::class,
            // AttributeValueSeeder::class,
            // CategoriesTableSeeder::class,
            // PermissionTableSeeder::class,
            SaleTableSeeder::class,
            RoleTableSeeder::class,
            UserTableSeeder::class,
            CategoryTableSeeder::class,
            BrandTableSeeder::class,
            HomeCategoryTableSeeder::class,
            ProductSeeder::class,
        ]);
        // Product::factory(10)->create();

        // ProductImage::factory(22)->create();
    }
}
