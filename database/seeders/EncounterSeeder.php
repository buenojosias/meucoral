<?php

namespace Database\Seeders;

use App\Models\Choir;
use App\Models\Encounter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EncounterSeeder extends Seeder
{
    public function run(): void
    {
        $choirsWithGroups = Choir::withoutGlobalScopes()->whereHas('groups')->with('groups')->get();
        $choirsWithoutGroups = Choir::withoutGlobalScopes()->whereDoesntHave('groups')->get();

        $choirsWithoutGroups->each(function (Choir $choir) {
            Encounter::factory(rand(6,10))->create([
                'choir_id' => $choir->id,
            ]);
        });

        $choirsWithGroups->each(function (Choir $choir) {
            Encounter::factory(rand(6,10))->create([
                'choir_id' => $choir->id,
                'group_id' => $choir->groups->random()->id ?? null
            ]);
        });
    }
}
