<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use function view;

class ProfileUserComponent extends Component
{
    public function render()
    {
        return view('livewire.user.profile-user-component')->layout('layouts.base');
    }
}
