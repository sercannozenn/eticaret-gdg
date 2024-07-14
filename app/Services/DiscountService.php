<?php

namespace App\Services;

use App\Enums\DiscountType;
use App\Models\Brand;
use App\Models\Category;
use App\Models\DiscountBrands;
use App\Models\DiscountCategories;
use App\Models\DiscountProducts;
use App\Models\Discounts;
use App\Models\ProductTypes;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class DiscountService
{
    private array $prepareData = [];

    public function __construct(public Discounts     $discount,
                                public FilterService $filterService)
    {
    }

    public function getFilters(): array
    {
        $types = ['all' => 'Tümü'] + getAllDiscountTypes();

        return [
            'name'            => [
                'label'    => 'İndirim Adı',
                'type'     => 'text',
                'column'   => 'name',
                'operator' => 'like'
            ],
            'value'           => [
                'label'    => 'İndirim Değeri',
                'type'     => 'text',
                'column'   => 'value',
                'operator' => 'like'
            ],
            'minimum_spend'   => [
                'label'    => 'Minimum Harcama Değeri',
                'type'     => 'text',
                'column'   => 'minimum_spend',
                'operator' => 'like'
            ],
            'type'            => [
                'label'    => 'İndirim Türü',
                'type'     => 'select',
                'column'   => 'type',
                'operator' => '=',
                'options'  => $types,
            ],
            'status'          => [
                'label'    => 'Durum',
                'type'     => 'select',
                'column'   => 'status',
                'operator' => '=',
                'options'  => ['all' => 'Tümü', 'pasif', 'aktif'],
            ],
            'with_trashed'    => [
                'label'       => 'Silinmiş Veriler Getirilsin mi?',
                'type'        => 'select',
                'column'      => 'with_trashed',
                'column_live' => 'deleted_at',
                'table'       => 'discounts',
                'operator'    => '=',
                'options'     => ['Hayır', 'Evet'],
            ],
            'order_by'        => [
                'label'    => 'Sıralama Türü',
                'type'     => 'select',
                'column'   => 'order_by',
                'operator' => '',
                'options'  => [
                    'id'         => 'ID',
                    'name'       => 'İndirim Adı',
                    'status'     => 'Durum',
                    'value'      => 'İndirim Değeri',
                    'type'       => 'İndrim Türü',
                    'start_date' => 'İndrim Başlangıç Tarihi',
                    'end_date'   => 'İndrim Bitiş Tarihi',
                ],
            ],
            'order_direction' => [
                'label'    => 'Sıralama Yönü',
                'type'     => 'select',
                'column'   => 'order_direction',
                'operator' => '',
                'options'  => [
                    'asc'  => 'A-Z',
                    'desc' => 'Z-A',
                ],
            ],
        ];
    }

    public function getFiltersForProduct(): array
    {

        $categories = Category::all()->pluck('name', 'id')->toArray();
        $categories = ['all' => 'Tümü'] + $categories;

        $brands = Brand::all()->pluck('name', 'id')->toArray();
        $brands = ['all' => 'Tümü'] + $brands;

        $types = ProductTypes::all()->pluck('name', 'id')->toArray();
        $types = ['all' => 'Tümü'] + $types;

        return [
            'type_id'         => [
                'label'       => 'Ürün Türü',
                'type'        => 'select',
                'column'      => 'type_id',
                'column_live' => 'type_id',
                'table'       => 'products_main',
                'operator'    => '=',
                'options'     => $types,
            ],
            'category_id'     => [
                'label'       => 'Kategori',
                'type'        => 'select',
                'column'      => 'category_id',
                'column_live' => 'category_id',
                'table'       => 'products_main',
                'operator'    => '=',
                'options'     => $categories,
            ],
            'brand_id'        => [
                'label'       => 'Marka',
                'type'        => 'select',
                'column'      => 'brand_id',
                'column_live' => 'brand_id',
                'table'       => 'products_main',
                'operator'    => '=',
                'options'     => $brands,
            ],
            'gender'          => [
                'label'       => 'Cinsiyet',
                'type'        => 'select',
                'column'      => 'gender',
                'column_live' => 'gender',
                'table'       => 'products_main',
                'operator'    => '=',
                'options'     => ['all' => 'Tümü', "Kadın", 'Erkek'],
            ],
            'status'          => [
                'label'       => 'Durum',
                'type'        => 'select',
                'column'      => 'status',
                'column_live' => 'status',
                'table'       => 'products',
                'operator'    => '=',
                'options'     => ['all' => 'Tümü', 'pasif', 'aktif'],
            ],
            'with_trashed'    => [
                'label'       => 'Silinmiş Veriler Getirilsin mi?',
                'type'        => 'select',
                'column'      => 'with_trashed',
                'column_live' => 'deleted_at',
                'table'       => 'discount_products',
                'operator'    => '=',
                'options'     => ['Hayır', 'Evet'],
            ],
            'product_name'    => [
                'label'       => 'Ürün Adı(Varyant)',
                'type'        => 'text',
                'column'      => 'product_name',
                'column_live' => 'name',
                'table'       => 'products',
                'operator'    => 'like'
            ],
            'final_price_min' => [
                'label'       => 'Fiyat(min)',
                'type'        => 'number',
                'column'      => 'final_price_min',
                'column_live' => 'final_price',
                'table'       => 'products',
                'operator'    => '>='
            ],
            'final_price_max' => [
                'label'       => 'Fiyat(max)',
                'type'        => 'number',
                'column'      => 'final_price_max',
                'column_live' => 'final_price',
                'table'       => 'products',
                'operator'    => '<='
            ],
            'order_by'        => [
                'label'    => 'Sıralama Türü',
                'type'     => 'select',
                'column'   => 'order_by',
                'operator' => '',
                'options'  => [
                    'products.id'               => 'ID',
                    'products.name'             => 'Ürün Adı',
                    'products.final_price'      => 'Ürün Fiyatı',
                    'products_main.category_id' => 'Kategori',
                    'products_main.brand_id'    => 'Marka',
                    'products_main.type_id'     => 'Ürün Türü',
                    'products.status'           => 'Durum',
                ],
            ],
            'order_direction' => [
                'label'    => 'Sıralama Yönü',
                'type'     => 'select',
                'column'   => 'order_direction',
                'operator' => '',
                'options'  => [
                    'asc'  => 'A-Z',
                    'desc' => 'Z-A',
                ],
            ],
        ];
    }

    public function getFiltersForCategories(): array
    {
        $categories = Category::all()->pluck('name', 'id')->toArray();
        $categories = ['all' => 'Tümü'] + $categories;

        return [
            'name'            => [
                'label'       => 'Kategori Adı',
                'type'        => 'text',
                'column'      => 'name',
                'column_live' => 'name',
                'table'       => 'categories',
                'operator'    => 'like'
            ],
            'parent_id'       => [
                'label'       => 'Üst Kategori',
                'type'        => 'select',
                'column'      => 'parent_id',
                'column_live' => 'parent_id',
                'table'       => 'categories',
                'operator'    => '=',
                'options'     => $categories,
            ],
            'status'          => [
                'label'       => 'Durum',
                'type'        => 'select',
                'column'      => 'status',
                'column_live' => 'status',
                'table'       => 'categories',
                'operator'    => '=',
                'options'     => ['all' => 'Tümü', 'pasif', 'aktif'],
            ],
            'with_trashed'    => [
                'label'       => 'Silinmiş Veriler Getirilsin mi?',
                'type'        => 'select',
                'column'      => 'with_trashed',
                'column_live' => 'deleted_at',
                'table'       => 'discount_categories',
                'operator'    => '=',
                'options'     => ['Hayır', 'Evet'],
            ],
            'order_by'        => [
                'label'    => 'Sıralama Türü',
                'type'     => 'select',
                'column'   => 'order_by',
                'operator' => '',
                'options'  => [
                    'categories.id'        => 'ID',
                    'categories.name'      => 'Kategori Adı',
                    'categories.parent_id' => 'Üst Kategori',
                ],
            ],
            'order_direction' => [
                'label'    => 'Sıralama Yönü',
                'type'     => 'select',
                'column'   => 'order_direction',
                'operator' => '',
                'options'  => [
                    'asc'  => 'A-Z',
                    'desc' => 'Z-A',
                ],
            ],
        ];
    }

    public function getFiltersForBrands(): array
    {
        return [
            'name'            => [
                'label'       => 'Marka Adı',
                'type'        => 'text',
                'column'      => 'name',
                'column_live' => 'name',
                'table'       => 'brands',
                'operator'    => 'like'
            ],
            'status'          => [
                'label'       => 'Durum',
                'type'        => 'select',
                'column'      => 'status',
                'column_live' => 'status',
                'table'       => 'brands',
                'operator'    => '=',
                'options'     => ['all' => 'Tümü', 'pasif', 'aktif'],
            ],
            'is_featured'     => [
                'label'       => 'Öne Çıkarılma Durumu',
                'type'        => 'select',
                'column'      => 'is_featured',
                'column_live' => 'is_featured',
                'table'       => 'brands',
                'operator'    => '=',
                'options'     => ['all' => 'Tümü', 'Hayır', 'Evet'],
            ],
            'with_trashed'    => [
                'label'       => 'Silinmiş Veriler Getirilsin mi?',
                'type'        => 'select',
                'column'      => 'with_trashed',
                'column_live' => 'deleted_at',
                'table'       => 'discount_brands',
                'operator'    => '=',
                'options'     => ['Hayır', 'Evet'],
            ],
            'order_by'        => [
                'label'    => 'Sıralama Türü',
                'type'     => 'select',
                'column'   => 'order_by',
                'operator' => '',
                'options'  => [
                    'brands.id'          => 'ID',
                    'brands.name'        => 'Marka Adı',
                    'brands.status'      => 'Durum',
                    'brands.is_featured' => 'Öne Çıkarılma Durumu'
                ],
            ],
            'order_direction' => [
                'label'    => 'Sıralama Yönü',
                'type'     => 'select',
                'column'   => 'order_direction',
                'operator' => '',
                'options'  => [
                    'asc'  => 'A-Z',
                    'desc' => 'Z-A',
                ],
            ],
        ];
    }

    public function prepareDataRequest(): self
    {
        $data = request()->only('name', 'type', 'value', 'start_date', 'end_date', 'minimum_spend', 'status');

        $data['status']    = request()->has('status');
        $this->prepareData = $data;
        return $this;

    }

    public function setPrepareData(array $data): self
    {
        $this->prepareData = $data;
        return $this;
    }

    public function create(): Discounts
    {
        return $this->discount::create($this->prepareData);
    }

    public function getDiscounts(int $perPage = 0): LengthAwarePaginator|Collection
    {
        $query   = $this->discount::query();
        $filters = $this->getFilters();
        $query   = $this->filterService->applyFilters($query, $filters);
        if ($perPage) {
            return $this->filterService->paginate($query, $perPage);
        }
        return $query->get();
    }
    public function getDiscountWT(int $id): ?Discounts
    {
        return  $this->discount::query()->withTrashed()->find($id);
    }

    public function getById(int $id): Discounts|ModelNotFoundException
    {
        return $this->discount::findOrFail($id);
    }

    public function setDiscount(Discounts $discount): self
    {
        $this->discount = $discount;

        return $this;
    }

    public function update(array $data = null): bool
    {
        if (is_null($data)) {
            $data = $this->prepareData;
        }
        return $this->discount->update($data);
    }

    public function delete(): bool
    {
        return $this->discount->delete();
    }

    public function restore(): bool
    {
        return $this->discount->restore();
    }

    public function assignProductsProcess(array $productIds): bool
    {
        $oldAssignProducts = $this->getAssignProducts()
                                  ->pluck('id')
                                  ->toArray();
        $newProductIds     = $this->diffNewOldAssignIds($productIds, $oldAssignProducts);
        if (count($newProductIds)) {
            $this->assignProducts($newProductIds);
            return true;
        }
        return false;

    }

    public function assignProducts(array $productIds): self
    {
        $this->discount->products()->attach($productIds);

        return $this;
    }

    public function getAssignProducts(): Collection
    {
        return $this->discount->products;
    }

    public function diffNewOldAssignIds($newIds, $oldIds): array
    {
        return array_diff($newIds, $oldIds);
    }

    public function assignCategoryProcess(array $categoryIds): bool
    {
        $oldAssignCategories = $this->getAssignCategories()
                                    ->pluck('id')
                                    ->toArray();
        $newCategoryIds      = $this->diffNewOldAssignIds($categoryIds, $oldAssignCategories);
        if (count($newCategoryIds)) {
            $this->assignCategories($newCategoryIds);
            return true;
        }
        return false;
    }

    public function getAssignCategories(): Collection
    {
        return $this->discount->categories;
    }

    public function assignCategories(array $categoryIds): self
    {
        $this->discount->categories()->attach($categoryIds);
        return $this;
    }

    public function assignBrandProcess(array $brandIds): bool
    {
        $oldAssignBrands = $this->getAssignBrands()
                                ->pluck('id')
                                ->toArray();
        $newBrandIds     = $this->diffNewOldAssignIds($brandIds, $oldAssignBrands);
        if (count($newBrandIds)) {
            $this->assignBrands($newBrandIds);
            return true;
        }
        return false;
    }

    public function getAssignBrands(): Collection
    {
        return $this->discount->brands;
    }

    public function assignBrands(array $brandIds): self
    {
        $this->discount->brands()->attach($brandIds);
        return $this;
    }

    public function getDiscountForProductList(): LengthAwarePaginator
    {
        $query = Discounts::query()
                          ->join('discount_products', 'discount_products.discount_id', '=', 'discounts.id')
                          ->join('products', 'products.id', '=', 'discount_products.product_id')
                          ->join('products_main', 'products_main.id', '=', 'products.main_product_id')
                          ->join('categories', 'categories.id', '=', 'products_main.category_id')
                          ->join('brands', 'brands.id', '=', 'products_main.brand_id')
                          ->join('product_types', 'product_types.id', '=', 'products_main.type_id')
                          ->select('discounts.*',
                                   'discount_products.deleted_at',
                                   'discount_products.id as dpId',
                                   'products.id as pId',
                                   'products.name as pName',
                                   'products.final_price',
                                   'products.status',
                                   'products_main.category_id',
                                   'categories.name as cName',
                                   'brands.name as bName',
                                   'product_types.name as ptName'
                          )
                          ->where('discounts.id', request()->discount->id);

        if (empty(request()->all())) {
            $query = $query->whereNull('discount_products.deleted_at');
        }

        $filters = $this->getFiltersForProduct();
        $query   = $this->filterService->applyFilters($query, $filters);

        return $this->filterService->paginate($query, 10);
    }

    public function getDiscountForCategoryList(): LengthAwarePaginator
    {
        $query = Discounts::query()
                          ->join('discount_categories', 'discount_categories.discount_id', '=', 'discounts.id')
                          ->join('categories', 'categories.id', '=', 'discount_categories.category_id')
                          ->leftJoin('categories as parentCategory', 'parentCategory.id', '=', 'categories.parent_id')
                          ->select('discounts.*',
                                   'discount_categories.deleted_at',
                                   'discount_categories.id as dcId',
                                   'categories.id as cId',
                                   'categories.name as cName',
                                   'categories.parent_id',
                                   'parentCategory.name as parentCategoryName')
                          ->where('discounts.id', request()->discount->id);
        if (empty(request()->all())) {
            $query = $query->whereNull('discount_categories.deleted_at');
        }

        $filters = $this->getFiltersForCategories();
        $query   = $this->filterService->applyFilters($query, $filters);
        return $this->filterService->paginate($query, 10);
    }

    public function getDiscountCategoryWT(int $discountCategoryId): ?DiscountCategories
    {
        return DiscountCategories::query()
                                 ->withTrashed()
                                 ->find($discountCategoryId);
    }
    public function getDiscountProductWT(int $discountProductId): ?DiscountProducts
    {
        return DiscountProducts::query()
                                 ->withTrashed()
                                 ->find($discountProductId);
    }
    public function getDiscountBrandWT(int $discountBrandId): ?DiscountBrands
    {
        return DiscountBrands::query()
                               ->withTrashed()
                               ->find($discountBrandId);
    }

    public function getDiscountForBrandList(): LengthAwarePaginator
    {
        $query = Discounts::query()
                          ->join('discount_brands', 'discount_brands.discount_id', '=', 'discounts.id')
                          ->join('brands', 'brands.id', '=', 'discount_brands.brand_id')
                          ->select('discounts.*',
                                   'discount_brands.deleted_at',
                                   'discount_brands.id as dbId',
                                   'brands.id as bId',
                                   'brands.name as bName',
                                   'brands.logo')
                          ->where('discounts.id', request()->discount->id);
        if (empty(request()->all())) {
            $query = $query->whereNull('discount_brands.deleted_at');
        }

        $filters = $this->getFiltersForBrands();
        $query   = $this->filterService->applyFilters($query, $filters);

        return $this->filterService->paginate($query, 10);
    }
}
