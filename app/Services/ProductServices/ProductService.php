<?php

namespace App\Services\ProductServices;

use App\Models\Product;
use App\Models\ProductsMain;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
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

    public function destroy(array $ids): int
    {
        return $this->product::destroy($ids);
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

    public function getAllActive(): Collection
    {
        return $this->product::query()
            ->with(['activeProductsMain', 'activeProductsMain.brand', 'activeProductsMain.category', 'sizeStock', 'featuredImage'])
            ->whereHas('activeProductsMain')
            ->where('status', 1)
            ->orderBy('id', 'DESC')
            ->get();
    }

    public function getSearchProduct(Request $request, array $filterValues): Collection
    {
        $query = $this->product::query()
        ->with(['productsMain', 'productsMain.category', 'productsMain.brand']);

        if (isset($filterValues['categories'])){
            $query->whereHas('productsMain.category', function ($q) use($filterValues){
                $q->whereIn('slug', $filterValues['categories'])->where('status', 1);
            });
        }
        if (isset($filterValues['brands'])){
            $query->whereHas('productsMain.brand', function ($q) use($filterValues){
                $q->whereIn('slug', $filterValues['brands'])->where('status', 1);
            });
        }
        if (isset($filterValues['genders'])){
            $query->whereHas('productsMain', function ($q) use($filterValues){
                $q->whereIn('gender', $filterValues['genders']);
            });
        }
        if ($request->has('min_price')){
            $query->where('final_price', '>=', number_format((float)$request->min_price, 2, thousands_separator: ''));
        }
        if ($request->has('max_price')){
            $query->where('final_price', '<=', number_format((float)$request->max_price, 2, thousands_separator: ''));
        }

        return $query->where('status', 1)->get();


    }

}
