<?php

namespace App\Livewire\Panel\Encounter;

use App\Models\Encounter;
use Livewire\Attributes\On;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class EncounterShow extends Component
{
    use Interactions;

    public $choirId;
    public $encounter;
    public $showAttendance = false;

    public function mount($encounter)
    {
        $this->choirId = auth()->user()->selected_choir_id;
        $this->encounter = Encounter::query()
            ->whereHas('choir', function ($query) {
                $query->where('user_id', auth()->user()->id);
            })
            ->with('group')
            // ->when($this->groupable, fn($q) => $q->with('group'))
            ->withTrashed()
            ->findOrFail($encounter);

        if(!$this->choirId || $this->encounter->choir_id != $this->choirId) {
            $this->encounter->load('choir');
        }
    }

    #[On('load-attendance')]
    public function loadAttendance()
    {
        $this->showAttendance = true;
    }

    public function render()
    {
        return view('livewire.panel.encounter.encounter-show')
            ->title('Ensaio');
    }
}
