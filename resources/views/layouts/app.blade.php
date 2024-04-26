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
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-background-default" x-data="{ sidebar: false }">
    <div class="page">
        <div class="backdrop" x-show="sidebar" x-on:click="sidebar = false" x-transition></div>
        <div class="sidebar" :class="sidebar ? '' : '-translate-x-full md:translate-x-0'">
            <div class="px-2">
                <x-application-logo-full class="h-7 w-auto fill-white" />
            </div>
            @include('layouts.sidebar')
        </div>
        <main>
            <header>
                <div class="flex items-center gap-3">
                    <button class="sm:hidden">
                        <x-ts-icon name="list" class="h-6 w-6" x-on:click="sidebar = !sidebar" />
                    </button>
                    <div class="page-title">
                        {{ $title ?? 'Coralize' }}
                    </div>
                </div>
                <div class="">
                    <x-ts-avatar sm :model="auth()->user()" color="fff" />
                </div>
            </header>
            <div class="content">
                {{ $slot }}
            </div>
        </main>
    </div>
    @livewireScripts
</body>

</html>
