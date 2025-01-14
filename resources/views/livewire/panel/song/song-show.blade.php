<div>
    <div class="header">
        <div>
            <h1>Música</h1>
            <h2>{{ $song->title }}</h2>
        </div>
        <div>
            <x-ts-button text="Editar" />
        </div>
    </div>

    <div class="grid md:grid-cols-3 gap-6">
        <div class="space-y-4">
            @if ($song->highlighted)
                <x-ts-badge text="Destacada" md icon="bookmark-simple" position="left" color="amber" class="w-full" />
            @endif
            <x-ts-card class="grid grid-cols-2 md:grid-cols-1 detail">
                <x-detail label="Número" :value="$song->number" />
                <x-detail label="Título" :value="$song->title" />
                <x-detail label="Autor/compositor" :value="$song->author" />
                <x-slot:footer>
                    <x-ts-button wire:click="toggleHighlight" :text="$song->highlighted ? 'Remover destaque' : 'Destacar'" flat />
                    {{-- <x-ts-button text="Editar" :href="route('panel.songs.edit', $song)" wire:navigate flat /> --}}
                </x-slot>
            </x-ts-card>
        </div>
        <div class="md:col-span-2">
            @livewire('panel.song.partials.song-lyrics', ['song' => $song])
        </div>
    </div>
</div>
