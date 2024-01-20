<div class="container mx-auto mt-8">
    @if (session()->has('success'))
        <div class="bg-green-500 text-white p-4 mb-4 rounded">
            {{ session('success') }}
        </div>
    @elseif (session()->has('error'))
        <div class="bg-red-500 text-white p-4 mb-4 rounded">
            {{ session('error') }}
        </div>
    @endif

    <div class="bg-white p-6 rounded shadow-md">
        <div class="mb-4">
            <label for="user" class="block text-gray-700 text-sm font-bold mb-2">
                Seleccionar Usuario:
            </label>
            <select wire:model.live="selectedUser" id="user" class="w-full p-2 border rounded">
                <option value="">Seleccione un usuario</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        @if($selectedUser)
            <form wire:submit.prevent="assignRoles">
                @csrf

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        Seleccionar Roles:
                    </label>
                    @foreach ($roles as $role)
                        <label class="inline-flex items-center mr-4">
                            <input type="checkbox" wire:model="selectedRoles" value="{{ $role->id }}" class="form-checkbox text-blue-500">
                            <span class="ml-2">{{ $role->name }}</span>
                        </label>
                    @endforeach
                </div>

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Guardar roles
                </button>
            </form>
        @endif
    </div>
</div>
