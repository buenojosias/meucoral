<?php

namespace App\Livewire\Panel\Chorister\Partials;

use App\Livewire\Forms\KinForm;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class ChoristerKins extends Component
{
    use Interactions;

    public $chorister;
    public $kin;

    public KinForm $form;

    public $modal = false;

    public function mount($chorister)
    {
        $this->chorister = $chorister;
        $this->kin = $this->chorister->kins()->first();
        if($this->kin)
            $this->form->setKin($this->kin);
    }
    public function render()
    {
        return view('livewire.panel.chorister.partials.chorister-kins');
    }

    public function submit()
    {
        $this->form->validate();
        $this->modal = false;

        if($this->kin)
        {
            if($this->kin->update($this->form->except('kin'))) {
                $this->toast()->success('Responsável atualizado com sucesso.')->send();
            } else {
                $this->toast()->error('Erro ao atualizar responsável.')->send();
            }
        } else {
            if($this->kin = $this->chorister->kins()->create($this->form->except('kin'))) {
                $this->toast()->success('Responsável cadastrado com sucesso.')->send();
                $this->form->setKin($this->kin);
            } else {
                $this->toast()->error('Erro ao cadastrar responsável.')->send();
            }
        }
    }

    public function remove()
    {
        $this->dialog()
            ->question('Deseja realmente remover o responsável?')
            ->confirm('Confirmar', 'confirmRemove')
            ->cancel('Cancelar')
            ->send();
        // $this->dialog('Deseja realmente remover o responsável?', 'confirmRemove')->send();
    }

    public function confirmRemove()
    {
        if($this->kin->delete()) {
            $this->kin = null;
            $this->form->reset();
            $this->toast()->success('Responsável removido com sucesso.')->send();
        } else {
            $this->toast()->error('Erro ao remover responsável.')->send();
        }
    }
}
