<div class="md:w-3/4 mx-auto">
    <div class="header">
        <div>
            <h1>Editar coralista</h1>
        </div>
        <div>
            <x-ts-button text="Voltar" :href="route('panel.choristers.show', $chorister)" wire:navigate color="slate" flat />
        </div>
    </div>
    <div class="space-y-4">
        @livewire('panel.chorister.partials.chorister-edit-form', ['chorister' => $chorister])
        @livewire('panel.chorister.partials.chorister-status-form', ['chorister' => $chorister])
        @livewire('panel.partials.delete-model', ['model' => $chorister, 'label' => 'coralista', 'route' => 'panel.choristers.index'])
    </div>
</div>
