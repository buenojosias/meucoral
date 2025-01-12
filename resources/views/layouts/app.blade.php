<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ @$title ? @$title . ' - ' : '' }} {{ config('app.name', 'Coralize') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <tallstackui:script />
    @livewireStyles
    {{-- <link rel="stylesheet" href="{{ asset('build/assets/app-HXFEkoYz.css') }}">
    <script src="{{ asset('build/assets/app-CifqVuM1.js') }}" defer></script> --}}
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>

<body x-data="{ sidebar: false }">
    {{-- @if (isset($banner))
        {{ $banner }}
    @endif --}}
    <div class="page">
        <div class="backdrop" x-show="sidebar" x-on:click="sidebar = false" x-transition></div>
        <div class="sidebar" :class="sidebar ? '' : '-translate-x-full sm:translate-x-0'" x-data="{ showsbf: false }">
            <div class="sidebar-header">
                <x-application-logo class="logo" />
            </div>
            <div class="custom-scrollbar">
                @include('layouts.sidebar')
            </div>
            <div x-show="showsbf" x-collapse>
                <ul class="space-y-1">
                    @livewire('partials.logout')
                </ul>
            </div>
            <div class="sidebar-footer" x-on:click="showsbf = !showsbf">
                <x-ts-avatar xs color="primary" />
                <div class="text-sm font-semibold text-white">
                    {{ auth()->user()->name ?? '' }}
                </div>
            </div>
        </div>
        <main>
            @if (isset($banner))
                {{ $banner }}
            @endif
            <header>
                <div class="flex items-center gap-3">
                    <button class="sm:hidden">
                        <x-ts-icon name="list" class="h-6 w-6" x-on:click="sidebar = !sidebar" />
                    </button>
                    @livewire('partials.header_choir')
                </div>
                <div class="relative">
                    @livewire('layout.header-dropdown')
                    {{-- <x-ts-avatar sm :model="auth()->user()" color="fff" /> --}}
                    {{-- <small class="text-gray-800">v. 0.4.2-beta</small> --}}
                </div>
            </header>
            <x-ts-toast />
            <x-ts-dialog />
            <div class="content">
                @if (isset($slot))
                    {{ $slot }}
                @else
                    @yield('slot')
                @endif
            </div>
        </main>
    </div>
    @livewireScripts
</body>

</html>
