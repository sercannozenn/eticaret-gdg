<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view("admin.index");
    }
}
