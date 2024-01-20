<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="font-sans antialiased h-full bg-gray-100" x-data="{ mobileMenuVar: false }">
        @include('layouts.navigation-mobile')
        @include('layouts.navigation')
        <div class="flex flex-col md:pl-64">
            @include('layouts.header')
            <main class="flex-1">
                <div class="">
                    @if (isset($header))
                        <div class="mx-auto max-w-7xl mt-8">
                            <header class="max-w-7xl mx-auto px-4 sm:px-6 uppercase">
                                {{ $header }}
                            </header>
                        </div>
                    @endif
                    <main class="max-w-7xl mx-auto px-4 sm:px-6 py-8">
                        {{ $slot }}
                    </main>
                </div>
            </main>
        </div>
    </body>
</html>
