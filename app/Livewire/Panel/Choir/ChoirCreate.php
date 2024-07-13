<?php

namespace App\Livewire\Panel\Choir;

use App\Livewire\Forms\ChoirForm;
use App\Livewire\Forms\ChoirProfileForm;
use App\Models\City;
use App\Models\State;
use Livewire\Component;

class ChoirCreate extends Component
{
    public ChoirForm $form;
    public ChoirProfileForm $profile;

    public $states = [];
    public $cities = [];

    public $state_id;


    public function mount()
    {
        $this->states = State::all();
    }

    public function updatedStateId()
    {
        $this->cities = City::where('state_id', $this->state_id)->get()->toArray();
    }

    public function save()
    {
        $this->validate();

        try {
            $choir = auth()->user()->choirs()->create($this->form->all());
            $choir->profile()->create($this->profile->all());
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function render()
    {
        return view('livewire.panel.choir.choir-create')
            ->title('Cadastrar coral');
    }
}
