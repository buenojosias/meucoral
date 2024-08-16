<?php

namespace App\Observers;
use App\Models\Encounter;

class EncounterObserver
{
    public function forceDeleting(Encounter $encounter): void
    {
        $encounter->comments()->delete();
    }
}
