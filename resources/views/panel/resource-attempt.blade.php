<x-app-layout>
    <h1 class="text-4xl font-semibold text-gray-800 mb-6">{{ $error === "limit" ? "Limite atingido" : "Recurso indisponível" }}</h1>
    @if ($error === "limit")
        <p class="text-gray-600 text-lg font-semibold mb-6">Você atingiu o limite {{ Str::lower($resource->label) }} permitidos no seu plano.<br>
        Que tal fazer um upgrade para aumentar o limite?</p>
    @else
        <p class="text-gray-600 text-lg font-semibold mb-6">O recurso de {{ Str::lower($resource->label) }} não está disponível no seu plano.<br>
        Que tal fazer um upgrade para libear este e outros recursos?</p>
    @endif
    <x-ts-button text="Fazer upgrade" lg />
</x-app-layout>
