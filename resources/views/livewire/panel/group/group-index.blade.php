<div>
    @if (session('status'))
        <div class="mb-4">
            <x-ts-alert :text="session('status')" color="green" light close />
        </div>
    @endif
    <div class="header">
        <div class="title">
            <h1>Grupos do coral</h1>
            @if ($canGroup && $isMultigroup)
                <x-ts-toggle label="Exibir excluídos" wire:model.live="withTrashed" />
            @endif
        </div>
        @if ($groups)
            <div>
                <x-ts-button text="Adicionar grupo" :href="route('panel.groups.create')" wire:navigate />
            </div>
        @endif
    </div>
    @if (!$canGroup)
        <x-ts-card>
            Seu plano atual não permite a criação de grupos.
        </x-ts-card>
    @elseif (!$selectedChoirId)
        <x-ts-card>
            Nenhum coral selecionado.<br>
            Selecione um coral para listar e criar grupos.
        </x-ts-card>
    @elseif (!$isMultigroup)
        <x-ts-card>
            O coral selecionado não está definido como multigrupo.<br>
            <x-ts-link :href="route('panel.choirs.edit', $selectedChoirId)" text="Editar coral" />
        </x-ts-card>
    @else
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
            @forelse ($groups as $group)
                <x-ts-card>
                    <x-ts-link :text="$group->name" :href="route('panel.groups.show', $group)" wire:navigate :color="$group->trashed() ? 'neutral' : 'primary'" />
                    <p @class(['text-sm', 'text-gray-500' => $group->trashed(), 'text-gray-800' => !$group->trashed() ])>
                        {{ $group->description }} |
                        {{ $group->choristers_count }} coralistas
                    </p>
                </x-ts-card>
            @empty
                <x-empty
                    title="Adicione o primeiro grupo para este coral."
                    description="Este coral ainda não possui grupos. Clique no botão abaixo para adicionar o primeiro."
                    btnLabel="Adicionar grupo"
                    :btnLink="route('panel.groups.create')" />
            @endforelse
        </div>
    @endif
</div>
