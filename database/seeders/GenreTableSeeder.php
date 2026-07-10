<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class GenreTableSeeder extends Seeder
{
    public function run(): void
    {
        $genres = [
            'Action',
            'Adventure',
            'Sci-Fi',
            'Drama',
            'Fantasy',
            'Crime',
            'Animation',
            'Thriller',
            'Horror',
            'Historical',
            'Western',
            'Comedy'
        ];

        foreach ($genres as $genreName) {
            Genre::create([
                'name' => $genreName,
                'slug' => Str::slug($genreName),
            ]);
        }
    }
}
