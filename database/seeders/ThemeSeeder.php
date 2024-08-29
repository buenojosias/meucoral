<?php

namespace Database\Seeders;

use App\Models\Choir;
use App\Models\Theme;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ThemeSeeder extends Seeder
{
    public function run(): void
    {
        $choirs = Choir::withoutGlobalScopes()->get();

        $choirs->each(function ($choir) {
            Theme::factory()
                ->count(5)
                ->create([
                    'choir_id' => $choir->id,
                ]);
        });
    }
}
