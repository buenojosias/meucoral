<x-ts-modal title="Cadastrar ensaio" wire size="sm" x-on:close="$wire.clear" persistent>
    <form wire:submit="submit" id="encounter-form" class="space-y-4">
        @if ($groups)
            <x-ts-select.styled label="Grupo *" wire:model="form.group_id" :options="$groups"
                select="label:name|value:id" />
        @endif
        <x-ts-date label="Data *" wire:model="form.date" format="DD/MM/YYYY" helpers />
        <x-ts-input label="Tema *" wire:model="form.theme" />
        <x-ts-textarea label="Descrição" wire:model="form.description" rows="6" hint="Opcional" />
    </form>
    <x-slot:footer>
        <x-ts-button type="submit" text="Salvar" form="encounter-form" />
    </x-slot>
</x-ts-modal>
