<div>
    <div class="header">
        <div>
            <h1>Meus corais</h1>
            <h2>Exibindo corais</h2>
        </div>
        @if ($choirs)
            <div>
                <x-ts-button text="Adicionar coral" :href="route('panel.choirs.create')" wire:navigate lg />
            </div>
        @endif
    </div>

    @if ($choirs)
        <div class="space-y-4">
            @foreach ($choirs as $choir)
                <x-ts-card>
                    {{ $choir->name }} <br>
                    999 coralistas
                </x-ts-card>
            @endforeach
        </div>
    @else
        <div class="max-w-4xl mx-auto px-10 py-4 ">
            <div class="flex flex-col justify-center py-12 items-center">
                <div class="flex justify-center items-center">
                    <img class="w-64 h-64"
                        src="https://res.cloudinary.com/daqsjyrgg/image/upload/v1690257804/jjqw2hfv0t6karxdeq1s.svg"
                        alt="image empty states">
                </div>
                <h1 class="text-gray-700 font-medium text-2xl text-center mb-3">Adicione seu primeiro coral.</h1>
                <p class="text-gray-500 text-center mb-6">Project are the backbones of time entry categorization in your
                    workspace.</p>
                <div class="flex flex-col justify-center">
                    <x-ts-button text="Adicionar coral" outline />
                    <a href="#" class="underline mt-4 text-sm font-light mx-auto">Learn more</a>
                </div>
            </div>
        </div>
    @endif


</div>
