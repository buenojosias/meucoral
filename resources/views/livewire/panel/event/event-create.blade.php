<div class="md:w-3/4 mx-auto">
    <div class="header">
        <h1>Agendar evento</h1>
    </div>
    <x-ts-card x-data="{ addressform: false }">
        <form id="form-create" wire:submit="save">
            <div class="two-columns">
                <div>
                    <h2>Informações do evento</h2>
                    <p class="description">Os campos com * são de preenchimento obrigatório.</p>
                </div>
                <div class="space-y-4">
                    <x-ts-input label="Nome do evento *" wire:model="event.name" />
                    <div class="sm:grid grid-cols-2 gap-4">
                        <x-ts-date label="Data *" wire:model="event.date" format="DD/MM/YYYY" :min-date="now()"
                            helpers />
                        <x-ts-time label="Horário" wire:model="event.time" format="24" :step-minute="5"
                            placeholder="Opcional" />
                    </div>
                    <x-ts-input label="Local" wire:model="event.place" hint="Opcional" />
                    <x-ts-textarea label="Descrição" wire:model="event.manager_description"
                        hint="Visível apenas no painel administrativo" />
                    <hr />
                    <div class="sm:grid grid-cols-2 gap-4">
                        <x-ts-toggle label="É apresentação" wire:model="is_presentation" />
                        <x-ts-toggle label="Adicionar endereço" x-model="addressform" wire:model.live="addressForm" />
                    </div>
                </div>
            </div>
            <div x-show="addressform" x-collapse>
                <hr class="my-4" />
                <div class="two-columns mt-4">
                    <div>
                        <h2>Endereço</h2>
                    </div>
                    <div class="space-y-4">
                        <div class="sm:grid grid-cols-3 gap-4">
                            <div class="col-span-2">
                                <x-ts-input label="Endereço *" wire:model="address.address" />
                            </div>
                            <x-ts-input label="Complemento" wire:model="address.complement" />
                        </div>
                        <div class="sm:grid grid-cols-2 gap-4">
                            <x-ts-input label="Bairro *" wire:model="address.district" />
                            <x-ts-input label="Ponto de referência" wire:model="address.reference" />
                            <x-ts-select.native label="Estado *" wire:model.live="stateId" :options="$states" select="label:name|value:id" />
                            <x-ts-select.native label="Cidade *" wire:model="address.city_id" :options="$cities" select="label:name|value:id" :disabled="$cities ? false : true" />
                        </div>
                    </div>
                </div>
            </div>
            @if ($groups->count())
                <hr class="my-4" />
                <div class="two-columns">
                    <div>
                        <h2>Atribuir grupos</h2>
                        <p class="description">Selecione os grupos que participarão do evento.</p>
                    </div>
                    <div class="space-y-2">
                        @foreach ($groups as $group)
                            <x-ts-checkbox label="{{ $group->name }}" wire:model="selectedGroups" :id="'grupo_' . $group->id"
                                :value="$group->id" />
                        @endforeach
                    </div>
                </div>
            @endif
        </form>
        <x-slot:footer>
            <x-ts-button type="submit" form="form-create">Salvar</x-ts-button>
        </x-slot>
    </x-ts-card>
</div>
