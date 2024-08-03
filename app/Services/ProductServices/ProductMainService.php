<?php

namespace App\Services\ProductServices;

use App\Models\ProductsMain;

class ProductMainService
{
    private array $preparedData = [];

    public function __construct(public ProductsMain $productsMain)
    {
    }

    public function getProductsQuery()
    {
        return $this->productsMain::query()
//            ->with(['category', 'type', 'brand'])
//            ->join('products', 'products.main_product_id', '=', 'products_main.id')
            ->join('categories', 'categories.id', '=', 'products_main.category_id')
            ->join('brands', 'brands.id', '=', 'products_main.brand_id')
            ->join('product_types', 'product_types.id', '=', 'products_main.type_id')
            ->select('products_main.*', 'categories.name as cname', 'brands.name as bname', 'product_types.name as typename');
    }

    public function store(): ProductsMain
    {
        return $this->productsMain::create($this->preparedData);
    }

    public function update(): bool
    {
        return $this->productsMain->update($this->preparedData);
    }

    public function delete(): bool
    {
        return $this->productsMain->delete();
    }

    public function prepareData(array $data, int|null $status = null): self
    {
        $this->preparedData = [
            'category_id'       => $data['category_id'],
            'brand_id'          => $data['brand_id'],
            'type_id'           => $data['type_id'],
            'gender'            => $data['gender'],
            'name'              => $data['name'],
            'price'             => $data['price'],
            'short_description' => $data['short_description'],
            'description'       => $data['description'],
            'status'            => $status ? 1 : 0
        ];

        return $this;
    }

    public function setPrepareData(array $data): self
    {
        $this->preparedData = $data;

        return $this;
    }

    public function setProductMain(ProductsMain $productsMain): self
    {
        $this->productsMain = $productsMain;

        return $this;
    }

    public function getById(int $productMainID): ProductsMain|null
    {
        return $this->productsMain::query()->find($productMainID);
    }
}
