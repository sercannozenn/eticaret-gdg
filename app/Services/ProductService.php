<?php

namespace App\Services;

use App\Models\ProductsMain;
use App\Services\ProductServices\ProductImageService;
use App\Services\ProductServices\ProductMainService;
use \App\Services\ProductServices\ProductService as PService;
use App\Services\ProductServices\SizeStockService;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class ProductService
{
    public function __construct(public ProductMainService  $productMainService,
                                public PService            $productService,
                                public ProductImageService $productImageService,
                                public SizeStockService    $sizeStockService
    )
    {
    }

    public function store(Request $request): void
    {
        $productMain = $this->storeProductMain($request);
        $this->storeVariants($request, $productMain);
    }

    public function storeProductMain(Request $request): ProductsMain
    {
        return $this->productMainService->prepareData($request->all(), $request->status)->store();
    }

    public function storeVariants(Request $request, ProductsMain $productsMain): void
    {
        $data = $request->all();
        foreach ($data['variant'] as $variant) {
            $product = $this->productService->prepareData($variant, $productsMain)->store();

            $this->storeImages($variant['image'], $variant['featured_image'], $product->id);
            $this->storeSizeStock($variant, $product->id);
        }

    }

    public function storeImages(string $images, string $featuredImagePath, int $productID): array
    {
        $images        = explode(',', $images);
        unset($images[(count($images)-1)]);
        $createdImages = [];
        foreach ($images as $image) {
            $createdImages[] = $this->productImageService->prepareData($image, $featuredImagePath, $productID)->store();
        }
        return $createdImages;
    }

    public function updateImages(Collection $productImages, array $variant, int $productID): void
    {
        foreach ($productImages as $image) {
            $this->productImageService->setProductImage($image)->delete();
        }
        $this->storeImages($variant['image'], $variant['featured_image'], $productID);
    }

    public function storeSizeStock(array $variant, int $productID): array
    {
        $createdSizeStock = [];
        foreach ($variant['size'] as $index => $size) {
            $stock              = $variant['stock'][$index];
            $createdSizeStock[] = $this->sizeStockService->prepareData($size, $stock, $productID)->store();
        }
        return $createdSizeStock;
    }

    /**
     * @throws \Exception
     */
    public function updateSizeStock(array $variant)
    {
        $productID = $variant['variant_index'];
        $sizeKeys = $this->sizeStockService->getByProductIdMultiple($productID)->pluck('size')->toArray();
        $newSizeArr = [];
        foreach ($variant['size'] as $index => $size) {
            $sizeStockFind = $this->sizeStockService->getByProductIdAndSize($productID, $size);
            if ($sizeStockFind) {
                $newSizeArr[] = $sizeStockFind->size;
                $stock = $variant['stock'][$index];
                $this->sizeStockService
                    ->setSizeStock($sizeStockFind)
                    ->prepareDataForUpdate($stock, $productID)
                    ->update();
            }else {
                $stock              = $variant['stock'][$index];
                $this->sizeStockService->prepareData($size, $stock, $productID)->store();
            }
        }
        $this->sizeStockService->changedKeyDelete($sizeKeys, $newSizeArr, $productID);
    }

    public function update(Request $request, ProductsMain $productsMain): void
    {
        $this->updateProductMain($request, $productsMain);
        $this->updateVariants($request, $productsMain);
    }

    public function updateProductMain(Request $request, ProductsMain $productsMain): bool
    {
        return $this->productMainService
            ->prepareData($request->all(), $request->status)
            ->setProductMain($productsMain)
            ->update();
    }

    /**
     * @throws \Exception
     */
    public function updateVariants(Request $request, ProductsMain $productsMain): void
    {
        $data = $request->all();
        foreach ($data['variant'] as $variant) {
            //            dd($variant);
            if (isset($variant['variant_index'])) {
                $productID = $variant['variant_index'];
                $product   = $this->productService->getById($productID);
                $this->productService->setProduct($product)->prepareData($variant, $productsMain)->update();

                $this->updateImages($product->variantImages, $variant, $productID);
                $this->updateSizeStock($variant);
            }
            else {
                $product = $this->productService->prepareData($variant, $productsMain)->store();
                $this->storeImages($variant['image'], $variant['featured_image'], $product->id);
                $this->storeSizeStock($variant, $product->id);
            }
        }
    }

}
