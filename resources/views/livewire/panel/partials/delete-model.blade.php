<x-ts-card class="two-columns">
    <div>
        <h2>Excluir {{ $label }}</h2>
    </div>
    <div>
        @if (!$model->trashed())
            <p class="text-sm">Excluir o registro e todas as informações vinculadas.</p>
        @else
            <p class="text-sm">
                Você solicitou a exclusão deste registro. As informações serão permanentemente excluidas em
                {{ $model->deleted_at->addMonth()->format('d/m/Y') }}.<br>
            </p>
        @endif
    </div>
    <x-slot:footer>
        @if (!$model->trashed())
            <x-ts-button text="Excluir" wire:click="delete" loading="delete" color="red" />
        @else
            <x-ts-button text="Exluir permanentemente" wire:click="deletePermanently" loading="forceDelete"
                color="red" />
            <x-ts-button text="Restaurar" wire:click="restore" loading="restore" color="green" />
        @endif
    </x-slot>
</x-ts-card>
