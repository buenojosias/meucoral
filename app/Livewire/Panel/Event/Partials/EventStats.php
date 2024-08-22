<?php

namespace App\Livewire\Panel\Event\Partials;

use Livewire\Attributes\On;
use Livewire\Component;

class EventStats extends Component
{
    public $event;
    public $stats;
    public $showButton = true;

    public function mount($event)
    {
        $this->event = $event;
        $this->stats = [
            'yes' => 0,
            'no' => 0,
            'maybe' => 0,
        ];
        $this->loadStats();
    }

    #[On('refresh-stats')]
    public function loadStats()
    {
        $choristers = $this->event->choristers()->get();

        if (!$choristers)
            return;

        $this->stats['yes'] = $choristers->where('pivot.answer', 'Sim')->count();
        $this->stats['no'] = $choristers->where('pivot.answer', 'Não')->count();
        $this->stats['maybe'] = $choristers->where('pivot.answer', 'Talvez')->count();
    }

    public function render()
    {
        return view('livewire.panel.event.partials.event-stats');
    }
}
