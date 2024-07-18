<div>
    @if (auth()->user()->selected_choir_id)
        <x-ts-card class="flex items-center">
            <div class="flex-1">
                <small>Coral selecionado:</small><br>
                {{ auth()->user()->selected_choir_name }}
            </div>
            <x-ts-tooltip text="Apenas coralistas, músicas, eventos e demais registros deste coral serão exibidos."
                color="secondary" />
        </x-ts-card>
    @else
        <x-ts-card>
            Selecione um coral no link <x-ts-link text="Meus corais" :href="route('panel.choirs.index')" /> para listar seus coralistas, músicas, eventos e demais registros.
        </x-ts-card>
    @endif
</div>
