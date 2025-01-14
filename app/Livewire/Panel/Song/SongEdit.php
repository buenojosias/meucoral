<?php

namespace App\Livewire\Panel\Song;

use App\Livewire\Forms\SongForm;
use App\Models\Category;
use App\Models\Song;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class SongEdit extends Component
{
    use Interactions;

    public $choirId;
    public $song;
    public $categories = [];
    public $selectedCategories = [];

    public SongForm $form;

    public function mount($song)
    {
        $this->choirId = auth()->user()->selected_choir_id;

        $this->song = Song::query()
            ->where('choir_id', $this->choirId)
            ->where('number', $song)
            ->firstOrFail();

        $this->categories = Category::where('choir_id', $this->choirId)->get();
        $this->selectedCategories = $this->song->categories()->pluck('categories.id')->toArray();

        $this->form->setSong($this->song);
    }

    public function render()
    {
        return view('livewire.panel.song.song-edit');
    }

    protected $validationAttributes = [
        'form.number' => 'número'
    ];

    public function submit()
    {
        $this->validate([
            'form.number' => 'required|integer|min:1|unique:songs,number,' . ($this->song->id ?? 'NULL') . ',id,choir_id,' . $this->choirId,
        ]);

        $this->validate();
        $this->song->update(
            $this->form->all()
        );
        $this->song->categories()->sync($this->selectedCategories);
        $this->toast()->success('Alterações salvas com sucesso.')->send();
    }
}
