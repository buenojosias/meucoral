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
        $this->encountrable = auth()->user()->plan_id >= 2;
        $this->groupable = auth()->user()->plan_id >= 3;

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

        if ($this->encounter->update($this->form->all()))
            $this->toast()->success('Alterações salvas com sucesso.')->send();
        else
            $this->toast()->error('Erro ao salvar alterações.')->send();
    }

    public function delete()
    {
        $this->encounter->delete();
        session()->flash('status', 'Solicitação de exclusão do ensaio realizadas com sucesso.');
        return $this->redirectRoute('panel.encounters.index', navigate: false);
    }

    public function restore()
    {
        $this->encounter->restore();
        $this->toast()->success('Ensaio restaurado com sucesso.')->send();
    }

    public function deletePermanently()
    {
        $this->encounter->forceDelete();
        session()->flash('status', 'O ensaio foi deletado permanentemente.');

        return $this->redirectRoute('panel.encounters.index', navigate: false);
    }
}
