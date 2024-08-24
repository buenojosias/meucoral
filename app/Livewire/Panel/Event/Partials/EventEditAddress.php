<?php

namespace App\Livewire\Panel\Event\Partials;

use App\Livewire\Forms\AddressForm;
use App\Models\City;
use App\Models\State;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class EventEditAddress extends Component
{
    use Interactions;

    public AddressForm $form;
    public $event;
    public $address;
    public $states = [];
    public $cities = [];
    public $stateId;

    public function mount($event)
    {
        $this->event = $event;
        $this->address = $event->address()
            ->join('cities', 'addresses.city_id', '=', 'cities.id')
            ->join('states', 'cities.state_id', '=', 'states.id')
            ->select('addresses.*', 'cities.id as city_id', 'states.id as state_id')
            ->first();

        $this->stateId = $this->address->state_id ?? null;

        $this->loadStates();
        $this->loadCities();

        if ($this->address)
            $this->form->fill($this->address);
    }

    public function render()
    {
        return view('livewire.panel.event.partials.event-edit-address');
    }

    public function loadStates()
    {
        if (!$this->states) {
            $this->states = State::all()->toArray();
            array_unshift($this->states, ['id' => null, 'name' => 'Selecione um estado']);
        }
    }

    public function loadCities()
    {
        if ($this->stateId) {
            $this->cities = City::where('state_id', $this->stateId)->get()->toArray();
            array_unshift($this->cities, ['id' => null, 'name' => 'Selecione uma cidade']);
        }
    }

    public function updatedStateId($value)
    {
        $this->form->city_id = null;
        $this->cities = [];

        if ($value) {
            $this->cities = City::where('state_id', $value)->get()->toArray();
            array_unshift($this->cities, ['id' => null, 'name' => 'Selecione uma cidade']);
        }
    }

    public function save()
    {
        $this->validate();

        if ($this->address) {
            $saved = $this->address->update($this->form->toArray());
        } else {
            $saved = $this->event->address()->create($this->form->toArray());
            $this->address = $saved;
        }

        if ($saved)
            $this->toast()->success('Endereço salvo com sucesso.')->send();
    }

    public function deleteAddress()
    {
        $this->dialog()
            ->question('Deseja realmente excluir o endereço?')
            ->confirm('Sim', 'confirmDelete')
            ->cancel('Cancelar')
            ->send();
    }

    public function confirmDelete()
    {
        if ($this->address->delete()) {
            $this->address = null;
            $this->form->reset();
            $this->toast()->success('Endereço excluído com sucesso.')->send();
        }
    }
}
