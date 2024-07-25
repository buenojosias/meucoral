<?php

namespace App\Livewire\Panel\Group;

use App\Models\Group;
use Livewire\Component;

class GroupIndex extends Component
{
    public $canGroup;

    public $isMultigroup;

    public $selectedChoirId;

    public $withTrashed;

    public function mount()
    {
        $user = auth()->user();

        if (!$this->canGroup($user))
            return;

        if (!$this->selectedChoirId = $user->selected_choir_id)
            return;

        $this->isMultigroup = $this->isMultigroup($user);
    }

    public function render()
    {
        $groups = [];

        if ($this->selectedChoirId && $this->isMultigroup)
            $groups = Group::where('choir_id', $this->selectedChoirId)
                ->when($this->withTrashed, function ($query) {
                    $query->withTrashed()->orderBy('deleted_at');
                })
                ->get();

        return view('livewire.panel.group.group-index', compact('groups'))
            ->title('Grupos do coral');
    }

    public function canGroup($user)
    {
        $this->canGroup = $user->plan_id >= 3;
        return $user->plan_id >= 3;
    }

    public function isMultigroup($user)
    {
        $choir = $user->choirs()->findOrFail($this->selectedChoirId);
        return $choir->multigroup;
    }
}
