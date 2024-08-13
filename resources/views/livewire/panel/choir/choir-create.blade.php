<div>
    <div class="header">
        <h1>Cadastrar coral</h1>
    </div>
    @if ($canCreate)
        <x-ts-errors />
        <x-ts-card>
            <form id="form-create" wire:submit="save">
                <div class="two-columns">
                    <div>
                        <h2>Dados do coral</h2>
                        <p class="description">Os campos com * são de preenchimento obrigatório.</p>
                    </div>
                    <div class="space-y-4">
                        <x-ts-input label="Nome *" wire:model="form.name" />
                        <x-ts-select.styled label="Categoria *" wire:model="form.category" :options="App\Enums\ChoirCategoryEnum::cases()" />
                        <div class="grid sm:grid-cols-2 gap-4">
                            <x-ts-select.styled label="Faixa etária *" wire:model="form.age_group" :options="App\Enums\AgeGroupEnum::cases()" />
                            @if (auth()->user()->plan_id >= 3)
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
                                        'description' =>
                                            'Todos os coralistas se reunem e ensaiam no mesmo dia e horário',
                                    ],
                                ]"
                                    select="label:label|value:value" />
                            @else
                                <x-ts-input label="Multigrupo" value="Indisponível no seu plano" disabled />
                            @endif
                        </div>
                        <hr class="my-2">
                        <x-ts-select.styled label="Estado *" wire:model.live="state_id" :options="$states"
                            select="label:abbr|value:id" />
                        <x-ts-select.native label="Cidade *" wire:model="profile.city_id" :disabled="!$state_id"
                            :options="$cities" select="label:name|value:id" />
                    </div>
                </div>
                <hr class="my-6">
                <div class="two-columns">
                    <div>
                        <h2>Perfil do coral</h2>
                        <p class="description">Estas informações são opcionais</p>
                    </div>
                    <div class="space-y-4">
                        <x-ts-input label="Instituição" wire:model="profile.institution"
                            hint="O nome da empresa, igreja ou organização à qual o coral é vinculado" />
                        <x-ts-textarea label="Descrição do coral" wire:model="profile.description" />
                        <div class="flex items-start gap-4">
                            <div class="flex-1">
                                <x-ts-upload label="Logo do coral" wire:model="logo" accept="image/*" />
                            </div>
                            @if ($logo)
                                <img src="{{ $logo->temporaryUrl() }}" class="object-contain w-40 h-40 rounded">
                            @else
                                <x-ts-icon name="placeholder" class="w-40 h-40 text-gray-200" />
                            @endif
                        </div>
                        @slot('footer')
                            <x-ts-button type="submit" text="Salvar" form="form-create" loading="save" />
                        @endslot
                    </div>
                </div>
            </form>
        </x-ts-card>
    @else
        <x-ts-card class="text-center">
            O número de corais cadastrados atingiu o limite que seu plano atual permite.<br>
            Você pode alterar o plano ou excluir permanentemente algum coral já cadastrado.
        </x-ts-card>
    @endif
</div>
