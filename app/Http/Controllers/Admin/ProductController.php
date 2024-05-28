<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductTypes;
use App\Services\BrandService;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

    public function store(ProductStoreRequest $request)
    {

    }

    public function checkSlug(Request $request)
    {
        $check = Product::query()->where('slug', Str::slug($request->slug))->first();

        return response()
            ->json()
            ->setData($check)
            ->setStatusCode(200)
            ->setCharset('utf-8')
            ->header('Content-Type', 'application/json')
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }
}
