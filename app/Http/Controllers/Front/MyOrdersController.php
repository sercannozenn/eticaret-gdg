<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class MyOrdersController extends Controller
{
    public function index()
    {
        return view("front.my-orders");
    }

    public function detail()
    {
        return view("front.my-orders-detail");
    }
}
