<?php

namespace Database\Seeders;

use App\Models\Performer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PerformerTableSeeder extends Seeder
{
    public function run(): void
    {
        $performers = [
            [
                'name' => 'Leonardo DiCaprio',
                'picture' => 'imgs/performers-pictures/Leonardo DiCaprio.webp'
            ],
            [
                'name' => 'Tom Hardy',
                'picture' => 'imgs/performers-pictures/Tom Hardy.webp'
            ],
            [
                'name' => 'Elijah Wood',
                'picture' => 'imgs/performers-pictures/Elijah Wood.webp'
            ],
            [
                'name' => 'Viggo Mortensen',
                'picture' => 'imgs/performers-pictures/Viggo Mortensen.webp'
            ],
            [
                'name' => 'Ian McKellen',
                'picture' => 'imgs/performers-pictures/Ian McKellen.webp'
            ],
            [
                'name' => 'Matthew McConaughey',
                'picture' => 'imgs/performers-pictures/Matthew McConaughey.webp'
            ],
            [
                'name' => 'Anne Hathaway',
                'picture' => 'imgs/performers-pictures/Anne Hathaway.webp'
            ],
            [
                'name' => 'Uma Thurman',
                'picture' => 'imgs/performers-pictures/Uma Thurman.webp'
            ],
            [
                'name' => 'Lucy Liu',
                'picture' => 'imgs/performers-pictures/Lucy Liu.webp'
            ],
            [
                'name' => 'Kit Harington',
                'picture' => 'imgs/performers-pictures/Kit Harington.webp'
            ],
            [
                'name' => 'Emilia Clarke',
                'picture' => 'imgs/performers-pictures/Emilia Clarke.webp'
            ],
            [
                'name' => 'Peter Dinklage',
                'picture' => 'imgs/performers-pictures/Peter Dinklage.webp'
            ],
            [
                'name' => 'Bryan Cranston',
                'picture' => 'imgs/performers-pictures/Bryan Cranston.webp'
            ],
            [
                'name' => 'Aaron Paul',
                'picture' => 'imgs/performers-pictures/Aaron Paul.webp'
            ],
            [
                'name' => 'Millie Bobby Brown',
                'picture' => 'imgs/performers-pictures/Millie Bobby Brown.webp'
            ],
            [
                'name' => 'David Harbour',
                'picture' => 'imgs/performers-pictures/David Harbour.webp'
            ],
            [
                'name' => 'Steven Yeun',
                'picture' => 'imgs/performers-pictures/Steven Yeun.webp'
            ],
            [
                'name' => 'J.K. Simmons',
                'picture' => 'imgs/performers-pictures/JK Simmons.webp'
            ]
        ];

        foreach ($performers as $performer) {
            Performer::create([
                'name' => $performer['name'],
                'slug' => Str::slug($performer['name']),
                'picture' => $performer['picture'],
            ]);
        }
    }
}
