<?php

namespace App\Livewire\Panel\Comment;

use App\Livewire\Forms\CommentForm;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class CommentSlide extends Component
{
    use Interactions;

    public $model;
    public $slide = false;
    public $comments = [];
    public $showTextarea = false;

    public CommentForm $form;

    public function mount($model = null, $chorister = null)
    {
        $this->model = $model;
    }

    public function loadComments()
    {
        $this->comments = $this->model->comments()->with('chorister')->get();

        $this->form->choir_id = $this->model->choir_id ?? $this->chorister->choir_id;
        $this->form->author_id = auth()->user()->id;
        $this->form->chorister_id = $this->chorister->id ?? null;
    }

    public function render()
    {
        return view('livewire.panel.comment.comment-slide');
    }

    public function submit()
    {
        $this->validate();

        if ($this->model->comments()->create($this->form->toArray())) {
            $this->toast()->success('Comentário adicionado com sucesso.')->send();
            $this->loadComments();
            $this->clear();
        }
    }

    public function clear()
    {
        $this->form->content = null;
    }
}
