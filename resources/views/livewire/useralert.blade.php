<?php

    use function Livewire\Volt\{state};

?>

<div >
    @if(auth()->user()->hasAlerts())
        <x-heroicon-o-bell-alert class="w-6 h-6 text-red-600 hover:text-red-800"></x-heroicon-o-bell-alert>
    @else
        <x-heroicon-o-bell class="w-6 h-6 text-gray-600 hover:text-gray-800"></x-heroicon-o-bell>
    @endif
</div>
