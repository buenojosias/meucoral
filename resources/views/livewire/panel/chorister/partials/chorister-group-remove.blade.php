<x-ts-modal title="Remover grupo" size="md" wire>
    <div class="space-y-2">
        <x-ts-errors />
        <p>Você está removendo o(a) coralista do grupo {{ $group->name ?? '' }}.
            Deseja manter o histórico de registro?</p>
        <x-ts-radio wire:model="action" id="yes" value="preserve" invalidate>
            <x-slot:label start>
                Sim. Apenas remova o grupo e preserve o histórico.
            </x-slot:label>
        </x-ts-radio>
        <x-ts-radio wire:model="action" id="no" value="delete" invalidate>
            <x-slot:label start>
                Não. Apague todo o histórico do(a) coralista neste grupo.
            </x-slot:label>
        </x-ts-radio>
    </div>
    <x-slot:footer>
        <x-ts-button text="Confirmar" wire:click="confirm" />
        <x-ts-button text="Cancelar" wire:click="$toggle('modal')" flat />
    </x-slot:footer>
</x-ts-modal>
