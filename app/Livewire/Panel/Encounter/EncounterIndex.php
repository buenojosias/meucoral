<?php

namespace App\Livewire\Panel\Encounter;

use App\Models\Encounter;
use App\Models\Group;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class EncounterIndex extends Component
{
    use WithPagination;

    public bool $encountrable = false;
    public bool $groupable = false;
    public $choirId;

    #[Url(as: 'grupo')]
    public $groupId = '';

    public $groups = [];

    #[Url(as: 'inicio')]
    public $startDate = '';

    #[Url(as: 'fim')]
    public $endDate = '';

    #[Url(as: 'periodo')]
    public $period = '';

    #[Url(as: 'chamada')]
    public ?bool $attendance = null;

    public $filterModal = false;

    public function mount()
    {
        $this->encountrable = auth()->user()->plan_id >= 2;
        if (!$this->encountrable)
            abort(403, 'Seu plano não tem suporte a essa funcionalidade.');

        $this->choirId = auth()->user()->selected_choir_id;
        $this->groupable = auth()->user()->plan_id >= 3;

        $this->loadGroups();
    }

    public function loadGroups()
    {
        if (!$this->groupable)
            return;

        $this->groups = Group::query()
            ->when($this->choirId, fn($query) => $query->where('choir_id', $this->choirId))
            ->when(!$this->choirId, function ($query) {
                $query->whereHas('choir', function ($query) {
                    $query->where('user_id', auth()->user()->id);
                });
            })
            ->get();
    }

    public function render()
    {
        $encounters = Encounter::query()
            ->when($this->choirId, fn($query) => $query->where('choir_id', $this->choirId))
            ->when(!$this->choirId, function ($query) {
                $query->with('choir')->whereHas('choir', function ($query) {
                    $query->where('user_id', auth()->user()->id);
                });
            })
            ->when($this->groupable, fn($query) => $query->with('group'))
            ->when($this->groupId, fn($query) => $query->where('group_id', $this->groupId))
            ->when($this->startDate, fn($query) => $query->whereDate('date', '>=', $this->startDate))
            ->when($this->endDate, fn($query) => $query->whereDate('date', '<=', $this->endDate))
            ->when($this->period === 'proximos', fn($query) => $query->where('date', '>=', now()))
            ->when($this->period === 'realizados', fn($query) => $query->where('date', '<', now()))
            ->when($this->attendance !== null, fn($query) => $query->where('has_attendance', $this->attendance))
            ->orderByDesc('date')
            ->paginate();

        return view('livewire.panel.encounter.encounter-index', compact('encounters'))
            ->title('Ensaios');
    }

    // public function updated($attribute)
    // {
    //     if (in_array($attribute, ['groupId', 'startDate', 'endDate', 'period', 'attendance']))
    //         $this->resetPage();
    // }

    public function applyFilter()
    {
        $this->render();
        $this->resetPage();
        $this->filterModal = false;
    }

    public function clear() {
        $this->reset(['groupId', 'startDate', 'endDate', 'period', 'attendance']);
        $this->render();
        $this->resetPage();
        $this->filterModal = false;
    }
}
