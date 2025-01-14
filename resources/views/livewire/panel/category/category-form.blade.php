<x-ts-modal :title="$categoryId ? 'Editar categoria' : 'Nova categoria'" id="category-modal" size="sm" wire>
    <form id="form-category" wire:submit="save">
        <x-ts-input wire:model="categoryName" label="Nome da categoria" />
    </form>
    <x-slot:footer>
        <x-ts-button type="submit" text="Salvar" form="form-category" loading="save" />
    </x-slot>
</x-ts-modal>
