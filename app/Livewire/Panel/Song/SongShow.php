<?php

namespace App\Livewire\Panel\Song;

use App\Models\Song;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class SongShow extends Component
{
    use Interactions;

    public $choirId;
    public $song;

    public function mount($song)
    {
        $this->choirId = auth()->user()->selected_choir_id;

        $this->song = Song::query()
            ->where('choir_id', $this->choirId)
            ->where('number', $song)
            ->firstOrFail();
    }

    public function render()
    {
        return view('livewire.panel.song.song-show')
            ->title('Música');
    }

    public function toggleHighlight()
    {
        if ($this->song->update([
            'highlighted' => !$this->song->highlighted
        ])) {
            $message = $this->song->highlighted ? 'destacada' : 'removida dos destaques';
            $this->toast()->success('Música '. $message .' com sucesso!')->send();
        }
    }
}
