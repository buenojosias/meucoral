<div>
    <x-ts-card class="two-columns">
        <div>
            <h2>Status</h2>
        </div>
        <div class="flex justify-between items-center">
            {{ $chorister->status }}
            <x-ts-button text="Alterar" wire:click="$toggle('modal')" flat />
        </div>
    </x-ts-card>
    <x-ts-modal title="Alterar status" wire size="sm">
        <div class="flex flex-col space-y-4">
            <x-ts-select.styled label="Status" wire:model="status" :options="App\Enums\ChoristerStatusEnum::cases()" />
            <x-ts-textarea label="Adicionar comentário" />
        </div>
        <x-slot:footer>
            <x-ts-button text="Cancelar" wire:click="$toggle('modal')" flat />
            <x-ts-button text="Salvar" wire:click="updateStatus" />
        </x-slot>
    </x-ts-modal>
</div>
