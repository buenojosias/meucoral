<?php

namespace App\Livewire\Panel\Event;

use Livewire\Component;

class EventIndex extends Component
{
    public function mount()
    {
        $this->eventable = auth()->user()->can('eventable');
    }

    public function render()
    {
        return view('livewire.panel.event.event-index')
            ->title('Eventos');
    }
}
