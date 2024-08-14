<div class="col-span-2">
    <div class="table-wrapper">
        <div class="table-header">
            Grupos
        </div>
        <table>
            <thead>
                <th>Grupo</th>
                <th>Ensaios</th>
                <th>Status</th>
                <th width="1"></th>
            </thead>
            <tbody>
                @forelse ($groups as $group)
                    <tr>
                        <td class="!text-wrap">{{ $group->name }}</td>
                        <td class="!text-wrap">{{ $group->encounter_weekday->label() }},
                            {{ $group->encounter_time->format('H:i') }}</td>
                        <td>{{ $group->status->value != 'Ativo' ? $group->status : $group->pivot->situation }}</td>
                        <td>
                            @if ($chorister->choir_id === auth()->user()->selected_choir_id)
                                <x-ts-dropdown icon="dots-three-vertical" static>
                                    <x-ts-dropdown.items text="Detalhes" />
                                    <a href="{{ route('panel.groups.show', $group) }}" wire:navigate>
                                        <x-ts-dropdown.items text="Ver grupo" />
                                    </a>
                                    @if ($group->pivot->situation === 'Ativo')
                                        <x-ts-dropdown.items text="Remover"
                                            x-on:click="$dispatch('load-group', { id: {{ $group->id }} })"
                                            separator />
                                    @endif
                                </x-ts-dropdown>
                            @endif
                        </td>
                    </tr>
                @empty
                    <x-empty-table text="Nenhum grupo adicionado" />
                @endforelse
            </tbody>
        </table>
        @if ($chorister->choir_id === auth()->user()->selected_choir_id && !$chorister->trashed())
            <div class="table-footer">
                <x-ts-button text="Adicionar" wire:click="$toggle('modal')" flat />
            </div>
        @endif
    </div>

    <x-ts-modal title="Adicionar grupo" size="md" wire>
        <x-ts-select.styled placeholder="Selecione um grupo" wire:model="selectedGroupId" :options="$choirGroups"
            select="label:name|value:id|description:encounter_weekday" />
        <x-slot:footer>
            <x-ts-button text="Confirmar" wire:click="submit" />
        </x-slot>
    </x-ts-modal>

    @livewire('panel.chorister.partials.chorister-group-remove', ['chorister' => $chorister])
</div>
