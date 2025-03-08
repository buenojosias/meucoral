<div class="space-y-4">
    <div class="header">
        <div>
            <h1>Músicas</h1>
            @if ($choirId)
                <p><x-ts-link text="Gerenciar categorias" :href="route('panel.songs.categories')" /></p>
            @endif
        </div>
        @if ($choirId)
            <div>
                <x-ts-button text="Adicionar" :href="route('panel.songs.create')" />
            </div>
        @endif
    </div>

    <x-ts-alert icon="lightbulb" color="amber" light close>
        Organize o repertório do seu coral nesta seção. Adicione músicas, categorias, letras e destaque as principais.
    </x-ts-alert>

    @if (!$choirId)
        <x-empty title="Nenhum coral selecionado" description="Selecione um coral para listar e adicionar músicas."
            btnLabel="Listar corais" :btnLink="route('panel.choirs.index')" />
    @else
        <div>
            <div class="table-wrapper">
                <div class="table-header justify-between">
                    <div class="w-1/2">
                        <x-ts-input placeholder="Buscar música" icon="magnifying-glass" position="right" />
                    </div>
                    <div>
                        <x-ts-button icon="funnel" wire:click="$toggle('slide')" flat />
                    </div>
                </div>
                <table>
                    <thead>
                        <th width="1">#</th>
                        <th>Título</th>
                        <th>Categoria(s)</th>
                        <th width="1"></th>
                    </thead>
                    <tbody>
                        @foreach ($songs as $song)
                            <tr>
                                <td>{{ $song->number }}</td>
                                <td class="flex gap-x-2">
                                    @if ($song->highlighted)
                                        <x-ts-icon name="bookmark-simple" class="w-4 h-4 text-amber-500" color="amber"
                                            solid />
                                    @endif
                                    <a href="{{ route('panel.songs.show', $song->number) }}">{{ $song->title }}</a>
                                </td>
                                <td>
                                    @foreach ($song->categories as $category)
                                        <x-ts-badge :text="$category->name" color="gray" light />
                                    @endforeach
                                </td>
                                <td class="space-x-1">
                                    <x-ts-link href="#" icon="file-audio" colorless />
                                    <x-ts-link href="#" icon="guitar" colorless />
                                    <x-ts-link href="#" icon="music-note" colorless />
                                    <x-ts-link href="#" icon="pencil" colorless />
                                </td>
                            </tr>
                        @endforeach
                </table>
                <div class="table-footer">
                    {{ $songs->links() }}
                </div>
            </div>
        </div>

        <x-ts-slide title="Filtrar músicas" wire size="sm">
            <div class="mb-2 flex justify-between">
                <h3 class="font-semibold">Categorias</h3>
                <div><x-ts-link href="#" text="Gerenciar" /></div>
            </div>
            <ul class="space-y-1">
                @foreach ($categories as $key => $category)
                    <li>
                        <x-ts-radio :label="$category->name" wire:model.live="selectedCategory" :id="$key"
                            :value="$category->id" />
                    </li>
                @endforeach
            </ul>
            @if ($selectedCategory)
                <div class="mt-4">
                    <x-ts-button text="Limpar filtro de categoria" wire:click="resetCategory" class="w-full" flat sm />
                </div>
            @endif

            {{-- <div class="table-wrapper">
                <div class="table-header">Categorias</div>
                <table>
                    <tbody class="border-t">
                        @foreach ($categories as $cat)
                            <tr>
                                <td class="cursor-pointer" wire:click="selectCategory('{{ $cat->slug }}')">
                                    {{ $cat->name }}
                                </td>
                                <td width="1">
                                    @if ($category === $cat->slug)
                                        <x-ts-button icon="funnel-x" wire:click="selectCategory(null)" color="gray" sm
                                            flat />
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="p-3">
                    Gerenciar categorias
                </div>
            </div> --}}
            <x-slot:footer start class="flex flex-col gap-2">
                <x-ts-toggle label="Exibir apenas destacadas" wire:model.live="highlighted" />
                <x-ts-toggle label="Sem categoria" wire:model.live="withoutCategory" />
            </x-slot:footer>
        </x-ts-slide>
    @endif
</div>
