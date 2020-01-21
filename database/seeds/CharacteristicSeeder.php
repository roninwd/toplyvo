<?php

use App\Entities\Characteristic;
use Illuminate\Database\Seeder;

class CharacteristicSeeder extends Seeder
{
    private array $characteristics = [
        ['name' => 'Color'],
        ['name' => 'Collection'],
        ['name' => 'Weight'],
        ['name' => 'Length'],
    ];

    public function run()
    {
        Characteristic::insert($this->characteristics);
    }
}
