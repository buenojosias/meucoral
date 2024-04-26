<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component {
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

<nav class="flex flex-1 items-baseline space-x-4 w-full sm:w-auto bg-white">
    {{-- Colocar aqui possível informação de header --}}
    <!-- Settings Dropdown -->
    <div class="absolute right-2 top-2 flex gap-x-4">
        <x-dropdown width="48">
            <x-slot name="trigger">
                <button
                    class="p-2 rounded-full border border-transparent text-sm leading-4 font-medium text-white bg-white/25 hover:bg-primary-400/60 hover:text-copy-700 focus:outline-none transition ease-in-out duration-150">
                    <div class="hidden" x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name"
                        x-on:profile-updated.window="name = $event.detail.name">
                    </div>
                    JB
                </button>
            </x-slot>

            <x-slot name="content">
                <x-dropdown-link :href="route('profile')" wire:navigate>
                    {{ __('Profile') }}
                </x-dropdown-link>
                <button wire:click="logout" class="w-full text-start">
                    <x-dropdown-link>
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </button>
            </x-slot>
        </x-dropdown>
    </div>

</nav>
