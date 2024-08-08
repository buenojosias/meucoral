<?php

namespace App\Livewire\Panel\Group\Partials;

use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class GroupChoristerRemove extends Component
{
    use Interactions;

    public $group;

    public $chorister = null;

    public $modal = false;

    #[Validate('required', as: 'opção')]
    public $action = null;

    public function mount($group)
    {
        $this->group = $group;
    }

    public function render()
    {
        return view('livewire.panel.group.partials.group-chorister-remove');
    }

    #[On('load-chorister')]
    public function loadChorister($id)
    {
        $this->chorister = $this->group->choristers()->findOrFail($id);

        $this->modal = true;
    }

    public function confirm()
    {
        $this->validate();

        if ($this->action === 'delete') {
            $removed = $this->group->choristers()->detach($this->chorister->id);
        } else if ($this->action === 'preserve') {
            $removed = $this->group->choristers()->updateExistingPivot($this->chorister->id, ['situation' => 'Removido', 'removed_at' => now()]);
        }

        if ($removed) {
            $this->dispatch('chorister-removed');
        } else {
            $this->dialog()->error('Ocorreu um erro ao tentar remover coralista.')->send();
        }

        $this->modal = false;
        $this->reset('chorister','action');
    }
}
