<?php

namespace Database\Seeders;

use App\Models\Choir;
use App\Models\Group;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    public function run(): void
    {
        $choirs = Choir::withoutGlobalScopes()->whereMultigroup(true)->get();

        $choirs->each(
            function ($choir) {
                Group::factory(rand(0,2))->create(['choir_id' => $choir->id]);
            }
        );
    }
}
