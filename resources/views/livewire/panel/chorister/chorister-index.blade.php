<div>
    @if (session('status'))
        <div class="mb-4">
            <x-ts-alert :text="session('status')" color="green" light close />
        </div>
    @endif
    <div class="header">
        <div class="title">
            <h1>Coralistas</h1>
            <x-ts-toggle label="Exibir excluídos" wire:model.live="withTrashed" />
        </div>
        {{-- @if ($choirs)
            <div>
                <x-ts-button text="Cadastrar coralista" :href="route('panel.choirs.create')" wire:navigate />
            </div>
        @endif --}}
    </div>

    <div class="table-wrapper">
        <table>
            <thead>
                <th>Nome</th>
                <th>Idade</th>
                <th>Aniversário</th>
                @if (!$choirId)
                    <th>Coral</th>
                @endif
                @if ($this->multigroupPlan && $this->isMultigroup)
                    <th>Grupo(s)</th>
                @endif
                <th></th>
            </thead>
            <tbody>
                @foreach ($choristers as $chorister)
                    <tr>
                        <td>
                            <x-ts-link :href="route('panel.choristers.show', $chorister)" :text="$chorister->name" navigate colorless />
                        </td>
                        <td>{{ \Carbon\Carbon::parse($chorister->birth_date)->age }}</td>
                        <td>{{ $chorister->birth_date->format('d/m') }}</td>
                        @if (!$choirId)
                            <td>{{ $chorister->choir->name ?? '' }}</td>
                        @endif
                        @if ($this->multigroupPlan && $this->isMultigroup)
                            <td>
                                @forelse ($chorister->groups as $group)
                                    <p class="my-0.5">{{ $group->name }}</p>
                                    {{-- <x-ts-badge :text="$group->name" color="slate" outline /> --}}
                                @empty
                                    Nehum grupo
                                @endforelse
                            </td>
                        @endif
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @if ($choristers->links())
            <div class="table-footer">
                {{ $choristers->links() }}
            </div>
        @endif
    </div>
</div>
