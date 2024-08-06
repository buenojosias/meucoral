<x-ts-card>
    <form id="form-edit" wire:submit="save">
        <div class="two-columns">
            <div>
                <h2>Dados do(a) coralista</h2>
            </div>
            <div class="space-y-4 grid-cols-2">
                <x-ts-input label="Nome completo *" wire:model="form.name" />
                <div class="grid sm:grid-cols-2 gap-4">
                    <x-ts-input label="Data de nascimento *" type="date" wire:model="form.birthdate" />
                    <x-ts-input label="Data da inscrição" type="date" wire:model="form.registration_date" />
                </div>
            </div>
        </div>
    </form>
    <x-slot:footer>
        <x-ts-button type="submit" text="Salvar" form="form-edit" loading="save" />
    </x-slot>
</x-ts-card>
