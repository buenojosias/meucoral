<?php

namespace App\Livewire\Forms;

use App\Models\Lyrics;
use Livewire\Attributes\Validate;
use Livewire\Form;

class LyricsForm extends Form
{
    public ?Lyrics $lyrics;

    #[Validate('required|integer')]
    public $song_id;

    #[Validate('required|string', as: 'letra')]
    public $content;

    public function setLyrics(Lyrics $lyrics)
    {
        $this->lyrics = $lyrics;
        $this->song_id = $lyrics->song_id;
        $this->content = $lyrics->content;
    }
}
