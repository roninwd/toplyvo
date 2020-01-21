<?php

use App\Entities\Category;
use App\Entities\Product;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        factory(Category::class, 8)->create()->each(function (Category $category) {
            $category->products()->saveMany(factory(Product::class, 4)->make());
        });
    }
}
