<div>
    @if ($chorister->trashed())
        @slot('banner')
            <x-ts-banner text="Este(a) coralista foi excluído(a). Clique em Editar para restaurar." color="secondary" close />
        @endslot
    @endif
    @if (session('status'))
        <div class="mb-4">
            <x-ts-alert :text="session('status')" color="green" light close />
        </div>
    @endif
    @if (!$choirId || $chorister->choir_id != $choirId)
        <div class="mb-6">
            <x-ts-alert light close>
                O(a) coralista não pertence ao coral selecionado e por isso algumas funções podem ficar restritas.<br>
                Deseja selecionar o coral do(a) coralista para interação?
                <x-slot:footer>
                    <div class="flex justify-end">
                        <x-ts-button text="Selecionar" wire:click="selectChoir" outline sm />
                    </div>
                </x-slot:footer>
            </x-ts-alert>
        </div>
    @endif
    <div class="header">
        <div>
            <h1>{{ $chorister->name }}</h1>
            <h2>Coralista</h2>
        </div>
        @if ($chorister->choir_id === $choirId)
            <div>
                <x-ts-button text="Editar" :href="route('panel.choristers.edit', $chorister)" wire:navigate flat />
            </div>
        @endif
    </div>
    <div class="grid lg:grid-cols-3 gap-4">
        <div class="col-span-3 lg:col-span-1 space-y-4">
            <x-ts-card class="grid grid-cols-2 lg:grid-cols-1 detail">
                <x-detail label="Nome completo" :value="$chorister->name" />
                <x-detail label="Data de nascimento" :value="$chorister->birthdate->format('d/m/Y')" />
                <x-detail label="Idade" :value="$chorister->age" />
                @if (!$choirId || $chorister->choir_id != $choirId)
                    <x-detail label="Coral" :value="$chorister->choir->name" />
                @endif
                <x-detail label="Status" :value="$chorister->status" />
                <x-detail label="Data da inscrição" :value="$chorister->registration_date->format('d/m/Y')" />
            </x-ts-card>
            @livewire('panel.partials.contact-list', ['model' => $chorister])
        </div>
        <div class="col-span-3 lg:col-span-2">
            <div class="grid grid-cols-2 gap-4">
                @if ($chorister->choir->multigroup)
                    @livewire('panel.chorister.partials.chorister-groups', ['chorister' => $chorister])
                @endif
                @if ($chorister->age < 18)
                    @livewire('panel.chorister.partials.chorister-kins', ['chorister' => $chorister])
                @endif
                @livewire('panel.chorister.partials.chorister-address', ['chorister' => $chorister])
            </div>
        </div>
    </div>

</div>
