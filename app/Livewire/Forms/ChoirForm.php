<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class ChoirForm extends Form
{
    #[Validate('required|string|min:3', as: 'nome do coral')]
    public $name = '';

    #[Validate('required|string', as: 'faixa etária')]
    public $age_group = '';

    #[Validate('required|string', as: 'categoria')]
    public $category = '';

    #[Validate('required|boolean', as: 'multigrupo')]
    public $multigroup = '';
}
