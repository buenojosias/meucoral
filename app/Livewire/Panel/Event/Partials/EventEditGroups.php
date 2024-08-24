<?php

namespace App\Livewire\Panel\Event\Partials;

use Livewire\Component;
use TallStackUi\Traits\Interactions;

class EventEditGroups extends Component
{
    use Interactions;

    public $event;
    public $choir;
    public $modal = false;
    public $groups = [];
    public $selectedGroups = [];

    public function mount($event, $choir)
    {
        $this->event = $event;
        $this->choir = $choir;
    }

    public function render()
    {
        $assignedGroups = $this->event->groups;

        return view('livewire.panel.event.partials.event-edit-groups', compact('assignedGroups'));
    }

    public function updatedModal($value)
    {
        if ($value)
            $this->loadGroups();
    }

    public function loadGroups()
    {
        $this->groups = $this->choir->groups()
            ->whereStatus('Ativo')
            ->whereDoesntHave('events', function ($query) {
                $query->where('event_id', $this->event->id);
            })
            ->get();
    }

    public function addGroups()
    {
        if ($this->event->groups()->syncWithoutDetaching($this->selectedGroups)) {
            $this->toast()->success('Grupo(s) adicionado(s) com sucesso.')->send();
            $this->modal = false;
            $this->groups = [];
            $this->selectedGroups = [];
        }
    }

    public function removeGroup($group)
    {
        $this->dialog()
            ->question('Deseja realmente remover este grupo do evento?')
            ->confirm('Confirmar', 'confirmRemoveGroup', ['group' => $group])
            ->cancel('Cancelar')
            ->send();
    }

    public function confirmRemoveGroup($group)
    {
        if ($this->event->groups()->detach($group))
            $this->toast()->success('Grupo removido com sucesso.')->send();
    }
}
