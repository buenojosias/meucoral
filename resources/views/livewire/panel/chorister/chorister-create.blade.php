<div>
    <div class="header">
        <div class="title">
            <h1>Cadastrar coralista</h1>
        </div>
    </div>

    @if (!$selectedChoirId)
        <x-ts-card>
            Nenhum coral selecionado.<br>
            Selecione um coral para cadastrar coralistas.
        </x-ts-card>
    @elseif (!$canAddChorister)
        <x-ts-card>
            O número de coralistas cadastrados atingiu o limite que seu plano atual permite.<br>
            Você pode alterar o plano ou excluir permanentemente alguns coralistas.
        </x-ts-card>
    @else
        <x-ts-card>
            <form id="form-create" wire:submit="save">
                <div class="two-columns">
                    <div>
                        <h2>Informações do(a) coralista</h2>
                    </div>
                    <div class="space-y-4 grid-cols-2">
                        <x-ts-input label="Nome completo *" wire:model="chorister.name" />
                        <div class="grid sm:grid-cols-2 gap-4">
                            <x-ts-input label="Data de nascimento *" type="date" wire:model="chorister.birthdate" />
                            <x-ts-input label="Data da inscrição" type="date"
                                wire:model="chorister.registration_date" />
                        </div>
                    </div>
                </div>
                {{-- @if ($isMultigroup)
                    <hr class="my-4">
                    <div class="two-columns">
                        <div>
                            <h2>Grupo(s)</h2>
                            <p class="description">Selecione o(s) grupo(s) para vincular o(a) coralista</p>
                        </div>
                        <div class="space-y-4">
                            @foreach ($groups as $group)
                                <x-ts-checkbox>
                                    <x-slot:label start>
                                        {{ $group->name }}<br>
                                        <small>{{ $group->description }}</small>
                                    </x-slot:label>
                                </x-ts-checkbox>
                            @endforeach
                        </div>
                    </div>
                @endif --}}
            </form>
            <x-slot:footer>
                <x-ts-button type="submit" text="Cadastrar" form="form-create" loading="save" />
            </x-slot>
        </x-ts-card>
    @endif
</div>
