@if (request()->routeIs('panel*') || request()->routeIs('home'))
    @if (auth()->user()->selected_choir_id)
        <div class="mt-2 mb-4 text-white/70 text-sm">
            {{ auth()->user()->selected_choir_name }}
        </div>
    @endif
    <ul class="my-2 space-y-1">
        <x-side-link label="Página inicial" icon="house-simple" :href="route('home')" :active="request()->routeIs('home')" wire:navigate />
        <x-side-link label="Coralistas" icon="users" :href="route('home')" :active="request()->routeIs('')" wire:navigate />
        <x-side-link label="Músicas" icon="music-notes" :href="route('home')" :active="request()->routeIs('')" wire:navigate />
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
