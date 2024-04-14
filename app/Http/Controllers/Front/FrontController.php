<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class FrontController extends Controller
{
    public function index()
    {
        return view("front.index");
    }

    public function sercan()
    {
        return view("front.sercan");
    }
}
