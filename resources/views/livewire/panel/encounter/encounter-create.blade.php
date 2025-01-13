<div>
    <div class="header">
        <h1>Cadastrar ensaio</h1>
    </div>
    @if (!$choirId)
        <x-empty title="Nenhum coral selecionado" description="É necessário selecionar um coral para cadastrar ensaios."
            btnLabel="Listar corais" :btnLink="route('panel.choirs.index')" />
    @else
        <x-ts-card>
            <form id="form-create" wire:submit="save">
                <div class="two-columns">
                    <div>
                        <h2>Informações do ensaio</h2>
                    </div>
                    <div class="grid gap-4">
                        <div class="grid sm:grid-cols-2 gap-4">
                            <x-ts-date label="Data *" wire:model="form.date" format="DD/MM/YYYY" />
                            @if ($groupable && $groups->count())
                                <x-ts-select.styled label="Grupo *" wire:model.live="form.group_id" :options="$groups"
                                    select="label:name|value:id" />
                            @endif
                        </div>
                        <x-ts-input label="Tema *" wire:model="form.theme" />
                        <x-ts-textarea label="Descrição" wire:model="form.description" />
                    </div>
                </div>
            </form>
            <x-slot:footer>
                <x-ts-button type="submit" text="Salvar" form="form-create" loading="save" />
            </x-slot>
        </x-ts-card>
    @endif
</div>
