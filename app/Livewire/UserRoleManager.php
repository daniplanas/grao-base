<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Role;

class UserRoleManager extends Component
{
    public $users;
    public $selectedUser;
    public $roles;
    public $selectedRoles = [];

  

    public function updated($key, $value){
    }

    public function mount()
    {
        $this->users = User::with('roles')->get();
        $this->roles = Role::all();
    }

    public function render()
    {
        return view('livewire.user-role-manager');
    }

    public function assignRoles()
    {
        $user = User::find($this->selectedUser);

        if (!$user) {
            session()->flash('error', 'Usuario no encontrado.');
            return;
        }

        $user->roles()->sync($this->selectedRoles);
        session()->flash('success', 'Roles asignados correctamente.');
    }
}
