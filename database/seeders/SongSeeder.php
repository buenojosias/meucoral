<?php

namespace Database\Seeders;

use App\Models\Choir;
use App\Models\Song;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SongSeeder extends Seeder
{
    public function run(): void
    {
        $choirs = Choir::withoutGlobalScopes()->with('categories','themes')->get();

        $choirs->each(function (Choir $choir) {
            for ($i=1; $i < rand(3, 6); $i++) {
                $categories = $choir->categories->random(2)->pluck('id')->toArray();
                $themes = $choir->themes->random(2)->pluck('id')->toArray();
                $song = Song::factory()->create([
                    'choir_id' => $choir->id,
                    'number' => $i,
                ]);
                $song->categories()->attach($categories);
                $song->themes()->attach($themes);
            }
        });
    }
}
