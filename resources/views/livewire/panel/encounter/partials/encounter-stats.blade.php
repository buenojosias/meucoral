<x-ts-card>
    @if ($encounter->has_attendance)
        <div class="grid grid-cols-3 divide-x">
            <div>
                <div class="text-sm text-gray-700">Presenças</div>
                <div class="text-2xl font-semibold">{{ $attendance['presences'] }}</div>
            </div>
            <div class="pl-2">
                <div class="text-sm text-gray-700">Faltas</div>
                <div class="text-2xl font-semibold">{{ $attendance['absences'] }}</div>
            </div>
            <div class="pl-2">
                <div class="text-sm text-gray-700">Justificativas</div>
                <div class="text-2xl font-semibold">{{ $attendance['justified'] }}</div>
            </div>
        </div>
        @if ($showButton)
            <div class="text-center mt-4">
                <x-ts-button x-on:click="$dispatch('load-attendance'), $wire.set('showButton', false)"
                    text="Carregar chamada" flat />
            </div>
        @endif
    @else
        <div class="flex justify-between items-center">
            <p>Chamada ainda não lançada.</p>
            @if ($showButton)
                <x-ts-button x-on:click="$dispatch('load-attendance'), $wire.set('showButton', false)"
                    text="Lançar chamada" sm />
            @endif
        </div>
    @endif
</x-ts-card>
