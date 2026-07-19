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
            [
                'name' => 'Action',
                'description' => 'High-energy physical feats, chases, and fights where heroes battle against overwhelming odds.'
            ],
            [
                'name' => 'Adventure',
                'description' => 'Thrilling journeys to exotic lands, quests for treasure, and daring escapades beyond the ordinary.'
            ],
            [
                'name' => 'Sci-Fi',
                'description' => 'Futuristic technology, space exploration, and speculative concepts that question humanity\'s place in the universe..'
            ],
            [
                'name' => 'Drama',
                'description' => 'Character-driven stories focused on emotional conflict, personal struggles, and realistic human experiences.'
            ],
            [
                'name' => 'Fantasy',
                'description' => 'Mythical creatures, magic, and epic battles set in enchanted realms beyond the laws of reality.'
            ],
            [
                'name' => 'Crime',
                'description' => 'Gritty tales of lawbreakers, detectives, and the dark underbelly of society pursuing justice or power.'
            ],
            [
                'name' => 'Animation',
                'description' => 'Visually crafted worlds where drawn or computer-generated characters bring limitless imagination to life.'
            ],
            [
                'name' => 'Thriller',
                'description' => 'Suspenseful, fast-paced plots filled with tension, danger, and twists that keep you on edge.'
            ],
            [
                'name' => 'Horror',
                'description' => 'Fear-inducing stories designed to terrify through supernatural forces, monsters, or psychological dread.'
            ],
            [
                'name' => 'Historical',
                'description' => 'Period pieces recreating significant past events, figures, and eras with dramatic or authentic detail.'
            ],
            [
                'name' => 'Western',
                'description' => 'Tales of rugged frontiers, lawless towns, and lone riders navigating the harsh American Old West.'
            ],
        ];

        foreach ($genres as $genre) {
            Genre::create([
                'name' => $genre['name'],
                'slug' => Str::slug($genre['name']),
                'description' => $genre['description'],
            ]);
        }
    }
}
