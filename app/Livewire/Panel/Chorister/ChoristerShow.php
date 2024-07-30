<?php

namespace App\Livewire\Panel\Chorister;

use Livewire\Component;
use TallStackUi\Traits\Interactions;

class ChoristerShow extends Component
{
    use Interactions;

    public $choirId;

    public $chorister;

    public function mount($chorister)
    {
        $this->choirId = auth()->user()->selected_choir_id;
        $this->chorister = auth()->user()->choristers()
            ->with('choir')
            ->withTrashed()
            ->findOrFail($chorister);

        // if (!$this->choirId || $this->chorister->choir_id != $this->choirId)
        //     $this->chorister->load('choir');
    }

    public function render()
    {
        return view('livewire.panel.chorister.chorister-show')
            ->title($this->chorister->name);
    }

    public function selectChoir()
    {
        $choir = $this->chorister->choir;
        auth()->user()->update(['selected_choir_id' => $choir->id, 'selected_choir_name' => $choir->name]);
        $this->choirId = $this->chorister->choir_id;
        $this->dispatch('updated-choir', choirId: $choir->id, choirName: $choir->name);
        $this->toast()->success('Agora você está interagindo com o ' . $choir->name)->send();
    }
}
