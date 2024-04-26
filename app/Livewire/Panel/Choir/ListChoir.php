<?php

namespace App\Livewire\Panel\Choir;

use Livewire\Component;

class ListChoir extends Component
{
    public function render()
    {
        return view('livewire.panel.choir.list-choir')->title('Meus corais');
    }
}
