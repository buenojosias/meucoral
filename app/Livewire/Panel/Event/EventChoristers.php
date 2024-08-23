<?php

namespace App\Livewire\Panel\Event;

use Livewire\Attributes\On;
use Livewire\Component;

class EventChoristers extends Component
{
    public $event;
    public $showChoristers = true;

    public function mount($event)
    {
        $this->event = $event;
    }

    public function render()
    {
        return view('livewire.panel.event.event-choristers');
    }

    #[On('load-choristers')]
    public function loadChoristers()
    {
        $this->showChoristers = true;
    }
}
