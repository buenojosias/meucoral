<x-ts-card>
    <form wire:submit="save" id="form-address">
        <div class="two-columns">
            <div>
                <h2>Endereço</h2>
            </div>
            <div class="space-y-4">
                <div class="sm:grid grid-cols-3 gap-4">
                    <div class="col-span-2">
                        <x-ts-input label="Endereço *" wire:model="form.address" />
                    </div>
                    <x-ts-input label="Complemento" wire:model="form.complement" />
                </div>
                <div class="sm:grid grid-cols-2 gap-4">
                    <x-ts-input label="Bairro *" wire:model="form.district" />
                    <x-ts-input label="Ponto de referência" wire:model="form.reference" />
                    <x-ts-select.native label="Estado *" wire:model.live="stateId" :value="$stateId" :options="$states"
                        select="label:name|value:id" />
                    <x-ts-select.native label="Cidade *" wire:model="form.city_id" :options="$cities"
                        select="label:name|value:id" :disabled="$cities ? false : true" />
                </div>
            </div>
        </div>
        <x-slot:footer>
            @if ($address)
                <x-ts-button text="Excluir endereço" wire:click="deleteAddress" color="red" flat />
            @endif
            <x-ts-button type="submit" form="form-address" text="Salvar" loading="save" />
        </x-slot>
    </form>
    {{-- @dump($address, $form, $stateId) --}}
</x-ts-card>
