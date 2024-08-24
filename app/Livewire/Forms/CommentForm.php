<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class CommentForm extends Form
{
    #[Validate('required|integer')]
    public $choir_id;

    #[Validate('required|integer')]
    public $author_id;

    #[Validate('nullable|integer', as: 'coralista')]
    public $chorister_id;

    #[Validate('required|string', as: 'comentário')]
    public $content;
}
