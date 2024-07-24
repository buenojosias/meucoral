@props(['title', 'description', 'btnLabel', 'btnLink'])
<div class="max-w-4xl mx-auto px-10 py-4">
    <div class="flex flex-col justify-center py-12 items-center">
        <div class="flex justify-center items-center">
            <img class="w-64 h-64" src="{{ asset('illustrations/empty.svg') }}" alt="Sem registros">
        </div>
        <h1 class="text-gray-700 font-medium text-2xl text-center mb-3">{{ $title }}</h1>
        <p class="text-gray-500 text-center mb-6">{{ $description }}</p>
        <div class="flex flex-col justify-center">
            <x-ts-button :text="$btnLabel" :href="$btnLink" wire:navigate outline />
            <a href="#" class="underline mt-4 text-sm font-light mx-auto">Learn more</a>
        </div>
    </div>
</div>
