<?php

namespace App\Livewire\Panel\Choir;

use App\Models\Choir;
use App\Services\LimitService;
use App\Services\ResourceService;
use Livewire\Component;
use Redirect;
use TallStackUi\Traits\Interactions;

class ChoirIndex extends Component
{
    use Interactions;

    public ?string $status = null;

    public $withTrashed = false;

    public function mount()
    {
        $checkResource = ResourceService::checkResource('choirs');
        if (isset($checkResource['error'])) {
            return Redirect::route('panel.resource-attempt', ['resource' => $checkResource['resourceId'], 'error' => 'unavailable']);
        }
        $checkLimit = LimitService::checkLimit($checkResource);
        if (isset($checkLimit['error'])) {
            return Redirect::route('panel.resource-attempt', ['resource' => $checkLimit['resourceId'], 'error' => 'limit']);
        }
    }

    public function render()
    {
        $choirs = Choir::with('profile')
            ->when($this->withTrashed, fn($q) => $q->withTrashed()->orderBy('deleted_at'))
            ->when($this->status, fn($q) => $q->where('status', $this->status))
            ->withCount('choristers')
            ->get();

        return view('livewire.panel.choir.choir-index', compact('choirs'))
            ->title('Meus corais');
    }

    public function selectChoir($id)
    {
        $choir = auth()->user()->choirs()->find($id);

        if ($choir) {
            $user = auth()->user();
            $user->selected_choir_id = $choir->id;
            $user->selected_choir_name = $choir->name;
            $user->save();
            $this->toast()->success('Interagindo agora com o '. $choir->name.'.')->send();
        } else {
            $this->toast()->error('Não é possível interagir com o coral selecionado.')->send();
        }
    }
}
