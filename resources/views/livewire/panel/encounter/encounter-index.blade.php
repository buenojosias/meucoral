<div>
    @if (session('status'))
        <div class="mb-4">
            <x-ts-alert :text="session('status')" color="green" light close />
        </div>
    @endif
    <div class="header">
        <h1>Ensaios</h1>
        <div class="actions">
            <x-ts-button text="Adicionar" :href="route('panel.encounters.create')" wire:navigate />
        </div>
    </div>

    <div class="table-wrapper">
        <div class="table-header justify-end">
            <x-ts-button icon="funnel" wire:click="$toggle('filterModal')" flat />
        </div>
        <table>
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Tema</th>
                    @if ($this->groupable)
                        <th>Grupo</th>
                    @endif
                    @if (!$choirId)
                        <th>Coral</th>
                    @endif
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($encounters as $encounter)
                    <tr>
                        <td>{{ $encounter->date->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{ route('panel.encounters.show', $encounter) }}">{{ $encounter->theme }}</a>
                        </td>
                        @if ($this->groupable)
                            <td>{{ $encounter->group->name ?? '' }}</td>
                        @endif
                        @if (!$choirId)
                            <td>{{ $encounter->choir->name }}</td>
                        @endif
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="table-footer">
            {{ $encounters->links() }}
        </div>
    </div>
    <x-ts-modal title="Filtrar ensaios" wire="filterModal" size="sm">
        <div class="space-y-4">
            <x-ts-select.native label="Período" wire:model="period" :options="[
                ['label' => 'Todos', 'value' => ''],
                ['label' => 'Próximos', 'value' => 'proximos'],
                ['label' => 'Realizados', 'value' => 'realizados'],
            ]"
                select="label:label|value:value" />
            <x-ts-select.native label="Chamada" wire:model="attendance" :options="[
                ['label' => 'Todas', 'value' => null],
                ['label' => 'Lançada', 'value' => 'true'],
                ['label' => 'Não lançada', 'value' => 'false'],
            ]"
                select="label:label|value:value" />
            @if ($groups->count())
                <x-ts-select.styled label="Filtrar por grupo" wire:model="groupId" :options="$groups"
                    select="label:name|value:id" />
            @endif
            <x-ts-date label="Data inicial" wire:model="startDate" format="DD/MM/YYYY" helpers />
            <x-ts-date label="Data final" wire:model="endDate" format="DD/MM/YYYY" helpers />
        </div>
        <x-slot:footer>
            <x-ts-button text="Limpar filtros" wire:click="clear" loading="clear" color="gray" flat />
            <x-ts-button text="Aplicar filtros" wire:click="applyFilter" loading="applyFilter" />
            {{-- <x-ts-button text="Fechar" wire:click="$toggle('filterModal')" flat /> --}}
        </x-slot>
    </x-ts-modal>
</div>
