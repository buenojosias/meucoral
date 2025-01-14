<x-ts-card header="Categorias" class="space-y-2">
    @forelse ($categories as $category)
        <div class="flex justify-between gap-x-4 px-2 py-1.5 bg-gray-200 rounded text-sm font-semibold shadow">
            {{ $category->name }}
            <x-ts-button icon="trash" wire:click="detach({{ $category->id }})" color="dark" sm />
        </div>
    @empty
        <p class="text-sm font-semibold text-center text-gray-800">Nenhuma categoria adicionada.</p>
    @endforelse
</x-ts-card>
