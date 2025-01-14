<?php

namespace App\Livewire\Forms;

use App\Models\Song;
use Livewire\Attributes\Validate;
use Livewire\Form;

class SongForm extends Form
{
    public ?Song $song;

    #[Validate('required|integer')]
    public $choir_id;

    #[Validate('required|integer|min:1')]
    public int $number;

    #[Validate('required|string|min:3')]
    public $title;

    #[Validate('nullable|string')]
    public $author;

    public function setSong(Song $song)
    {
        $this->song = $song;
        $this->choir_id = $song->choir_id;
        $this->number = $song->number;
        $this->title = $song->title;
        $this->author = $song->author;
    }
}
