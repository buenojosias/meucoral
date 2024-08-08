<div>
    <div class="table-wrapper">
        <div class="table-header">
            <h2>Grupos</h2>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Ensaios</th>
                    <th>Status</th>
                    <th>Coralistas</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($groups as $group)
                    <tr>
                        <td>
                            <a href="{{ route('panel.groups.show', $group) }}" wire:navigate>
                                {{ $group->name }}
                            </a>
                        </td>
                        <td>{{ $group->description }}</td>
                        <td>{{ $group->status }}</td>
                        <td>{{ $group->active_choristers_count }}</td>
                        <td>
                            {{-- <x-ts-button text="Editar" :href="route('panel.groups.edit', $group)" flat /> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
