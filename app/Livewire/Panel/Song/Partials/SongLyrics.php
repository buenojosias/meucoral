<?php

namespace App\Livewire\Panel\Song\Partials;

use App\Livewire\Forms\LyricsForm;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class SongLyrics extends Component
{
    use Interactions;

    public $song;
    public $lyrics;
    public $editing = false;
    public LyricsForm $form;

    public function mount($song)
    {
        $this->song = $song;
        $this->lyrics = $song->lyrics;
        if ($this->lyrics) {
            $this->form->setLyrics($this->lyrics);
        } else {
            $this->form->song_id = $this->song->id;
        }
    }

    public function render()
    {
        return view('livewire.panel.song.partials.song-lyrics');
    }

    public function toggleForm(bool $show)
    {
        $this->editing = $show;
        $this->dispatch('load-form')->self();
    }

    public function edit()
    {
        $this->editing = true;
    }

    public function submit()
    {
        $this->form->validate();

        $saved = $this->song->lyrics()->updateOrCreate(
            ['song_id' => $this->song->id],
            ['content' => $this->form->content]
        );

        if ($saved) {
            $this->toast()->success('Letra salva com sucesso!')->send();
            $this->editing = false;
        }
    }
}
