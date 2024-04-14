<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class CardController extends Controller
{
    public function card()
    {
        return view("front.card");
    }
}
