<?php

namespace App\Livewire\Panel\Chorister\Partials;

use App\Livewire\Forms\ChoristerForm;
use App\Models\Chorister;
use Carbon\Carbon;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class ChoristerEditForm extends Component
{
    use Interactions;

    public $chorister;

    public ChoristerForm $form;

    public function mount($chorister)
    {
        $this->chorister = $chorister;
        $this->form->setChorister($this->chorister);
    }

    public function render()
    {
        return view('livewire.panel.chorister.partials.chorister-edit-form');
    }

    public function save()
    {
        $this->validate();
        try {
            $this->chorister->update(
                $this->form->all()
            );
            $this->toast()->success('Alterações salvas com sucesso.')->send();
        } catch (\Throwable $th) {
            $this->toast()->error('Ocorreu um erro ao salvar alterações.')->send();
        }
    }
}
