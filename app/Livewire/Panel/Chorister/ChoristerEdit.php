<?php

namespace App\Livewire\Panel\Chorister;

use App\Models\Chorister;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class ChoristerEdit extends Component
{
    use Interactions;

    public $chorister;

    public function mount($chorister)
    {
        $choirId = auth()->user()->selected_choir_id;
        $this->chorister = Chorister::where('choir_id', $choirId)->withTrashed()->findOrFail($chorister);
    }

    public function render()
    {
        return view('livewire.panel.chorister.chorister-edit')
            ->title('Editar coralista');
    }
}
