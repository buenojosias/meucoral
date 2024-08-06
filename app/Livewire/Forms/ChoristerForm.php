<?php

namespace App\Livewire\Forms;

use App\Models\Chorister;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ChoristerForm extends Form
{
    public ?Chorister $chorister;
    public $choir_id;

    #[Validate('required|string|min:5|max:130')]
    public $name;

    #[Validate('required|date|before_or_equal:yesterday', as: 'data de nascimento')]
    public $birthdate;

    #[Validate('nullable|date|before_or_equal:today', as: 'data da inscrição')]
    public $registration_date;

    #[Validate('required|string', as: 'status')]
    public $status = 'Ativo(a)';

    public function setChorister(Chorister $chorister)
    {
        $this->chorister = $chorister;
        $this->choir_id = $chorister->choir_id;
        $this->name = $chorister->name;
        $this->birthdate = $chorister->birthdate->format('Y-m-d');
        $this->registration_date = $chorister->registration_date->format('Y-m-d');
        $this->status = $chorister->status->value;
        // dd($this->birthdate $this->registration_date);
    }
}
