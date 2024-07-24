<div>
    <x-ts-toast />
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
        <div class="space-y-3">
            @foreach ($choirs as $choir)
                <x-ts-card>
                    <div class="flex items-center gap-3">
                        @if (@$choir->profile->logo)
                            <img src="{{ route('files.logo', $choir->profile->logo) }}"
                                class="object-cover w-16 h-16 rounded" alt="{{ $choir->name }}">
                        @endif
                        <div class="flex-1">
                            <x-ts-link :text="$choir->name" :href="route('panel.choirs.show', $choir)" wire:navigate :color="$choir->trashed() ? 'neutral' : 'primary'" />
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
        <x-empty title="Adicione seu primeiro coral."
            description="O coralistas, músicas, eventos e demais registros são
                    vinculados aos corais que você adicionar."
            btnLabel="Adicionar coral" :btnLink="route('panel.choirs.create')" />
    @endif
</div>
