<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\Pagination;
use Livewire\WithPagination;

class IndexUser extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public function render()
    {
        return view('livewire.index-user', [
            'users' => User::paginate(5)
        ]);
    }
}
