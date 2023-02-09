<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('livewire.register-component');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */


    public function store(Request $request)
    {
        $request->validate([
            'lastname' => ['required', 'string', 'max:40', 'regex:/^[А-ЯЁІЇЄ]{1}[а-яёїієґ\']/'],
            'name' => ['required', 'string', 'max:40', 'regex:/^[А-Яа-яЁёЇїІіЄєҐґ\']/'],
            'phone' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ],[
            'lastname.required' => 'Поле прізвище є обов’язковим для заповнення.',
            'lastname.max' => 'Забагато символів, не більше 40.',
            'lastname.regex' => 'Формат прізвище недійсний.',
            'name.required' => 'Поле ім\'я є обов’язковим для заповнення.',
            'name.max' => 'Забагато символів, не більше 40.',
            'name.regex' => 'Формат ім\'я недійсний.',
            'email.unique' => 'Електронна пошта вже зайнята.',
            'password.confirmed' => 'Паролі не співпадають.',
            'password.min' => 'Пароль має бути не менше 8 символів.',
        ] );


        $user = User::create([
            'lastname' => $request->lastname,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect('email/verify');
    }

}
