<?php

namespace App\Livewire\Panel\Group;

use App\Models\Group;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class GroupShow extends Component
{
    use Interactions;

    public $groupId;

    public function mount($group)
    {
        $this->groupId = $group;
    }

    public function render()
    {
        $choirId = auth()->user()->selected_choir_id;
        $group = Group::where('choir_id', $choirId)->withTrashed()->findOrFail($this->groupId);

        return view('livewire.panel.group.group-show', compact('group'))
            ->title($group->name);
    }
}
