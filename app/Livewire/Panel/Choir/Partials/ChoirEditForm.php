<?php

namespace App\Livewire\Panel\Choir\Partials;

use App\Livewire\Forms\ChoirForm;
use App\Models\Choir;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class ChoirEditForm extends Component
{
    use Interactions;

    public $choir;

    public ChoirForm $form;

    public function mount(Choir $choir)
    {
        $this->choir = $choir;
        $this->form->setChoir($choir);
    }

    public function render()
    {
        return view('livewire.panel.choir.partials.choir-edit-form');
    }

    public function save()
    {
        $this->validate();
        $this->choir->update(
            $this->form->all()
        );
        $this->toast()->success('Alterações salvas com sucesso.')->send();
    }
}
