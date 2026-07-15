<?php

namespace Database\Seeders;

use App\Models\Content;
use App\Models\Genre;
use App\Models\Performer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ContentTableSeeder extends Seeder
{
    public function run(): void
    {
        // All Contents
        $contents = [
            // MOVIES
            [
                'title' => 'The Revenant',
                'short_description' => 'A frontiersman on a fur trading expedition in the 1820s fights for survival after being mauled by a bear and left for dead by members of his own hunting team.',
                'long_description' => 'In the 1820s, legendary frontiersman Hugh Glass sustains life-threatening injuries from a brutal bear attack. When his mercenary hunting team kills his son and leaves him for dead, Glass must utilize his primal survival skills to navigate a treacherous winter landscape, seeking redemption and ultimate vengeance.',
                'trailer' => 'https://www.youtube.com/watch?v=LoebZZ8K5N0',
                'type' => 'movie',
                'poster' => 'imgs/content-posters/The Revenant.webp',
                'logo' => 'imgs/content-logos/The Revenant.webp',
                'background' => 'imgs/content-backgrounds/The Revenant.webp',
                'release_year' => 2015,
                'end_year' => null,
                'rating' => 8.0,
                'production' => 'Alejandro González Iñárritu',
                'length' => '2h 36min',
                'genres' => ['Adventure', 'Drama', 'Historical', 'Western'],
                'performers' => ['Leonardo DiCaprio', 'Tom Hardy'],
            ],
            [
                'title' => 'The Lord of the Rings: The Return of the King',
                'short_description' => "Gandalf and Aragorn lead the World of Men against Sauron's army to draw his gaze from Frodo and Sam as they approach Mount Doom with the One Ring.",
                'long_description' => 'The final confrontation between the forces of good and evil commanding the fate of Middle-earth reaches its spectacular climax. Aragorn is revealed as the heir to the ancient kings, leading a desperate stand to draw Sauron\'s attention away, while the hobbits Frodo and Sam edge closer to the fires of Mount Doom to destroy the One Ring.',
                'trailer' => 'https://www.youtube.com/watch?v=r5X-hFf6Bwo',
                'type' => 'movie',
                'poster' => 'imgs/content-posters/The Return of the King.webp',
                'logo' => 'imgs/content-logos/The Return of the King.webp',
                'background' => 'imgs/content-backgrounds/The Return of the King.webp',
                'release_year' => 2003,
                'end_year' => null,
                'rating' => 9.0,
                'production' => 'Peter Jackson',
                'length' => '3h 21min',
                'genres' => ['Action', 'Adventure', 'Fantasy'],
                'performers' => ['Elijah Wood', 'Viggo Mortensen', 'Ian McKellen'],
            ],
            [
                'title' => 'Interstellar',
                'short_description' => 'When Earth becomes uninhabitable, a team of explorers travels through a wormhole in space in an attempt to ensure humanity\'s survival.',
                'long_description' => 'With Earth facing a catastrophic agricultural blight, humanity\'s days are numbered. A team of intrepid astronauts, led by former NASA pilot Cooper, embarks on a desperate interstellar voyage through a newly discovered wormhole, testing the limits of human endurance, scientific knowledge, and space-time physics to find a new home.',
                'trailer' => 'https://www.youtube.com/watch?v=zSWdZVtXT7E',
                'type' => 'movie',
                'poster' => 'imgs/content-posters/Interstellar.webp',
                'logo' => 'imgs/content-logos/Interstellar.webp',
                'background' => 'imgs/content-backgrounds/Interstellar.webp',
                'release_year' => 2014,
                'end_year' => null,
                'rating' => 8.7,
                'production' => 'Christopher Nolan',
                'length' => '2h 49min',
                'genres' => ['Adventure', 'Sci-Fi', 'Drama'],
                'performers' => ['Matthew McConaughey', 'Anne Hathaway'],
            ],
            [
                'title' => 'Kill Bill - Volume 1',
                'short_description' => 'After awakening from a four-year coma, a former assassin wreaks vengeance on the team of assassins who betrayed her.',
                'long_description' => 'A former assassin, known only as The Bride, awakens from a four-year coma after being brutally betrayed and shot on her wedding day by her jealous boss, Bill. Driven by an insatiable desire for justice, she launches a bloody, international crusade to cross off every member of the Deadly Viper Assassination Squad from her death list.',
                'trailer' => 'https://www.youtube.com/watch?v=7kSuas6mRpk',
                'type' => 'movie',
                'poster' => 'imgs/content-posters/Kill Bill.webp',
                'logo' => 'imgs/content-logos/Kill Bill.webp',
                'background' => 'imgs/content-backgrounds/Kill Bill.jpg',
                'release_year' => 2003,
                'end_year' => null,
                'rating' => 8.2,
                'production' => 'Quentin Tarantino',
                'length' => '1h 51min',
                'genres' => ['Action', 'Crime', 'Thriller'],
                'performers' => ['Uma Thurman', 'Lucy Liu'],
            ],

            // SHOWS
            [
                'title' => 'Game of Thrones',
                'short_description' => 'Nine noble families fight for control over the lands of Westeros, while an ancient enemy returns after being dormant for millennia.',
                'long_description' => 'Based on the fantasy novels by George R.R. Martin, this epic series charts the violent political and military struggles among Westeros\' noble houses for control of the Iron Throne. As kingdoms clash, an ancient, icy threat dormant for thousands of years wakes up in the far North, threatening the survival of all mankind.',
                'trailer' => 'https://www.youtube.com/watch?v=KPLWWIOCOOQ',
                'type' => 'show',
                'poster' => 'imgs/content-posters/Game of Thrones.webp',
                'logo' => 'imgs/content-logos/Game of Thrones.webp',
                'background' => 'imgs/content-backgrounds/Game of Thrones.webp',
                'release_year' => 2011,
                'end_year' => 2019,
                'rating' => 9.2,
                'production' => 'HBO',
                'length' => '8 Seasons (73 eps)',
                'genres' => ['Action', 'Adventure', 'Drama', 'Fantasy'],
                'performers' => ['Kit Harington', 'Emilia Clarke', 'Peter Dinklage'],
            ],
            [
                'title' => 'Breaking Bad',
                'short_description' => 'A chemistry teacher diagnosed with inoperable lung cancer turns to manufacturing and selling methamphetamine with a former student in order to secure his family\'s future.',
                'long_description' => 'Walter White, a brilliant but underachieving high school chemistry teacher, undergoes a dramatic transformation after discovering he has terminal lung cancer. In a desperate bid to secure his family\'s financial future, he partners with a former student, Jesse Pinkman, to cook and sell high-grade crystal meth, descending into a dark world of crime.',
                'trailer' => 'https://www.youtube.com/watch?v=HhesaQXLuRY',
                'type' => 'show',
                'poster' => 'imgs/content-posters/Breaking Bad.webp',
                'logo' => 'imgs/content-logos/Breaking Bad.webp',
                'background' => 'imgs/content-backgrounds/Breaking Bad.webp',
                'release_year' => 2008,
                'end_year' => 2013,
                'rating' => 9.5,
                'production' => 'AMC',
                'length' => '5 Seasons (62 eps)',
                'genres' => ['Crime', 'Drama', 'Thriller'],
                'performers' => ['Bryan Cranston', 'Aaron Paul'],
            ],
            [
                'title' => 'Stranger Things',
                'short_description' => 'When a young boy vanishes, a small town uncovers a mystery involving secret experiments, terrifying supernatural forces and one strange little girl.',
                'long_description' => 'Set in the 1980s in the fictional town of Hawkins, Indiana, the sudden disappearance of a young boy sparks a chain of terrifying events. A group of local kids uncovers a government conspiracy involving secret human experiments, an alternate dimension known as the Upside Down, and a mysterious telekinetic girl named Eleven.',
                'trailer' => 'https://www.youtube.com/watch?v=bV0qBlXN_pA',
                'type' => 'show',
                'poster' => 'imgs/content-posters/Stranger Things.webp',
                'logo' => 'imgs/content-logos/Stranger Things.webp',
                'background' => 'imgs/content-backgrounds/Stranger Things.webp',
                'release_year' => 2016,
                'end_year' => 2026,
                'rating' => 8.6,
                'production' => 'Netflix',
                'length' => '5 Seasons (42 eps)',
                'genres' => ['Drama', 'Fantasy', 'Horror', 'Sci-Fi'],
                'performers' => ['Millie Bobby Brown', 'David Harbour'],
            ],
            [
                'title' => 'Invincible',
                'short_description' => 'An adult animated superhero series that revolves around 17-year-old Mark Grayson, who is just like every other guy his age except his father is the most powerful superhero on the planet.',
                'long_description' => 'Mark Grayson appears to be an ordinary teenager, except for the fact that his father, Omni-Man, is the planet\'s greatest protector. Shortly after turning 17, Mark begins to manifest his own powers, but as he trains under his father\'s wing, he discovers that the legacy of a true superhero is far bloodier and more complicated than it seems.',
                'trailer' => 'https://www.youtube.com/watch?v=jRAi80ZSpTw',
                'type' => 'show',
                'poster' => 'imgs/content-posters/Invincible.webp',
                'logo' => 'imgs/content-logos/Invincible.png',
                'background' => 'imgs/content-backgrounds/Invincible.webp',
                'release_year' => 2021,
                'end_year' => null,
                'rating' => 8.7,
                'production' => 'Prime Video',
                'length' => '4 Seasons (48 eps)',
                'genres' => ['Action', 'Adventure', 'Animation'],
                'performers' => ['Steven Yeun', 'J.K. Simmons'],
            ],

            // ANIME
            [
                'title' => 'Jujutsu Kaisen',
                'short_description' => 'A boy swallows a cursed talisman - the finger of a demon - and becomes cursed himself. He enters a shaman\'s school to be able to locate the demon\'s other body parts and thus exorcise himself.',
                'long_description' => 'Yuji Itadori is a high schooler with freakish physical strength who unexpectedly swallows a rotten finger containing a legendary curse to save his friends. Becoming the vessel for Ryomen Sukuna, the King of Curses, Yuji is thrust into Tokyo Jujutsu High, a secret academy dedicated to training Sorcerers to exorcise malevolent spirits.',
                'trailer' => 'https://www.youtube.com/watch?v=Pm-wNmS9RGI',
                'type' => 'anime',
                'poster' => 'imgs/content-posters/Jujutsu Kaisen.webp',
                'logo' => 'imgs/content-logos/Jujutsu Kaisen.webp',
                'background' => 'imgs/content-backgrounds/Jujutsu Kaisen.webp',
                'release_year' => 2020,
                'end_year' => null,
                'rating' => 8.5,
                'production' => 'MAPPA',
                'length' => '3 Seasons (59 eps)',
                'genres' => ['Action', 'Animation', 'Fantasy'],
                'performers' => null
            ],
            [
                'title' => 'Attack on Titan',
                'short_description' => 'After his hometown is destroyed and his mother is killed, young Eren Jaeger vows to cleanse the earth of the giant humanoid Titans that have brought humanity to the brink of extinction.',
                'long_description' => 'For generations, the remnants of humanity have taken refuge behind gargantuan concentric walls to escape the Titans—colossal, mindless humanoids with an insatiable appetite for human flesh. When a Titan breach shatters his peaceful life, Eren Jaeger joins the elite Scout Regiment, embarking on a brutal war of survival.',
                'trailer' => 'https://www.youtube.com/watch?v=MGRm4IzK1SQ',
                'type' => 'anime',
                'poster' => 'imgs/content-posters/Attack on Titan.webp',
                'logo' => 'imgs/content-logos/Attack on Titan.webp',
                'background' => 'imgs/content-backgrounds/Attack on Titan.webp',
                'release_year' => 2013,
                'end_year' => 2023,
                'rating' => 9.1,
                'production' => 'WIT Studio / MAPPA',
                'length' => '4 Seasons (94 eps)',
                'genres' => ['Action', 'Animation', 'Drama', 'Fantasy'],
                'performers' => null
            ],
            [
                'title' => 'Demon Slayer',
                'short_description' => 'A family is attacked by demons and only two members survive - Tanjiro and his sister Nezuko, who is turning into a demon slowly. Tanjiro sets out to become a demon slayer to avenge his family and cure his sister.',
                'long_description' => 'Tragedy strikes Tanjiro Kamado when he finds his family slaughtered by a demon, leaving only his sister Nezuko alive—though she is slowly transforming into a demon herself. To find a cure for Nezuko and avenge his loved ones, Tanjiro trains relentlessly to join the Demon Slayer Corps, entering a hidden, ancient war.',
                'trailer' => 'https://www.youtube.com/watch?v=VQGCKyvzIM4',
                'type' => 'anime',
                'poster' => 'imgs/content-posters/Demon Slayer.webp',
                'logo' => 'imgs/content-logos/Demon Slayer.webp',
                'background' => 'imgs/content-backgrounds/Demon Slayer.webp',
                'release_year' => 2019,
                'end_year' => null,
                'rating' => 8.6,
                'production' => 'Ufotable',
                'length' => '4 Seasons (63 eps)',
                'genres' => ['Action', 'Adventure', 'Animation', 'Fantasy'],
                'performers' => null
            ],
            [
                'title' => 'Death Note',
                'short_description' => 'An intelligent high school student goes on a secret crusade to eliminate criminals from the world after discovering a notebook capable of killing anyone whose name is written in it.',
                'long_description' => 'Light Yagami is an elite high school student who grows increasingly disillusioned with a corrupt world. His life alters completely when he uncovers the "Death Note"—a mystical notebook belonging to a Shinigami that kills anyone whose name is written in it. Light initiates a global vigilante purge under the alias Kira, entering a tense psychological war with the world\'s greatest detective, L.',
                'trailer' => 'https://www.youtube.com/watch?v=NlJZ-YSI1T4',
                'type' => 'anime',
                'poster' => 'imgs/content-posters/Death Note.webp',
                'logo' => 'imgs/content-logos/Death Note.webp',
                'background' => 'imgs/content-backgrounds/Death Note.webp',
                'release_year' => 2006,
                'end_year' => 2007,
                'rating' => 8.9,
                'production' => 'Madhouse',
                'length' => '1 Season (37 eps)',
                'genres' => ['Animation', 'Crime', 'Drama', 'Thriller'],
                'performers' => null
            ],
        ];

        // contents creation
        foreach ($contents as $content) {
            $newContent = Content::create([
                'title' => $content['title'],
                'slug' => Str::slug($content['title']),
                'short_description' => $content['short_description'],
                'long_description' => $content['long_description'],
                'trailer' => $content['trailer'],
                'type' => $content['type'],
                'poster' => $content['poster'],
                'logo' => $content['logo'],
                'background' => $content['background'],
                'release_year' => $content['release_year'],
                'end_year' => $content['end_year'],
                'rating' => $content['rating'],
                'length' => $content['length'],
                'production' => $content['production'],
            ]);

            // genres association
            $genres = Genre::whereIn('name', $content['genres'])->get();
            $newContent->genres()->attach($genres);

            // performer association
            if (!empty($content['performers']) && is_array($content['performers'])) {
                $performers = Performer::whereIn('name', $content['performers'])->get();
                $newContent->performers()->attach($performers);
            }
        }
    }
}
