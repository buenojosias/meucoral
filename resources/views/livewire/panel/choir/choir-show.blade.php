<div class="space-y-6">
    @if ($choir->id === auth()->user()->selected_choir_id && !$choir->trashed())
        <x-ts-banner text="Este coral está selecionado para interação." color="secondary" />
    @endif
    @if ($choir->trashed())
        <x-ts-banner text="Este coral foi excluído. Clique em Editar para restaurá-lo." color="red" />
    @endif
    <div class="md:px-2 flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-4">
        @if ($choir->profile->logo)
            <div class="choir-logo">
                <img src="{{ route('files.logo', $choir->profile->logo) }}" class="object-cover w-20 h-20 rounded"
                    alt="">
            </div>
        @else
            <div class="choir-logo">
                <x-ts-avatar :model="$choir" color="#FFF" />
            </div>
        @endif
        <div class="flex-1">
            <h2 class="text-2xl font-semibold">{{ $choir->name }}</h2>
            <h3>{{ $choir->profile->institution ?? '' }}</h3>
        </div>
        <div>
            @if ($choir->id !== auth()->user()->selected_choir_id)
                <x-ts-button text="Selecionar" wire:click="selectChoir" loading="selectChoir" outline />
            @endif
            <x-ts-button text="Editar" :href="route('panel.choirs.edit', $choir)" wire:navigate flat />
        </div>
    </div>
    <x-ts-card class="detail">
        <x-detail label="Nome" :value="$choir->name" />
        <x-detail label="Faixa etária" :value="$choir->age_group" />
        <x-detail label="Categoria" :value="$choir->category" />
        <x-detail label="Coralistas" :value="$choir->total_choristers" />
        <x-detail label="Multigrupo" :value="$choir->multigroup ? 'Sim' : 'Não'" />
    </x-ts-card>

    <x-ts-card header="Perfil" class="detail">
        <x-detail label="Cidade" :value="$choir->profile->city->name . '/' . $choir->profile->city->state->abbr ?? 'Não informada'" />
        <x-detail label="Instituição" :value="$choir->profile->institution ?? 'Não informada'" />
        <x-detail label="Descrição" :value="$choir->profile->description ?? 'Não informada'" />
    </x-ts-card>
</div>
