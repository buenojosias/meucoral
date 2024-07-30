<?php

namespace App\Livewire\Panel\Chorister\Partials;

use App\Models\Chorister;
use App\Models\Group;
use Livewire\Attributes\Validate;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class Groups extends Component
{
    use Interactions;

    public $chorister;

    public $choirGroups = [];

    public $modal = false;

    #[Validate('required|integer', as: 'grupo')]
    public ?int $selectedGroupId = null;

    public function mount(Chorister $chorister)
    {
        $this->$chorister = $chorister;
    }

    public function render()
    {
        $groups = $this->chorister->groups;

        return view('livewire.panel.chorister.partials.groups', compact('groups'));
    }

    public function updatedModal()
    {
        if ($this->modal = true) {
            $this->choirGroups = Group::where('choir_id', $this->chorister->choir_id)->whereStatus('ativo')->whereDoesntHave('choristers', function ($q) {
                $q->whereId($this->chorister->id);
            })->get();
        }
    }

    public function submit()
    {
        $this->validate();
        try {
            $this->chorister->groups()->attach([
                $this->selectedGroupId => [
                    'added_at' => date('Y-m-d H:i:s')
                ]
            ]);
            $this->reset(['choirGroups', 'modal', 'selectedGroupId']);
            $this->toast()->success('Grupo adicionado com sucesso')->send();
        } catch (\Throwable $th) {
            $this->modal = false;
            $this->dialog()->error('Ocorreu um erro ao tentar adicionar grupo.')->send();
            \Log::error($th);
        }
    }
}
