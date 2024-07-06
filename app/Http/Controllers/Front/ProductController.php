<?php

namespace App\Http\Controllers\Front;

use App\Enums\Gender;
use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use App\Services\ProductService;

class ProductController extends Controller
{
    public function __construct(public ProductService $productService)
    {
    }

    public function list(CategoryService $categoryService)
    {
        $categories = $categoryService->getAllCategoriesActive();
        $genders = Gender::cases();
        $products = $this->productService->getAllProductsActive();
//        dd($products);
        return view("front.product-list", compact('categories', 'genders', 'products'));
    }

    public function detail()
    {
        return view("front.product-detail");
    }
}
