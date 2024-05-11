<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\ProductTypes;
use App\Services\BrandService;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(public BrandService $brandService, public CategoryService $categoryService)
    {
    }

    public function index()
    {
        return view('admin.product.create_edit');
    }

    public function create()
    {
        $categories = $this->categoryService->getAllCategories();
        $brands     = $this->brandService->getAll();

        $types = ProductTypes::all();

        return view('admin.product.create_edit',
                    compact('categories',
                            'brands',
                            'types'
                    ));
    }
}
