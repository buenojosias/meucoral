<?php

namespace App\Livewire\Panel\Encounter;

use App\Models\Encounter;
use App\Models\Group;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class EncounterIndex extends Component
{
    use WithPagination;

    public $choir;
    public $groupable = false;

    #[Url(as: 'grupo')]
    public $groupId = '';

    public $groups = [];

    #[Url(as: 'inicio')]
    public $minDate = '';

    #[Url(as: 'fim')]
    public $maxDate = '';

    #[Url(as: 'periodo')]
    public $period = '';

    #[Url(as: 'chamada')]
    public ?bool $attendance = null;

    public $filterModal = false;

    public function mount()
    {
        $this->choir = auth()->user()->selectedChoir()->first();

        if ($this->choir) {
            $this->groupable = $this->choir->multigroup;
        }
    }

    #[On('load-groups')]
    public function loadGroups()
    {
        if ($this->groups || $this->groupable === false)
            return;

        $this->groups = Group::query()
            ->when($this->choir->id, fn($query) => $query->where('choir_id', $this->choir->id))
            ->when(!$this->choir->id, function ($query) {
                $query->whereHas('choir', function ($query) {
                    $query->where('user_id', auth()->user()->id);
                });
            })
            ->get();
    }

    public function render()
    {
        $encounters = [];

        if ($this->choir) {
            $encounters = Encounter::query()
                ->where('choir_id', $this->choir->id)
                ->when($this->groupable, fn($query) => $query->with('group'))
                ->when($this->groupId, fn($query) => $query->where('group_id', $this->groupId))
                ->when($this->minDate, fn($query) => $query->whereDate('date', '>=', $this->minDate))
                ->when($this->maxDate, fn($query) => $query->whereDate('date', '<=', $this->maxDate))
                ->when($this->period === 'proximos', fn($query) => $query->where('date', '>=', now()))
                ->when($this->period === 'realizados', fn($query) => $query->where('date', '<', now()))
                ->when($this->attendance, fn($query) => $query->where('has_attendance', $this->attendance))
                ->orderByDesc('date')
                ->paginate();
        }

        return view('livewire.panel.encounter.encounter-index', compact('encounters'))
            ->title('Ensaios');
    }

    // public function updated($attribute)
    // {
    //     if (in_array($attribute, ['groupId', 'minDate', 'maxDate', 'period', 'attendance']))
    //         $this->resetPage();
    // }

    public function applyFilter()
    {
        $this->render();
        $this->resetPage();
        $this->filterModal = false;
    }

    public function clear() {
        $this->reset(['groupId', 'minDate', 'maxDate', 'period', 'attendance']);
        $this->render();
        $this->resetPage();
        $this->filterModal = false;
    }
}
