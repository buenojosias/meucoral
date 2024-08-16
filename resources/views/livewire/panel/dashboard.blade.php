<div class="space-y-6">
    <div class="mb-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
        <x-ts-stats title="Coralistas ativos" icon="users" :number="$choristersCount" :href="route('panel.choristers.index')" wire:navigate />
        <x-ts-stats title="Corais" icon="users-four" color="purple" :number="$choirsCount" :href="route('panel.choirs.index')" wire:navigate />
        @if ($planId >= 3)
            <x-ts-stats title="Grupos" icon="users-three" color="amber" :number="$groupsCount" :href="route('panel.groups.index')"
                wire:navigate />
        @endif
    </div>
    @if (auth()->user()->selected_choir_id)
        <x-ts-card class="flex items-center">
            <div class="flex-1">
                <small>Coral selecionado:</small><br>
                {{ auth()->user()->selected_choir_name }}
            </div>
            <x-ts-tooltip
                text="Apenas grupos, músicas, eventos e demais registros deste coral serão exibidos nas páginas internas."
                color="secondary" />
        </x-ts-card>
    @else
        <x-ts-card>
            Selecione um coral no link <x-ts-link text="Meus corais" :href="route('panel.choirs.index')" /> para listar seus coralistas,
            músicas, eventos e demais registros.
        </x-ts-card>
    @endif
    <div class="mb-6 grid grid-cols-1 sm:grid-cols-2 gap-4">
        <x-ts-card header="Próximo ensaio">
            @if ($nextEncounter)
                <div class="flex items-center space-x-4">
                    <div class="flex-1">
                        <h3 class="text-lg font-semibold">{{ $nextEncounter->theme }}</h3>
                        <p class="text-gray-500">
                            {{ $nextEncounter->date->format('d/m/Y') }}
                            @if ($nextEncounter->group)
                                {{ $nextEncounter->group->name }}
                            @endif
                        </p>
                    </div>
                    <x-ts-link text="Detalhes" :href="route('panel.encounters.show', $nextEncounter)" />
                </div>
            @else
                <p class="text-gray-500">Nenhum ensaio agendado.</p>
            @endif
        </x-ts-card>
    </div>
</div>
