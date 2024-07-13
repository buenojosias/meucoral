<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class ChoirProfileForm extends Form
{
    #[Validate('required|integer', as: 'cidade')]
    public $city_id = '';

    #[Validate('nullable|string', as: 'instituição')]
    public $institution = '';

    #[Validate('nullable|string', as: 'descrição')]
    public $description = '';
}
