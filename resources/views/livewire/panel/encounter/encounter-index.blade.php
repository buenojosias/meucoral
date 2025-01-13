<div>
    @if (session('status'))
        <div class="mb-4">
            <x-ts-alert :text="session('status')" color="green" light close />
        </div>
    @endif
    <div class="header">
        <h1>Ensaios</h1>
        @if ($choir)
            <div class="actions">
                <x-ts-button text="Adicionar" :href="route('panel.encounters.create')" wire:navigate />
            </div>
        @endif
    </div>

    @if (!$choir)
        <x-empty title="Nenhum coral selecionado" description="Selecione um coral para listar e adicionar ensaios."
            btnLabel="Listar corais" :btnLink="route('panel.choirs.index')" />
    @else
        <div class="table-wrapper">
            <div class="table-header justify-end">
                <x-ts-button icon="funnel" wire:click="$toggle('filterModal')" flat />
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Tema</th>
                        @if ($groupable)
                            <th>Grupo</th>
                        @endif
                        {{-- @if (!$choirId)
                        <th>Coral</th>
                    @endif --}}
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
                            @if ($groupable)
                                <td>{{ $encounter->group->name ?? '' }}</td>
                            @endif
                            {{-- @if (!$choirId)
                            <td>{{ $encounter->choir->name }}</td>
                        @endif --}}
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="table-footer">
                {{ $encounters->links() }}
            </div>
        </div>
    @endif
    <x-ts-modal title="Filtrar ensaios" x-on:open="$wire.dispatchSelf('load-groups')" wire="filterModal" size="sm">
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
            @if ($groups && $groups->count())
                <x-ts-select.styled label="Filtrar por grupo" wire:model="groupId" :options="$groups"
                    select="label:name|value:id" />
            @endif
            <x-ts-date label="Data mínima" wire:model="minDate" format="DD/MM/YYYY" helpers />
            <x-ts-date label="Data máxima" wire:model="maxDate" format="DD/MM/YYYY" helpers />
        </div>
        <x-slot:footer>
            <x-ts-button text="Limpar filtros" wire:click="clear" loading="clear" color="gray" flat />
            <x-ts-button text="Aplicar filtros" wire:click="applyFilter" loading="applyFilter" />
            {{-- <x-ts-button text="Fechar" wire:click="$toggle('filterModal')" flat /> --}}
        </x-slot>
    </x-ts-modal>
</div>
