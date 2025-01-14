<div>
    @if ($event->trashed())
        @slot('banner')
            <x-ts-banner text="Este evento foi excluído. Clique em Editar para restaurá-lo." color="secondary" close />
        @endslot
    @endif
    @if (session('status'))
        <div class="mb-4">
            <x-ts-alert :text="session('status')" color="green" light close />
        </div>
    @endif
    @if (!$choirId || $event->choir_id != $choirId)
        <div class="mb-6">
            <x-ts-alert light close>
                Este evento não pertence ao coral selecionado e por isso algumas funções podem ficar restritas.<br>
                Selecione o respectivo coral na lista de corais para interação.
                <x-slot:footer>
                    <div class="flex justify-end">
                        {{-- <x-ts-button text="Selecionar" wire:click="selectChoir" outline sm /> --}}
                    </div>
                </x-slot:footer>
            </x-ts-alert>
        </div>
    @endif
    <div class="header">
        <div>
            <h1>Detalhes do evento</h1>
        </div>
        @if ($event->choir_id == $choirId)
            <div>
                <x-ts-button text="Editar" :href="route('panel.events.edit', $event)" wire:navigate flat />
            </div>
        @endif
    </div>
    <div class="grid lg:grid-cols-3 gap-4">
        <div class="col-span-3 lg:col-span-2 space-y-4">
            <x-ts-card>
                <div class="detail sm:grid grid-cols-3">
                    <div class="col-span-3">
                        <x-detail label="Nome" :value="$event->name" />
                    </div>
                    <x-detail label="Data" :value="$event->date->format('d/m/Y')" />
                    <x-detail label="Horário" :value="$event->time ? $event->time->format('H:i') : 'Não informado'" />
                    <x-detail label="É apresentação?" :value="$event->is_presentation ? 'Sim' : 'Não'" />
                    <div class="col-span-3">
                        <x-detail label="Local" :value="$event->place ?? 'Não informado'" />
                    </div>
                    @if (!$choirId || $event->choir_id != $choirId)
                        <x-detail label="Coral" :value="$event->choir->name" />
                    @endif
                </div>
                @if ($address)
                    <hr class="my-4" />
                    <div class="detail sm:grid grid-cols-3">
                        <div class="col-span-2">
                            <x-detail label="Endereço" :value="$address->address" />
                        </div>
                        <x-detail label="Complemento" :value="$address->complement" />
                        <x-detail label="Bairro" :value="$address->district" />
                        <x-detail label="Cidade" :value="$address->city_name . '/' . $address->state_abbr" />
                        <x-detail label="Ponto de referência" :value="$address->reference" />
                    </div>
                @endif
            </x-ts-card>

            <x-ts-card>
                {{ $event->manager_description ?? 'Descrição não adicionada.' }}
            </x-ts-card>

            <div class="grid md:grid-cols-2 gap-4">
                @if ($groupable)
                    <x-ts-card header="Grupos atribuídos" class="space-y-4">
                        @if ($event->groups->count())
                            @foreach ($event->groups as $group)
                                <x-ts-checkbox checked color="teal" disabled>
                                    <x-slot:label start>
                                        {{ $group->name }}<br>
                                        {{ $group->description }}
                                    </x-slot:label>
                                </x-ts-checkbox>
                            @endforeach
                        @else
                            <div class="py-6 text-center text-sm font-semibold">
                                <p>Nenhum grupo atribuído.
                                    @if ($event->choir_id == $choirId)
                                        <br>Clique em Editar para atribuir um ou mais grupos.
                                    @endif
                                </p>
                            </div>
                        @endif
                @endif
                </x-ts-card>
            </div>
        </div>
        <div class="col-span-3 lg:col-span-1 space-y-4">
            @if ($confirmable)
                @livewire('panel.event.event-choristers', ['event' => $event])
            @else
                <x-ts-card header="Confirmações de participação" class="text-center text-sm font-semibold">
                    Seu plano atual não permite a confirmação presença nos eventos.
                    Fazer upgrade.
                </x-ts-card>
            @endif
        </div>
    </div>
    {{-- @livewire('panel.comment.comment-slide', ['model' => $event, 'chorister' => null]) --}}
    {{-- <div class="p-2 bg-primary-400 my-2">Músicas</div>
    <div class="p-2 bg-primary-400 my-2">Comentários</div> --}}
</div>
