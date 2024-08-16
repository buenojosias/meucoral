<div>
    <div class="header">
        <div>
            <h1>Editar ensaio</h1>
        </div>
        <div>
            <x-ts-button text="Voltar" :href="route('panel.encounters.show', $encounter)" wire:navigate color="slate" flat />
        </div>
    </div>
    <div class="space-y-6">
        <x-ts-card>
            <form id="form-edit" wire:submit="save">
                <div class="two-columns">
                    <div>
                        <h2>Informações do ensaio</h2>
                    </div>
                    <div class="grid gap-4">
                        <div class="grid sm:grid-cols-2 gap-4">
                            <x-ts-date label="Data *" wire:model="form.date" format="DD/MM/YYYY" />
                            @if ($groupable && $encounter->group)
                                <x-ts-input label="Grupo" :value="$encounter->group->name ?? ''" readonly />
                            @endif
                        </div>
                        <x-ts-input label="Tema *" wire:model="form.theme" />
                        <x-ts-textarea label="Descrição" wire:model="form.description" />
                    </div>
                </div>
            </form>
            <x-slot:footer>
                <x-ts-button type="submit" text="Salvar" form="form-edit" loading="save" />
            </x-slot>
        </x-ts-card>
        <x-ts-card class="two-columns">
            <div>
                <h2>Excluir ensaio</h2>
            </div>
            <div>
                @if (!$encounter->trashed())
                    <p class="text-sm">
                        Excluir o ensaio e todas as informações vinculadas a ele.
                        Você terá 30 dias para reverter esta ação.
                    </p>
                @else
                    <p class="text-sm">
                        Você solicitou a exclusão deste ensaio. As informações serão permanentemente apagadas em
                        {{ $encounter->deleted_at->addMonth()->format('d/m/Y') }}.<br>
                        Você pode desfazer esta ação agora ou excluir permanentemente imediatamente.
                    </p>
                @endif
            </div>
            <x-slot:footer>
                @if (!$encounter->trashed())
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
