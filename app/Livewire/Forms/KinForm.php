<?php

namespace App\Livewire\Forms;

use App\Models\Kin;
use Livewire\Attributes\Validate;
use Livewire\Form;

class KinForm extends Form
{
    public ?Kin $kin;

    public $chorister_id;

    #[Validate('required|string', as: 'nome')]
    public $name;

    #[Validate('required|string', as: 'grau de parentesco')]
    public $kinship;

    #[Validate('required|string', as: 'WhatsApp')]
    public $whatsapp = "";

    #[Validate('nullable|date|before:today', as: 'data de nascimento')]
    public $birthdate;

    #[Validate('nullable|string', as: 'profissão')]
    public $profession;

    #[Validate('nullable|bool', as: 'cantor(a)')]
    public $is_singer = false;

    #[Validate('nullable|bool', as: 'instrumentista')]
    public $is_instrumentalist = false;

    public function setKin(Kin $kin)
    {
        $this->chorister_id = $kin->chorister_id;
        $this->name = $kin->name;
        $this->kinship = $kin->kinship;
        $this->whatsapp = $kin->whatsapp;
        $this->birthdate = $kin->birthdate ? $kin->birthdate->format('Y-m-d') : null;
        $this->profession = $kin->profession;
        $this->is_singer = $kin->is_singer;
        $this->is_instrumentalist = $kin->is_instrumentalist;
    }
}
