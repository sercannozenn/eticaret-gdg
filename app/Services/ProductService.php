<?php

namespace App\Services;

use App\Models\ProductsMain;
use App\Services\ProductServices\ProductImageService;
use App\Services\ProductServices\ProductMainService;
use \App\Services\ProductServices\ProductService as PService;
use App\Services\ProductServices\SizeStockService;
use Illuminate\Http\Request;

class ProductService
{
    public function __construct(public ProductMainService  $productMainService,
                                public PService            $productService,
                                public ProductImageService $productImageService,
                                public SizeStockService    $sizeStockService
    )
    {
    }

    public function store(Request $request):void
    {
        $productMain  = $this->storeProductMain($request);
        $this->storeVariants($request, $productMain);
    }

    public function storeProductMain(Request $request): ProductsMain
    {
        return  $this->productMainService->prepareData($request->all(),$request->status)->store();
    }

    public function storeVariants(Request $request, ProductsMain $productsMain):void
    {
        $data = $request->all();
        foreach ($data['variant'] as $variant) {
            $product = $this->productService->prepareData($variant, $productsMain)->store();

            $this->storeImages($variant['image'], $variant['featured_image'], $product->id);
            $this->storeSizeStock($variant, $product->id);
        }

    }

    public function storeImages(string $images,  string $featuredImagePath, int $productID):array
    {
        $images  = explode(',', $images);
        $createdImages = [];
        foreach ($images as $image) {
            $createdImages[] = $this->productImageService->prepareData($image, $featuredImagePath, $productID);
        }
        return $createdImages;
    }

    public function storeSizeStock(array $variant, int $productID): array
    {
        $createdSizeStock = [];
        foreach ($variant['size'] as $index => $size) {
            $stock = $variant['stock'][$index];
            $createdSizeStock[] = $this->sizeStockService->prepareData($size, $stock, $productID)->store();
        }
        return $createdSizeStock;
    }
}
