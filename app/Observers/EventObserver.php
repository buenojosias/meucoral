<?php

namespace App\Observers;

use App\Models\Event;

class EventObserver
{
    public function created(Event $event): void
    {
        //
    }

    public function updated(Event $event): void
    {
        //
    }

    public function deleted(Event $event): void
    {
        //
    }

    public function restored(Event $event): void
    {
        //
    }

    public function forceDeleting(Event $event): void
    {
        $event->comments()->delete();
    }

    public function forceDeleted(Event $event): void
    {
        //
    }
}
