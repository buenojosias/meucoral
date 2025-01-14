<div class="md:w-3/4 mx-auto">
    <div class="header">
        <div class="title">
            <h1>Categorias musicais</h1>
        </div>
        @if ($choirId)
            <div>
                <x-ts-button text="Adicionar categoria" x-on:click="$wire.dispatch('openModal')" />
            </div>
        @endif
    </div>
    @if (!$choirId)
        <x-empty title="Nenhum coral selecionado" description="Selecione um coral para listar e adicionar categorias."
            btnLabel="Listar corais" :btnLink="route('panel.choirs.index')" />
    @else
        <div class="space-y-2">
            @foreach ($categories as $category)
                <div class="px-4 py-1.5 bg-white shadow-md rounded-lg">
                    <div class="flex justify-between items-center">
                        <div>
                            <h2 class="font-semibold">{{ $category->name }}</h2>
                            <p class="text-sm text-gray-600">{{ $category->songs_count }} músicas</p>
                        </div>
                        <div>
                            <x-ts-button icon="pencil" x-on:click="$wire.dispatch('openModal', { categoryId: {{ $category->id }} })" sm flat />
                            <x-ts-button icon="trash" wire:click="delete({{$category->id}})" color="red" sm flat />
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @livewire('panel.category.category-form', ['choirId' => $choirId])
    @endif
</div>
