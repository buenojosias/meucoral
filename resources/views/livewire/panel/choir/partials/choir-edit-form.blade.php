<x-ts-card>
    <form id="form-edit" wire:submit="save">
        <div class="two-columns">
            <div>
                <h2>Dados do coral</h2>
            </div>
            <div class="space-y-4">
                <x-ts-input label="Nome *" wire:model="form.name" />
                <x-ts-select.styled label="Categoria *" wire:model="form.category" :options="App\Enums\ChoirCategoryEnum::cases()" />
                <div class="grid sm:grid-cols-2 gap-4">
                    <x-ts-select.styled label="Faixa etária *" wire:model="form.age_group" :options="App\Enums\AgeGroupEnum::cases()" />
                    <x-ts-select.styled label="Multigrupo *" wire:model="form.multigroup" :options="[
                        [
                            'label' => 'Sim',
                            'value' => '1',
                            'description' =>
                                'Os coralistas são divididos em vários grupos, com horários de ensaio distintos',
                        ],
                        [
                            'label' => 'Não',
                            'value' => '0',
                            'description' => 'Todos os coralistas se reunem e ensaiam no mesmo dia e horário',
                        ],
                    ]"
                        select="label:label|value:value" />
                </div>
            </div>
        </div>
    </form>
    <x-slot:footer>
        <x-ts-button type="submit" form="form-edit" text="Salvar" />
    </x-slot>
</x-ts-card>
