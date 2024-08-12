<?php

namespace App\Livewire\Partials;

use Livewire\Component;

class Logout extends Component
{
    public function logout(\App\Livewire\Actions\Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: false);
    }

    public function render()
    {
        return <<<'HTML'
        <div>
            <li class="nav-item">
                <button wire:click="logout" type="button" class="text-gray-50 hover:bg-primary-800 hover:text-gray-100 flex items-center w-full">
                    <x-ts-icon name="sign-out" class="mr-2 h-5 w-5" />
                    <span class="flex-1 text-left whitespace-nowrap">Sair</span>
                </button>
            </li>
        </div>
        HTML;
    }
}
