<?php

namespace App\Livewire\Panel\Encounter\Partials;

use Livewire\Attributes\On;
use Livewire\Component;

class EncounterStats extends Component
{
    public $encounter;
    public $attendance;
    public $showButton = true;

    public function mount($encounter)
    {
        $this->encounter = $encounter;
        $this->attendance = [
            'presences' => 0,
            'absences' => 0,
            'justified' => 0,
        ];
        $this->loadStats();
    }

    #[On('refresh-stats')]
    public function loadStats()
    {
        if ($this->encounter->has_attendance)
        {
            $choristers = $this->encounter->choristers()->get();

            if (!$choristers)
                return;

            $this->attendance['presences'] = $choristers->where('pivot.attendance', 'P')->count();
            $this->attendance['absences'] = $choristers->where('pivot.attendance', 'F')->count();
            $this->attendance['justified'] = $choristers->where('pivot.attendance', 'J')->count();
        }
    }

    public function render()
    {
        return view('livewire.panel.encounter.partials.encounter-stats');
    }
}
