<div class="bg-blue-800 w-full p-4">
    <nav class="container mx-auto flex flex-row gap-4 w-full items-center">
        @if (request()->routeIs('dashboard'))
            <x-layouts.navigation-link route="{{ route('dashboard') }}">Cavite Provincial Office</x-layouts.navigation-link>
        @else
            <x-layouts.navigation-link route="{{ route('dashboard') }}"><i
                    class="fa-solid fa-grid-2 text-3xl"></i></x-layouts.navigation-link>
            <x-layouts.navigation-link route="{{ route('dashboard') }}">Dashboard</x-layouts.navigation-link>
        @endif
        <div class="grow"></div>
        <div class="flex flex-col">
            <div class="text-sm text-gray-200 text-end font-bold">Lastname, Firstname</div>
            <div class="text-sm text-gray-200 text-end">000000</div>
        </div>
        <x-layouts.navigation-link route=""><i class="fa-solid fa-user text-3xl"></i></x-layouts.navigation-link>
    </nav>
</div>
