<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserIndex extends Component
{
    use WithPagination;

    public function render()
    {
        $users = User::query()
            ->where('id', '>', 1)
            ->withCount(['choirs' => function ($query) {
                $query->withoutGlobalScopes();
            }])
            ->withTrashed()
            ->paginate();

        return view('livewire.admin.user.user-index', compact('users'))->title('Usuários');
    }
}
