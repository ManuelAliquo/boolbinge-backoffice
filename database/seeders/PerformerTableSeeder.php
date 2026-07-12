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
                'picture' => 'imgs/og-performers-imgs/leonardo-dicaprio.webp'
            ],
            [
                'name' => 'Tom Hardy',
                'picture' => 'imgs/og-performers-imgs/tom-hardy.jpg'
            ],
            [
                'name' => 'Elijah Wood',
                'picture' => 'imgs/og-performers-imgs/elijah-wood.jpg'
            ],
            [
                'name' => 'Viggo Mortensen',
                'picture' => 'imgs/og-performers-imgs/viggo-mortensen.jpg'
            ],
            [
                'name' => 'Ian McKellen',
                'picture' => 'imgs/og-performers-imgs/ian-mckellen.jpg'
            ],
            [
                'name' => 'Matthew McConaughey',
                'picture' => 'imgs/og-performers-imgs/matthew-mcconaughey.webp'
            ],
            [
                'name' => 'Anne Hathaway',
                'picture' => 'imgs/og-performers-imgs/anne-athaway.webp'
            ],
            [
                'name' => 'Uma Thurman',
                'picture' => 'imgs/og-performers-imgs/uma-thurman.jpg'
            ],
            [
                'name' => 'Lucy Liu',
                'picture' => 'imgs/og-performers-imgs/lucy-liu.webp'
            ],
            [
                'name' => 'Kit Harington',
                'picture' => 'imgs/og-performers-imgs/kit-harington.jpg'
            ],
            [
                'name' => 'Emilia Clarke',
                'picture' => 'imgs/og-performers-imgs/emilia-clarke.jpg'
            ],
            [
                'name' => 'Peter Dinklage',
                'picture' => 'imgs/og-performers-imgs/peter-dinklage.webp'
            ],
            [
                'name' => 'Bryan Cranston',
                'picture' => 'imgs/og-performers-imgs/bryan-cranston.webp'
            ],
            [
                'name' => 'Aaron Paul',
                'picture' => 'imgs/og-performers-imgs/aaron-paul.webp'
            ],
            [
                'name' => 'Millie Bobby Brown',
                'picture' => 'imgs/og-performers-imgs/millie-bobby-brown.webp'
            ],
            [
                'name' => 'David Harbour',
                'picture' => 'imgs/og-performers-imgs/david-harbour.webp'
            ],
            [
                'name' => 'Steven Yeun',
                'picture' => 'imgs/og-performers-imgs/steven-yeun.jpg'
            ],
            [
                'name' => 'J.K. Simmons',
                'picture' => 'imgs/og-performers-imgs/jk-simmons.jpg'
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
