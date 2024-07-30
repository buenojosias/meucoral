<?php

namespace App\Livewire\Partials;

use Livewire\Attributes\On;
use Livewire\Component;

class HeaderChoir extends Component
{
    public ?int $choirId = null;
    public ?string $choirName = null;

    #[On('updated-choir')]
    public function updateChoir($choirId, $choirName)
    {
        $this->choirId = $choirId;
        $this->choirName = $choirName;
    }

    public function render()
    {
        $this->choirId = auth()->user()->selected_choir_id ?? null;
        $this->choirName = auth()->user()->selected_choir_name ?? null;

        return view('livewire.partials.header-choir');
    }
}
