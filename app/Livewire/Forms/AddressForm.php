<?php

namespace App\Livewire\Forms;

use App\Models\Address;
use Livewire\Attributes\Validate;
use Livewire\Form;

class AddressForm extends Form
{
    public ?Address $data;

    public $chorister_id;

    #[Validate('required|max:120')]
    public ?string $address;

    #[Validate('max:30')]
    public ?string $complement;

    #[Validate('required|max:40', as: 'bairro')]
    public ?string $district;

    #[Validate('nullable|max:120')]
    public ?string $reference;

    #[Validate('required', as: 'cidade')]
    public ?int $city_id;

    #[Validate('nullable')]
    public ?float $latitude;

    #[Validate('nullable')]
    public ?float $longitude;

    #[Validate('nullable')]
    public ?bool $is_visible;

    public function setAddress(Address $address)
    {
        // $this->data = $address;
        $this->chorister_id = $address->chorister_id;
        $this->address = $address->address;
        $this->complement = $address->complement;
        $this->district = $address->district;
        $this->reference = $address->reference;
        $this->city_id = $address->city_id;
        $this->latitude = $address->latitude;
        $this->longitude = $address->longitude;
        $this->is_visible = $address->is_visible;
    }
}
