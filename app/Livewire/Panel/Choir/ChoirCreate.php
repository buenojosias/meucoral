<?php

namespace App\Livewire\Panel\Choir;

use App\Livewire\Forms\ChoirForm;
use App\Livewire\Forms\ChoirProfileForm;
use App\Models\City;
use App\Models\State;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class ChoirCreate extends Component
{
    use WithFileUploads;

    public ChoirForm $form;
    public ChoirProfileForm $profile;

    public $states = [];
    public $cities = [];

    public $state_id;

    #[Validate('image|max:1024')]
    public $logo;

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

        if($this->logo) {
            $this->profile->logo = str_replace('logos/', '', $this->logo->store(path: 'logos'));
        }

        try {
            $user = auth()->user();
            $choir = $user->choirs()->create($this->form->all());
            $choir->profile()->create($this->profile->all());
            $user->selected_choir_id = $choir->id;
            $user->selected_choir_name = $choir->name;
            $user->save();
            session()->flash('success', 'Coral adicionado com sucesso.');
            $this->redirectRoute('panel.choirs.show', $choir, navigate: true);
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
