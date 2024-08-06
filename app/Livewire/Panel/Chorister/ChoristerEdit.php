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
        $this->chorister = Chorister::where('choir_id', $choirId)->withTrashed()->findOrFail($this->chorister);
    }

    public function render()
    {
        return view('livewire.panel.chorister.chorister-edit')
            ->title('Edita coralista');
    }

    public function delete()
    {
        $this->chorister->delete();
        session()->flash('status', 'Coralista excluído(a) com sucesso.');
        $this->redirectRoute('panel.choristers.index');
    }

    public function restore()
    {
        $this->chorister->restore();
        $this->toast()->success('Coralista restaurado(a) com sucesso.')->send();
    }

    public function deletePermanently()
    {
        $this->chorister->forceDelete();
        session()->flash('status', 'Coralista excluído(a) permanentemente.');
        $this->redirectRoute('panel.choristers.index');
    }
}
