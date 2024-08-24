<?php

namespace Database\Seeders;

use App\Models\Choir;
use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        Choir::withoutGlobalScopes()->get()->each(
            function ($choir) {
                Event::factory(5)->create([
                    'choir_id' => $choir->id,
                ]);
            }
        );
    }
}
