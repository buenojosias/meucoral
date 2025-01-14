<div class="md:w-3/4 mx-auto">
    <div class="header">
        <div class="title">
            <h1>Adicionar música</h1>
        </div>
    </div>
    @if (!$choirId)
        <x-empty title="Nenhum coral selecionado" description="Selecione um coral para adicionar músicas."
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
                        @foreach ($categories as $key => $category)
                            <x-ts-checkbox :label="$category->name" wire:model="selectedCategories" :value="$category->id" :id="$key" />
                        @endforeach
                    </div>
                </div>
            </form>
            <x-slot:footer>
                <x-ts-button type="submit" text="Cadastrar" form="form-create" loading="submit" />
            </x-slot>
        </x-ts-card>
    @endif
</div>
