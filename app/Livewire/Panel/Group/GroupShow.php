<?php

namespace App\Livewire\Panel\Group;

use App\Models\Group;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class GroupShow extends Component
{
    use Interactions;

    public $canGroup = false;
    public $groupId;

    public function mount($group)
    {
        $this->canGroup = true;
        $this->groupId = $group;
    }

    public function render()
    {
        $choirId = auth()->user()->selected_choir_id;
        $group = Group::where('choir_id', $choirId)->withTrashed()->find($this->groupId);
        if (!$group)
            abort(404, 'O grupo não foi encontrado ou não pertence ao coral selecionado.');

        return view('livewire.panel.group.group-show', compact('group'))
            ->title('Grupo');
    }
}
