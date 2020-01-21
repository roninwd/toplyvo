<?php

use App\Entities\Characteristic;
use App\Entities\Product;
use Illuminate\Database\Seeder;

class ProductParametersSeeder extends Seeder
{
    private array $colors = ['Red', 'Blue', 'Green', 'Black', 'Yellow', 'Brown'];
    private array $collections = ['Armani', 'D&G', 'Levis'];

    public function run(): void
    {
        $color = Characteristic::whereName('Color')->first();
        $collection = Characteristic::whereName('Collection')->first();
        $weight = Characteristic::whereName('Weight')->first();
        $length = Characteristic::whereName('Length')->first();

        Product::all()->each(function (Product $product) use ($color, $collection, $weight, $length) {
            $product->parameters()->insert([
                [
                    'product_id' => $product->id,
                    'characteristic_id' => $color->id,
                    'value' => Arr::random($this->colors)
                ],
                [
                    'product_id' => $product->id,
                    'characteristic_id' => $collection->id,
                    'value' => Arr::random($this->collections)
                ],
                [
                    'product_id' => $product->id,
                    'characteristic_id' => $weight->id,
                    'value' => random_int(10, 100) / 10
                ],
                [
                    'product_id' => $product->id,
                    'characteristic_id' => $length->id,
                    'value' => random_int(24, 65)
                ]
            ]);
        });
    }
}
