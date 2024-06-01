<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;
use App\Models\ProductImages;
use App\Models\ProductsMain;
use App\Models\ProductTypes;
use App\Models\SizeStock;
use App\Services\BrandService;
use App\Services\CategoryService;
use App\Services\ProductService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function __construct(public BrandService    $brandService,
                                public CategoryService $categoryService,
                                public ProductService  $productService
    )
    {
    }

    public function index()
    {
        $productsMain = ProductsMain::all();

        return view('admin.product.index')->with('products', $productsMain);
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
        DB::beginTransaction();
        try {
            $this->productService->store($request);
            DB::commit();
        }catch (\Exception $exception) {
            DB::rollBack();

            alert()->success('Hata', $exception->getMessage());
            return redirect()->back()->withInput();
        }

        alert()->success('Başarılı', 'Ürün kaydedildi');
        return redirect()->route('admin.product.index');
    }

    public function edit(Request $request, ProductsMain $productsMain)
    {
        $categories = $this->categoryService->getAllCategories();
        $brands     = $this->brandService->getAll();
        $types = ProductTypes::all();

        $product = $productsMain->load([
                                           'variants',
                                           'variants.variantImages',
                                           'variants.sizeStock',

                                       ])->toArray();

        return view('admin.product.create_edit', compact('product', 'categories', 'brands', 'types'));
    }

    public function update(ProductUpdateRequest $request)
    {
        dd($request->all());
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
