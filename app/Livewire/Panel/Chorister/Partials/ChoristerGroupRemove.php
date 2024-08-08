<?php

namespace App\Livewire\Panel\Chorister\Partials;

use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class ChoristerGroupRemove extends Component
{
    use Interactions;

    public $chorister;

    public $group = null;

    public $modal = false;

    #[Validate('required', as: 'opção')]
    public $action = null;

    public function mount($chorister)
    {
        $this->chorister = $chorister;
    }

    public function render()
    {
        return view('livewire.panel.chorister.partials.chorister-group-remove');
    }

    #[On('load-group')]
    public function loadGroup($id)
    {
        $this->group = $this->chorister->groups()->findOrFail($id);

        $this->modal = true;
    }

    public function confirm()
    {
        $this->validate();

        if ($this->action === 'delete') {
            $removed = $this->chorister->groups()->detach($this->group->id);
        } else if ($this->action === 'preserve') {
            $removed = $this->chorister->groups()->updateExistingPivot($this->group->id, ['status' => 'Removido', 'removed_at' => now()]);
        }

        if ($removed) {
            $this->dispatch('group-removed');
        } else {
            $this->dialog()->error('Ocorreu um erro ao tentar remover grupo.')->send();
        }

        $this->modal = false;
        $this->reset('group','action');
    }
}
