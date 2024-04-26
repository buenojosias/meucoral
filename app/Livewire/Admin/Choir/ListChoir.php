<?php

namespace App\Livewire\Admin\Choir;

use Livewire\Component;

class ListChoir extends Component
{
    public function render()
    {
        return view('livewire.admin.choir.list-choir')->title('Corais');
    }
}
