<?php

namespace App\Livewire\Admin\Choir;

use App\Models\Choir;
use Livewire\Component;
use Livewire\WithPagination;

class ChoirIndex extends Component
{
    use WithPagination;

    public function render()
    {
        $choirs = Choir::withoutGlobalScopes()
            ->with('user')
            ->withCount('choristers')
            ->withTrashed()
            ->paginate();

        return view('livewire.admin.choir.choir-index', compact('choirs'))->title('Corais');
    }
}
