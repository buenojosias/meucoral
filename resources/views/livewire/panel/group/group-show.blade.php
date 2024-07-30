<div>
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
        <h1>{{ $group->name }}</h1>
    </div>
    <div class="flex flex-col md:flex-row gap-4">
        <x-ts-card class="detail w-full md:w-72 grid grid-cols-2 md:grid-cols-1">
            <x-detail label="Dia dos ensaios" :value="$group->encounter_weekday->label()" />
            <x-detail label="Horário dos ensaios" :value="$group->encounter_time->format('H:i')" />
            <x-detail label="Idade mínima" :value="$group->min_age ?? 'Não informada'" />
            <x-detail label="Idade máxima" :value="$group->max_age ?? 'Não informada'" />
            <x-detail label="Status" :value="$group->status" />
            <x-slot:footer>
                <x-ts-button text="Editar" :href="route('panel.groups.edit', $group)" wire:navigate flat />
            </x-slot>
        </x-ts-card>
        <div class="flex-1 space-y-4">
            <x-ts-card>
                Coralistas
            </x-ts-card>
            <x-ts-card>
                Ensaios
            </x-ts-card>
        </div>
    </div>
</div>
