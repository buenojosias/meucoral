<?php

namespace App\Livewire\Panel\Encounter;

use App\Models\Encounter;
use Livewire\Attributes\On;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class EncounterShow extends Component
{
    use Interactions;

    public $groupable = false;
    public $choirId;
    public $encounter;
    public $attendance;

    public function mount($encounter)
    {
        $this->groupable = auth()->user()->plan_id >= 3;

        $this->choirId = auth()->user()->selected_choir_id;
        $this->encounter = Encounter::query()
            ->whereHas('choir', function ($query) {
                $query->where('user_id', auth()->user()->id);
            })
            ->when($this->groupable, fn($q) => $q->with('group'))
            ->withTrashed()
            ->findOrFail($encounter);

        if(!$this->choirId || $this->encounter->choir_id != $this->choirId) {
            $this->encounter->load('choir');
        }

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
        return view('livewire.panel.encounter.encounter-show')
            ->title('Ensaio');
    }
}
