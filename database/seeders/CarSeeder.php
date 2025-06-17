<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Car;

class CarSeeder extends Seeder
{
    public function run(): void
    {
        $cars = [
            ['brand' => 'BMW', 'model' => '320i', 'year' => 2020, 'color' => 'Schwarz'],
            ['brand' => 'Audi', 'model' => 'A4', 'year' => 2019, 'color' => 'Weiß'],
            ['brand' => 'Mercedes', 'model' => 'C200', 'year' => 2021, 'color' => 'Silber'],
            ['brand' => 'Volkswagen', 'model' => 'Golf', 'year' => 2018, 'color' => 'Blau'],
            ['brand' => 'Toyota', 'model' => 'Corolla', 'year' => 2022, 'color' => 'Rot'],
            ['brand' => 'Ford', 'model' => 'Focus', 'year' => 2017, 'color' => 'Grau'],
        ];

        foreach ($cars as $car) {
            Car::create($car);
        }
    }
}