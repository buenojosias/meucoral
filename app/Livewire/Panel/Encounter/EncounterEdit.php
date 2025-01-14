<?php

namespace App\Livewire\Panel\Encounter;

use App\Livewire\Forms\EncounterForm;
use App\Models\Encounter;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class EncounterEdit extends Component
{
    use Interactions;

    public $encounter;
    public EncounterForm $form;
    public bool $encountrable = false;
    public bool $groupable = false;
    public $groups = [];

    public function mount($encounter)
    {
        $this->encountrable = true;
        $this->groupable = true;

        if (!$this->encountrable)
            abort(403, 'Seu plano não tem suporte a essa funcionalidade.');

        $choirId = auth()->user()->selected_choir_id;
        $this->encounter = Encounter::query()
            ->where('choir_id', $choirId)
            ->when($this->groupable, fn($query) => $query->with('group'))
            ->withTrashed()
            ->findOrFail($encounter);

        $this->form->setEncounter($this->encounter);
    }

    public function render()
    {
        return view('livewire.panel.encounter.encounter-edit')
            ->title('Editar ensaio');
    }

    public function save()
    {
        $this->form->validate();
        if ($this->form->description == '') {
            $this->form->description = null;
        }
        if ($this->encounter->update($this->form->all()))
            $this->toast()->success('Alterações salvas com sucesso.')->send();
        else
            $this->toast()->error('Erro ao salvar alterações.')->send();
    }
}
