<?php

namespace App\Livewire\Panel\Choir;

use App\Models\Choir;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class ChoirEdit extends Component
{
    use Interactions;

    public $choir;

    public function mount($choir)
    {
        $this->choir = Choir::withTrashed()->findOrFail($choir);
    }

    public function render()
    {
        return view('livewire.panel.choir.choir-edit')
            ->title('Editar coral');
    }
}
