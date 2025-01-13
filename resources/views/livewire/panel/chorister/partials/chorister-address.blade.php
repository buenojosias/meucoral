<div class="col-span-2 sm:col-span-1">
    <x-ts-card header="Endereço">
        @if ($address)
            <div class="detail">
                <x-detail label="Endereço" :value="$address->address" />
                <x-detail label="Complemento" :value="$address->complement" />
                <x-detail label="Bairro" :value="$address->district" />
                <x-detail label="Cidade" :value="$address->city->name" />
            </div>
            @if ($chorister->choir_id === auth()->user()->selected_choir_id && !$chorister->trashed())
                <x-slot:footer>
                    <x-ts-button text="Remover" wire:click="remove" color="red" flat />
                    <x-ts-button text="Editar" wire:click="$toggle('modal')" flat />
                </x-slot>
            @endif
        @else
            <div class="py-6 text-center text-sm">
                <p>Endereço não informado.</p>
                @if ($chorister->choir_id === auth()->user()->selected_choir_id && !$chorister->trashed())
                    <x-ts-button text="Adicionar endereço" wire:click="$toggle('modal')" flat />
                @endif
            </div>
        @endif
    </x-ts-card>

    <x-ts-modal title="Adicionar endereço" wire size="md" x-on:open="$wire.dispatchSelf('load-cities')" persistent>
        <form wire:submit="submit" id="address-form">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="col-span-2">
                    <x-ts-input label="Endereço *" wire:model="form.address" />
                </div>
                <x-ts-input label="Complemento" wire:model="form.complement" />
                <x-ts-input label="Bairro *" wire:model="form.district" />
                <x-ts-select.native label="Cidade *" wire:model="form.city_id" :options="$cities"
                    select="label:name|value:id" />
            </div>
            <x-slot:footer>
                <x-ts-button text="Cancelar" wire:click="$toggle('modal')" flat />
                <x-ts-button type="submit" form="address-form" text="Salvar" loading="submit" />
            </x-slot>
        </form>
    </x-ts-modal>
</div>
