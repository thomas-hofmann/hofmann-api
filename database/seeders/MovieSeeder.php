<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    public function run(): void
    {
        $movies = [
            ['title' => 'Inception', 'director' => 'Christopher Nolan', 'genre' => 'Sci-Fi', 'year' => 2010, 'rating' => 8.8],
            ['title' => 'The Matrix', 'director' => 'Lana Wachowski, Lilly Wachowski', 'genre' => 'Sci-Fi', 'year' => 1999, 'rating' => 8.7],
            ['title' => 'Interstellar', 'director' => 'Christopher Nolan', 'genre' => 'Sci-Fi', 'year' => 2014, 'rating' => 8.7],
            ['title' => 'Parasite', 'director' => 'Bong Joon-ho', 'genre' => 'Thriller', 'year' => 2019, 'rating' => 8.5],
            ['title' => 'The Dark Knight', 'director' => 'Christopher Nolan', 'genre' => 'Action', 'year' => 2008, 'rating' => 9.0],
            ['title' => 'Spirited Away', 'director' => 'Hayao Miyazaki', 'genre' => 'Animation', 'year' => 2001, 'rating' => 8.6],
        ];

        foreach ($movies as $movie) {
            Movie::create($movie);
        }
    }
}
