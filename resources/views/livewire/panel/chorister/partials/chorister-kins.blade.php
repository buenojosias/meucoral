<div>
    <x-ts-card header="Responsável">
        @if ($kin)
            <div x-data="{ all: false }" class="space-y-4">
                <div class="detail">
                    <x-detail label="Nome" :value="$kin->name" />
                    <x-detail label="Grau de parentesco" :value="$kin->kinship" />
                    <x-detail label="WhatsApp" :value="$kin->whatsapp" />
                </div>
                <div class="detail" x-show="all" x-collapse x-cloack>
                    <x-detail label="Data de nascimento" :value="$kin->birthdate ? $kin->birthdate->format('d/m/Y') : 'Não informada'" />
                    <x-detail label="Profissão" :value="$kin->profession ?? 'Não informada'" />
                    <x-detail label="É cantor(a)" :value="$kin->is_singer ? 'Sim' : 'Não'" />
                    <x-detail label="É instrumentista" :value="$kin->is_instrumentalist ? 'Sim' : 'Não'" />
                </div>
                <div class="text-center">
                    <x-ts-button x-on:click="all = !all" color="slate" flat sm>
                        <x-ts-icon name="caret-down" class="w-4 h-4 transition"
                            x-bind:class="all ? 'rotate-180' : ''" />
                    </x-ts-button>
                </div>
            </div>
            <x-slot:footer>
                <x-ts-button text="Remover" wire:click="remove" color="red" flat />
                <x-ts-button text="Editar" wire:click="$toggle('modal')" flat />
            </x-slot>
        @else
            <div class="py-6 text-center text-sm">
                <p>Nenhum responsável adicionado.</p>
                <x-ts-button text="Adicionar responsável" wire:click="$toggle('modal')" flat />
            </div>
        @endif
    </x-ts-card>

    <x-ts-modal title="Adicionar responsável" wire size="md" persistent>
        <form wire:submit="submit" id="kin-form">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="col-span-2">
                    <x-ts-input label="Nome *" wire:model="form.name" />
                </div>
                <x-ts-select.styled label="Grau de parentesco *" wire:model="form.kinship" :options="App\Enums\KinshipEnum::cases()" />
                <x-ts-input label="WhatsApp *" wire:model="form.whatsapp" x-mask="(99) 99999-9999" />
                <x-ts-input label="Data de nascimento" wire:model="form.birthdate" type="date" />
                <x-ts-input label="Profissão" wire:model="form.profession" />
                <div class="pt-2">
                    <x-ts-toggle label="É cantor(a)" wire:model="form.is_singer" />
                </div>
                <div class="pt-2">
                    <x-ts-toggle label="É instrumentista" wire:model="form.is_instrumentalist" />
                </div>
            </div>
            <x-slot:footer>
                <x-ts-button text="Cancelar" wire:click="$toggle('modal')" flat />
                <x-ts-button type="submit" form="kin-form" text="Salvar" loading="submit" />
            </x-slot>
        </form>
    </x-ts-modal>
</div>
