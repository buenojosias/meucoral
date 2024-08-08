<?php

namespace App\Livewire\Panel\Group\Partials;

use App\Models\Chorister;
use App\Models\Group;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class GroupChoristers extends Component
{
    use Interactions;

    public $group;

    public $choirChoristers = [];

    public $modal = false;

    #[Validate('required|integer', as: 'coralista')]
    public ?int $selectedChoristerId = null;

    public function mount(Group $group)
    {
        $this->$group = $group;
    }

    public function render()
    {
        $choristers = $this->group->choristers()->orderBy('name')->get();

        return view('livewire.panel.group.partials.group-choristers', compact('choristers'));
    }

    public function updatedModal()
    {
        if ($this->modal = true) {
            $this->choirChoristers = Chorister::where('choir_id', $this->group->choir_id)
                ->whereStatus('Ativo')->whereDoesntHave('groups', function ($q) {
                    $q->whereId($this->group->id);
                })
                ->orderBy('name')
                ->get();
        }
    }

    public function submit()
    {
        $this->validate();
        try {
            $this->group->choristers()->attach([
                $this->selectedChoristerId => [
                    'added_at' => date('Y-m-d H:i:s')
                ]
            ]);
            $this->reset(['choirChoristers', 'modal', 'selectedChoristerId']);
            $this->toast()->success('Coralista adicionado(a) com sucesso')->send();
        } catch (\Throwable $th) {
            $this->modal = false;
            $this->dialog()->error('Ocorreu um erro ao tentar adicionar coralista.')->send();
            \Log::error($th);
        }
    }

    // public function removeGroup($groupId)
    // {
    //     $this->chorister->groups()->updateExistingPivot($groupId, [
    //         'status' => 'Removido',
    //         'removed_at' => date('Y-m-d H:i:s')
    //     ]);
    //     $this->toast()->success('Grupo removido com sucesso')->send();
    // }

    // public function deleteGroup($groupId)
    // {
    //     $this->chorister->groups()->detach($groupId);
    //     $this->toast()->success('Grupo removido com sucesso')->send();
    // }

    #[On('chorister-removed')]
    public function choristerRemoved()
    {
        $this->toast()->success('Coralista removido(a) com sucesso')->send();
        $this->render();
    }
}
