<?php

namespace App\Livewire\Panel\Chorister\Partials;

use App\Livewire\Forms\AddressForm;
use App\Models\ChoirProfile;
use App\Models\City;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class ChoristerAddress extends Component
{
    use Interactions;

    public $chorister;

    public $address;

    public $cities = [];

    public ?int $stateId;

    public $modal = false;

    public AddressForm $form;

    public function mount($chorister)
    {
        $this->chorister = $chorister;

        $this->address = $this->chorister->address()->with('city')->first();
        if($this->address)
            $this->form->setAddress($this->address);

            $this->loadCities();
    }

    public function render()
    {
        return view('livewire.panel.chorister.partials.chorister-address');
    }


    public function updatedModal()
    {
        if($this->address)
            $this->form->setAddress($this->address);
    }

    public function loadCities()
    {
        if ($this->address) {
            $this->stateId = $this->address->city->state_id;
        } else {
            $choir = ChoirProfile::where('choir_id', $this->chorister->choir_id)->with('city.state')->first();
            $this->stateId = $choir->city->state_id;
        }

        $this->cities = City::where('state_id', $this->stateId)->get()->toArray();
    }

    public function submit()
    {
        $this->form->validate();

        $this->modal = false;

        if ($this->address) {
            if ($this->address->update($this->form->except('data'))) {
                $this->toast()->success('Endereço atualizado com sucesso.')->send();
            } else {
                $this->toast()->error('Erro ao atualizar endereço.')->send();
            }
        } else {
            if ($this->address = $this->chorister->address()->create($this->form->except('data'))) {
                $this->toast()->success('Endereço cadastrado com sucesso.')->send();
                $this->form->setAddress($this->address);
            } else {
                $this->toast()->error('Erro ao cadastrar endereço.')->send();
            }
        }
    }

    public function remove()
    {
        $this->dialog()
            ->question('Deseja realmente remover o endereço?')
            ->confirm('Confirmar', 'confirmRemove')
            ->cancel('Cancelar')
            ->send();
    }

    public function confirmRemove()
    {
        if($this->address->delete()) {
            $this->reset('address');
            $this->form->reset();
            $this->toast()->success('Endereço removido com sucesso.')->send();
        } else {
            $this->toast()->error('Erro ao remover endereço.')->send();
        }
    }
}
