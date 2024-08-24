<?php

namespace App\Livewire\Panel\Event;

use App\Livewire\Forms\EventForm;
use App\Models\Event;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class EventEdit extends Component
{
    use Interactions;

    public $event;
    public EventForm $form;
    public $addressable = false;
    public $groupable = false;
    public $choir;

    public function mount($event)
    {
        $choirId = auth()->user()->selected_choir_id;
        $this->addressable = auth()->user()->plan_id >= 2;
        $this->groupable = auth()->user()->plan_id >= 3;

        $this->event = Event::where('choir_id', $choirId)->withTrashed()->findOrFail($event);
        if ($this->groupable)
            $this->choir = $this->event->choir;

        $this->form->fill($this->event);
    }

    public function render()
    {
        return view('livewire.panel.event.event-edit');
    }

    public function save()
    {
        $this->validate();
        if ($this->event->update($this->form->all()))
            $this->toast()->success('Alterações salvas com sucesso.')->send();
    }
}
