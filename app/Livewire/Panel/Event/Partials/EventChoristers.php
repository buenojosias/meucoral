<?php

namespace App\Livewire\Panel\Event\Partials;

use App\Models\Chorister;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class EventChoristers extends Component
{
    use Interactions;

    public $event;
    public $choir;
    public $groupIds = [];

    public function mount($event, $groups = null)
    {
        $this->event = $event;

        if (auth()->user()->plan_id >= 3) {
            $this->choir = $event->choir;
            $this->groupIds = $groups->pluck('id')->toArray();
        }
    }

    public function render()
    {
        $choristers = Chorister::query()
            ->where('choir_id', $this->event->choir_id)
            ->when($this->choir->multigroup, function ($query) {
                $query->whereHas('groups', fn($q) => $q->whereIn('groups.id', $this->groupIds));
            })
            ->with('events', fn($query) => $query->where('event_id', $this->event->id))
            ->whereStatus('Ativo')
            ->orderBy('name')
            ->get();

        $withAnswer = $choristers->filter(function ($member) {
            return $member->events->contains('id', $this->event->id);
        });

        $withoutAnswer = $choristers->filter(function ($member) {
            return !$member->events->contains('id', $this->event->id);
        });

        return view('livewire.panel.event.partials.event-choristers', compact('choristers', 'withAnswer', 'withoutAnswer'));
    }
}
