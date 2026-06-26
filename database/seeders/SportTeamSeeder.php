<?php

namespace Database\Seeders;

use App\Models\SportTeam;
use Illuminate\Database\Seeder;

class SportTeamSeeder extends Seeder
{
    public function run(): void
    {
        $sportTeams = [
            ['name' => 'FC Bayern Munich', 'sport' => 'Football', 'league' => 'Bundesliga', 'city' => 'Munich', 'founded_year' => 1900],
            ['name' => 'Borussia Dortmund', 'sport' => 'Football', 'league' => 'Bundesliga', 'city' => 'Dortmund', 'founded_year' => 1909],
            ['name' => 'Los Angeles Lakers', 'sport' => 'Basketball', 'league' => 'NBA', 'city' => 'Los Angeles', 'founded_year' => 1947],
            ['name' => 'Golden State Warriors', 'sport' => 'Basketball', 'league' => 'NBA', 'city' => 'San Francisco', 'founded_year' => 1946],
            ['name' => 'New England Patriots', 'sport' => 'American Football', 'league' => 'NFL', 'city' => 'Foxborough', 'founded_year' => 1959],
            ['name' => 'Boston Red Sox', 'sport' => 'Baseball', 'league' => 'MLB', 'city' => 'Boston', 'founded_year' => 1901],
        ];

        foreach ($sportTeams as $sportTeam) {
            SportTeam::create($sportTeam);
        }
    }
}
