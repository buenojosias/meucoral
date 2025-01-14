<?php

namespace App\Livewire\Panel\Song;

use App\Livewire\Forms\SongForm;
use App\Models\Category;
use App\Models\Song;
use Livewire\Component;

class SongCreate extends Component
{
    public $choirId;
    public $categories = [];
    public $selectedCategories = [];
    public SongForm $form;

    public function mount()
    {
        $this->choirId = auth()->user()->selected_choir_id;
        if (!$this->choirId) {
            return false;
        }

        $lastSong = Song::where('choir_id', $this->choirId)->orderBy('number', 'desc')->first();
        if ($lastSong) {
            $this->form->number = $lastSong->number + 1;
        } else {
            $this->form->number = 1;
        }

        $this->categories = Category::where('choir_id', $this->choirId)->get();
    }

    public function render()
    {
        return view('livewire.panel.song.song-create');
    }

    protected $validationAttributes = [
        'form.number' => 'número'
    ];

    public function submit()
    {
        $this->form->choir_id = $this->choirId;

        $this->validate([
            'form.number' => 'required|integer|min:1|unique:songs,number,NULL,id,choir_id,'.$this->form->choir_id,
        ]);

        $this->form->validate();

        $song = Song::create($this->form->toArray());

        if($song && count($this->selectedCategories) > 0) {
            $song->categories()->sync($this->selectedCategories);
        }

        session()->flash('status', 'Música adicionada com sucesso!');
        return redirect()->route('panel.songs.show', $song->number);
    }
}
