<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
         $this->call(CharacteristicSeeder::class);
         $this->call(CategorySeeder::class);
         $this->call(ProductParametersSeeder::class);
         $this->call(OrderSeeder::class);
    }
}
