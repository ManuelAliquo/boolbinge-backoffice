<?php

namespace Database\Seeders;

use App\Models\Performer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

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
            ],
            [
                'name' => 'Cillian Murphy',
                'picture' => 'imgs/performers-pictures/Cillian Murphy.webp'
            ],
            [
                'name' => 'Robert Downey Jr.',
                'picture' => 'imgs/performers-pictures/Robert Downey Jr..webp'
            ],
            [
                'name' => 'Travis Fimmel',
                'picture' => 'imgs/performers-pictures/Travis Fimmel.webp'
            ],
            [
                'name' => 'Katheryn Winnick',
                'picture' => 'imgs/performers-pictures/Katheryn Winnick.webp'
            ],
            [
                'name' => 'Sigourney Weaver',
                'picture' => 'imgs/performers-pictures/Sigourney Weaver.webp'
            ],
            [
                'name' => 'Tom Skerritt',
                'picture' => 'imgs/performers-pictures/Tom Skerritt.webp'
            ],
            [
                'name' => 'Jamie Foxx',
                'picture' => 'imgs/performers-pictures/Jamie Foxx.webp'
            ],
            [
                'name' => 'Christoph Waltz',
                'picture' => 'imgs/performers-pictures/Christoph Waltz.webp'
            ],
        ];

        foreach ($performers as $performer) {
            // storage copies
            if ($performer['picture'] && File::exists(public_path($performer['picture'])))
                Storage::disk('public')->put($performer['picture'], File::get(public_path($performer['picture'])));


            Performer::create([
                'name' => $performer['name'],
                'slug' => Str::slug($performer['name']),
                'picture' => $performer['picture'],
            ]);
        }
    }
}
