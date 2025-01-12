<div class="space-y-6">
    @if (!$canGroup)
        <x-ts-card>
            Seu plano atual não permite a criação de grupos.
        </x-ts-card>
    @else
        <div class="header">
            <div>
                <h1>Editar grupo</h1>
            </div>
            <div>
                <x-ts-button text="Voltar" :href="route('panel.groups.show', $group)" wire:navigate color="slate" flat />
            </div>
        </div>
        <x-ts-card class="mb-6">
            <form id="form-create" wire:submit="save">
                <div class="two-columns">
                    <div>
                        <h2>Identificação do grupo</h2>
                        <p class="description">Defina um nome para distinguir este grupo dos demais</p>
                    </div>
                    <div>
                        <x-ts-input label="Nome do grupo" wire:model="form.name" />
                    </div>
                </div>
                <hr class="my-4">
                <div class="two-columns">
                    <div>
                        <h2>Idade dos membros</h2>
                        <p class="description">Se houver idade mínima e máxima para os membros do grupo, informe ao lado
                        </p>
                    </div>
                    <div class="grid sm:grid-cols-2 gap-4">
                        <x-ts-number label="Idade mínima" wire:model="form.min_age" min="1" />
                        <x-ts-number label="Idade máxima" wire:model="form.max_age" min="1" />
                    </div>
                </div>
                <hr class="my-4">
                <div class="two-columns">
                    <div>
                        <h2>Ensaios</h2>
                        <p class="description">Informe o dia e horário dos ensaios do grupo</p>
                    </div>
                    <div class="grid sm:grid-cols-2 gap-4">
                        <x-ts-select.styled label="Dia dos ensaios" wire:model="form.encounter_weekday"
                            :options="$weekDays" select="label:label|value:value" />
                        <x-ts-time label="Horário dos ensaios" wire:model="form.encounter_time" format="24"
                            :step-minute="5" />
                    </div>
                </div>
                <hr class="my-4">
                <div class="two-columns">
                    <div>
                        <h2>Período e status</h2>
                        <p class="description">Informe a data de início e, se houver, a data de encerramento do grupo
                        </p>
                    </div>
                    <div class="grid sm:grid-cols-2 gap-4">
                        <x-ts-date label="Data de início" wire:model="form.start_date" format="DD/MM/YYYY" />
                        <x-ts-date label="Data de encerramento" wire:model="form.end_date" format="DD/MM/YYYY" />
                        <x-ts-select.styled label="Status" wire:model="form.status" :options="App\Enums\GroupStatusEnum::cases()" />
                    </div>
                </div>
                <x-slot:footer>
                    <x-ts-button type="submit" form="form-create" text="Salvar" />
                </x-slot>
            </form>
        </x-ts-card>
        @livewire('panel.partials.delete-model', ['model' => $group, 'label' => 'grupo', 'route' => 'panel.groups.index'])
    @endif
</div>
