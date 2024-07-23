<div>
    <x-ts-toast />
    <div class="header">
        <div class="title">
            <h1>Meus corais</h1>
            <x-ts-toggle label="Exibir excluídos" wire:model.live="withTrashed" />
        </div>
        @if ($choirs)
            <div>
                <x-ts-button text="Adicionar coral" :href="route('panel.choirs.create')" wire:navigate />
            </div>
        @endif
    </div>

    @if ($choirs && $choirs->count())
        <div class="space-y-4">
            @foreach ($choirs as $choir)
                <x-ts-card>
                    <div class="flex items-center gap-3">
                        @if (@$choir->profile->logo)
                            <img src="{{ route('files.logo', $choir->profile->logo) }}"
                                class="object-cover w-16 h-16 rounded" alt="{{ $choir->name }}">
                        @endif
                        <div class="flex-1">
                            <x-ts-link :href="route('panel.choirs.show', $choir)" :color="$choir->trashed() ? 'neutral' : 'primary'" :text="$choir->name" wire:navigate />
                            <br>
                            999 coralistas
                        </div>
                        @if ($choir->id === auth()->user()->selected_choir_id)
                            <x-ts-badge text="Selecionado" color="secondary" light />
                        @elseif ($choir->trashed())
                            <x-ts-badge text="Excluído" color="neutral" outline />
                        @else
                            <x-ts-button text="Selecionar" wire:click="selectChoir({{ $choir->id }})"
                                loading="selectChoir" sm outline />
                        @endif
                    </div>
                </x-ts-card>
            @endforeach
        </div>
    @else
        <div class="max-w-4xl mx-auto px-10 py-4">
            <div class="flex flex-col justify-center py-12 items-center">
                <div class="flex justify-center items-center">
                    <img class="w-64 h-64" src="{{ asset('illustrations/empty.svg') }}" alt="Sem registros">
                </div>
                <h1 class="text-gray-700 font-medium text-2xl text-center mb-3">Adicione seu primeiro coral.</h1>
                <p class="text-gray-500 text-center mb-6">O coralistas, músicas, eventos e demais registros são
                    vinculados aos corais que você adicionar.</p>
                <div class="flex flex-col justify-center">
                    <x-ts-button text="Adicionar coral" :href="route('panel.choirs.create')" wire:navigate outline />
                    <a href="#" class="underline mt-4 text-sm font-light mx-auto">Learn more</a>
                </div>
            </div>
        </div>
    @endif
</div>
