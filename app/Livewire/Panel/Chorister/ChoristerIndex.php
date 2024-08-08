<?php

namespace App\Livewire\Panel\Chorister;

use App\Models\Choir;
use App\Models\Chorister;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class ChoristerIndex extends Component
{
    use WithPagination;

    public $choirId;
    public $multigroupPlan = false;
    public $isMultigroup = false;
    public $withTrashed = false;

    #[Url]
    public ?string $status = null;
    public ?string $search = null;

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
            ->where('name', 'like', "%$this->search%")
            ->when($this->status, fn($q) => $q->whereStatus($this->status))
            ->when($this->choirId, fn($q) => $q->whereChoirId($this->choirId))
            ->when(!$this->choirId, fn($q) => $q->whereHas('choir')->with('choir'))
            ->when($this->multigroupPlan && $this->isMultigroup, fn($q) => $q->with('activeGroups'))
            ->when($this->withTrashed, fn($q) => $q->withTrashed())
            ->orderBy('name')
            ->paginate();

        return view('livewire.panel.chorister.chorister-index', compact('choristers'))
            ->title('Coralistas');
    }
}
