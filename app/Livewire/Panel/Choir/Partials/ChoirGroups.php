<?php

namespace App\Livewire\Panel\Choir\Partials;

use Livewire\Component;

class ChoirGroups extends Component
{
    public $choir;

    public function mount($choir)
    {
        $this->choir = $choir;
    }

    public function render()
    {
        $groups = $this->choir->groups()
            ->withCount('activeChoristers')
            ->get();

        return view('livewire.panel.choir.partials.choir-groups', compact('groups'));
    }
}
