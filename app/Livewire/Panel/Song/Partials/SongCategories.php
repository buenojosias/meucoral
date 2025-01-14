<?php

namespace App\Livewire\Panel\Song\Partials;

use App\Models\Category;
use Livewire\Attributes\On;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class SongCategories extends Component
{
    use Interactions;

    public $song;
    public $categories = [];

    public function mount($song)
    {
        $this->song = $song;
    }

    public function render()
    {
        $this->categories = $this->song->categories;
        return view('livewire.panel.song.partials.song-categories');
    }

    public function detach($categoryId)
    {
        $this->dialog()
            ->question('Remover categoria?', 'Desvincula a categoria desta música, mas não a exclui.')
            ->confirm('Confirmar', 'detachConfirmed', $categoryId)
            ->cancel('Cancelar')
            ->send();
    }

    public function detachConfirmed($categoryId)
    {
        if ($this->song->categories()->detach($categoryId)) {
            $this->toast()->success('Categoria removida com sucesso.')->send();
        } else {
            $this->toast()->error('Erro ao remover categoria.')->send();
        }
        $this->showAddCategory = false;
    }
}
