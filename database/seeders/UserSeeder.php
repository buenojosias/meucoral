<?php

namespace Database\Seeders;

use App\Models\Package;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::factory(6)->create([
            'role' => 'manager'
        ]);

        $users->each(function ($user) {
            $package = Package::find(rand(1, 3));
            if($package->id > 1) {
                $discount = $package->price * rand(0, 10) / 100;
            } else {
                $discount = 0;
            }

            $user->packages()->attach($package->id, [
                'cost_change' => $discount,
                'final_cost' => $package->price - $discount,
            ]);
        });
    }
}
