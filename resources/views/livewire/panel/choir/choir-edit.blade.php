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
        <x-ts-card class="two-columns">
            <div>
                <h2>Deletar coral</h2>
            </div>
            <div>
                @if (!$choir->trashed())
                    <p class="text-sm">
                        Depois que o coral for excluído, todas as informações vinculadas a ele também serão apagadas,
                        entre elas coralalistas, ensaios, eventos, músicas etc.
                        Você terá 30 dias para reverter esta ação.
                    </p>
                @else
                    <p class="text-sm">
                        Você solicitou a exclusão deste coral. Ele será removido permanentemente em
                        {{ $choir->deleted_at->addMonth()->format('d/m/Y') }}.<br>
                        Você pode desfazer esta ação agora ou excluir permanentemente imediatamente.
                    </p>
                @endif
            </div>
            <x-slot:footer>
                @if (!$choir->trashed())
                    <x-ts-button text="Deletar" wire:click="delete" loading="delete" color="red" />
                @else
                    <x-ts-button text="Deletar permanentemente" wire:click="deletePermanently" loading="deletePermanently" color="red" />
                    <x-ts-button text="Restaurar" wire:click="restore" loading="restore" color="green" />
                @endif
            </x-slot>
        </x-ts-card>
    </div>
</div>
