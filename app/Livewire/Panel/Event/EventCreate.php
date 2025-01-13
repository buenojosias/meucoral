<?php

namespace App\Livewire\Panel\Event;

use App\Livewire\Forms\AddressForm;
use App\Livewire\Forms\EventForm;
use App\Models\City;
use App\Models\Event;
use App\Models\Group;
use App\Models\State;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class EventCreate extends Component
{
    use Interactions;

    public $choirId;
    public $groupable = false;
    public $groups = [];
    public $selectedGroups = [];

    public $addressable = false;
    public $addressForm = false;
    public $states = [];
    public $cities = [];
    public $stateId;

    public EventForm $event;
    public AddressForm $address;

    public function mount()
    {
        $this->choirId = auth()->user()->selected_choir_id;
        $this->groupable = auth()->user()->plan_id >= 3;
        $this->addressable = auth()->user()->plan_id >= 2;

        $this->event->choir_id = $this->choirId;

        if ($this->groupable)
            $this->groups = Group::where('choir_id', $this->choirId)->whereStatus('Ativo')->get();
    }

    public function render()
    {
        return view('livewire.panel.event.event-create')
            ->title('Agendar evento');
    }

    public function updatedAddressForm($value)
    {
        if ($value && !$this->states) {
            $this->states = State::all()->toArray();
            array_unshift($this->states, ['id' => null, 'name' => 'Selecione um estado']);
        }
    }

    public function updatedStateId($value)
    {
        $this->cities = [];

        if ($value)
            $this->cities = City::where('state_id', $value)->get()->toArray();
            array_unshift($this->cities, ['id' => null, 'name' => 'Selecione uma cidade']);
    }

    public function save()
    {
        $this->event->validate();

        if ($this->addressForm)
            $this->address->validate();

        try {
            $event = Event::create($this->event->toArray());
        } catch (\Exception $e) {
            $this->dialog()->error('Erro ao salvar evento')->send();
            dd($e);
        }

        if ($event && $this->addressForm)
            $event->address()->create($this->address->toArray());

        if ($event && $this->selectedGroups)
            $event->groups()->sync($this->selectedGroups);

        session()->flash('status', 'Evento agendado com sucesso.');
        return redirect()->route('panel.events.show', $event);
    }
}
