<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Coralize') }} {{ @$title ? ' - ' . @$title : '' }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    {{-- <link rel="stylesheet" href="{{ asset('build/assets/landing-D1HczIaT.css') }}">
    <script src="{{ asset('build/assets/app-CifqVuM1.js') }}" defer></script> --}}
    @vite(['resources/css/landing.css', 'resources/js/app.js'])
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
</head>

<body class="bg-gray-100 antialiased">
    {{-- <div> --}}
    <header class=" sticky top-0 z-50 border-b border-gray-900 border-opacity-10 bg-white bg-opacity-60 backdrop-blur-lg">
        <nav class="max-w-5xl mx-auto flex flex-col md:flex-row items-center justify-between py-4 md:py-6"
            aria-label="Global">
            <div class="flex lg:flex-1">
                <a href="/" class="m-0 md:-m-1.5 p-1.5">
                    <span class="sr-only">Coralize</span>
                    <x-application-logo-full class="h-6 fill-current text-primary-900" />
                    {{-- <img src="{{ asset('logotype.svg') }}" alt="Coralize" class="h-6"> --}}
                </a>
            </div>
            <div class="flex mt-2 md:mt-0 gap-x-6 md:gap-x-12">
                <a href="/#recursos" class="text-sm font-semibold leading-6 text-gray-900">Recursos</a>
                {{-- <a href="/creators" class="md:hidden text-sm font-semibold leading-6 text-gray-900">Creators</a> --}}
                <a href="/#preco"
                    class="hidden md:inline-block text-sm font-semibold leading-6 text-gray-900">Preço</a>
                <a href="/#faq" class="text-sm font-semibold leading-6 text-gray-900">FAQ</a>
                <a href="{{ route('auth.register') }}"
                    class="hidden md:inline-block text-sm font-semibold leading-6 text-gray-900">Criar conta</a>
                <a href="{{ route('auth.login') }}"
                    class="md:hidden text-sm font-semibold leading-6 text-gray-900">Entrar <span
                        aria-hidden="true">&rarr;</span></a>
            </div>
            <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                <a href="{{ route('auth.login') }}" class="text-sm font-semibold leading-6 text-gray-900">Entrar
                    <span aria-hidden="true">&rarr;</span></a>
            </div>
        </nav>
    </header>
    {{ $slot }}
    <footer class="bg-primary-900">
        <div class="mx-auto max-w-5xl py-8 px-8 md:px-0 flex justify-between items-center">
            <p class="text-white text-sm font-medium"><span class="opacity-50">&copy; {{ date('Y') }}
                    Coralize</span> <span class="opacity-50">&mdash;</span> <a href="{{ route('public.privacy') }}"
                    class="underline opacity-50 hover:opacity-100">Política de privacidade</a> <span
                    class="opacity-50">&mdash;</span> <a href="{{ route('public.terms') }}"
                    class="underline opacity-50 hover:opacity-100">Termos de uso</a></p>
            <a href="https://www.instagram.com/coralize_erp" target="_blank" rel="noopener"
                class="hidden md:inline-block text-white opacity-50">
                <x-ts-icon name="instagram-logo" class="h-7 w-7" />
            </a>
        </div>
    </footer>
    {{-- </div> --}}
    @livewireScripts
</body>

</html>
