<?php

namespace App\Livewire\Forms;

use App\Models\Choir;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ChoirForm extends Form
{
    public ?Choir $choir;

    #[Validate('required|string|min:3', as: 'nome do coral')]
    public $name = '';

    #[Validate('required|string', as: 'faixa etária')]
    public $age_group = '';

    #[Validate('required|string', as: 'categoria')]
    public $category = '';

    #[Validate('required|boolean', as: 'multigrupo')]
    public $multigroup = '';

    public function setChoir(Choir $choir)
    {
        $this->choir = $choir;
        $this->name = $choir->name;
        $this->age_group = $choir->age_group->value;
        $this->category = $choir->category->value;
        $this->multigroup = $choir->multigroup ? 1 : 0;
    }
}
