<div>
    <div class="header">
        <div>
            <h1>Editar coral</h1>
        </div>
        <div>
            <x-ts-button text="Voltar" :href="route('panel.choirs.show', $choir)" wire:navigate color="slate" flat />
        </div>
    </div>
    <div class="space-y-6">
        @livewire('panel.choir.partials.choir-edit-form', ['choir' => $choir])
        @livewire('panel.choir.partials.choir-logo-form', ['choir' => $choir])
        @livewire('panel.choir.partials.choir-profile-edit', ['choir' => $choir])
        @livewire('panel.partials.delete-model', ['model' => $choir, 'label' => 'coral', 'route' => 'panel.choirs.index'])
    </div>
</div>
