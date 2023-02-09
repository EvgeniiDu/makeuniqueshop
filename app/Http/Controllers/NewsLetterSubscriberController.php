<?php

namespace App\Http\Controllers;

use App\Events\UserSubscribed;
use Illuminate\Http\Request;

class NewsLetterSubscriberController extends Controller
{
    public function subscribe(Request $request){
        $request->validate([
            'email' => 'required|unique:newsletter_subscribers,email'
        ]);

        event(new UserSubscribed($request->input('email')));

        session()->flash('success_subscribe', 'Ви успішно підписані на розсилку!');

        return back();
    }
}
