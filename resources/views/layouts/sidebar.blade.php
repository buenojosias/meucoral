<ul class="mt-8 space-y-1">
    <x-side-link label="Dashboard" icon="house-simple" :href="route('dashboard')" :active="request()->routeIs('dashboard*')" wire:navigate />
    <x-side-link label="Membros" icon="users" :href="route('dashboard')" :active="request()->routeIs('')" wire:navigate />
    <x-side-link label="Músicas" icon="music-notes" :href="route('dashboard')" :active="request()->routeIs('')" wire:navigate />
    <x-side-link label="Meus corais" icon="users-four" :active="request()->routeIs('')">
        <x-side-sublink label="Coral 1" active wire:navigate />
        <x-side-sublink label="Coral 2" />
    </x-side-link>
</ul>
