<?php

namespace App\Livewire\Panel\Chorister\Partials;

use App\Enums\ChoristerStatusEnum;
use Livewire\Attributes\Validate;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class ChoristerStatusForm extends Component
{
    use Interactions;

    public $chorister;

    public bool $modal = false;


    #[Validate('required|string|in:Ativo,Inativo,Afastado(a),Desistente')]
    public $status;

    public function mount($chorister)
    {
        $this->chorister = $chorister;
        $this->status = $chorister->status->value;
    }

    public function render()
    {
        return view('livewire.panel.chorister.partials.chorister-status-form');
    }

    public function updateStatus()
    {
        $this->validate();
        $this->chorister->status = ChoristerStatusEnum::from($this->status);
        if ($this->chorister->save()) {
            $this->toast()->success('Status atualizado com sucesso!')->send();
        } else {
            $this->toast()->error('Erro ao atualizar status!')->send();
        }
        $this->modal = false;
    }
}
