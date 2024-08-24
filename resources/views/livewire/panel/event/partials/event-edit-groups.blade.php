<x-ts-card>
    <div class="two-columns">
        <div>
            <h2>Grupos</h2>
            <p class="description">Grupos atribuídos ao evento</p>
        </div>
        <div class="space-y-4">
            @forelse ($assignedGroups as $group)
                <div class="flex justify-between items-center">
                    <div>
                        <p class="font-bold">{{ $group->name }}</p>
                        <p class="text-sm">{{ $group->description }}</p>
                    </div>
                    <x-ts-button text="Remover" wire:click="removeGroup({{ $group->id }})" color="zinc" flat />
                </div>
            @empty
                <p class="text-sm font-semibold">Nenhum grupo atribuído. Clique em "Adicionar" para adicionar um grupo.
                </p>
            @endforelse
        </div>
    </div>
    <x-slot:footer>
        <x-ts-button text="Adicionar" wire:click="$toggle('modal')" />
    </x-slot>

    <x-ts-modal title="Adicionar grupos" wire size="sm">
        <div class="space-y-4">
            @forelse ($groups as $key => $group)
                <x-ts-checkbox wire:model.live="selectedGroups" :value="$group->id" :id="$key">
                    <x-slot:label start>
                        {{ $group->name }}<br />
                        <span class="text-sm">{{ $group->description }}</span>
                    </x-slot>
                </x-ts-checkbox>
            @empty
                <p class="text-sm font-semibold">Nenhum grupo disponível para este coral.</p>
            @endforelse
        </div>
        @if ($selectedGroups)
            <x-slot:footer>
                <x-ts-button text="Adicionar" wire:click="addGroups" />
            </x-slot>
        @endif
    </x-ts-modal>
</x-ts-card>
