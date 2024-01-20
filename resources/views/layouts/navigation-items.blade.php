<nav class="flex-1 space-y-1 pl-2 py-4 uppercase">
    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
    <a href="{{ route('dashboard') }}" wire:navigate.hover class="bg-sky-200 text-sky-950 group flex items-center px-2 py-2 text-sm font-medium  rounded-l-md border-r-4 border-sky-700">
        <x-heroicon-o-home class="mr-3 flex-shrink-0 h-6 w-6" />
        Dashboard
    </a>
    <a href="#"
       wire:navigate.hover
       class="text-white hover:bg-sky-100 hover:text-sky-950 group flex items-center px-2 py-2 text-sm font-medium hover:rounded-l-md hover:border-r-4 hover:border-sky-600">
        <x-heroicon-o-users class="mr-3 flex-shrink-0 h-6 w-6" />
        Team
    </a>
    <a wire:navigate.hover href="#"
       wire:navigate.hover
       class="text-white hover:bg-sky-100 hover:text-sky-950 group flex items-center px-2 py-2 text-sm font-medium hover:rounded-l-md hover:border-r-4 hover:border-sky-600">
        <x-heroicon-o-folder class="mr-3 flex-shrink-0 h-6 w-6" />
        Projects
    </a>
    <a wire:navigate.hover href="#"
       wire:navigate.hover
       class="text-white hover:bg-sky-100 hover:text-sky-950 group flex items-center px-2 py-2 text-sm font-medium hover:rounded-l-md hover:border-r-4 hover:border-sky-600">
        <x-heroicon-o-calendar class="mr-3 flex-shrink-0 h-6 w-6" />
        Calendar
    </a>
    <a wire:navigate.hover href="#"
       wire:navigate.hover
       class="text-white hover:bg-sky-100 hover:text-sky-950 group flex items-center px-2 py-2 text-sm font-medium hover:rounded-l-md hover:border-r-4 hover:border-sky-600">
        <x-heroicon-o-inbox class="mr-3 flex-shrink-0 h-6 w-6" />
        Documents
    </a>
    <a wire:navigate.hover href="#"
       wire:navigate.hover
       class="text-white hover:bg-sky-100 hover:text-sky-950 group flex items-center px-2 py-2 text-sm font-medium hover:rounded-l-md hover:border-r-4 hover:border-sky-600">
        <x-heroicon-o-chart-bar class="mr-3 flex-shrink-0 h-6 w-6" />
        Reports
    </a>
    <a wire:navigate.hover href="{{ route('user-role-manager') }}"
    wire:navigate.hover
    class="text-white hover:bg-sky-100 hover:text-sky-950 group flex items-center px-2 py-2 text-sm font-medium hover:rounded-l-md hover:border-r-4 hover:border-sky-600">
     <x-heroicon-o-users class="mr-3 flex-shrink-0 h-6 w-6" />
        Role manager
    </a>
</nav>
