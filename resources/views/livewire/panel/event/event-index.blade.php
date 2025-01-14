<div class="space-y-4">
    @if (session('status'))
        <div class="mb-4">
            <x-ts-alert :text="session('status')" color="green" light close />
        </div>
    @endif
    <div class="header">
        <div>
            <h1>Eventos</h1>
            @if ($choirId)
                <x-ts-toggle label="Exibir de todos os corais" wire:model.live="showAllChoirs" sm />
            @endif
        </div>
        @if ($choirId)
            <div>
                <x-ts-button text="Agendar" href="{{ route('panel.events.create') }}" />
            </div>
        @endif
    </div>

    <x-ts-alert icon="lightbulb" color="amber" light close>
        Espaço destinado para o agendamento de eventos do coral. Para cada evento podem ser atribuídos vários grupos.
    </x-ts-alert>

    <div class="grid lg:grid-cols-5 gap-6">
        <div class="col-span-5 lg:col-span-3 space-y-4">
            <x-ts-card>
                <div class="mb-1 pb-1.5 md:px-3 flex border-b">
                    <div>
                        <x-ts-button wire:click="goToPreviusMonth" flat icon="caret-left" />
                    </div>
                    <div class="grow text-center font-semibold text-gray-800">
                        {{ \App\Enums\MonthEnum::from($selectedMonth)->label() }}/{{ $selectedYear }}</div>
                    <div>
                        <x-ts-button wire:click="goToNextMonth" flat icon="caret-right" />
                    </div>
                </div>
                <div class="flex py-0.5">
                    @foreach ($weekDays as $weekday)
                        <div class="basis-1/7 px-2 py-1 text-center text-sm font-semibold">{{ $weekday->abbr() }}</div>
                    @endforeach
                </div>
                <div class="flex flex-wrap divide-y">
                    @for ($i = 0; $i < $firstWeekdayOfMonth; $i++)
                        <div class="basis-1/7 border-t"></div>
                    @endfor
                    @for ($i = 1; $i <= $daysInMonth; $i++)
                        @php
                            $day_events = $events->where('day', $i)->where('month', $selectedMonth);
                        @endphp
                        <div class="basis-1/7 h-12 flex items-center justify-center border-t">
                            <div
                                class="w-8 h-8 flex items-center justify-center rounded text-sm
                                {{ date($selectedYear . '-' . substr("00{$selectedMonth}", -2) . '-' . substr("00{$i}", -2)) == date('Y-m-d') && $day_events->count() == 0 ? 'text-secondary-600 font-semibold' : '' }}
                                {{ $day_events->count() > 0 ? 'bg-secondary-400 text-white font-semibold' : 'cursor-default' }}
                            ">
                                {{ $i }}
                            </div>
                        </div>
                    @endfor
                    @for ($i = 1; $i <= $remainder; $i++)
                        <div class="basis-1/7 "></div>
                    @endfor
                </div>
            </x-ts-card>
        </div>
        <div class="col-span-5 lg:col-span-2 space-y-2">
            @forelse ($events as $event)
                <div class="flex gap-3 p-2 rounded bg-white hover:bg-gray-100 shadow">
                    <div
                        class="w-8 py-1 rounded bg-secondary-400 flex flex-col justify-center items-center text-gray-100">
                        <span class="text-sm">{{ $event->day }}</span>
                        <span
                            class="text-xs uppercase">{{ \App\Enums\MonthEnum::from($event->date->format('m'))->abbr() }}</span>
                    </div>
                    <div class="flex-auto flex flex-col justify-center text-sm">
                        <a href="{{ route('panel.events.show', $event) }}">
                            <h4 class="font-semibold text-gray-800">
                                {{ $event->name }}
                            </h4>
                            @if ($event->choir_id != $choirId)
                                <p class="text-xs">{{ $event->choir->name }}</p>
                            @endif
                            @if ($confirmable)
                                <p class="text-xs">{{ $event->choristers_count }}
                                    {{ $event->choristers_count < 2 ? 'coralista confirmado' : 'coralistas confirmados' }}
                                </p>
                            @endif
                        </a>
                    </div>
                </div>
            @empty
                <x-ts-card>
                    <div class="text-center text-gray-500 text-sm font-semibold">
                        <p>Nenhum evento agendado
                            {{ $changed ? 'para o mês selecionado.' : 'para as próximas datas.' }} Clique no botão
                            acima para agendar um evento.</p>
                    </div>
                </x-ts-card>
            @endforelse
        </div>
    </div>
</div>
