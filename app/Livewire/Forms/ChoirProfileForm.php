<?php

namespace App\Livewire\Forms;

use App\Models\ChoirProfile;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ChoirProfileForm extends Form
{
    public ?ChoirProfile $profile;

    #[Validate('required|integer', as: 'cidade')]
    public $city_id = '';

    #[Validate('nullable|string', as: 'instituição')]
    public $institution = '';

    #[Validate('nullable|string', as: 'descrição')]
    public $description = '';

    // #[Validate('image|max:1024')]
    public $logo;

    public function setProfile(ChoirProfile $profile)
    {
        $this->profile = $profile;
        $this->city_id = $profile->city_id;
        $this->institution = $profile->institution;
        $this->description = $profile->description;
        $this->logo = $profile->logo;
    }

}
