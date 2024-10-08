<?php

namespace App\Livewire\Panel\Encounter;

use App\Livewire\Forms\EncounterForm;
use App\Models\Encounter;
use App\Models\Group;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class EncounterCreate extends Component
{
    use Interactions;

    public EncounterForm $form;

    public bool $encountrable = false;
    public $choirId;
    public bool $groupable = false;
    public $groups = [];

    public function mount()
    {
        $this->encountrable = auth()->user()->plan_id >= 2;
        if (!$this->encountrable)
            abort(403, 'Seu plano não tem suporte a essa funcionalidade.');

        $this->choirId = auth()->user()->selected_choir_id;

        $this->form->choir_id = $this->choirId;

        $this->groupable = auth()->user()->plan_id >= 3;

        $this->loadGroups();
    }

    public function loadGroups()
    {
        if (!$this->groupable || !$this->choirId)
            return;
        $this->groups = Group::query()->where('choir_id', $this->choirId)->get();
    }

    public function render()
    {
        return view('livewire.panel.encounter.encounter-create')
            ->title('Cadastrar ensaio');
    }

    public function save()
    {
        $this->form->validate();

        try {
            $encounter = Encounter::create($this->form->except('encounter'));
            session()->flash('status', 'Ensaio cadastrado com sucesso.');
            $this->redirectRoute('panel.encounters.show', $encounter, navigate: true);
        } catch (\Throwable $th) {
            \Log::error($th);
            $this->toast()->error('Ororreu um erro ao cadastrar ensaio.')->send();
        }
    }
}
