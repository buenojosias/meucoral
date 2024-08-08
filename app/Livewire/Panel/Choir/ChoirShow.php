<?php

namespace App\Livewire\Panel\Choir;

use App\Models\Choir;
use Livewire\Attributes\Js;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class ChoirShow extends Component
{
    use Interactions;

    public $choir;

    public function mount($choir)
    {
        $this->choir = Choir::withTrashed()->with('profile')->withCount('choristers')->findOrFail($choir);
    }

    public function render()
    {
        return view('livewire.panel.choir.choir-show')
            ->title('Coral');
    }

    public function selectChoir()
    {
        $user = auth()->user();
        $user->selected_choir_id = $this->choir->id;
        $user->selected_choir_name = $this->choir->name;
        $user->save();

        $this->toast()
            ->success('Coral selecionado para interação.')
            ->send();
    }

}
