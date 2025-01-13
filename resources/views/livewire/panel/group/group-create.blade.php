<div>
    <div class="header">
        <div class="title">
            <h1>Adicionar grupo ao coral</h1>
        </div>
    </div>
    @if (!$selectedChoirId)
        <x-empty title="Nenhum coral selecionado" description="Selecione um coral para criar grupos."
            btnLabel="Listar corais" :btnLink="route('panel.choirs.index')" />
    @elseif (!$isMultigroup)
        <x-ts-card>
            O coral selecionado não está definido como multigrupo.<br>
            <x-ts-link :href="route('panel.choirs.edit', $selectedChoirId)" text="Editar coral" />
        </x-ts-card>
    @else
        <x-ts-card>
            <form id="form-create" wire:submit="save">
                <div class="two-columns">
                    <div>
                        <h1>Identificação do grupo</h1>
                        <p class="description">Defina um nome para distinguir este grupo dos demais</p>
                    </div>
                    <div>
                        <x-ts-input label="Nome do grupo" wire:model="form.name" />
                    </div>
                </div>
                <hr class="my-4">
                <div class="two-columns">
                    <div>
                        <h1>Idade dos membros</h1>
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
                        <h1>Ensaios</h1>
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
                    <div></div>
                    <div class="grid sm:grid-cols-2 gap-4">
                        <x-ts-date label="Data de início" wire:model="form.start_date" format="DD/MM/YYYY" />
                        <x-ts-select.styled label="Status" wire:model="form.status" :options="App\Enums\GroupStatusEnum::cases()" />
                    </div>
                </div>
                <x-slot:footer>
                    <x-ts-button type="submit" form="form-create" text="Salvar" />
                </x-slot>
            </form>
        </x-ts-card>
    @endif
</div>
