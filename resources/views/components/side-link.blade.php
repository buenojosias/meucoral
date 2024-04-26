@props(['active', 'label', 'badge' => null, 'href' => null, 'icon' => null])

@php
    $classes =
        $active ?? false
            ? 'text-gray-100 bg-primary-900'
            : 'text-gray-50 hover:bg-primary-800 hover:text-gray-100';
@endphp

@if ($href)
    <li class="nav-item">
        <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
            @if ($icon)
                <x-ts-icon name="{{ $icon }}" class="mr-2 h-5 w-5" />
            @endif
            <span class="flex-1">{{ $label }}</span>
            @if ($badge)
                <x-ts-badge text="{{ $badge }}" color="secondary" light round xs />
            @endif
        </a>
    </li>
@else
    <li class="nav-item" x-data="{ show: false }">
        <button @click="show = !show" type="button" :class="'flex items-center w-full'"
            {{ $attributes->merge(['class' => $classes]) }} aria-controls="dropdown-pages"
            data-collapse-toggle="dropdown-pages">
            @if ($icon)
                <x-ts-icon name="{{ $icon }}" class="mr-2 h-5 w-5" />
            @endif
            <span class="flex-1 text-left whitespace-nowrap">{{ $label }}</span>
            <x-ts-icon name="caret-down" class="h-4 w-4" />
        </button>
        <ul x-show="show" x-transition class="space-y-1 mt-1">
            {{ $slot }}
        </ul>
    </li>
@endif
