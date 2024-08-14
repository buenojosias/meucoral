<?php

namespace App\Observers;

use App\Models\Group;

class GroupObserver
{
    public function forceDeleting(Group $group): void
    {
        $group->comments()->delete();
    }
}
