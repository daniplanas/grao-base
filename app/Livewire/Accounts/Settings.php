<?php

namespace App\Livewire\Accounts;

use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Locked;
use Livewire\Component;


class Settings extends Component
{
    public $account;
    protected $rules = [
        'account.name' => 'required',
        'account.email' => 'required|email',
        'account.phone' => 'required',
        'account.city' => 'required|string',
        'account.state' => 'required|string',
        'account.address' => 'required|string',
        'account.postal_code' => 'required|string',
        'account.country' => 'required|string',
    ];
    public function mount()
    {
        $this->account = auth()->user()->account->select([
            'id',
            'name',
            'email',
            'phone',
            'city',
            'state',
            'address',
            'postal_code',
            'country',
        ])->first();
    }

    public function render()
    {
        return view('livewire.accounts.settings');
    }

    public function save()
    {
        $this->validate();
        $this->account->save();
        $this->notify('You saved something.', 'Yay You!', 'success');
        //return $this->redirect('/dashboard')->with('success', 'Profile updated successfully!');
        //$this->notify(trans('users.profile-updated'), trans('common.success'), 'success');
    }
}
