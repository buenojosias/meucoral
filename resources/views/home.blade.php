@auth
    <x-app-layout>
        @livewire('admin.dashboard')
    </x-app-layout>
@else
    @include('public.landing')
@endauth
