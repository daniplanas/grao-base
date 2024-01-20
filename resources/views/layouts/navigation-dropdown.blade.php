<div
    x-cloak
    @click.outside="userDropdownMenu = false"
    x-show="userDropdownMenu"
    x-transition:enter="transition ease-out duration-100"
    x-transition:enter-start="transform opacity-0 scale-95"
    x-transition:enter-end="transform opacity-100 scale-100"
    x-transition:leave="transition ease-in duration-75"
    x-transition:leave-start="transform opacity-100 scale-100"
    x-transition:leave-end="transform opacity-0 scale-95"
    class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
    role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
    <!-- Active: "bg-gray-100", Not Active: "" -->
    <h5 class="block px-4 py-2 text-sm font-bold text-gray-700 uppercase">@lang('profile.menu-title')</h5>
    <x-dropdown-link :href="route('profile.profile')">@lang('profile.link.profile')</x-dropdown-link>
    <x-dropdown-link :href="route('profile.alerts')">@lang('profile.link.alerts')</x-dropdown-link>
    <hr>
    @if(auth()->user()->hasRole('customer-admin'))
    <h5 class="block px-4 py-2 text-sm font-bold text-gray-700 uppercase">@lang('account.menu-title')</h5>
        <x-dropdown-link :href="route('account.settings')">@lang('account.link.settings')</x-dropdown-link>
        <x-dropdown-link :href="route('account.billing')">@lang('account.link.billing')</x-dropdown-link>
    @endif
    <hr>
    <livewire:logout />

</div>
