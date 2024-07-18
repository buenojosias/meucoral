<?php

namespace App\Livewire\Panel\Choir\Partials;

use App\Livewire\Forms\ChoirProfileForm;
use App\Models\Choir;
use App\Models\City;
use App\Models\State;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class ChoirProfileEdit extends Component
{
    use Interactions;

    public $profile;

    public $states = [];
    public $cities = [];

    public $state_id;

    public ChoirProfileForm $form;

    public function mount(Choir $choir)
    {
        $this->states = State::all();
        $this->profile = $choir->profile;
        $this->cities = City::where('id', $this->profile->city_id)->get();
        $this->state_id = $this->cities->first()->state_id;
        $this->form->setProfile($this->profile);
    }

    public function render()
    {
        return view('livewire.panel.choir.partials.choir-profile-edit');
    }

    public function updatedStateId()
    {
        $this->cities = City::where('state_id', $this->state_id)->get()->toArray();
    }

    public function save()
    {
        $this->validate();
        $this->profile->update(
            $this->form->all()
        );
        $this->toast()->success('Alterações salvas com sucesso.')->send();
    }

}
