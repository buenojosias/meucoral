<?php

namespace App\Livewire\Panel;

use App\Models\Choir;
use App\Models\Encounter;
use App\Models\Event;
use Livewire\Component;

class Dashboard extends Component
{
    public ?int $planId;
    public ?int $choristersCount = 0;
    public ?int $choirsCount = 0;
    public ?int $groupsCount = 0;

    public $nextEncounter;
    public $nextEvent;

    public function mount()
    {
        $this->planId = auth()->user()->plan_id;
        $this->choristersCount = auth()->user()->choristers()->whereStatus('Ativo')->count();
        $this->choirsCount = Choir::count();
        if ($this->planId >= 3) {
            $this->groupsCount = auth()->user()->groups()->whereStatus('Ativo')->count();
        }

        if ($this->planId >= 2) {
            $this->nextEncounter = Encounter::query()
                ->whereHas('choir', fn($q) => $q->where('user_id', auth()->user()->id))
                ->where('date', '>=', now()->format('Y-m-d'))
                ->orderBy('date')
                ->first();
        }

        $this->nextEvent = Event::query()
                ->whereHas('choir', fn($q) => $q->where('user_id', auth()->user()->id))
                ->where('date', '>=', now()->format('Y-m-d'))
                ->orderBy('date')
                ->first();
    }

    public function render()
    {
        return view('livewire.panel.dashboard');
    }
}
