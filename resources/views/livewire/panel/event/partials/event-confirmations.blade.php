<div class="space-y-4">
    <div class="table-wrapper">
        <div class="table-header">
            <h3>Respostas</h3>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Coralista</th>
                    <th width="1"></th>
                    <th width="1"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($withAnswer as $chorister)
                    <tr>
                        <td>{{ $chorister->name }}</td>
                        <td><x-ts-badge :text="$chorister->answer" :color="$chorister->color" outline /></td>
                        <td><x-ts-button icon="pencil" sm flat /></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @if (!$withAnswer->count())
            <div class="py-6 text-center text-sm font-semibold">
                Nenhuma resposta adicionada.
            </div>
        @endif
    </div>
    @if ($withoutAnswer->count() && $event->choir_id == auth()->user()->selected_choir_id)
        <div class="table-wrapper">
            <div class="table-header">
                <h3>Coralistas sem resposta</h3>
            </div>
            <p class="px-3 pb-2 text-sm">Selecione os coralistas para adicionar resposta em massa</p>
            <table class="border-t">
                <tbody>
                    @foreach ($withoutAnswer as $key => $chorister)
                        <tr>
                            <td width="1">
                                <x-ts-checkbox wire:model.live="selectedChoristers" :value="$chorister->id"
                                    :id="$key" />
                            </td>
                            <td>{{ $chorister->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if ($selectedChoristers)
                <div class="p-3 flex justify-between items-center gap-3">
                    <x-ts-label label="Resposta"></x-ts-label>
                    <div class="flex-auto">
                        <x-ts-select.native wire:model="answer" :options="['Sim', 'Não', 'Talvez']"></x-ts-select>
                    </div>
                    <x-ts-button text="Salvar" wire:click="saveAnswer" loading="saveAnswer" :disabled="!$selectedChoristers" sm />
                </div>
            @endif
        </div>
    @endif
</div>
