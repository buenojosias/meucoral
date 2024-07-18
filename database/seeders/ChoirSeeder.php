<?php

namespace Database\Seeders;

use App\Models\Choir;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChoirSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::where('id', '>', 1)->get();

        $users->each(
            function ($user) {
                Choir::factory(rand(0, 2))->hasProfile(1)->create(['user_id' => $user->id]);
            }
        );
    }
}
