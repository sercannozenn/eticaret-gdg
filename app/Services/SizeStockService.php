<?php

namespace App\Services;

use App\Models\SizeStock;

class SizeStockService
{
    public function __construct(public SizeStock $sizeStock)
    {
    }

    public function getById(int $id): ?SizeStock
    {
        return $this->sizeStock::find($id);
    }
}
