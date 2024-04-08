<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function list()
    {
        return view("front.product-list");
    }

    public function detail()
    {
        return view("front.product-detail");
    }
}
