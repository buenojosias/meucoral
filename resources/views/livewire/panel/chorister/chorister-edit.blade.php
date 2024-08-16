<div class="md:w-3/4 mx-auto">
    <div class="header">
        <div>
            <h1>Editar coralista</h1>
        </div>
        <div>
            <x-ts-button text="Voltar" :href="route('panel.choristers.show', $chorister)" wire:navigate color="slate" flat />
        </div>
    </div>
    <div class="space-y-6">
        @livewire('panel.chorister.partials.chorister-edit-form', ['chorister' => $chorister])
        @livewire('panel.chorister.partials.chorister-status-form', ['chorister' => $chorister])
        <x-ts-card class="two-columns">
            <div>
                <h2>Excluir coralista</h2>
            </div>
            <div>
                @if (!$chorister->trashed())
                    <p class="text-sm">
                        Excluir o(a) coralistas e todas as informações vinculadas.
                        Você terá 30 dias para reverter esta ação.
                    </p>
                @else
                    <p class="text-sm">
                        Você solicitou a exclusão deste(a) coralista. As informações serão permanentemente apagadas em
                        {{ $chorister->deleted_at->addMonth()->format('d/m/Y') }}.<br>
                        Você pode desfazer esta ação agora ou excluir permanentemente imediatamente.
                    </p>
                @endif
            </div>
            <x-slot:footer>
                @if (!$chorister->trashed())
                    <x-ts-button text="Excluir" wire:click="delete" loading="delete" color="red" />
                @else
                    <x-ts-button text="Exluir permanentemente" wire:click="deletePermanently"
                        loading="deletePermanently" color="red" />
                    <x-ts-button text="Restaurar" wire:click="restore" loading="restore" color="green" />
                @endif
            </x-slot>
        </x-ts-card>
    </div>
</div>
