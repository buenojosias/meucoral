<div class="lg:w-4/5 mx-auto space-y-6">
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
    <div class="mb-6 grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="mt-2 px-3 py-2 flex space-x-4 items-center bg-white border-r-0 border-secondary-600 rounded-lg shadow">
            <div class="px-1.5 py-4 h-full rounded-lg bg-secondary-500">
                <x-ts-icon name="calendar-dots" class="h-10 w-10 text-white" light />
            </div>
            <div>
                <h3 class="text-xl text-secondary-700 font-bold">Próximo evento</h3>
                @if ($nextEvent)
                    <a href="{{ route('panel.events.show', $nextEvent) }}">
                        <p class="text-sm font-semibold text-gray-500">
                            {{ $nextEvent->date->format('d-m-d') == now()->format('d-m-d') ? 'Hoje' : $nextEvent->date->format('d/m/Y') }}
                        </p>
                        <p class="font-semibold text-gray-800">{{ $nextEvent->name }}</p>
                    </a>
                @else
                    <p class="text-gray-800">Nenhum evento agendado</p>
                @endif
            </div>
        </div>
        @if ($planId >= 2)
            <div class="mt-2 px-3 py-2 flex space-x-4 items-center bg-white border-r-0 border-primary-600 rounded-lg shadow">
                <div class="px-1 py-4 h-full rounded-lg bg-primary-500">
                    <x-ts-icon name="chalkboard-teacher" class="h-10 w-10 text-white" light />
                </div>
                <div>
                    <h3 class="text-xl text-primary-700 font-bold">Próximo ensaio</h3>
                    @if ($nextEncounter)
                        <a href="{{ route('panel.encounters.show', $nextEncounter) }}">
                            <p class="text-sm font-semibold text-gray-500">
                                {{ $nextEncounter->date->format('d-m-d') == now()->format('d-m-d') ? 'Hoje' : $nextEncounter->date->format('d/m/Y') }}
                            </p>
                            <p class="font-semibold text-gray-800">{{ $nextEncounter->theme }}</p>
                        </a>
                    @else
                        <p class="text-gray-800">Nenhum ensaio programado</p>
                    @endif
                </div>
            </div>
        @endif
    </div>
</div>
