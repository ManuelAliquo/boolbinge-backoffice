<?php

namespace Database\Seeders;

use App\Models\Content;
use App\Models\Genre;
use Illuminate\Database\Seeder;

class ContentTableSeeder extends Seeder
{
    public function run(): void
    {
        // All Contents
        $contents = [
            // MOVIES
            [
                'title' => 'The Revenant',
                'slug' => 'the-revenant',
                'description' => 'A frontiersman on a fur trading expedition in the 1820s fights for survival after being mauled by a bear and left for dead by members of his own hunting team.',
                'type' => 'movie',
                'release_year' => 2015,
                'genres' => ['Action', 'Adventure', 'Drama']
            ],
            [
                'title' => 'The Lord of the Rings: The Return of the King',
                'slug' => 'the-lord-of-the-rings-the-return-of-the-king',
                'description' => "Gandalf and Aragorn lead the World of Men against Sauron's army to draw his gaze from Frodo and Sam as they approach Mount Doom with the One Ring.",
                'type' => 'movie',
                'release_year' => 2003,
                'genres' => ['Action', 'Adventure', 'Drama', 'Fantasy']
            ],
            [
                'title' => 'Interstellar',
                'slug' => 'interstellar',
                'description' => 'When Earth becomes uninhabitable, a team of explorers travels through a wormhole in space in an attempt to ensure humanity\'s survival.',
                'type' => 'movie',
                'release_year' => 2014,
                'genres' => ['Adventure', 'Drama', 'Sci-Fi']
            ],
            [
                'title' => 'Kill Bill - Volume 1',
                'slug' => 'kill-bill-volume-1',
                'description' => 'After awakening from a four-year coma, a former assassin wreaks vengeance on the team of assassins who betrayed her.',
                'type' => 'movie',
                'release_year' => 2003,
                'genres' => ['Action', 'Crime', 'Thriller']
            ],

            // SHOWS
            [
                'title' => 'Game of Thrones',
                'slug' => 'game-of-thrones',
                'description' => 'Nine noble families fight for control over the lands of Westeros, while an ancient enemy returns after being dormant for millennia.',
                'type' => 'show',
                'release_year' => 2011,
                'genres' => ['Action', 'Adventure', 'Drama', 'Fantasy']
            ],
            [
                'title' => 'Breaking Bad',
                'slug' => 'breaking-bad',
                'description' => 'A chemistry teacher diagnosed with inoperable lung cancer turns to manufacturing and selling methamphetamine with a former student in order to secure his family\'s future.',
                'type' => 'show',
                'release_year' => 2008,
                'genres' => ['Crime', 'Drama', 'Thriller']
            ],
            [
                'title' => 'Stranger Things',
                'slug' => 'stranger-things',
                'description' => 'When a young boy vanishes, a small town uncovers a mystery involving secret experiments, terrifying supernatural forces and one strange little girl.',
                'type' => 'show',
                'release_year' => 2016,
                'genres' => ['Drama', 'Fantasy', 'Horror', 'Sci-Fi']
            ],
            [
                'title' => 'Invincible',
                'slug' => 'invincible',
                'description' => 'An adult animated superhero series that revolves around 17-year-old Mark Grayson, who is just like every other guy his age except his father is the most powerful superhero on the planet.',
                'type' => 'show',
                'release_year' => 2021,
                'genres' => ['Animation', 'Action', 'Adventure', 'Fantasy']
            ],

            // ANIME
            [
                'title' => 'Jujutsu Kaisen',
                'slug' => 'jujutsu-kaisen',
                'description' => 'A boy swallows a cursed talisman - the finger of a demon - and becomes cursed himself. He enters a shaman\'s school to be able to locate the demon\'s other body parts and thus exorcise himself.',
                'type' => 'anime',
                'release_year' => 2020,
                'genres' => ['Animation', 'Action', 'Fantasy']
            ],
            [
                'title' => 'Attack on Titan',
                'slug' => 'attack-on-titan',
                'description' => 'After his hometown is destroyed and his mother is killed, young Eren Jaeger vows to cleanse the earth of the giant humanoid Titans that have brought humanity to the brink of extinction.',
                'type' => 'anime',
                'release_year' => 2013,
                'genres' => ['Animation', 'Action', 'Adventure', 'Fantasy']
            ],
            [
                'title' => 'Demon Slayer',
                'slug' => 'demon-slayer',
                'description' => 'A family is attacked by demons and only two members survive - Tanjiro and his sister Nezuko, who is turning into a demon slowly. Tanjiro sets out to become a demon slayer to avenge his family and cure his sister.',
                'type' => 'anime',
                'release_year' => 2019,
                'genres' => ['Animation', 'Action', 'Fantasy']
            ],
            [
                'title' => 'Death Note',
                'slug' => 'death-note',
                'description' => 'An intelligent high school student goes on a secret crusade to eliminate criminals from the world after discovering a notebook capable of killing anyone whose name is written in it.',
                'type' => 'anime',
                'release_year' => 2006,
                'genres' => ['Animation', 'Crime', 'Drama', 'Thriller']
            ],
        ];

        // contents creations
        foreach ($contents as $content) {
            $newContent = Content::create([
                'title' => $content['title'],
                'slug' => $content['slug'],
                'description' => $content['description'],
                'type' => $content['type'],
                'release_year' => $content['release_year'],
            ]);

            // genres association
            $genres = Genre::whereIn('name', $content['genres'])->get();
            $newContent->genres()->attach($genres);
        }
    }
}
