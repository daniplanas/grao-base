<div class="space-y-6">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Account settings') }}
        </h2>
    </x-slot>
    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        <div class="max-w-xl">
            <section>
                <header>
                    <h2 class="text-lg font-medium text-gray-900 uppercase">
                        {{ __('Account information') }}
                    </h2>
                    <p class="mt-1 text-sm text-gray-600">
                        {{ __('Update your account\'s basic information and email address.') }}
                    </p>
                </header>
                <div class="mt-6 space-y-6">
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input wire:model="account.name" type="text" class="mt-1 block w-full"  />
                        <x-input-error :messages="$errors->get('account.name')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" wire:model="account.email" type="email" class="mt-1 block w-full" />
                        <x-input-error :messages="$errors->get('account.email')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="phone" :value="__('Phone')" />
                        <x-text-input id="phone" wire:model="account.phone" type="text" class="mt-1 block w-full" />
                        <x-input-error :messages="$errors->get('account.phone')" class="mt-2" />
                    </div>
                    <hr>
                    <div>
                        <x-input-label for="name" :value="__('Address')" />
                        <x-text-input wire:model="account.address" type="text" class="mt-1 block w-full"  />
                        <x-input-error :messages="$errors->get('account.address')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="name" :value="__('Postal Code')" />
                        <x-text-input wire:model="account.postal_code" type="text" class="mt-1 block w-full"  />
                        <x-input-error :messages="$errors->get('account.postal_code')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="name" :value="__('City')" />
                        <x-text-input wire:model="account.city" type="text" class="mt-1 block w-full"  />
                        <x-input-error :messages="$errors->get('account.city')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="name" :value="__('State')" />
                        <x-text-input wire:model="account.state" type="text" class="mt-1 block w-full"  />
                        <x-input-error :messages="$errors->get('account.state')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="name" :value="__('Country')" />
                        <x-text-input wire:model="account.country" type="text" class="mt-1 block w-full"  />
                        <x-input-error :messages="$errors->get('account.country')" class="mt-2" />
                    </div>
                    <div class="flex items-center gap-4">
                        <x-primary-button wire:click="save">{{ __('Save') }}</x-primary-button>
                        @if (session('status') === 'account-information')
                            <p
                                x-data="{ show: true }"
                                x-show="show"
                                x-transition
                                x-init="setTimeout(() => show = false, 2000)"
                                class="text-sm text-gray-600"
                            >{{ __('Saved.') }}</p>
                        @endif
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        <div class="max-w-xl">
            test
        </div>
    </div>
    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        <div class="max-w-xl">
            test
        </div>
    </div>
</div>
