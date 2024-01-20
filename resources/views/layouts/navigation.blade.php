<div class="hidden md:fixed md:inset-y-0 md:flex md:w-64 md:flex-col bg-sky-950">
    <!-- Sidebar component, swap this element with another sidebar if you like -->
    <div class="flex min-h-0 flex-1 flex-col">
        <div class="flex h-14 flex-shrink-0 items-center px-4">
            <a wire:navigate.hover href="{{ route('dashboard') }}" class="href" id="{{ config('app.name') }}">
                <x-application-logo class="h-8 w-auto fill-current text-white" alt="{{ config('app.name') }}" />
            </a>
        </div>
        <div class="flex flex-1 flex-col overflow-y-auto">
            @include('layouts.navigation-items')
        </div>
    </div>
</div>

