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

    // public $canCreate;

    public $states = [];
    public $cities = [];

    public $state_id;

    #[Validate('nullable|image|max:1024')]
    public $logo;

    public function mount()
    {
        //
    }

    public function render()
    {
        return view('livewire.panel.choir.choir-create')
            ->title('Cadastrar coral');
    }

    // public function canCreateChoir()
    // {
    //     $user = auth()->user();

    //     if ($user->plan_id >= 3)
    //         return true;

    //     $choirs_count = $user->choirs()->withTrashed()->count();
    //     $this->form->multigroup = false;

    //     if ($user->plan_id === 2 && $choirs_count < 3)
    //         return true;

    //     if ($user->plan_id === 1 && $choirs_count < 1)
    //         return true;

    //     return false;
    // }

    public function updatedStateId()
    {
        $this->cities = City::where('state_id', $this->state_id)->orderBy('name', 'asc')->get()->toArray();
    }

    public function save()
    {
        $this->validate();

        if ($this->logo) {
            $this->profile->logo = str_replace('logos/', '', $this->logo->store(path: 'logos'));
        }

        try {
            $user = auth()->user();
            $choir = $user->choirs()->create($this->form->all());
            $choir->profile()->create($this->profile->all());
            $user->selected_choir_id = $choir->id;
            $user->selected_choir_name = $choir->name;
            $user->save();
            session()->flash('status', 'Coral adicionado com sucesso.');
            $this->redirectRoute('panel.choirs.show', $choir, navigate: true);
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
