<div>
    <div class="header">
        <div>
            <h1>Música</h1>
            <h2>{{ $song->title }}</h2>
        </div>
        <div>
            <x-ts-button text="Editar" :href="route('panel.songs.edit', $song->number)" wire:navigate />
        </div>
    </div>

    @if (session('status'))
        <div class="mb-4">
            <x-ts-alert :text="session('status')" color="green" light close />
        </div>
    @endif

    <div class="grid md:grid-cols-3 gap-6">
        <div class="space-y-4">
            <x-ts-card class="grid grid-cols-1 detail">
                @if ($song->highlighted)
                    <x-ts-badge text="Destacada" md icon="bookmark-simple" position="left" color="secondary" light />
                @endif
                <x-detail label="Número" :value="$song->number" />
                <x-detail label="Título" :value="$song->title" />
                <x-detail label="Autor/compositor" :value="$song->author" />
                <x-slot:footer>
                    <x-ts-button wire:click="toggleHighlight" :text="$song->highlighted ? 'Remover destaque' : 'Destacar'" flat />
                    {{-- <x-ts-button text="Editar" :href="route('panel.songs.edit', $song->number)" wire:navigate flat /> --}}
                </x-slot>
            </x-ts-card>
            @livewire('panel.song.partials.song-categories', ['song' => $song])
        </div>
        <div class="md:col-span-2">
            @livewire('panel.song.partials.song-lyrics', ['song' => $song])
        </div>
    </div>
</div>
