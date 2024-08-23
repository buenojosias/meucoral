<?php

namespace App\Livewire\Panel\Event\Partials;

use App\Enums\EventAnswerEnum;
use App\Models\Chorister;
use Livewire\Attributes\Validate;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class EventConfirmations extends Component
{
    use Interactions;

    public $event;
    public $choir;
    public $groupIds = [];
    public $selectedChoristers = [];

    #[Validate('required|in:Sim,Não,Talvez', as: 'resposta')]
    public $answer = "Sim";

    public function mount($event, $groups = null)
    {
        $this->event = $event;

        if (auth()->user()->plan_id >= 3) {
            $this->choir = $event->choir;
            $this->groupIds = $groups->pluck('id')->toArray();
        }
    }

    public function render()
    {
        $choristers = Chorister::query()
            ->select('id', 'name')
            ->where('choir_id', $this->event->choir_id)
            ->whereStatus('Ativo')
            ->when($this->choir?->multigroup, function ($query) {
                $query->whereHas('groups', fn($q) => $q->whereIn('groups.id', $this->groupIds));
            })
            ->with('events', fn($query) => $query->where('event_id', $this->event->id))
            ->orderBy('name')
            ->get();

        $withAnswer = $choristers->filter(function ($member) {
            return $member->events->contains('id', $this->event->id);
        });

        $withoutAnswer = $choristers->filter(function ($member) {
            return !$member->events->contains('id', $this->event->id);
        });

        $withAnswer->transform(function ($member) {
            $member->answer = $member->events->firstWhere('id', $this->event->id)->pivot->answer;
            $member->color = EventAnswerEnum::from($member->answer)->getColor();
            return $member;
        });

        return view('livewire.panel.event.partials.event-confirmations', compact('choristers', 'withAnswer', 'withoutAnswer'));
    }

    public function saveAnswer()
    {
        $this->validate();
        foreach ($this->selectedChoristers as $chorister) {
            $this->event->choristers()->syncWithoutDetaching([
                $chorister => ['answer' => $this->answer, 'answered_by' => 'Manager']
            ]);
        }
        $this->toast()->success('Respostas salvas com sucesso')->send();
        $this->dispatch('refresh-stats');
        $this->reset('selectedChoristers');
    }
}
