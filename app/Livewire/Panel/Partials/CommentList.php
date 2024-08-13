<?php

namespace App\Livewire\Panel\Partials;

use Livewire\Attributes\Validate;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class CommentList extends Component
{
    use Interactions;

    public $model;

    public $modal = false;

    #[Validate('required|string|min:10|max:255', as: 'comentário')]
    public $content;

    public function mount($model)
    {
        $this->model = $model;
    }

    public function render()
    {
        $comments = $this->model->comments()->latest()->get();

        return view('livewire.panel.partials.comment-list', compact('comments'));
    }

    public function submit()
    {
        $data = $this->validate();
        $data['author_id'] = auth()->user()->id;
        $data['choir_id'] = $this->model->choir_id;

        if ($this->model->comments()->create($data)) {
            $this->toast()->success('Comentário adicionado com sucesso.')->send();
            $this->clear();
        } else {
            $this->toast()->error('Erro ao adicionar comentário.')->send();
            $this->modal = false;
        }
    }

    public function clear()
    {
        $this->reset('content', 'modal');
    }

    public function delete($id)
    {
        $this->dialog()
            ->question('Deseja realmente excluir este comentário?')
            ->confirm('Confirmar', 'confirmDelete', $id)
            ->cancel('Cancelar')
            ->send();
    }

    public function confirmDelete($id)
    {
        $comment = $this->model->comments()->find($id);

        if ($comment->delete()) {
            $this->toast()->success('Comentário removido com sucesso.')->send();
        } else {
            $this->toast()->error('Erro ao remover comentário.')->send();
        }
    }
}
