<?php

namespace App\Livewire\Panel;

use App\Models\Choir;
use App\Models\Encounter;
use App\Models\Event;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class Dashboard extends Component
{
    public $firstLogin = false;
    public ?int $planId;
    public ?int $choristersCount = 0;
    public ?int $choirsCount = 0;
    public ?int $groupsCount = 0;

    public $nextEncounter;
    public $nextEvent;

    public function mount()
    {
        $first = Cache::get(auth()->user()->id);
        if ($first) {
            $this->firstLogin = true;
        }

        $this->choristersCount = auth()->user()->choristers()->whereStatus('Ativo')->count();
        $this->choirsCount = Choir::count();
        $this->groupsCount = auth()->user()->groups()->whereStatus('Ativo')->count();

        $this->nextEncounter = Encounter::query()
            ->whereHas('choir', fn($q) => $q->where('user_id', auth()->user()->id))
            ->where('date', '>=', now()->format('Y-m-d'))
            ->orderBy('date')
            ->first();

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

    public function removeFirstLogin()
    {
        Cache::forget(auth()->user()->id);
        $this->firstLogin = false;
    }
}
