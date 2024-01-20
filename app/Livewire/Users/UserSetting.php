<?php

namespace App\Livewire\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserSetting extends Component
{
    public $user;
    public $rules = [
        'user.name' => 'required',
        'user.email' => 'required|email',
        'user.password' => 'required',
    ];
    
    public function mount($id = null)
    {
        if ($id) {
            $this->user = User::find($id);
        } else {
            $this->user = new User;
        }
    }

    public function render()
    {
        return view('livewire.users.user-setting');
    }

    public function save()
    {
        try{
        $this->validate([
        'user.name' => 'required',
        'user.email' => 'required|email',
        ]);

        if ($this->user->password) {
            $this->user->password = Hash::make($this->user->password);
        }
    }catch(\Throwable $th){
        dd($th);
    }
        $this->user->save();

        return redirect()->route('dashboard')->with('status', 'user-information');
    }


    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index');
    }
}
