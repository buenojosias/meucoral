<div>
    @if (!$canGroup)
        <x-ts-card>
            Seu plano atual não permite a criação de grupos.
        </x-ts-card>
    @else
        @if ($group->trashed())
            @slot('banner')
                <x-ts-banner text="Este grupo foi excluído. Clique em Editar para restaurá-lo." color="secondary" close />
            @endslot
        @endif
        @if (session('status'))
            <div class="mb-4">
                <x-ts-alert :text="session('status')" color="green" light close />
            </div>
        @endif
        <div class="header">
            <div>
                <h1>{{ $group->name }}</h1>
                <h2>Grupo</h2>
            </div>
        </div>
        <div class="grid md:grid-cols-3 gap-4">
            <div>
                <x-ts-card class="grid grid-cols-2 md:grid-cols-1 detail">
                    <x-detail label="Dia dos ensaios" :value="$group->encounter_weekday->label()" />
                    <x-detail label="Horário dos ensaios" :value="$group->encounter_time->format('H:i')" />
                    <x-detail label="Idade mínima" :value="$group->min_age ?? 'Não informada'" />
                    <x-detail label="Idade máxima" :value="$group->max_age ?? 'Não informada'" />
                    <x-detail label="Data de início" :value="$group->start_date->format('d/m/Y')" />
                    @if ($group->end_date)
                        <x-detail label="Data de encerramento" :value="$group->end_date->format('d/m/Y')" />
                    @endif
                    <x-detail label="Status" :value="$group->status" />
                    <x-slot:footer>
                        <x-ts-button text="Editar" :href="route('panel.groups.edit', $group)" wire:navigate flat />
                    </x-slot>
                </x-ts-card>
            </div>
            <div class="md:col-span-2 space-y-4">
                @if ($group->choir->multigroup)
                    @livewire('panel.group.partials.group-choristers', ['group' => $group])
                @endif
                @livewire('panel.group.partials.group-encounters', ['group' => $group])
                <div class="col-span-2">
                    @livewire('panel.partials.comment-list', ['model' => $group])
                </div>
            </div>
        </div>
    @endif
</div>
