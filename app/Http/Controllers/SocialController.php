<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Exception;
use Validator;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function googleRedirect(){
        return Socialite::driver('google')->redirect();
    }

    public function loginWithGoogle(){
        try {
            $user = Socialite::driver('google')->user();
            $isUser = User::where('google_id', $user->id)->first();
            if($isUser){
                Auth::login($isUser);
                return redirect('/');
            }else{
                $user = User::create([
                    'lastname' => '',
                    'name' => $user->name,
                    'phone' => '',
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'password' => encrypt('user1111'),
                    'email_verified_at' => now()->timestamp,
                ]);

                Auth::login($user);

                return redirect('/user/profile');
            }
        }catch (Exception $e){
            dd($e->getMessage());
        }
    }
}
