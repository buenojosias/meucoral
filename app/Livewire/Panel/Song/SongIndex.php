<?php

namespace App\Livewire\Panel\Song;

use App\Models\Category;
use App\Models\Song;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class SongIndex extends Component
{
    use WithPagination;

    public $songable = true;
    public $choirId;

    public $categories = [];
    public $themes = [];

    #[Url(as: 'categoria', except: null )]
    public $selectedCategory = null;

    #[Url(as: 'destacadas')]
    public $highlighted = false;

    #[Url(as: 'sem-categoria')]
    public $withoutCategory = false;

    public $slide = false;

    public function mount()
    {
        // $this->songable = auth()->user()->plan_id >= 3;
        // if (!$this->songable)
        //     abort(403, 'Seu plano não permite acessar essa funcionalidade.');

        $this->choirId = auth()->user()->selected_choir_id;
        if (!$this->choirId)
            return false;

        $this->categories = Category::query()->where('choir_id', $this->choirId)->get();
    }

    public function render()
    {
        $songs = [];
        if ($this->choirId) {
            $songs = Song::query()
                ->where('choir_id', $this->choirId)
                ->when($this->selectedCategory, function ($query) {
                        $query->whereHas('categories', fn ($query) => $query->where('category_id', $this->selectedCategory));
                })
                ->when($this->highlighted, fn ($query) => $query->where('highlighted', true))
                ->when($this->withoutCategory, fn ($query) => $query->doesntHave('categories'))
                ->when(!$this->withoutCategory, fn ($query) => $query->with('categories'))
                ->orderBy('number')
                ->paginate();
        }

        return view('livewire.panel.song.song-index', compact('songs'));
    }

    public function resetCategory()
    {
        $this->selectedCategory = null;
    }
}
