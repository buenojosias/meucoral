<?php

namespace App\Livewire\Forms;

use App\Models\Group;
use Livewire\Attributes\Validate;
use Livewire\Form;

class GroupForm extends Form
{
    public ?Group $group;

    public $choir_id;

    #[Validate('required|string', as: 'nome do grupo')]
    public $name;

    #[Validate('nullable|integer|min:1', as: 'idade mínima')]
    public $min_age;

    #[Validate('nullable|required_with:min_age|integer|min:0|gt:min_age', as: 'idade máxima')]
    public $max_age;

    #[Validate('required|integer|in:1,2,3,4,5,6,7', as: 'dia dos ensaios')]
    public $encounter_weekday;

    #[Validate('required|date_format:H:i', as: 'horário dos ensaios')]
    public $encounter_time;

    #[Validate('required|string', as: 'status')]
    public $status;

    #[Validate('required|date', as: 'data de início')]
    public $start_date;

    #[Validate('nullable|date|after:start_date', as: 'data de término')]
    public $end_date;

    public function setGroup(Group $group)
    {
        $this->choir_id = $group->choir_id;
        $this->name = $group->name;
        $this->min_age = $group->min_age;
        $this->max_age = $group->max_age;
        $this->encounter_weekday = $group->encounter_weekday->value;
        $this->encounter_time = $group->encounter_time->format('H:i');
        $this->status = $group->status->value;
        $this->start_date = $group->start_date->format('Y-m-d');
        $this->end_date = $group->end_date ? $group->end_date->format('Y-m-d') : null;
    }
}
