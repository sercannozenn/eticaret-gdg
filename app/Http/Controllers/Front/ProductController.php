<?php

namespace App\Http\Controllers\Front;

use App\Enums\Gender;
use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(public ProductService $productService)
    {
    }

    public function list(Request $request, CategoryService $categoryService)
    {
        $selectedValues = [];
        foreach ($request->all() as $itemKey => $itemValue){
            $selectedValues[$itemKey] = explode(',', $itemValue);
        }
        $categories = $categoryService->getAllCategoriesActive();
        $genders = Gender::cases();

//        dd($selectedValues);
//        $products = $this->productService->getAllProductsActive();

        if ($selectedValues){
            $products = $this->productService->getSearchProducts($request, $selectedValues);
        }else{
            $products = $this->productService->getAllProductsActive();
        }


//        dd($products);
        return view("front.product-list", compact('categories', 'genders', 'products', 'selectedValues'));
    }

    public function detail()
    {
        return view("front.product-detail");
    }
}
