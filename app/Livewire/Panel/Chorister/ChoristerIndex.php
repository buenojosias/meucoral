<?php

namespace App\Livewire\Panel\Chorister;

use App\Models\Choir;
use App\Models\Chorister;
use Livewire\Component;
use Livewire\WithPagination;

class ChoristerIndex extends Component
{
    use WithPagination;

    public $choirId;
    public $multigroupPlan = false;
    public $isMultigroup = false;
    public $withTrashed = false;

    public function mount()
    {
        $this->choirId = auth()->user()->selected_choir_id;

        if (auth()->user()->plan_id >= 3)
            $this->multigroupPlan = true;

        if ($this->multigroupPlan && $this->choirId) {
            $choir = Choir::findOrFail($this->choirId);
            $this->isMultigroup = $choir->multigroup;
        }
    }

    public function render()
    {
        $choristers = Chorister::query()
            ->when($this->choirId, fn($q) => $q->whereChoirId($this->choirId))
            ->when(!$this->choirId, fn($q) => $q->whereHas('choir')->with('choir'))
            ->when($this->multigroupPlan && $this->isMultigroup, fn($q) => $q->with('groups'))
            ->orderBy('name')
            ->paginate();

        return view('livewire.panel.chorister.chorister-index', compact('choristers'))
            ->title('Coralistas');
    }
}
