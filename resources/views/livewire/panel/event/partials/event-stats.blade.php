<x-ts-card header="Confirmações de participação">
    <div class="grid grid-cols-3 divide-x">
        <div>
            <div class="text-sm text-gray-700">Sim</div>
            <div class="text-2xl font-semibold">{{ $stats['yes'] }}</div>
        </div>
        <div class="pl-2">
            <div class="text-sm text-gray-700">Não</div>
            <div class="text-2xl font-semibold">{{ $stats['no'] }}</div>
        </div>
        <div class="pl-2">
            <div class="text-sm text-gray-700">Talvez</div>
            <div class="text-2xl font-semibold">{{ $stats['maybe'] }}</div>
        </div>
    </div>
    @if ($showButton)
        <div class="text-center mt-4">
            <x-ts-button x-on:click="$dispatch('load-choristers'), $wire.set('showButton', false)"
                text="Carregar lista" flat />
        </div>
    @endif
</x-ts-card>
