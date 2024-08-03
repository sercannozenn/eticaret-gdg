<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VariantUpdateRequest;
use App\Models\Product;

use App\Services\BrandService;
use App\Services\CategoryService;
use App\Services\ProductService;
use App\Services\ProductServices\SizeStockService;
use App\Traits\GdgException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductVariantController extends Controller
{
    use GdgException;

    public function __construct(public BrandService    $brandService,
                                public CategoryService $categoryService,
                                public ProductService  $productService
    )
    {
    }

    public function changeVariantStatus(Request $request)
    {
        $id      = $request->id;
        $product = $this->productService->productService->getById($id);

        if (is_null($product)) {
            return response()
                ->json()
                ->setData(['message' => 'Ürün bulunamadı'])
                ->setStatusCode(404)
                ->setCharset('utf-8')
                ->header('Content-Type', 'application/json')
                ->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        }

        $data = ['status' => !$product->status];

        $this->productService
            ->productService
            ->setProduct($product)
            ->setPrepareData($data)
            ->update();


        return response()
            ->json()
            ->setData($product)
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

    public function showVariantList()
    {
        $products = $this->productService->getVariants();
        $filters  = $this->productService->getFiltersForVariantList();

        return view('admin.product.variant.index', compact('products', 'filters'));
    }

    public function delete(Request $request)
    {
        try {
            $variantID = $request->variant;
            $variant   = $this->productService->productService->getById($variantID);
            if (is_null($variant)) {
                alert()->info('Başarısız', 'Variant bulunamadı.');
                return redirect()->back();
            }
            //            $this->productService->productService->destroy([$variantID]);
            $this->productService->productService->setProduct($variant)->delete();

            alert()->success('Başarılı', 'Variant silindi');

            return redirect()->back();
        }
        catch (\Throwable $exception) {
            alert()->error('Başarısız', "Hata Alındı: $exception->getMessage()");
            return redirect()->back();
        }
    }

    public function edit(Request $request)
    {
        $variantID = $request->variant;
        $product   = $this->productService->productService->getById($variantID);
        $product->load(['variantImages', 'sizeStock']);
        if (is_null($product)) {
            alert()->info('Başarısız', 'Variant bulunamadı.');
            return redirect()->back();
        }
        return view('admin.product.variant.create_edit', compact('product'));
    }

    public function update(VariantUpdateRequest $request)
    {
        try {
            $variantID = $request->variant;
            $request->request->add(['variant_index' => $variantID]);
            $product   = $this->productService->productService->getById($variantID);
            if (is_null($product)) {
                alert()->info('Başarısız', 'Variant bulunamadı.');
                return redirect()->back();
            }
            $productMain = $product->productsMain;
            if (is_null($productMain)) {
                throw new \Exception('Varyantın ana ürünü bulunamadı');
            }
            $this->productService
                ->productService
                ->setProduct($product)
                ->prepareData($request->all(), $productMain)
                ->update();

            $this->productService->updateImages($product->variantImages, $request->all(), $product->id);
            $this->productService->updateSizeStock($request->all());

            alert()->success('Başarılı', 'Variant güncellendi');

            return redirect()->route('admin.product.variant.list');
        }
        catch (\Throwable $exception) {
            return $this->exception($exception, 'admin.product.variant.list', $exception->getMessage());
        }
    }

    public function deleteSizeStock(Request $request, SizeStockService $sizeStockService)
    {
        $id   = $request->size_id;

        $sizeStock = $sizeStockService->getByID($id);
        if (is_null($sizeStock)) {
            return response()
                ->json()
                ->setData(['message' => 'Beden bulunamadı'])
                ->setStatusCode(404)
                ->setCharset('utf-8')
                ->header('Content-Type', 'application/json')
                ->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        }

        $sizeStockService->setSizeStock($sizeStock)->delete();
        return response()
            ->json()
            ->setData(['message' => 'Beden silindi.'])
            ->setStatusCode(200)
            ->setCharset('utf-8')
            ->header('Content-Type', 'application/json')
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }

}
