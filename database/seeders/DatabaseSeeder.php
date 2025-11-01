<?php

namespace Database\Seeders;

use App\Models\User;
use App\Modules\Product\Models\Brand;
use App\Modules\Product\Models\Category;
use App\Modules\Product\Models\Color;
use App\Modules\Product\Models\Size;
use App\Modules\Product\Models\Storage;
use App\Modules\Product\Models\Unit;
use App\Modules\Product\Models\Warranty;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // for ($i = 1; $i <= 10; $i++) {
        //     $brand = Brand::create([
        //         'name' => 'Brand ' . $i,
        //         'short_description' => 'This is a short description for Brand ' . $i,
        //     ]);

        //     $brand->slug()->create([
        //         'slug' => 'brand-' . $i,
        //     ]);
        // }

        // for ($i = 1; $i <= 10; $i++) {
        //     $category = Category::create([
        //         'name' => 'Category ' . $i,
        //         'short_description' => 'This is a short description for Category ' . $i,
        //     ]);

        //     $category->slug()->create([
        //         'slug' => 'category-' . $i,
        //     ]);
        // }

        // Warranty::create([
        //     'name' => '7 Days Brand Warranty',
        //     'type' => 1,
        //     'count' => 7,
        // ]);


        // Unit::create([
        //     'name' => 'Pieces',
        //     'short_name' => 'pcs',
        // ]);
        

        // Size::insert([
        //     ['name' => 'XXL'],
        //     ['name' => 'XL'],
        //     ['name' => 'L'],
        //     ['name' => 'M'],
        //     ['name' => 'S'],
        //     ['name' => 'XS'],
        // ]);

        // Color::insert([
        //     ['name' => 'Red'],
        //     ['name' => 'Green'],
        //     ['name' => 'Blue'],
        //     ['name' => 'Cyan'],
        //     ['name' => 'Magenta'],
        //     ['name' => 'Yellow'],
        //     ['name' => 'KeyBlack'],
        // ]);

        // Storage::insert([
        //     ['name' => '4GB/64GB'],
        //     ['name' => '6GB/128GB'],
        //     ['name' => '8GB/128GB'],
        //     ['name' => '12GB/256GB'],
        //     ['name' => '16GB/512GB'],
        // ]);
        
}

}
