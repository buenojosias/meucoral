<div class="lg:w-4/5 mx-auto space-y-6">
    @if (session()->has('firstAccess'))
        <div class="mt-6">
            <h1 class="text-5xl font-bold text-gray-800 mb-6">Bem vindo ao<br>Coralize!</h1>
            <p class="text-lg">Estamos muito felizes por tê-lo conosco!<br>
                Aqui no Coralize, você encontrará todas as ferramentas necessárias
                para gerenciar seus corais, coralistas, músicas, eventos e muito mais, tudo em um só lugar.</p>

            <h2 class="text-2xl font-semibold text-gray-700 mt-4">Qual é o próximo passo?</h2>
            <p class="text-lg mb-6">Cadastre seu coral para adicionar outras informações relacionadas a ele.</p>
            <x-ts-button text="Cadastrar coral" color="primary" href="{{ route('panel.choirs.create') }}" lg />

            <p class="text-sm mt-6 text-gray-900">
                <span class="font-semibold">Observação:</span>
                Esta é a nossa primeira versão, e estamos constantemente aprimorando a plataforma para atender melhor às
                suas necessidades.<br>
                Se encontrar algo que possa ser melhorado ou tiver uma sugestão, não hesite em nos contar!<br>
                <a href="mailto:suporte@coralize.com.br">suporte@coralize.com.br</a>
            </p>
        </div>
    @else
        <x-ts-alert icon="lightbulb" color="amber" light close>
            Em algumas páginas você receberá dicas de uso como esta.
        </x-ts-alert>

        <div class="mb-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            <x-ts-stats title="Coralistas ativos" icon="users" :number="$choristersCount" :href="route('panel.choristers.index')" wire:navigate />
            <x-ts-stats title="Corais" icon="users-four" color="purple" :number="$choirsCount" :href="route('panel.choirs.index')"
                wire:navigate />
            <x-ts-stats title="Grupos" icon="users-three" color="amber" :number="$groupsCount" :href="route('panel.groups.index')"
                wire:navigate />
        </div>
        @if (auth()->user()->selected_choir_id)
            <x-ts-card class="flex items-center">
                <div class="flex-1">
                    <p class="text-sm">Coral selecionado:</p>
                    <p class="font-semibold text-gray-800">{{ auth()->user()->selected_choir_name }}</p>
                </div>
                <x-ts-tooltip
                    text="Apenas grupos, músicas, eventos e demais registros deste coral serão exibidos nas páginas internas."
                    color="secondary" />
            </x-ts-card>
        @else
            <x-ts-card>
                Selecione um coral no link <x-ts-link text="Meus corais" :href="route('panel.choirs.index')" /> para listar seus
                coralistas,
                músicas, eventos e demais registros.
            </x-ts-card>
        @endif
        <div class="mb-6 grid grid-cols-1 md:grid-cols-2 gap-4">
            <div
                class="mt-2 px-3 py-2 flex space-x-4 items-center bg-white border-r-0 border-secondary-600 rounded-lg shadow">
                <div class="px-1.5 py-4 h-full rounded-lg bg-secondary-500">
                    <x-ts-icon name="calendar-dots" class="h-10 w-10 text-white" light />
                </div>
                <div>
                    <h3 class="text-xl text-secondary-700 font-bold">Próximo evento</h3>
                    @if ($nextEvent)
                        <a href="{{ route('panel.events.show', $nextEvent) }}">
                            <p class="text-sm font-semibold text-gray-500">
                                {{ $nextEvent->date->format('d-m-d') == now()->format('d-m-d') ? 'Hoje' : $nextEvent->date->format('d/m/Y') }}
                            </p>
                            <p class="font-semibold text-gray-800">{{ $nextEvent->name }}</p>
                        </a>
                    @else
                        <p class="text-gray-800">Nenhum evento agendado</p>
                    @endif
                </div>
            </div>
            <div
                class="mt-2 px-3 py-2 flex space-x-4 items-center bg-white border-r-0 border-primary-600 rounded-lg shadow">
                <div class="px-1 py-4 h-full rounded-lg bg-primary-500">
                    <x-ts-icon name="chalkboard-teacher" class="h-10 w-10 text-white" light />
                </div>
                <div>
                    <h3 class="text-xl text-primary-700 font-bold">Próximo ensaio</h3>
                    @if ($nextEncounter)
                        <a href="{{ route('panel.encounters.show', $nextEncounter) }}">
                            <p class="text-sm font-semibold text-gray-500">
                                {{ $nextEncounter->date->format('d-m-d') == now()->format('d-m-d') ? 'Hoje' : $nextEncounter->date->format('d/m/Y') }}
                            </p>
                            <p class="font-semibold text-gray-800">{{ $nextEncounter->theme }}</p>
                        </a>
                    @else
                        <p class="text-gray-800">Nenhum ensaio programado</p>
                    @endif
                </div>
            </div>
        </div>
    @endif
</div>
