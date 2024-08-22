@if (request()->routeIs('panel*') || request()->routeIs('home'))
    <ul class="my-2 space-y-1">
        <x-side-link label="Página inicial" icon="house-simple" :href="route('home')" :active="request()->routeIs('home')" wire:navigate />
        <x-side-link label="Grupos" icon="users-three" :href="route('panel.groups.index')" :active="request()->routeIs('panel.groups*')" wire:navigate />
        <x-side-link label="Coralistas" icon="users" :href="route('panel.choristers.index')" :active="request()->routeIs('panel.choristers*')" wire:navigate />
        <x-side-link label="Ensaios" icon="chalkboard-teacher" :href="route('panel.encounters.index')" :active="request()->routeIs('panel.encounters*')" wire:navigate />
        <x-side-link label="Eventos" icon="calendar-dots" :href="route('panel.events.index')" :active="request()->routeIs('panel.events*')" wire:navigate />
        <x-side-link label="Meus corais" icon="users-four" :href="route('panel.choirs.index')" :active="request()->routeIs('panel.choirs*')" wire:navigate />
    </ul>
    @if (auth()->user()->role->value === 'admin')
        <ul class="mt-4 pt-4 space-y-1 border-t border-primary-900">
            <x-side-link label="Painel administrativo" icon="gauge" :href="route('admin.dashboard')" wire:navigate />
        </ul>
    @endif
@elseif (request()->routeIs('admin*'))
    <ul class="mt-4 space-y-1">
        <x-side-link label="Dashboard master" icon="house-simple" :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')" wire:navigate />
        <x-side-link label="Usuários" icon="users" :href="route('admin.dashboard')" :active="request()->routeIs('')" wire:navigate />
        <x-side-link label="Corais" icon="users-four" :href="route('panel.choirs.index')" :active="request()->routeIs('panel.choirs*')" wire:navigate />
        <x-side-link label="Músicas" icon="music-notes" :href="route('admin.dashboard')" :active="request()->routeIs('')" wire:navigate />
    </ul>
    <ul class="mt-4 pt-4 space-y-1 border-t border-primary-900">
        <x-side-link label="Visão do coordenador" icon="gauge" :href="route('home')" wire:navigate />
    </ul>
@endif
