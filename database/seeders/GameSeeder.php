<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    public function run(): void
    {
        $games = [
            ['title' => 'The Legend of Zelda: Breath of the Wild', 'platform' => 'Nintendo Switch', 'genre' => 'Abenteuer', 'release_year' => 2017, 'rating' => 9.7],
            ['title' => 'Minecraft', 'platform' => 'PC', 'genre' => 'Sandbox', 'release_year' => 2011, 'rating' => 9.0],
            ['title' => 'EA Sports FC 25', 'platform' => 'PlayStation 5', 'genre' => 'Sport', 'release_year' => 2024, 'rating' => 7.6],
            ['title' => 'Fortnite', 'platform' => 'Plattformübergreifend', 'genre' => 'Battle Royale', 'release_year' => 2017, 'rating' => 8.0],
            ['title' => 'Stardew Valley', 'platform' => 'PC', 'genre' => 'Simulation', 'release_year' => 2016, 'rating' => 8.9],
            ['title' => 'Mario Kart 8 Deluxe', 'platform' => 'Nintendo Switch', 'genre' => 'Rennspiel', 'release_year' => 2017, 'rating' => 9.2],
        ];

        foreach ($games as $game) {
            Game::create($game);
        }
    }
}
