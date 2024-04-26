@props(['active', 'label', 'href' => '#'])

@php
    $classes =
        $active ?? false
            ? 'text-gray-200 font-semibold'
            : 'text-gray-400 hover:text-gray-100';
@endphp

<li class="nav-subitem">
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $label }}
    </a>
</li>
