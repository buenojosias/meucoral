<div>
    <div class="header">
        <div>
            <h1>Coralista</h1>
            <h2>{{ $chorister->name }}</h2>
        </div>
    </div>
    @if (!$choirId || $chorister->choir_id != $choirId)
        <x-ts-alert light close>
            O(a) coralista não pertence ao coral selecionado e por isso algumas ações podem ficar restritas.<br>
            Deseja selecionar o coral do(a) coralista para interação?
            <x-slot:footer>
                <div class="flex justify-end">
                    <x-ts-button text="Selecionar" wire:click="selectChoir" outline sm />
                </div>
            </x-slot:footer>
        </x-ts-alert>
    @endif
    {{ $chorister }}

    <div class="grid sm:grid-cols-1 md:grid-cols-5 gap-4">
        <div class="md:col-span-2 space-y-4">
            <x-ts-card class="grid grid-cols-2 md:grid-cols-1 detail">
                <x-detail label="Nome completo" :value="$chorister->name" />
                <x-detail label="Data de nascimento" :value="$chorister->birth_date->format('d/m/Y')" />
                <x-detail label="Idade" :value="$chorister->age" />
                @if (!$choirId || $chorister->choir_id != $choirId)
                    <x-detail label="Coral" :value="$chorister->choir->name" />
                @endif
                <x-detail label="Status" :value="$chorister->status" />
                <x-detail label="Data da inscrição" :value="$chorister->registration_date->format('d/m/Y')" />
            </x-ts-card>
            <x-ts-card>
                Responsáveis
            </x-ts-card>
            <x-ts-card>
                Contatos...
            </x-ts-card>
        </div>
        <div class="md:col-span-3 space-y-4">
            @if ($chorister->choir->multigroup)
                @livewire('panel.chorister.partials.groups', ['chorister' => $chorister])
            @endif
        </div>
    </div>

</div>
