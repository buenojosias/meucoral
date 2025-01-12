<div>
    @if ($choir->id === auth()->user()->selected_choir_id && !$choir->trashed())
        @slot('banner')
            <x-ts-banner text="Este coral está selecionado para interação." color="secondary" close />
        @endslot
    @endif
    @if ($choir->trashed())
        @slot('banner')
            <x-ts-banner text="Este coral foi excluído. Clique em Editar para restaurá-lo." color="secondary" close />
        @endslot
    @endif
    @if (session('status'))
        <div class="mb-4">
            <x-ts-alert :text="session('status')" color="green" light close />
        </div>
    @endif
    <div class="header">
        @if ($choir->profile->logo)
            {{-- <div class="choir-logo">
                    <img src="{{ route('files.logo', $choir->profile->logo) }}" class="object-cover w-20 h-20 rounded"
                        alt="">
                </div> --}}
            <x-ts-avatar :image="route('files.logo', $choir->profile->logo)" square color="transparent" lg />
        @endif
        <div class="flex-1">
            <h1>{{ $choir->name }}</h1>
            <h2>{{ $choir->profile->institution ?? '' }}</h2>
        </div>
        <div>
            @if ($choir->id !== auth()->user()->selected_choir_id && !$choir->trashed())
                <x-ts-button text="Selecionar" wire:click="selectChoir" loading="selectChoir" outline />
            @endif
            <x-ts-button text="Editar" :href="route('panel.choirs.edit', $choir)" wire:navigate flat />
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 gap-4">
            <x-ts-card class="detail">
                <x-detail label="Nome" :value="$choir->name" />
                <x-detail label="Faixa etária" :value="$choir->age_group" />
                <x-detail label="Categoria" :value="$choir->category" />
                <x-detail label="Coralistas" :value="$choir->choristers_count" />
                <x-detail label="Multigrupo" :value="$choir->multigroup ? 'Sim' : 'Não'" />
            </x-ts-card>
            <x-ts-card header="Perfil" class="detail">
                <x-detail label="Cidade" :value="$choir->profile->city->name . '/' . $choir->profile->city->state->abbr ?? 'Não informada'" />
                <x-detail label="Instituição" :value="$choir->profile->institution ?? 'Não informada'" />
            </x-ts-card>
        </div>

        <div class="lg:col-span-2 space-y-4">
            <x-ts-card header="Descrição">
                <p>{{ $choir->profile->description ?? 'Nenhuma descrição adicionada' }}</p>
            </x-ts-card>
            @if ($choir->multigroup)
                @livewire('panel.choir.partials.choir-groups', ['choir' => $choir])
            @endif
        </div>
    </div>
    {{-- @livewire('panel.comment.comment-slide', ['model' => $choir, 'chorister' => null]) --}}
</div>
