<?php

namespace App\Livewire\Panel\Group\Partials;

use Livewire\Component;

class GroupEncounters extends Component
{
    public $group;

    public function mount($group)
    {
        $this->group = $group;
    }

    public function render()
    {
        $encounters = $this->group->encounters()->withCount('presences')->latest()->get();

        return view('livewire.panel.group.partials.group-encounters', compact('encounters'));
    }
}
