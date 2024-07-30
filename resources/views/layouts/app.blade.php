<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ @$title ? @$title . ' - ' : '' }} {{ config('app.name', 'Coralize') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <tallstackui:script />
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/scss/app.scss', 'resources/js/app.js'])
</head>

<body x-data="{ sidebar: false }">
    @if (isset($banner))
        {{ $banner }}
    @endif
    <div class="page">
        <div class="backdrop" x-show="sidebar" x-on:click="sidebar = false" x-transition></div>
        <div class="sidebar" :class="sidebar ? '' : '-translate-x-full sm:translate-x-0'">
            <div class="sidebar-header">
                <x-application-logo-full class="logo" />
            </div>
            <div class="custom-scrollbar">
                @include('layouts.sidebar')
            </div>
            <div class="sidebar-footer">
                <x-ts-avatar xs color="primary" />
                <div class="text-sm font-semibold text-white">
                    {{ auth()->user()->name }}
                </div>
            </div>
        </div>
        <main>
            <header>
                <div class="flex items-center gap-3">
                    <button class="sm:hidden">
                        <x-ts-icon name="list" class="h-6 w-6" x-on:click="sidebar = !sidebar" />
                    </button>
                    @livewire('partials.header_choir')
                </div>
                <div class="relative">
                    {{-- @livewire('layout.header-dropdown') --}}
                    {{-- @include('livewire.header-dropdown') --}}
                    <x-ts-avatar sm :model="auth()->user()" color="fff" />
                </div>
            </header>
            <x-ts-toast />
            <x-ts-dialog />
            <div class="content">
                {{ $slot }}
            </div>
        </main>
    </div>
    @livewireScripts
</body>

</html>
