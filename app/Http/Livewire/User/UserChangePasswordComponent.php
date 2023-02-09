<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserChangePasswordComponent extends Component
{
    public $current_password;
    public $password;
    public $password_confirmation;

    public function updated($fields){
        $this->validateOnly($fields, [
            'current_password' => ['required'],
            'password' => ['required', 'min:8', 'different:current_password']
        ], [
            'password.min' => 'Пароль має бути не менше 8 символів.',
            'password.required' => 'Поле пароль є обов’язковим.',
            'password.different' => 'Новий пароль і поточний пароль мають відрізнятися.',
        ]);
    }

    public function changePassword(){
        $this->validate([
           'current_password' => ['required'],
            'password' => ['required', 'min:8', 'confirmed', 'different:current_password']
        ], [
            'password.min' => 'Пароль має бути не менше 8 символів.',
            'password.confirmed' => 'Підтвердження пароля не збігається.',
            'password.required' => 'Поле пароль є обов’язковим.',
            'password.different' => 'Новий пароль і поточний пароль мають відрізнятися.',
        ]);

        if(Hash::check($this->current_password, Auth::user()->password)){
            $user = User::find(Auth::user()->id);
            $user->password = Hash::make($this->password);
            $user->save();
            session()->flash('success_message', 'Пароль змінено успішно!');
            return redirect()->route('user.profile');
        } else{
            session()->flash('password_error', 'Виникла помилка!');
        }

    }

    public function render()
    {
        return view('livewire.user.user-change-password-component')->layout('layouts.base');
    }
}
