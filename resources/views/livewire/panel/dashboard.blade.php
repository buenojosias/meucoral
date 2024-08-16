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
        @if ($planId >= 2)
            <x-ts-card>
                <h3 class="text-xl text-secondary-700 font-bold mb-3">Próximo ensaio</h3>
                @if ($nextEncounter)
                    <p class="text-gray-500">
                        {{ $nextEncounter->date->format('d-m-d') == now()->format('d-m-d') ? 'Hoje' : $nextEncounter->date->format('d/m/Y') }}
                    </p>
                    <p class="font-semibold">{{ $nextEncounter->theme }}</p>
                    <div class="mt-3 flex gap-4">
                        <x-ts-link text="Detalhes" :href="route('panel.encounters.show', $nextEncounter)" />
                        <x-ts-link text="Ver todos" :href="route('panel.encounters.index')" color="zinc" />
                    </div>
                @else
                    <div class="flex flex-col gap-1 items-center">
                        <p class="text-gray-500">Nenhum ensaio agendado.</p>
                        <x-ts-button text="Adicionar ensaio" :link="route('panel.encounters.create')" flat />
                    </div>
                @endif
            </x-ts-card>
        @endif
    </div>
</div>
