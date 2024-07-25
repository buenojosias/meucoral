<?php

namespace Database\Seeders;

use App\Models\Choir;
use App\Models\Chorister;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChoristerSeeder extends Seeder
{
    public function run(): void
    {
        $choirs = Choir::withoutGlobalScopes()->with('groups')->get();

        $choirs->each(
            function ($choir) {
                $choristers = Chorister::factory(rand(5, 20))->create(['choir_id' => $choir->id]);

                if($choir->multigroup) {
                    $groups = $choir->groups->pluck('id');
                    $choristers->each(function ($chorister) use ($groups) {
                        $chorister->groups()->sync([$groups->random() => [
                            'added_at' => date('Y-m-d H:i:s')
                        ]]);
                    });
                }
            }
        );
    }
}
