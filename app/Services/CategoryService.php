<?php

namespace App\Services;

use App\Enums\DiscountType;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class CategoryService
{
    private array $prepareData = [];

    /**
     * @param Category $category
     */
    public function __construct(public Category      $category,
                                public FilterService $filterService)
    {
    }

    /**
     * @param Category $category
     *
     * @return $this
     */
    public function setCategory(Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection
     */
    public function getAllCategories(): Collection
    {
        return $this->category::all();
    }

    /**
     * @param int $page
     * @param     $orderBy
     *
     * @return LengthAwarePaginator
     */
    public function getAllCategoriesPaginate(int $page = 10, $orderBy = ['id', 'DESC']): LengthAwarePaginator
    {
        return $this->category::orderBy($orderBy[0], $orderBy[1])->paginate($page);
    }

    public function getCategories(int $perPage = 0)
    {
        $query   = $this->category::query()->with('parentCategory');
        $filters = $this->getFilters();
        $query   = $this->filterService->applyFilters($query, $filters);
        if ($perPage) {
            return $this->filterService->paginate($query, $perPage);
        }
        return $query->get();
    }

    public function getFilters(): array
    {
        $categories = Category::all()->pluck('name', 'id')->toArray();
        $categories = ['all' => 'Tümü'] + $categories;

        return [
            'name'              => [
                'label'    => 'Kategori Adı',
                'type'     => 'text',
                'column'   => 'name',
                'operator' => 'like'
            ],
            'short_description' => [
                'label'    => 'Kısa Açıklama',
                'type'     => 'text',
                'column'   => 'short_description',
                'operator' => 'like'
            ],
            'description'       => [
                'label'    => 'Açıklama',
                'type'     => 'text',
                'column'   => 'description',
                'operator' => 'like'
            ],
            'parent_id'         => [
                'label'    => 'Üst Kategori',
                'type'     => 'select',
                'column'   => 'parent_id',
                'operator' => '=',
                'options'  => $categories,
            ],
            'status'            => [
                'label'    => 'Durum',
                'type'     => 'select',
                'column'   => 'status',
                'operator' => '=',
                'options'  => ['all' => 'Tümü', 'pasif', 'aktif'],
            ],
            'order_by'          => [
                'label'    => 'Sıralama Türü',
                'type'     => 'select',
                'column'   => 'order_by',
                'operator' => '',
                'options'  => [
                    'id'        => 'ID',
                    'name'      => 'Kategori Adı',
                    'status'    => 'Durum',
                    'parent_id' => 'Üst Kategori',
                ],
            ],
            'order_direction'   => [
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


    /**
     * @return $this
     * @throws Exception
     */
    public function prepareDataRequest(): self
    {
        $data = request()->only('name', 'short_description', 'description');


        $slug = $this->slugGenerate($data['name'], request()->slug);

        $data['slug']   = $slug;
        $data['status'] = request()->has('status');
        if (request()->parent_id != -1) {
            $data['parent_id'] = request()->parent_id;
        }

        $this->prepareData = $data;

        return $this;
    }

    /**
     * @param array $data
     *
     * @return $this
     */
    public function setPrepareData(array $data): self
    {
        $this->prepareData = $data;
        return $this;
    }

    /**
     * @param array|null $data
     *
     * @return Category
     */
    public function create(array $data = null): Category
    {
        if (is_null($data)) {
            $data = $this->prepareData;
        }
        return $this->category::create($data);
    }

    /**
     * @param array|null $data
     *
     * @return bool
     */
    public function update(array $data = null): bool
    {
        if (is_null($data)) {
            $data = $this->prepareData;
        }
        return $this->category->update($data);
    }

    /**
     * @return bool
     */
    public function delete(): bool
    {
        return $this->category->delete();
    }

    /**
     * @param string $slug
     *
     * @return Category|null
     */
    public function checkSlug(string $slug): Category|null
    {
        return $this->category::query()->where('slug', $slug)->first();
    }

    /**
     * @param string      $name
     * @param string|null $slug
     *
     * @return string
     * @throws Exception
     */
    public function slugGenerate(string $name, string|null $slug): string
    {
        if (is_null($slug)) {
            $slug  = Str::slug(mb_substr($name, 0, 70));
            $check = $this->checkSlug($slug);
            if ($check) {
                throw new \Exception('Slug değeriniz boş veya daha önce farklı bir kategori tarafından kullanılıyor olablir.', 400);
            }
        }
        else {
            $slug = Str::slug($slug);
        }

        return $slug;
    }

    /**
     * @param int $id
     *
     * @return Category|null
     */
    public function getById(int $id): Category|null
    {
        return $this->category::query()->where('id', $id)->first();
    }

    public function getBySlugName(string $slug): Category|null
    {
        return $this->category::query()
                              ->with(['subCategoriesActive'])
                              ->where('slug', $slug)
                              ->first();
    }

    public function getAllCategoriesActive(): Collection
    {
        return $this->category::query()
                              ->where('status', 1)
                              ->get();
    }

    public function getAllParentCategoriesActive(): Collection
    {
        return $this->category::query()
                              ->with(['subCategories' => function ($query)
                              {
                                  $query->where('status', 1);
                              }])
                              ->where('status', 1)
                              ->whereNull('parent_id')
                              ->get();
    }

    public function getMaxDiscountCategory(float $basePrice): float
    {
        $discounts = $this->category
                          ->discounts()
                          ->where('status', 1)
                          ->wherePivotNull('deleted_at')
                          ->get();
        $highestDiscountValue = 0;
        foreach ($discounts as $discount){
            if ($discount->type == DiscountType::Percentage->value){
                $calculatedDiscountPrice = $basePrice * $discount->value / 100;
                if ($calculatedDiscountPrice > $highestDiscountValue){
                    $highestDiscountValue = $calculatedDiscountPrice;
                }
            }else if ($discount->type == DiscountType::Amount->value && $discount->value > $highestDiscountValue){
                $highestDiscountValue = $discount->value;
            }
        }

        return (float)$highestDiscountValue;
    }
}
