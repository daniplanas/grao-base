<div class="space-y-6">
    <form wire.submit.prevent="save">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('User settings') }}
            </h2>
        </x-slot>
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 uppercase">
                            {{ __('User information') }}
                        </h2>
                        <p class="mt-1 text-sm text-gray-600">
                            {{ __('Update your user\'s basic information and email address.') }}
                        </p>
                    </header>
                    <div class="mt-6 space-y-6">
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input wire:model="user.name" type="text" class="mt-1 block w-full" />
                            <x-input-error :messages="$errors->get('user.name')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" wire:model="user.email" type="email"
                                class="mt-1 block w-full" />
                            <x-input-error :messages="$errors->get('user.email')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="password" :value="__('Password')" />
                            <x-text-input id="password" wire:model="user.password" type="password"
                                class="mt-1 block w-full" />
                            <x-input-error :messages="$errors->get('user.password')" class="mt-2" />
                        </div>
                        <div class="flex items-center gap-4">
                            <x-primary-button wire:click="save">{{ __('Save') }}</x-primary-button>
                            @if (session('status') === 'user-information')
                                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-gray-600">{{ __('Saved.') }}</p>
                            @endif
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </form>
</div>
