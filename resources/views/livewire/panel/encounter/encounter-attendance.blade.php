<div class="space-y-4">
    @if ($records && $records->count())
        <div class="table-wrapper">
            <div class="table-header bg-gray-50 border-b">
                <h3>Participações</h3>
            </div>
            <table>
                <tbody>
                    @foreach ($records as $record)
                        <tr @class(['text-gray-500 line-through' => $record->status->value != 'Ativo'])>
                            <td>{{ $record->name }}</td>
                            <td width="1" @class(['text-center font-bold', 'text-red-700' => $record->pivot->attendance == 'F'])>
                                {{ $record->pivot->attendance }}
                            </td>
                            <td width="1">xxx</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
    @if ($choristers && $choristers->count())
        <x-ts-errors />
        <div class="table-wrapper">
            <div class="table-header">
                <h3>Registrar chamada</h3>
            </div>
            <table>
                <thead>
                    <th>Nome</th>
                    <th width="1" class="text-center">P</th>
                    <th width="1" class="text-center">F</th>
                    <th width="1" class="text-center">J</th>
                </thead>
                <tbody>
                    @foreach ($choristers as $chorister)
                        <tr>
                            <td>{{ $chorister->name }}</td>
                            <td class="text-center"><x-ts-radio name="attendance[{{ $chorister->id }}][attendance]" wire:model="attendance.{{ $chorister->id }}" value="P" /></td>
                            <td class="text-center"><x-ts-radio name="attendance[{{ $chorister->id }}][attendance]" wire:model="attendance.{{ $chorister->id }}" value="F" /></td>
                            <td class="text-center"><x-ts-radio name="attendance[{{ $chorister->id }}][attendance]" wire:model="attendance.{{ $chorister->id }}" value="J" /></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="table-footer">
                <div class="flex justify-end">
                    <x-ts-button text="Salvar" wire:click="submit" loading="submit" />
                </div>
            </div>
        </div>
    @endif
</div>
