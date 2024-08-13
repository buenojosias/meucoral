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

    #[Validate('required|string|in:Ativo,Inativo,Afastado,Desistente')]
    public $status;

    #[Validate('nullable|string|min:10|max:255')]
    public $content;

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
            $this->addComment();
            $this->toast()->success('Status atualizado com sucesso!')->send();
        } else {
            $this->toast()->error('Erro ao atualizar status!')->send();
        }
        $this->modal = false;
    }

    public function addComment()
    {
        if($this->content) {
            $this->chorister->comments()->create([
                'content' => $this->content,
                'author_id' => auth()->user()->id,
                'choir_id' => $this->chorister->choir_id,
            ]);
            $this->content = '';
        }
    }
}
