<?php

namespace Database\Seeders;

use App\Models\Plan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'plan_id' => null,
            'name' => 'Administrador',
            'email' => 'admin@coralize.com.br',
            'role' => 'admin',
        ]);

        User::factory()->create([
            'plan_id' => 3,
            'name' => 'Josias Bueno',
            'email' => 'josias@email.com',
            'role' => 'manager',
        ]);

        $users = User::factory(2)->create([
            'role' => 'manager'
        ]);

        $users->each(
            function ($user) {
                if ($user->plan_id > 1) {
                    $payment_cycle = \Arr::random(['Mensal', 'Anual']);
                    $last_payment = Carbon::now()->subDays(rand(0, 20));
                    $next_payment = $payment_cycle === 'Mensal' ? $last_payment . '+ 1 month' : $last_payment . '+ 1 year';
                } else {
                    $payment_cycle = null;
                }
                $data = [
                    'plan_cost' => $user->plan->price,
                    'payment_cycle' => $payment_cycle,
                    'discount' => $payment_cycle === 'Anual' ? ($user->plan->price * 2) : 0,
                    'final_cost' => $payment_cycle === 'Anual' ? ($user->plan->price * 10) : $user->plan->price,
                    'last_payment' => $last_payment ?? null,
                    'next_payment' => $next_payment ?? null,
                    'status' => 'Ativo'
                ];
                $user->config()->create($data);
            }
        );
    }
}
