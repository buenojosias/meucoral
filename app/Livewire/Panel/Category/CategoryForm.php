<?php

namespace App\Livewire\Panel\Category;

use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class CategoryForm extends Component
{
    use Interactions;

    public $choirId;
    public $modal = false;
    public $categoryId;
    public $categoryName;
    public $categorySlug;

    public function mount($choirId)
    {
        $this->choirId = $choirId;
    }

    #[On('openModal')]
    public function openModal($categoryId = null)
    {
        $this->categoryId = $categoryId;
        if ($categoryId) {
            $category = Category::where('choir_id', $this->choirId)->find($categoryId);
            $this->categoryName = $category->name;
        } else {
            $this->categoryName = null;
        }
        $this->modal = true;
    }

    protected $validationAttributes = [
        'categoryName' => 'nome'
    ];

    public function save()
    {
        if ($this->categoryId) {
            $category = Category::where('choir_id', $this->choirId)->find($this->categoryId);
            $this->validate([
                'categoryName' => 'required|string|min:3|max:100|unique:categories,name,'.($this->choirId ?? 'NULL') . ',id,choir_id,' . $this->choirId,
            ]);
            $saved = $category->update([
                'name' => $this->categoryName,
                'slug' => Str::slug($this->categoryName, '-'),
            ]);
        } else {
            $this->validate([
                'categoryName' => 'required|string|min:3|max:100|unique:categories,name,NULL,id,choir_id,'.$this->choirId,
            ]);
            $saved = Category::create([
                'choir_id' => $this->choirId,
                'name' => $this->categoryName,
                'slug' => Str::slug($this->categoryName, '-'),
            ]);
        }

        if ($saved) {
            $this->dispatch('refresh-categories');
            $this->toast()->success('Categoria salva com sucesso!')->send();
            $this->categoryId = null;
            $this->categoryName = null;
        } else {
            $this->toast()->error('Erro ao salvar a categoria.')->send();
        }
        $this->modal = false;
    }

    public function render()
    {
        return view('livewire.panel.category.category-form');
    }
}
