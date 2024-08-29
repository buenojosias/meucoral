<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Choir;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $choirs = Choir::withoutGlobalScopes()->get();

        $choirs->each(function ($choir) {
            Category::factory()
                ->count(5)
                ->create([
                    'choir_id' => $choir->id,
                ]);
        });
    }
}
