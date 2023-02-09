<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class UserEditProfileComponent extends Component
{
    public $lastname;
    public $name;
    public $phone;
    public $email;

    public function mount()
    {
        //dd($this->phone);
        $this->lastname = Auth::user()->lastname;
        $this->name = Auth::user()->name;
        $this->phone = Auth::user()->phone;
        $this->email = Auth::user()->email;
    }


    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'lastname' => ['required', 'string', 'max:40', 'regex:/^[А-Яа-яЁёЇїІіЄєҐґ\']/'],
            'name' => ['required', 'string', 'max:40', 'regex:/^[А-Яа-яЁёЇїІіЄєҐґ\']/'],
            'phone' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users']
        ], [
            'lastname.required' => 'Поле прізвище є обов’язковим для заповнення.',
            'lastname.max' => 'Забагато символів, не більше 40.',
            'lastname.regex' => 'Формат прізвище недійсний.',
            'name.required' => 'Поле ім\'я є обов’язковим для заповнення.',
            'name.max' => 'Забагато символів, не більше 40.',
            'name.regex' => 'Формат ім\'я недійсний.',
            'phone.required' => 'Поле телефон є обов’язковим для заповнення.',
            'email.required' => 'Поле email є обов’язковим для заповнення.',
            'email.email' => 'Не відповідає типу email.',
            'email.unique' => 'Такий email вже зареєстрований.',
        ]);
    }

    public function editProfile()
    {

        $this->validate([
            'lastname' => ['required', 'string', 'max:40', 'regex:/^[А-Яа-яЁёЇїІіЄєҐґ\']/'],
            'name' => ['required', 'string', 'max:40', 'regex:/^[А-Яа-яЁёЇїІіЄєҐґ\']/'],
            'phone' => ['required', 'string'],
            'email' => ['required', 'email']
        ], [
            'lastname.required' => 'Поле прізвище є обов’язковим для заповнення.',
            'lastname.max' => 'Забагато символів, не більше 40.',
            'lastname.regex' => 'Формат прізвище недійсний.',
            'name.required' => 'Поле ім\'я є обов’язковим для заповнення.',
            'name.max' => 'Забагато символів, не більше 40.',
            'name.regex' => 'Формат ім\'я недійсний.',
            'phone.required' => 'Поле телефон є обов’язковим для заповнення.',
            'email.required' => 'Поле email є обов’язковим для заповнення.',
            'email.email' => 'Не відповідає типу email.',
            'email.unique' => 'Такий email вже зареєстрований.',
        ]);

        $oldEmail = Auth::user()->email;

        $user = User::find(Auth::user()->id);
        if (Auth::user()->lastname !== $this->lastname) {
            $user->lastname = $this->lastname;
        }
        if (Auth::user()->name !== $this->name) {
            $user->name = $this->name;
        }
        if (Auth::user()->phone !== $this->phone) {
            $user->phone = $this->phone;
        }
        if ($oldEmail !== $this->email) {
            $user->email_verified_at = null;
            $user->email = $this->email;
            $user->sendEmailVerificationNotification();
        }
        $user->save();
        session()->flash('success_message', 'Дані профіля змінено успішно');
        return $this->redirect('/user/profile');
    }

    public function render()
    {
        //dd($this->phone);
        return view('livewire.user.user-edit-profile-component')->layout('layouts.base');
    }
}
