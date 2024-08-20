<div>
    <div class="header">
        <div>
            <h1>Editar ensaio</h1>
        </div>
        <div>
            <x-ts-button text="Voltar" :href="route('panel.encounters.show', $encounter)" wire:navigate color="slate" flat />
        </div>
    </div>
    <div class="space-y-6">
        <x-ts-card>
            <form id="form-edit" wire:submit="save">
                <div class="two-columns">
                    <div>
                        <h2>Informações do ensaio</h2>
                    </div>
                    <div class="grid gap-4">
                        <div class="grid sm:grid-cols-2 gap-4">
                            <x-ts-date label="Data *" wire:model="form.date" format="DD/MM/YYYY" />
                            @if ($groupable && $encounter->group)
                                <x-ts-input label="Grupo" :value="$encounter->group->name ?? ''" readonly />
                            @endif
                        </div>
                        <x-ts-input label="Tema *" wire:model="form.theme" />
                        <x-ts-textarea label="Descrição" wire:model="form.description" />
                    </div>
                </div>
            </form>
            <x-slot:footer>
                <x-ts-button type="submit" text="Salvar" form="form-edit" loading="save" />
            </x-slot>
        </x-ts-card>
        @livewire('panel.partials.delete-model', ['model' => $encounter, 'label' => 'ensaio', 'route' => 'panel.encounters.index'])
    </div>
</div>
