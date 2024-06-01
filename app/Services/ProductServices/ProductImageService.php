<?php

namespace App\Services\ProductServices;

use App\Models\ProductImages;

class ProductImageService
{
    private array $preparedData = [];

    public function __construct(public ProductImages $productImages)
    {
    }

    public function store(): ProductImages
    {
        return $this->productImages::create($this->preparedData);
    }

    public function prepareData(string $imagePath, string $featureImagePath, int $productID): self
    {
        $this->preparedData = [
            'product_id'  => $productID,
            'path'        => $imagePath,
            'is_featured' => ($featureImagePath == $imagePath) ? 1 : 0
        ];
        return $this;
    }

    public function setProductImage(ProductImages $productImages): self
    {
        $this->productImages = $productImages;

        return $this;
    }

    public function delete(): bool
    {
        return $this->productImages->delete();
    }
}
