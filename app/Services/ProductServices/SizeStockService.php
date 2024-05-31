<?php

namespace App\Services\ProductServices;

use App\Models\SizeStock;

class SizeStockService
{
    private array $preparedData = [];

    public function __construct(public SizeStock $sizeStock)
    {
    }

    public function store(): SizeStock
    {
        return $this->sizeStock::create($this->preparedData);
    }

    public function prepareData(string $size, int $stock, int $productID): self
    {
        $this->preparedData = [
            'product_id'      => $productID,
            'size'            => $size,
            'stock'           => $stock,
            'remaining_stock' => $stock
        ];

        return $this;
    }
}
