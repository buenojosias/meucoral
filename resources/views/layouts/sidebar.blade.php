<ul class="mt-8 space-y-1">
    @for($i = 1; $i <= 1; $i++)
    <x-side-link label="Dashboard" icon="home" :href="route('dashboard')" :active="request()->routeIs('text*')" wire:navigate />
    <x-side-link label="Membros" icon="users" :href="route('dashboard')" :active="request()->routeIs('dashboard*')" wire:navigate badge="123" />
    <x-side-link label="Músicas" icon="musical-note" :href="route('dashboard')" :active="request()->routeIs('text*')" wire:navigate />
    <x-side-link label="Meus corais" :active="request()->routeIs('text*')">
        <x-side-sublink label="Coral 1" active wire:navigate />
        <x-side-sublink label="Coral 2" />
    </x-side-link>
    @endfor
</ul>
