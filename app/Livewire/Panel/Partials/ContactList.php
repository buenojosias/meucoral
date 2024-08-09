<?php

namespace App\Livewire\Panel\Partials;

use Livewire\Attributes\Validate;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class ContactList extends Component
{
    use Interactions;

    public $model;

    public $contact;

    public $modal = false;

    #[Validate('required|string', as: 'tipo')]
    public $label;

    #[Validate('required|string', as: 'contato')]
    public $value;

    public function mount($model)
    {
        $this->model = $model;
    }

    public function render()
    {
        $contacts = $this->model->contacts;

        return view('livewire.panel.partials.contact-list', compact('contacts'));
    }

    public function submit()
    {
        $data = $this->validate();

        if ($this->contact) {
            $this->contact->update($data);
        } else {
            $this->model->contacts()->create($data);
        }

        $this->reset(['contact', 'label', 'value', 'modal']);
        $this->toast()->success('Contato salvo com sucesso.')->send();
    }

    public function edit($id)
    {
        $this->contact = $this->model->contacts()->findOrFail($id);
        $this->label = $this->contact->label;
        $this->value = $this->contact->value;
        $this->modal = true;
    }

    public function remove($id)
    {
        $this->dialog()
            ->question('Deseja realmente remover este contato?')
            ->confirm('Confirmar', 'confirmRemove', $id)
            ->cancel('Cancelar')
            ->send();
    }

    public function confirmRemove($id)
    {
        $this->contact = $this->model->contacts()->findOrFail($id);
        if($this->contact->delete()) {
            $this->reset('contact');
            $this->toast()->success('Contato removido com sucesso.')->send();
        } else {
            $this->toast()->error('Erro ao remover contato.')->send();
        }
    }

}
