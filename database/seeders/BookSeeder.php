<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $books = [
            [
                'title' => '1984',
                'author' => 'George Orwell',
                'description' => 'Ein dystopischer Roman über Überwachung und Unterdrückung.'
            ],
            [
                'title' => 'Brave New World',
                'author' => 'Aldous Huxley',
                'description' => 'Eine Zukunftsgesellschaft voller Kontrolle, Drogen und künstlicher Zufriedenheit.'
            ],
            [
                'title' => 'Fahrenheit 451',
                'author' => 'Ray Bradbury',
                'description' => 'In einer Welt, in der Bücher verboten sind, wird ein Feuerwehrmann zum Rebell.'
            ],
            [
                'title' => 'Der Steppenwolf',
                'author' => 'Hermann Hesse',
                'description' => 'Eine psychologische Reise durch das Innenleben eines zerrissenen Mannes.'
            ],
            [
                'title' => 'Die Verwandlung',
                'author' => 'Franz Kafka',
                'description' => 'Gregor Samsa wacht eines Morgens als Ungeziefer auf – eine klassische Parabel.'
            ],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}