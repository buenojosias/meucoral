<x-ts-card>
    <form id="form-create" wire:submit="save">
        <div class="two-columns">
            <div>
                <h2>Perfil do coral</h2>
            </div>
            <div class="space-y-4">
                <x-ts-select.styled label="Estado *" wire:model.live="state_id" :options="$states"
                    select="label:abbr|value:id" />
                <x-ts-select.native label="Cidade *" wire:model="form.city_id" :disabled="!$state_id" :options="$cities"
                    select="label:name|value:id" searchable />
                <x-ts-input label="Instituição" wire:model="form.institution"
                    hint="O nome da empresa, igreja ou organização à qual o coral é vinculado" />
                <x-ts-textarea label="Descrição do coral" wire:model="form.description" />
                <div class="flex items-start gap-4">
                    {{-- <div class="flex-1">
                        <x-ts-upload label="Logo do coral" wire:model="logo" accept="image/*" />
                    </div> --}}
                    {{-- @if ($logo)
                        <img src="{{ $logo->temporaryUrl() }}" class="object-contain w-40 h-40 rounded">
                    @else
                        <x-ts-icon name="placeholder" class="w-40 h-40 text-gray-200" />
                    @endif --}}
                </div>
                @slot('footer')
                    <x-ts-button type="submit" text="Salvar" form="form-create" loading="save" />
                @endslot
            </div>
        </div>
    </form>
</x-ts-card>
