<?php

namespace App\Services\ProductServices;

use App\Models\SizeStock;
use Exception;

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

    public function update(): bool
    {
        return $this->sizeStock->update($this->preparedData);
    }

    public function delete():bool
    {
        return $this->sizeStock->delete();
    }

    public function setSizeStock(SizeStock $sizeStock): self
    {
        $this->sizeStock = $sizeStock;

        return $this;
    }

    public function getByProductIdMultiple(int $productID)
    {
        return $this->sizeStock::query()->where('product_id', $productID)->get();
    }

    public function getByProductIdAndSize(int $productID, string|int $size): SizeStock|null
    {
        return $this->sizeStock::query()
                               ->where('product_id', $productID)
                               ->where('size', $size)
                               ->first();
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

    public function prepareDataForUpdate(int $newStock, int $productID): self
    {
        $sizeStock = $this->sizeStock;
        $size = $sizeStock->size;
        $oldStock = $sizeStock->stock;
        $oldRemainingStock = $sizeStock->remaining_stock;

        $diff = $oldStock - $newStock;

        if ($diff > $oldRemainingStock){
            throw new Exception('En fazla kalan stok sayısı kadar stoğunuzu güncelleyebilirsiniz.');
        }

        $finalRemainingStock = $oldRemainingStock - $diff;

        $this->preparedData = [
            'product_id'      => $productID,
            'size'            => $size,
            'stock'           => $newStock,
            'remaining_stock' => $finalRemainingStock
        ];

        return $this;

    }

    public function changedKeyDelete($oldKeys, $newKeys, $productID): void
    {
        $diffSizeKeys = array_diff($oldKeys, $newKeys);
        foreach ($diffSizeKeys as $sizeKey)
        {
            $sizeStockFind = $this->getByProductIdAndSize($productID, $sizeKey);
            $this->setSizeStock($sizeStockFind)->delete();
        }
    }
}
