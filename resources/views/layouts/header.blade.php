<div
    x-data="{ userDropdownMenu: false }"
    class="sticky top-0 z-10 flex h-14 flex-shrink-0 bg-white">

    <button type="button"
            @click="mobileMenuVar = !mobileMenuVar"
            class="border-r border-gray-200 px-4 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 md:hidden">
        <span class="sr-only">Open sidebar</span>
        <x-heroicon-o-bars-3-bottom-left class="h-6 w-6"/>
    </button>
    <div class="flex flex-1 justify-between px-4">
        <div class="flex-1 inline-flex items-center">
            {{--
            TODO Here we can add a search box
            --}}
        </div>
        <div
            class="ml-4 items-center md:ml-6 inline-flex">
            <livewire:userAlert />
            <div class="relative ml-3">
                <div class="inline-flex capitalize">
                    {{ auth()->user()->name }}
                </div>
                <div class="inline-flex ml-2">
                    <button type="button"
                            @click="userDropdownMenu = !userDropdownMenu"
                            class="flex max-w-xs items-center rounded-full bg-sky-900 hover:bg-sky-700 text-white text-sm focus:outline-none"
                            id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                        <span class="sr-only">Open user menu</span>
                        <span class="inline-flex items-center justify-center h-8 w-8 rounded-full">
                                <span
                                    class="font-medium leading-none">{{ auth()->user()->initials }}</span>
                        </span>

                    </button>
                </div>

                @include('layouts.navigation-dropdown')
            </div>
        </div>
    </div>
</div>
