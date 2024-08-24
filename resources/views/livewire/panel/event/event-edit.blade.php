<div class="md:w-3/4 mx-auto space-y-6">
    <div class="header">
        <div>
            <h1>Editar evento</h1>
        </div>
        <div>
            <x-ts-button text="Voltar" :href="route('panel.events.show', $event)" wire:navigate color="slate" flat />
        </div>
    </div>
    <x-ts-card class="mb-6">
        <form id="form-edit" wire:submit="save">
            <div class="two-columns">
                <div>
                    <h2>Informações do evento</h2>
                </div>
                <div class="space-y-4">
                    <x-ts-input label="Nome do evento *" wire:model="form.name" />
                    <div class="sm:grid grid-cols-2 gap-4">
                        <x-ts-date label="Data *" wire:model="form.date" format="DD/MM/YYYY" :min-date="now()"
                            helpers :disabled="$event->date->isPast()" :hint="$event->date->isPast() ? 'Não é mais possível alterar a data.' : ''" />
                        <x-ts-time label="Horário" wire:model="form.time" format="24" :step-minute="5"
                            placeholder="Opcional" />
                    </div>
                    <x-ts-input label="Local" wire:model="form.place" hint="Opcional" />
                    <x-ts-textarea label="Descrição" wire:model="form.manager_description"
                        hint="Visível apenas no painel administrativo" />
                    <hr />
                    <div class="sm:grid grid-cols-2 gap-4">
                        <x-ts-toggle label="É apresentação" wire:model="form.is_presentation" />
                    </div>
                </div>
            </div>
            <x-slot:footer>
                <x-ts-button type="submit" form="form-edit" text="Salvar" loading="save" />
            </x-slot>
        </form>
    </x-ts-card>
    @if ($addressable)
        @livewire('panel.event.partials.event-edit-address', ['event' => $event])
    @endif
    @if ($groupable && $event->choir->multigroup)
        @livewire('panel.event.partials.event-edit-groups', ['event' => $event, 'choir' => $event->choir])
    @endif
    @livewire('panel.partials.delete-model', ['model' => $event, 'label' => 'evento', 'route' => 'panel.events.index'])
</div>
