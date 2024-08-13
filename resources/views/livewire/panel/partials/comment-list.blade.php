<div>
    <div class="table-wrapper">
        <div class="table-header">
            <h2>Comentários</h2>
        </div>
        <table>
            <thead>
                <th width="10">Data</th>
                <th>Comentário</th>
                <th width="1"></th>
            </thead>
            <tbody>
                @foreach ($comments as $comment)
                    <tr>
                        <td>{{ $comment->created_at->format('d/m/Y H:i') }}</td>
                        <td>{{ $comment->content }}</td>
                        <td>
                            <x-ts-button icon="trash" wire:click="delete({{ $comment->id }})" color="red" flat sm />
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="table-footer">
            <x-ts-button text="Adicionar" wire:click="$toggle('modal')" flat />
        </div>
    </div>
    <x-ts-modal wire header="Adicionar comentário" x-on:close="$wire.clear" size="sm" persistent>
        <x-ts-textarea wire:model="content" placeholder="Digite o comentário" rows="2" />
        <x-slot:footer>
            <x-ts-button text="Cancelar" wire:click="$toggle('modal')" flat />
            <x-ts-button text="Salvar" wire:click="submit" />
        </x-slot>
    </x-ts-modal>
</div>
