<div class="space-y-6">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Management') }}
        </h2>
    </x-slot>
    <div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($users as $user)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $user->name }}

                            </th>
                            <td class="px-6 py-4">
                                {{ $user->email }}
                            </td>

                            <td class="px-6 py-4 text-right flex gap-2 items-center">
                                    <a href="{{ route('user.create', ['id' => $user->id]) }}">
                                        <div class="flex items-center justify-center mt-4">
                                            <x-primary-button class="ml-4">
                                                {{ __('Edit') }}
                                            </x-primary-button>
                                        </div>
                                    </a>
                                    <form method="post" action="{{ route('user.destroy', $user) }}"
                                        class="flex items-center justify-end"
                                        onclick="return confirm('Are you sure about it?')">
                                        @csrf
                                        @method('delete')
                                        <div class="flex items-center justify-end mt-4">
                                            <x-primary-button class="ml-4">
                                                {{ __('Delete User') }}
                                            </x-primary-button>
                                        </div>
                                    </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="p-3">
                {{$users->links()}}
            </div>
        </div>


        <form method="GET" action="{{ route('user.create') }}">
            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-4">
                    {{ __('Create User') }}
                </x-primary-button>
            </div>
        </form>
    </div>
