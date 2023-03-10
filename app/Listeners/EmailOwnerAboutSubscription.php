<?php

namespace App\Listeners;

use App\Events\UserSubscribed;
use App\Mail\UserSubscribedMessage;
use App\Models\NewsLetterSubscriber;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class EmailOwnerAboutSubscription
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(UserSubscribed $event)
    {
        $newsLetterSubscriber = new NewsLetterSubscriber();
        $newsLetterSubscriber->email = $event->email;
        $newsLetterSubscriber->save();

        Mail::to($event->email)->send(new UserSubscribedMessage());
    }
}
