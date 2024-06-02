<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Gender;
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
use App\Traits\GdgException;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Throwable;

class ProductController extends Controller
{
    use GdgException;
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
        $genders = Gender::cases();

        return view('admin.product.create_edit',
                    compact('categories',
                            'brands',
                            'types',
                    'genders'
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
            dd($exception->getMessage());
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
        $types      = ProductTypes::all();
        $genders = Gender::cases();

        $product = $productsMain->load([
                                           'variants',
                                           'variants.variantImages',
                                           'variants.sizeStock',

                                       ])->toArray();

        return view('admin.product.create_edit', compact('product', 'categories', 'brands', 'types', 'genders'));
    }

    public function update(ProductUpdateRequest $request, ProductsMain $productsMain)
    {
        try {

            $this->productService->update($request, $productsMain);
            alert()->success('Başarılı', 'Ürün düzenlendi');
            return redirect()->route('admin.product.index');
        }
        catch (Throwable $exception) {
            return $this->exception($exception, "admin.product.index", 'Ürün Silinemedi');
        }
    }

    public function delete(ProductsMain $productsMain)
    {
        try {
            $this->productService->productMainService->setProductMain($productsMain)->delete();

            alert()->success('Başarılı', 'Ürün silindi');
            return redirect()->route('admin.product.index');
        }
        catch (Throwable $exception) {
            return $this->exception($exception, "admin.product.index", 'Ürün Silinemedi');
        }
    }

    public function changeStatus(Request $request)
    {
        $id          = $request->id;
        $productMain = $this->productService->productMainService->getById($id);

        if (is_null($productMain)) {
            return response()
                ->json()
                ->setData(['message' => 'Ürün bulunamadı'])
                ->setStatusCode(404)
                ->setCharset('utf-8')
                ->header('Content-Type', 'application/json')
                ->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        }

        $data = ['status' => !$productMain->status];

        $this->productService
            ->productMainService
            ->setProductMain($productMain)
            ->setPrepareData($data)
            ->update();


        return response()
            ->json()
            ->setData($productMain)
            ->setStatusCode(200)
            ->setCharset('utf-8')
            ->header('Content-Type', 'application/json')
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE);
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
