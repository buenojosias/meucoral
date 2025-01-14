<?php

namespace Database\Seeders;

use App\Models\Song;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LyricsSeeder extends Seeder
{
    public function run(): void
    {
        $songs = Song::query()->inRandomOrder()->limit(10)->get();

        $songs->each(function (Song $song) {
            $content = '';

            for ($i = 1; $i < rand(10, 20); $i++) {
                $content .= fake()->sentence(rand(5, 10)) . '<br>';
            }

            $song->lyrics()->create([
                'content' => $content,
            ]);
        });
    }
}
