<div>
    <div class="table-wrapper">
        <div class="table-header">
            <h3>Ensaios</h3>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Tema</th>
                    <th>Participantes</th>
                    <th width="1"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($encounters as $encounter)
                    <tr>
                        <td>{{ $encounter->date->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{ route('panel.encounters.show', $encounter) }}">{{ $encounter->theme }}</a>
                        </td>
                        <td>{{ $encounter->presences_count }}</td>
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="table-footer">
            <x-ts-button text="Adicionar" x-on:click="$dispatch('open-modal')" flat />
        </div>
    </div>
    @if ($group->choir_id === auth()->user()->selected_choir_id)
        @livewire('panel.partials.encounter-create', ['choir_id' => $group->choir_id, 'group_id' => $group->id])
    @endif
</div>
