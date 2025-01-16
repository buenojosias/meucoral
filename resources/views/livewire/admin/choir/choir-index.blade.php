<div>
    <div class="header">
        <h1>Corais</h1>
    </div>
    <div class="table-wrapper">
        <div class="table-header justify-between">
            <div>
                <x-ts-input wire:model.live.debounce="search" placeholder="Pesquisar coral" icon="magnifying-glass" />
            </div>
        </div>
        <table>
            <thead>
                <th>Nome</th>
                <th>Usuário</th>
                <th>Coralistas</th>
            </thead>
            <tbody>
                @foreach ($choirs as $choir)
                    <tr @class(['text-gray-600' => $choir->trashed()])>
                        <td>{{ $choir->name }}</td>
                        <td>{{ $choir->user->name }}</td>
                        <td>{{ $choir->choristers_count }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @if ($choirs->links())
            <div class="table-footer">
                {{ $choirs->links() }}
            </div>
        @endif
    </div>
</div>
</div>
