<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Alpine.js -->
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v7.1.0/css/all.css" />
        <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v7.1.0/css/sharp-solid.css" />
        <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v7.1.0/css/sharp-regular.css" />
        <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v7.1.0/css/sharp-light.css" />
        <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v7.1.0/css/duotone.css" />

        @livewireStyles
    </head>

    <body>
        <div class="flex flex-col h-screen">
            @include('layouts.navigation')

            <div class="container mx-auto p-4 grow overflow-y-auto">
                {{ $slot }}
            </div>

            @if (request()->routeIs('dashboard'))
                @include('layouts.footer')
            @endif
        </div>
        @livewireStyles
    </body>

</html>
