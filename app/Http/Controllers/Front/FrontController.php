<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\BrandService;
use App\Services\SliderService;

class FrontController extends Controller
{
    public function index(SliderService $sliderService, BrandService $brandService)
    {
        $sliders = $sliderService->getAllActive();
        $featuredBrands = $brandService->getFeaturedBrands();

        return view("front.index", compact('sliders', 'featuredBrands'));
    }
}
