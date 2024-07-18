<?php

namespace App\Livewire\Panel\Choir;

use App\Models\Choir;
use Livewire\Attributes\Js;
use Livewire\Component;

class ChoirShow extends Component
{
    public $choir;

    public function mount($choir)
    {
        $this->choir = Choir::withTrashed()->with('profile')->findOrFail($choir);
    }

    public function render()
    {
        return view('livewire.panel.choir.choir-show');
    }

    public function selectChoir()
    {
        $user = auth()->user();
        $user->selected_choir_id = $this->choir->id;
        $user->selected_choir_name = $this->choir->name;
        $user->save();
    }

}
