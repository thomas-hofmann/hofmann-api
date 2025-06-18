<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Weather;

class WeatherSeeder extends Seeder
{
    public function run(): void
    {
        Weather::create([
            'city' => 'Berlin',
            'temperature' => 22.5,
            'humidity' => 60,
            'condition' => 'sunny',
        ]);

        Weather::create([
            'city' => 'Hamburg',
            'temperature' => 18.2,
            'humidity' => 72,
            'condition' => 'cloudy',
        ]);
    }
}