<?php

namespace App\Livewire\Panel\Category;

use App\Models\Category;
use Livewire\Attributes\On;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class CategoryIndex extends Component
{
    use Interactions;

    public $choirId;
    public $categories;

    public function mount()
    {
        $this->choirId = auth()->user()->selected_choir_id;
        $this->loadCategories();
    }

    #[On('refresh-categories')]
    public function loadCategories()
    {
        $this->categories = Category::query()
            ->withCount('songs')
            ->where('choir_id', $this->choirId)->get()
            ->sortBy('name');
    }

    public function render()
    {
        return view('livewire.panel.category.category-index');
    }

    public function delete($categoryId)
    {
        $this->dialog()
            ->question('Excluir categoria?', 'As músicas relacionadas a ela não serão excluídas.')
            ->confirm('Confirmar', 'deleteConfirmed', $categoryId)
            ->cancel('Cancelar')
            ->send();
    }

    public function deleteConfirmed($categoryId)
    {
        $category = Category::where('choir_id', $this->choirId)->find($categoryId);
        if ($category && $category->delete()) {
            $this->toast()->success('Categoria excluída com sucesso.')->send();
            $this->loadCategories();
        } else {
            $this->toast()->error('Erro ao excluir categoria.')->send();
        }
    }
}
