<?php

namespace Database\Seeders;

use App\Models\Choir;
use App\Models\Encounter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class AttendanceSeeder extends Seeder
{
    public function run(): void
    {
        $choirs = Choir::query()
            ->withoutGlobalScopes()
            ->whereId(101)
            ->with('choristers')
            ->with('encounters', fn($q) => $q->whereDate('date', '<', now())->inRandomOrder()->limit(6))
            ->get();

        $choirs->each(function ($choir) {
            $choir->encounters->each(function ($encounter) use ($choir) {
                if ($encounter->group_id)
                    $choristers = $choir->choristers->whereIn('group_id', $encounter->group_id);
                else
                    $choristers = $choir->choristers;

                $encounter->choristers()->sync($choristers->pluck('id'), ['attendance' => 'P']);
                $encounter->has_attendance = true;
                $encounter->save();
            });
        });

        // \DB::table('encounters')->update(['has_attendance' => false]);
    }
}
