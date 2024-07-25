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
                Choir::factory(rand(0, $user->plan === 1 ? 1 : 3))
                    ->hasProfile(1)
                    ->create([
                        'user_id' => $user->id,
                        'multigroup' => $user->plan === 1 ? 0 : rand(0, 1)
                    ]);
            }
        );
    }
}
