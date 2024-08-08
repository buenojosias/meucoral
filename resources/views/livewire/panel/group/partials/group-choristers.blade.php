<div class="col-span-2">
    <div class="table-wrapper">
        <div class="table-header">
            Coralistas
        </div>
        <table>
            <thead>
                <th>Nome</th>
                <th>Idade</th>
                <th>Status</th>
                <th width="1"></th>
            </thead>
            <tbody>
                @forelse ($choristers as $chorister)
                    <tr>
                        <td class="!text-wrap">{{ $chorister->name }}</td>
                        <td>{{ $chorister->age }}</td>
                        <td>{{ $chorister->status->value != 'Ativo(a)' ? $chorister->status : $chorister->pivot->status }}</td>
                        <td>
                            <x-ts-dropdown icon="dots-three-vertical" static>
                                <x-ts-dropdown.items text="Detalhes" />
                                <a href="{{ route('panel.choristers.show', $chorister) }}" wire:navigate>
                                    <x-ts-dropdown.items text="Ver coralista" />
                                </a>
                                @if ($chorister->pivot->status === 'Ativo')
                                    <x-ts-dropdown.items text="Remover"
                                        x-on:click="$dispatch('load-chorister', { id: {{ $chorister->id }} })" separator />
                                @endif
                            </x-ts-dropdown>
                        </td>
                    </tr>
                @empty
                    <x-empty-table text="Nenhum coralista adicionado" />
                @endforelse
            </tbody>
        </table>
        @if ($group->choir_id === auth()->user()->selected_choir_id)
            <div class="table-footer">
                <x-ts-button text="Adicionar" wire:click="$toggle('modal')" flat />
            </div>
        @endif
    </div>

    <x-ts-modal title="Adicionar coralista" size="md" wire>
        <x-ts-select.styled placeholder="Selecione um coralista" wire:model="selectedChoristerId" :options="$choirChoristers"
            select="label:name|value:id" searchable />
        <x-slot:footer>
            <x-ts-button text="Confirmar" wire:click="submit" />
        </x-slot>
    </x-ts-modal>

    @livewire('panel.group.partials.group-chorister-remove', ['group' => $group])
</div>
