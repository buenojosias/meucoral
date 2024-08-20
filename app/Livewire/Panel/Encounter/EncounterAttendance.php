<?php

namespace App\Livewire\Panel\Encounter;

use App\Models\Chorister;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class EncounterAttendance extends Component
{
    use Interactions;

    public $encounter;
    public $attendance = [];

    public function mount($encounter)
    {
        $this->encounter = $encounter;
    }

    public function render()
    {
        $records = [];
        $chorister = [];

        if ($this->encounter->has_attendance)
            $records = $this->encounter->choristers()->orderBy('name')->get();

        $choristers = Chorister::query()
            ->whereDate('registration_date', '<=', $this->encounter->date)
            ->where('choir_id', $this->encounter->choir_id)
            ->when($this->encounter->group_id, function ($q) {
                $q->whereHas('activeGroups', fn($q) => $q->where('group_id', $this->encounter->group_id));
            })
            ->when($records, fn($q) => $q->whereNotIn('id', $records->pluck('id')))
            ->orderBy('name')
            ->get();

        return view('livewire.panel.encounter.encounter-attendance', compact('records', 'choristers'));
    }

    public function submit()
    {
        $this->validate([
            'attendance' => 'required|array',
            'attendance.*.attendance' => 'in:P,F,J',
            'attendance.*.chorister_id' => 'exists:choristers,id'
        ]);

        foreach ($this->attendance as $key => $record) {
            $this->encounter->choristers()->syncWithoutDetaching([
                $key => ['attendance' => $record]
            ]);
        }

        $this->encounter->has_attendance = true;
        $this->encounter->save();

        $this->attendance = [];

        $this->dispatch('refresh-stats');
        $this->toast()->success('Chamada salva com sucesso.')->send();
    }
}
