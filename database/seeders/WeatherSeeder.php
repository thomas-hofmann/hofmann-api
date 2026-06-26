<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Weather;

class WeatherSeeder extends Seeder
{
    public function run(): void
    {
        $weatherRecords = [
            ['city' => 'Berlin', 'temperature' => 22.5, 'humidity' => 60, 'condition' => 'sonnig'],
            ['city' => 'Hamburg', 'temperature' => 18.2, 'humidity' => 72, 'condition' => 'bewölkt'],
            ['city' => 'München', 'temperature' => 20.8, 'humidity' => 58, 'condition' => 'leicht bewölkt'],
            ['city' => 'Köln', 'temperature' => 21.3, 'humidity' => 64, 'condition' => 'regnerisch'],
            ['city' => 'Frankfurt', 'temperature' => 23.1, 'humidity' => 55, 'condition' => 'sonnig'],
            ['city' => 'Stuttgart', 'temperature' => 19.7, 'humidity' => 68, 'condition' => 'windig'],
        ];

        foreach ($weatherRecords as $weather) {
            Weather::create($weather);
        }
    }
}
