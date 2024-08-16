<?php

namespace App\Livewire\Panel\Partials;

use App\Livewire\Forms\EncounterForm;
use App\Models\Choir;
use App\Models\Encounter;
use Livewire\Attributes\On;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class EncounterCreate extends Component
{
    use Interactions;

    public EncounterForm $form;

    public $modal = false;

    public $groups = [];

    public function mount($choir_id = null, $group_id = null)
    {
        if ($choir_id !== auth()->user()->selected_choir_id)
            return;

        $this->form->choir_id = $choir_id;
        $this->form->group_id = $group_id;

        if (!$group_id && auth()->user()->plan_id >= 3 && $choir_id === auth()->user()->selected_choir_id)
            $this->loadGroups();
    }

    public function loadGroups()
    {
        $choir = Choir::findOrFail($this->form->choir_id);
        if (!$choir->multigroup)
            return;

        $this->groups = $choir->groups;
    }

    public function render()
    {
        return view('livewire.panel.partials.encounter-create');
    }

    #[On('open-modal')]
    public function openModal()
    {
        $this->modal = true;

        if (! $this->form->group_id && auth()->user()->plan_id >= 3 && $this->form->choir_id === auth()->user()->selected_choir_id)
            $this->loadGroups();
    }

    public function submit()
    {
        $this->validate();

        // if (Encounter::create($this->form->toArray())) {
        //     $this->dispatch('encounterCreated');
        //     $this->clear();
        // } else {
        //     $this->dialog()->error('Erro ao criar o encontro')->send();
        // }

        try {
            $encounter = Encounter::create($this->form->except('encounter'));
            session()->flash('status', 'Ensaio cadastrado com sucesso.');
            $this->redirectRoute('panel.encounters.show', $encounter, navigate: true);
        } catch (\Throwable $th) {
            \Log::error($th);
            $this->toast()->error('Ororreu um erro ao cadastrar ensaio.')->send();
            $this->modal = false;
        }

    }

    public function clear() {
        $this->form->reset(['date','description']);
    }
}
