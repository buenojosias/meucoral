<div x-data="{ show_upload: false }">
    <x-ts-card class="two-columns">
        <div>
            <h2>Logo</h2>
        </div>
        <div class="flex flex-col md:flex-row md:items-center gap-2">
            @if ($profile->logo)
                <img src="{{ route('files.logo', $profile->logo) }}" class="object-cover w-28 h-28 rounded"
                    alt="Arquivo não encontrado">
            @else
                <p class="text-sm" x-show="!show_upload">Nunhuma logo adicionada.</p>
            @endif
            <div x-show="show_upload" class="flex-1" x-collapse>
                <x-ts-upload wire:model="logo" accept="image/*" />
            </div>
            <div x-show="show_upload">
                <x-ts-button text="Cancelar" x-on:click="show_upload = false" flat />
            </div>
        </div>
        <x-slot:footer>
            @if ($profile->logo)
                <x-ts-button text="Remover logo" wire:click="remove" flat />
                <x-ts-button text="Alterar logo" x-on:click="show_upload = true" />
            @else
                <x-ts-button text="Adicionar logo" x-on:click="show_upload = true" />
            @endif
        </x-slot>
    </x-ts-card>
</div>
