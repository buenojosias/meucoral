<?php

namespace App\Livewire\Panel\Choir;

use App\Models\Choir;
use Livewire\Component;

class ListChoir extends Component
{
    public function render()
    {
        $choirs = Choir::get();

        return view('livewire.panel.choir.list-choir', compact('choirs'))
            ->title('Meus corais');
    }
}
