<div>
    <div class="header">
        <h1>Usuários</h1>
    </div>
    <div class="table-wrapper">
        <div class="table-header justify-between">
            <div>
                <x-ts-input wire:model.live.debounce="search" placeholder="Pesquisar usuário" icon="magnifying-glass" />
            </div>
        </div>
        <table>
            <thead>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Corais</th>
                <th>Data do cadastro</th>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr @class(['text-gray-600' => $user->trashed()])>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->choirs_count }}</td>
                        <td>{{ $user->created_at->format('d/m/Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @if ($users->links())
            <div class="table-footer">
                {{ $users->links() }}
            </div>
        @endif
    </div>
</div>
</div>
