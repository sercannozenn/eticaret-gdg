<?php

namespace App\Services\ProductServices;

use App\Models\Product;
use App\Models\ProductsMain;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Str;

class ProductService
{
    private array $preparedData = [];
    public function __construct(public Product $product)
    {
    }

    public function store(): Product
    {
        return $this->product::create($this->preparedData);
    }

    public function update(): bool
    {
        return $this->product->update($this->preparedData);
    }

    public function setProduct(Product $product): self
    {
        $this->product = $product;

        return $this;
    }
    public function getById(int $productID): Product | ModelNotFoundException
    {
        return $this->product::query()->findOrFail($productID);
    }
    public function prepareData(array $variant, ProductsMain $productsMain):self
    {
        $slug = $this->generateSlug($variant['slug']);
        $finalPrice = $this->calculateFinalPrice($productsMain, $variant['additional_price']);

        $this->preparedData = [
            'main_product_id'   => $productsMain->id,
            'name'              => $variant['name'],
            'variant_name'      => $variant['variant_name'],
            'slug'              => $slug,
            'additional_price'  => $variant['additional_price'],
            'final_price'       => $finalPrice,
            'extra_description' => $variant['extra_description'],
            'status'            => isset($variant['p_status']) && $variant['p_status'] ? 1 : 0,
            'publish_date'      => isset($variant['publish_date']) ? Carbon::parse($variant['publish_date'])->toDateTimeString() : null,
        ];

        return $this;
    }
    private function generateSlug(string $slug): string
    {
        return Str::slug($slug);
    }
    private function calculateFinalPrice(ProductsMain $productsMain, float $additionalPRice): string
    {
        $finalPrice = $productsMain->price + $additionalPRice;
        $finalPrice = number_format($finalPrice, 2);
        return str_replace(',', '', $finalPrice);
    }

}
