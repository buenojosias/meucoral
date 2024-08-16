<?php

namespace App\Livewire\Forms;

use App\Models\Encounter;
use Livewire\Attributes\Validate;
use Livewire\Form;

class EncounterForm extends Form
{
    public ?Encounter $encounter;

    #[Validate('required|integer')]
    public $choir_id;

    #[Validate('nullable|integer', as: 'grupo')]
    public $group_id;

    #[Validate('required|date', as: 'data')]
    public $date;

    #[Validate('required|string', as: 'tema')]
    public $theme;

    #[Validate('nullable|string', as: 'descrição')]
    public $description;

    public function setEncounter(Encounter $encounter)
    {
        $this->encounter = $encounter;
        $this->choir_id = $encounter->choir_id;
        $this->group_id = $encounter->group_id;
        $this->date = $encounter->date->format('Y-m-d');
        $this->theme = $encounter->theme;
        $this->description = $encounter->description;
    }
}
