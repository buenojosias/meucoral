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
                Deseja selecionar o coral deste evento para interação?
                <x-slot:footer>
                    <div class="flex justify-end">
                        {{-- <x-ts-button text="Selecionar" wire:click="selectChoir" outline sm /> --}}
                    </div>
                </x-slot:footer>
            </x-ts-alert>
        </div>
    @endif
    <div class="header">
        <h1>Detalhes do evento</h1>
    </div>
    <div class="grid lg:grid-cols-3 gap-4">
        <div class="col-span-3 lg:col-span-1 space-y-4">
            <x-ts-card class="grid grid-cols-2 lg:grid-cols-1 detail">
                <x-detail label="Tema" :value="$event->name" />
                <x-detail label="Data" :value="$event->date->format('d/m/Y')" />
                <x-detail label="Horário" :value="$event->time ? $event->time->format('H:i') : 'Não informado'" />
                <x-detail label="Local" :value="$event->place ?? 'Não informado'" />
                <x-detail label="É apresentação?" :value="$event->is_presentation ? 'Sim' : 'Não'" />
                @if (!$choirId || $event->choir_id != $choirId)
                    <x-detail label="Coral" :value="$event->choir->name" />
                @endif
                @if ($event->choir_id == $choirId)
                    <x-slot:footer>
                        <x-ts-button text="Editar" :href="route('panel.events.edit', $event)" wire:navigate flat />
                    </x-slot>
                @endif
            </x-ts-card>
            @if ($groupable && $event->groups->count())
                <x-ts-card header="Grupos atribuídos" class="space-y-4">
                    @foreach ($event->groups as $group)
                        <x-ts-checkbox checked color="teal" disabled>
                            <x-slot:label start>
                                {{ $group->name }}<br>
                                {{ $group->description }}
                            </x-slot:label>
                        </x-ts-checkbox>
                    @endforeach
                </x-ts-card>
            @endif
            @if ($confirmable)
                @livewire('panel.event.partials.event-stats', ['event' => $event])
            @endif
        </div>
        <div class="col-span-3 lg:col-span-2">
            <div class="grid grid-cols-2 gap-4">
                <div class="col-span-2 space-y-4">
                    <x-ts-card>
                        {{ $event->manager_description ?? 'Descrição não adicionada.' }}
                    </x-ts-card>
                    <div class="sm:grid grid-cols-2 gap-4">

                        @if ($confirmable && $showChoristers)
                            @livewire('panel.event.partials.event-choristers', ['event' => $event, 'groups' => $event->groups])
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="p-2 bg-primary-400 my-2">Músicas</div>
    <div class="p-2 bg-primary-400 my-2">Comentários</div> --}}
</div>
