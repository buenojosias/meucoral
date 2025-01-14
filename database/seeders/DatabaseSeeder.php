<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            PlanSeeder::class,
            UserSeeder::class,
            ChoirSeeder::class,
            GroupSeeder::class,
            ChoristerSeeder::class,
            EncounterSeeder::class,
            AttendanceSeeder::class,
            EventSeeder::class,
            CategorySeeder::class,
            ThemeSeeder::class,
            SongSeeder::class,
            LyricsSeeder::class,
        ]);
    }
}
