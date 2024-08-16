<div>
    @if ($encounter->trashed())
        @slot('banner')
            <x-ts-banner text="Este ensaio foi excluído(a). Clique em Editar para restaurá-lo." color="secondary" close />
        @endslot
    @endif
    @if (session('status'))
        <div class="mb-4">
            <x-ts-alert :text="session('status')" color="green" light close />
        </div>
    @endif
    @if (!$choirId || $encounter->choir_id != $choirId)
        <div class="mb-6">
            <x-ts-alert light close>
                Este ensaio não pertence ao coral selecionado e por isso algumas funções podem ficar restritas.<br>
                Deseja selecionar o coral deste ensaio para interação?
                <x-slot:footer>
                    <div class="flex justify-end">
                        {{-- <x-ts-button text="Selecionar" wire:click="selectChoir" outline sm /> --}}
                    </div>
                </x-slot:footer>
            </x-ts-alert>
        </div>
    @endif
    <div class="header">
        <h1>Detalhes do ensaio</h1>
    </div>
    <div class="grid lg:grid-cols-3 gap-4">
        <div class="col-span-3 lg:col-span-1 space-y-4">
            <x-ts-card class="grid grid-cols-2 lg:grid-cols-1 detail">
                <x-detail label="Data" :value="$encounter->date->format('d/m/Y')" />
                <x-detail label="Tema" :value="$encounter->theme" />
                @if (!$choirId || $encounter->choir_id != $choirId)
                    <x-detail label="Coral" :value="$encounter->choir->name" />
                @endif
                @if ($groupable && $encounter->group)
                    <x-detail label="Grupo" :value="$encounter->group->name" />
                @endif
                @if ($encounter->choir_id == $choirId)
                    <x-slot:footer>
                        <x-ts-button text="Editar" :href="route('panel.encounters.edit', $encounter)" wire:navigate flat />
                    </x-slot>
                @endif
            </x-ts-card>
            @if (!$encounter->date->isFuture())
                <x-ts-card>
                    @if ($encounter->has_attendance)
                        <div class="grid grid-cols-3 divide-x">
                            <div>
                                <div class="text-sm text-gray-700">Presenças</div>
                                <div class="text-2xl font-semibold">{{ $attendance['presences'] }}</div>
                            </div>
                            <div class="pl-2">
                                <div class="text-sm text-gray-700">Faltas</div>
                                <div class="text-2xl font-semibold">{{ $attendance['absences'] }}</div>
                            </div>
                            <div class="pl-2">
                                <div class="text-sm text-gray-700">Justificaticas</div>
                                <div class="text-2xl font-semibold">{{ $attendance['justified'] }}</div>
                            </div>
                        </div>
                    @else
                        Lançar chamada
                    @endif
                </x-ts-card>
            @endif
        </div>
        <div class="col-span-3 lg:col-span-2">
            <div class="grid grid-cols-2 gap-4">
                <div class="col-span-2 space-y-4">
                    <x-ts-card>
                        {{ $encounter->description ?? 'Descrição não adicionada.' }}
                    </x-ts-card>
                    @if (!$encounter->date->isFuture())
                        @livewire('panel.encounter.encounter-attendance', ['encounter' => $encounter])
                    @endif
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="p-2 bg-primary-400 my-2">Informações do ensaio</div>
    <div class="p-2 bg-primary-400 my-2">Participantes/chamada</div>
    <div class="p-2 bg-primary-400 my-2">Músicas</div>
    <div class="p-2 bg-primary-400 my-2">Comentários</div>
    <div class="p-2 bg-primary-400 my-2">Planejamento</div>
    <div class="p-2 bg-primary-400 my-2"></div> --}}
</div>
