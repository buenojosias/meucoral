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
        {{-- @if ($choirs) --}}
        <div>
            <x-ts-button text="Cadastrar coralista" :href="route('panel.choristers.create')" wire:navigate />
        </div>
        {{-- @endif --}}
    </div>
    @if (!$choirId)
        <x-ts-card>
            Nenhum coral selecionado.<br>
            Selecione um coral para listar e cadastrar coralistas.
        </x-ts-card>
    @else
        <div class="table-wrapper">
            <div class="table-header justify-between">
                <div>
                    <x-ts-input wire:model.live.debounce="search" placeholder="Pesquisar coralista"
                        icon="magnifying-glass" />
                </div>
                <div>
                    {{-- <x-ts-select wire:model="choirId" :options="$choirs" placeholder="Filtrar por coral" /> --}}
                    <x-ts-select.styled wire:model.live="status" :options="\App\Enums\ChoristerStatusEnum::cases()" placeholder="Filtrar por status" />
                </div>
            </div>
            <table>
                <thead>
                    <th>Nome</th>
                    <th>Idade</th>
                    <th>Aniversário</th>
                    <th>Status</th>
                    @if (!$choirId)
                        <th>Coral</th>
                    @endif
                    @if ($this->multigroupPlan && $this->isMultigroup)
                        <th>Grupo(s)</th>
                    @endif
                    <th width="1"></th>
                </thead>
                <tbody>
                    @foreach ($choristers as $chorister)
                        <tr @class(['text-gray-600' => $chorister->trashed()])>
                            <td>
                                <x-ts-link :href="route('panel.choristers.show', $chorister)" :text="$chorister->name" navigate colorless />
                            </td>
                            <td>{{ \Carbon\Carbon::parse($chorister->birthdate)->age }}</td>
                            <td>{{ $chorister->birthdate->format('d/m') }}</td>
                            <td>
                                @if ($chorister->trashed())
                                    <x-ts-badge text="Excluído(a)" color="red" outline />
                                @else
                                    <x-ts-badge :text="$chorister->status->value" :color="$chorister->status->color()" outline />
                                @endif
                            </td>
                            @if (!$choirId)
                                <td>{{ $chorister->choir->name ?? '' }}</td>
                            @endif
                            @if ($this->multigroupPlan && $this->isMultigroup)
                                <td>
                                    @foreach ($chorister->activeGroups as $group)
                                        <p class="my-0.5">{{ $group->name }}</p>
                                    @endforeach
                                </td>
                            @endif
                            <td>
                                <x-ts-link icon="pencil-simple" :href="route('panel.choristers.edit', $chorister)" navigate colorless />
                            </td>
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
    @endif
</div>
