<div>
    <div class="mb-6 grid grid-cols-2 md:grid-cols-3 gap-4">
        <x-ts-stats title="Coralistas ativos" icon="users" :number="$choristersCount" :href="route('panel.choristers.index')" animated />
        <x-ts-stats title="Corais" icon="users-four" color="purple" :number="$choirsCount" :href="route('panel.choirs.index')" />
        @if ($planId >= 3)
            <x-ts-stats title="Grupos" icon="users-three" color="amber" :number="$groupsCount" :href="route('panel.groups.index')" />
        @endif
    </div>
    @if (auth()->user()->selected_choir_id)
        <x-ts-card class="flex items-center">
            <div class="flex-1">
                <small>Coral selecionado:</small><br>
                {{ auth()->user()->selected_choir_name }}
            </div>
            <x-ts-tooltip text="Apenas grupos, músicas, eventos e demais registros deste coral serão exibidos nas páginas internas."
                color="secondary" />
        </x-ts-card>
    @else
        <x-ts-card>
            Selecione um coral no link <x-ts-link text="Meus corais" :href="route('panel.choirs.index')" /> para listar seus coralistas,
            músicas, eventos e demais registros.
        </x-ts-card>
    @endif
</div>
