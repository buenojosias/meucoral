<?php

namespace App\Livewire\Panel\Event;

use App\Models\Event;
use Livewire\Component;

class EventShow extends Component
{
    public $groupable = false;
    public $choirId;
    public $event;
    public $confirmable = false;

    public function mount($event)
    {
        $this->groupable = auth()->user()->plan_id >= 3;
        $this->confirmable = auth()->user()->plan_id >= 2;
        $this->choirId = auth()->user()->selected_choir_id;

        $this->event = Event::query()
            ->whereHas('choir', function ($query) {
                $query->where('user_id', auth()->user()->id);
            })
            ->when($this->groupable, fn($q) => $q->with('groups'))
            ->withTrashed()
            ->with('address')
            ->findOrFail($event);

        if(!$this->choirId || $this->event->choir_id != $this->choirId) {
            $this->event->load('choir');
        }
    }

    public function render()
    {
        return view('livewire.panel.event.event-show')
            ->title('Evento');
    }
}
