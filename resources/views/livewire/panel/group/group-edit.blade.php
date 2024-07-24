<div class="space-y-6">
    <x-ts-toast />
    <div class="header">
        <div>
            <h1>Editar grupo</h1>
        </div>
        <div>
            <x-ts-button text="Voltar" :href="route('panel.groups.show', $group)" wire:navigate color="slate" flat />
        </div>
    </div>
    <x-ts-card class="mb-6">
        <form id="form-create" wire:submit="save">
            <div class="two-columns">
                <div>
                    <h1>Identificação do grupo</h1>
                    <p class="description">Defina um nome para distinguir este grupo dos demais</p>
                </div>
                <div>
                    <x-ts-input label="Nome do grupo" wire:model="form.name" />
                </div>
            </div>
            <hr class="my-4">
            <div class="two-columns">
                <div>
                    <h1>Idade dos membros</h1>
                    <p class="description">Se houver idade mínima e máxima para os membros do grupo, informe ao lado</p>
                </div>
                <div class="grid sm:grid-cols-2 gap-4">
                    <x-ts-number label="Idade mínima" wire:model="form.min_age" min="1" />
                    <x-ts-number label="Idade máxima" wire:model="form.max_age" min="1" />
                </div>
            </div>
            <hr class="my-4">
            <div class="two-columns">
                <div>
                    <h1>Ensaios</h1>
                    <p class="description">Informe o dia e horário dos ensaios do grupo</p>
                </div>
                <div class="grid sm:grid-cols-2 gap-4">
                    <x-ts-select.styled label="Dia dos ensaios" wire:model="form.encounter_weekday" :options="$weekDays"
                        select="label:label|value:value" />
                    <x-ts-time label="Horário dos ensaios" wire:model="form.encounter_time" format="24"
                        :step-minute="5" />
                </div>
            </div>
            <hr class="my-4">
            <div class="two-columns">
                <div></div>
                <div class="grid sm:grid-cols-2">
                    <x-ts-select.styled label="Status" wire:model="form.status" :options="App\Enums\GroupStatusEnum::cases()" />
                </div>
            </div>
            <x-slot:footer>
                <x-ts-button type="submit" form="form-create" text="Salvar" />
            </x-slot>
        </form>
    </x-ts-card>
    <x-ts-card class="two-columns">
        <div>
            <h2>Deletar grupo</h2>
        </div>
        <div>
            @if (!$group->trashed())
                <p class="text-sm">
                    Depois que o grupo for excluído, todas as informações vinculadas a ele também serão apagadas.
                    Você terá 30 dias para reverter esta ação.
                </p>
            @else
                <p class="text-sm">
                    Você solicitou a exclusão deste grupo. Ele será removido permanentemente em
                    {{ $group->deleted_at->addMonth()->format('d/m/Y') }}.<br>
                    Você pode desfazer esta ação agora ou excluir permanentemente imediatamente.
                </p>
            @endif
        </div>
        <x-slot:footer>
            @if (!$group->trashed())
                <x-ts-button text="Deletar" wire:click="delete" loading="delete" color="red" />
            @else
                <x-ts-button text="Deletar permanentemente" wire:click="deletePermanently" loading="deletePermanently"
                    color="red" />
                <x-ts-button text="Restaurar" wire:click="restore" loading="restore" color="green" />
            @endif
        </x-slot>
    </x-ts-card>
</div>
