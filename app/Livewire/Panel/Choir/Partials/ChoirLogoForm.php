<?php

namespace App\Livewire\Panel\Choir\Partials;

use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use TallStackUi\Traits\Interactions;

class ChoirLogoForm extends Component
{
    use WithFileUploads;

    use Interactions;

    public $profile;

    #[Validate('image|max:1024', as: 'logo')]
    public $logo;

    public function mount($choir)
    {
        $this->profile = $choir->profile;
    }

    public function render()
    {
        return view('livewire.panel.choir.partials.choir-logo-form');
    }

    public function updatedLogo()
    {
        $this->validate();
        $logo = str_replace('logos/', '', $this->logo->store(path: 'logos'));
        $this->remove($logo);
    }

    public function remove($logo = null)
    {
        if ($this->profile->logo && Storage::exists('logos/' . $this->profile->logo))
            Storage::delete('logos/' . $this->profile->logo);
        $this->profile->logo = $logo;
        $this->profile->save();
        $this->toast()->success('Logo atualizada com sucesso.')->send();
        $this->reset('logo');
    }
}
