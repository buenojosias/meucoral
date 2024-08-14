<?php

namespace App\Observers;

use App\Models\Chorister;

class ChoristerObserver
{
    public function forceDeleting(Chorister $chorister): void
    {
        $chorister->comments()->delete();
    }
}
