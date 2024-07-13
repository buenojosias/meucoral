<div class="flex justify-center">
    <x-ts-card header="Dados do coral">
        <form id="form-create" wire:submit="save" class="space-y-4">
            <x-ts-input label="Nome do coral *" wire:model="form.name" />
            <x-ts-select.styled label="Categoria *" wire:model="form.category" :options="App\Enums\ChoirCategoryEnum::cases()" />
            <x-ts-select.styled label="Faixa etária *" wire:model="form.age_group" :options="App\Enums\AgeGroupEnum::cases()" />
            <x-ts-select.styled label="Multigrupo *" wire:model="form.multigroup" :options="[
                [
                    'label' => 'Sim',
                    'value' => '1',
                    'description' => 'Os coralistas são divididos em vários grupos, com horários de ensaio distintos',
                ],
                [
                    'label' => 'Não',
                    'value' => '0',
                    'description' => 'Todos os coralistas se reunem e ensaiam no mesmo dia e horário',
                ],
            ]" select="label:label|value:value" />
            <hr class="my-2">
            <x-ts-select.styled label="Estado *" wire:model.live="state_id" :options="$states" select="label:abbr|value:id" />
            <x-ts-select.styled label="Cidade *" wire:model="profile.city_id" :disabled="!$state_id" :options="$cities" select="label:name|value:id" searchable />
            <hr class="my-2">
            <x-ts-input label="Instituição" wire:model="profile.institution" hint="O nome da empresa, igreja ou organização à qual o coral é vinculado" />
            <x-ts-textarea label="Descrição do coral" wire:model="profile.description" />
            <x-ts-upload wire:model="form.logo" label="Logo do coral" />
        </form>
        @slot('footer')
            <x-ts-button type="submit" text="Salvar" form="form-create" loading="save" />
        @endslot
    </x-ts-card>
</div>
