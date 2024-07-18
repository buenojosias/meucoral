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
        return view('livewire.panel.choir.choir-edit');
    }

    public function delete()
    {
        $this->choir->delete();
        $this->toast()->success('Solicitação de exclusão do coral realizadas com sucesso.')->send();
    }

    public function restore()
    {
        $this->choir->restore();
        $this->toast()->success('Coral restaurado com sucesso.')->send();
    }

    public function deletePermanently()
    {
        $this->choir->forceDelete();
        $this->toast()
            ->success('O coral foi deletado permanentemente.')
            ->flash()
            ->send();

        return $this->redirect(route('panel.choirs.index'));
    }

    // public function resetSelected()
    // {
    //     $user = auth()->user();
    //     if ($user->selected_choir_id === $this->choir->id) {
    //         $user->selected_choir_id = null;
    //         $user->selected_choir_name = null;
    //         $user->save();
    //     }
    // }
}
