<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">
    <head>
        @include('partials.head')
        @livewireStyles
    </head>
    <body class="min-h-screen bg-white">
        <!-- Основной контент -->
        <main>
            {{ $slot }}
        </main>
        @livewireScripts
        @fluxScripts
        
    @stack('scripts')
    </body>
</html> 