<div>
    <x-ts-card header="Contatos" class="divide-y">
        @forelse ($contacts as $contact)
            <div class="py-2 flex justify-between gap-4 detail">
                <x-detail :label="$contact->label" :value="$contact->value" />
                @if ($model->choir_id === auth()->user()->selected_choir_id && !$model->trashed())
                    <div>
                        <x-ts-button icon="pencil-simple" wire:click="edit({{ $contact->id }})" sm flat />
                        <x-ts-button icon="trash" wire:click="remove({{ $contact->id }})" color="red" sm flat />
                    </div>
                @endif
            </div>
        @empty
            <div class="py-4 text-center text-sm">
                <p>Nenhum contato adicionado.</p>
                @if ($model->choir_id === auth()->user()->selected_choir_id && !$model->trashed())
                    <x-ts-button text="Adicionar" wire:click="$toggle('modal')" flat />
                @endif
            </div>
        @endforelse
        @if ($contacts->count() && $model->choir_id === auth()->user()->selected_choir_id && !$model->trashed())
            <x-slot:footer>
                <x-ts-button text="Adicionar" wire:click="$toggle('modal')" flat />
            </x-slot>
        @endif
    </x-ts-card>

    <x-ts-modal title="Adicionar contato" wire size="sm" persistent>
        <form wire:submit="submit" id="contact-form">
            <div class="grid grid-cols-1 gap-4">
                <x-ts-select.styled label="Tipo *" wire:model="label" :options="App\Enums\ContactTypeEnum::cases()" />
                <x-ts-input label="Contato *" wire:model="value" />
            </div>
            <x-slot:footer>
                <x-ts-button text="Cancelar" wire:click="$toggle('modal')" flat />
                <x-ts-button type="submit" form="contact-form" text="Salvar" loading="submit" />
            </x-slot>
        </form>
    </x-ts-modal>
</div>
