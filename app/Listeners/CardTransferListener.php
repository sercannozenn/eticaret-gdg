<?php

namespace App\Listeners;

use App\Events\UserLoggedIn;
use App\Models\Card;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CardTransferListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     */
    public function handle(UserLoggedIn $event): void
    {
        $userID = $event->user->id;

        //ESki Session id ile sepet bul
        $guestCard = Card::query()
                         ->where('session_id', $event->oldSessionId)
                         ->first();
        if ($guestCard){
            $userCard = Card::firstOrCreate(['user_id' => $userID]);

//            foreach ($guestCard)

            //Eski sepeti sil
            $guestCard->delete();
        }
        dd($event->oldSessionId, session()->getId());
    }
}
