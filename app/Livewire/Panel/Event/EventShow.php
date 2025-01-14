<?php

namespace App\Livewire\Panel\Event;

use App\Models\Event;
use Livewire\Component;

class EventShow extends Component
{
    public $groupable = false;
    public $choirId;
    public $event;
    public $address;
    public $confirmable = false;

    public function mount($event)
    {
        $this->groupable = true;
        $this->confirmable = true;
        $this->choirId = auth()->user()->selected_choir_id;

        $this->event = Event::query()
            ->whereHas('choir', function ($query) {
                $query->where('user_id', auth()->user()->id);
            })
            ->when($this->groupable, fn($q) => $q->with('groups'))
            ->withTrashed()
            ->findOrFail($event);

        $this->address = $this->event->address()
            ->join('cities', 'addresses.city_id', '=', 'cities.id')
            ->join('states', 'cities.state_id', '=', 'states.id')
            ->select('addresses.*', 'cities.name as city_name', 'states.abbr as state_abbr')
            ->first();

        if (!$this->choirId || $this->event->choir_id != $this->choirId) {
            $this->event->load('choir');
        }
    }

    public function render()
    {
        return view('livewire.panel.event.event-show')
            ->title('Evento');
    }
}
