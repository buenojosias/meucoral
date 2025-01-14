<div>
    <div class="header">
        <div>
            <h1>Editar música</h1>
        </div>
        @if ($choirId)
            <div>
                <x-ts-button text="Voltar" :href="route('panel.songs.show', $song->number)" wire:navigate flat />
            </div>
        @endif
    </div>
    @if (!$choirId)
        <x-empty title="Nenhum coral selecionado" description="Selecione um coral para editar a música."
            btnLabel="Listar corais" :btnLink="route('panel.choirs.index')" />
    @else
        <x-ts-card>
            <form id="form-create" wire:submit="submit">
                <div class="two-columns">
                    <div>
                        <h2>Informações básicas</h2>
                    </div>
                    <div class="space-y-4 grid-cols-2">
                        <x-ts-input type="number" min="1" label="Número *" wire:model="form.number"
                            hint="Número de identificação único para cada coral" />
                        <x-ts-input label="Título *" wire:model="form.title" />
                        <x-ts-input label="Autor/compositor" wire:model="form.author" />
                    </div>
                </div>
                <hr class="my-4">
                <div class="two-columns">
                    <div>
                        <h2>Categorias</h2>
                    </div>
                    <div class="space-y-1">
                        @foreach ($categories as $category)
                            <x-ts-checkbox id="category-{{ $category->id }}" value="{{ $category->id }}"
                                wire:model="selectedCategories" :label="$category->name" />
                        @endforeach
                    </div>
                </div>
            </form>
            <x-slot:footer>
                <x-ts-button :href="route('panel.songs.categories')" text="Gerenciar categorias" outline />
                <x-ts-button type="submit" text="Salvar" form="form-create" loading="submit" />
            </x-slot>
        </x-ts-card>
    @endif
</div>
