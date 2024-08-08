<?php

namespace App\Livewire\Panel;

use App\Models\Choir;
use Livewire\Component;

class Dashboard extends Component
{
    public ?int $planId;

    public ?int $choristersCount = 0;
    public ?int $choirsCount = 0;
    public ?int $groupsCount = 0;

    public function mount()
    {
        $this->planId = auth()->user()->plan_id;
        $this->choristersCount = auth()->user()->choristers()->whereStatus('Ativo')->count();
        $this->choirsCount = Choir::count();
        if ($this->planId) {
            $this->groupsCount = auth()->user()->groups()->whereStatus('Ativo')->count();
        }
    }

    public function render()
    {
        return view('livewire.panel.dashboard');
    }
}
