<?php

namespace App\Livewire\Forms;

use App\Models\Event;
use Livewire\Attributes\Validate;
use Livewire\Form;

class EventForm extends Form
{
    public ?Event $event;

    #[Validate('required|integer|exists:choirs,id')]
    public $choir_id;

    #[Validate('required|string|max:255', as: 'nome')]
    public $name;

    // #[Validate('required|date|after_or_equal:today', as: 'data')]
    #[Validate('required|date', as: 'data')]
    public $date;

    #[Validate('nullable|date_format:H:i', as: 'horário')]
    public $time;

    #[Validate('nullable|string|max:255', as: 'local')]
    public $place;

    #[Validate('nullable|string|max:255', as: 'descrição')]
    public $manager_description;

    #[Validate('nullable|string|max:255', as: 'descrição para os coralistas')]
    public $chorister_description;

    #[Validate('nullable|string|max:255', as: 'descrição pública')]
    public $public_description;

    #[Validate('required|boolean', as: 'apresentação')]
    public $is_presentation = false;

    #[Validate('required|boolean', as: 'publicamente visível')]
    public $is_public = false;

    #[Validate('nullable|date')]
    public $last_answer;

    public function setEvent(Event $event)
    {
        $this->choir_id = $event->choir_id;
        $this->name = $event->name;
        $this->date = $event->date->format('Y-m-d');
        $this->time = $event->time->format('H:i');
        $this->manager_description = $event->manager_description;
        $this->chorister_description = $event->chorister_description;
        $this->public_description = $event->public_description;
        $this->is_presentation = $event->is_presentation;
        $this->is_public = $event->is_public;
        $this->last_answer = $event->last_answer;
    }
}
