<div>
    @if (session('status'))
        <div class="mb-4">
            <x-ts-alert :text="session('status')" color="green" light close />
        </div>
    @endif
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
        <div class="grid lg:grid-cols-2 gap-4">
            @foreach ($choirs as $choir)
                <x-ts-card class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                    <div class="flex items-center gap-3">
                        @if (@$choir->profile->logo)
                            {{-- <img src="{{ route('files.logo', $choir->profile->logo) }}"
                                class="object-cover w-14 h-14 rounded" alt="{{ $choir->name }}"> --}}
                            <x-ts-avatar :image="route('files.logo', $choir->profile->logo)" color="transparent" lg />
                        @endif
                        <div class="flex-1">
                            <x-ts-link :text="$choir->name" :href="route('panel.choirs.show', $choir)" wire:navigate :color="$choir->trashed() ? 'neutral' : 'primary'" />
                            <p @class([
                                'pt-1 text-sm',
                                'text-gray-500' => $choir->trashed(),
                                'text-gray-800' => !$choir->trashed(),
                            ])>
                                {{ $choir->multigroup ? 'Multigrupo |' : '' }}
                                {{ $choir->choristers_count }} coralistas
                            </p>
                        </div>
                    </div>
                    <div class="flex justify-end pt-2">
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
        <x-empty title="Adicione seu primeiro coral."
            description="Coralistas, músicas, eventos e demais registros são
                    vinculados aos corais que você adicionar."
            btnLabel="Adicionar coral" :btnLink="route('panel.choirs.create')" />
    @endif
</div>
