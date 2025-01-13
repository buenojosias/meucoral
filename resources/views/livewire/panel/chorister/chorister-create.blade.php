<div class="md:w-3/4 mx-auto">
    <div class="header">
        <div class="title">
            <h1>Cadastrar coralista</h1>
        </div>
    </div>
    @if (!$selectedChoirId)
        <x-empty title="Nenhum coral selecionado" description="Selecione um coral para cadastrar coralistas."
            btnLabel="Listar corais" :btnLink="route('panel.choirs.index')" />
    @else
        <x-ts-card>
            <form id="form-create" wire:submit="save">
                <div class="two-columns">
                    <div>
                        <h2>Informações do(a) coralista</h2>
                    </div>
                    <div class="space-y-4 grid-cols-2">
                        <x-ts-input label="Nome completo *" wire:model="chorister.name" />
                        <div class="grid grid-cols-2 gap-4">
                            <x-ts-input label="Data de nascimento *" type="date" wire:model="chorister.birthdate" />
                            <x-ts-input label="Data da inscrição" type="date"
                                wire:model="chorister.registration_date" />
                        </div>
                    </div>
                </div>
            </form>
            <x-slot:footer>
                <x-ts-button type="submit" text="Cadastrar" form="form-create" loading="save" />
            </x-slot>
        </x-ts-card>
    @endif
</div>
