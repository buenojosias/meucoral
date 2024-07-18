@auth
    <x-app-layout>
        @livewire('panel.dashboard')
    </x-app-layout>
@else
    @include('public.landing')
@endauth
