<?php

namespace App\Services;

use App\Enums\DiscountType;
use App\Models\Discounts;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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
        $types = ['all' => 'Tümü'] + array_map(fn($case) => $case->value, DiscountType::cases());

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

    public function getDiscounts(int $perPage = 0)
    {
        $query   = $this->discount::query();
        $filters = $this->getFilters();
        $query   = $this->filterService->applyFilters($query, $filters);
        if ($perPage) {
            return $this->filterService->paginate($query, $perPage);
        }
        return $query->get();
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
        if (is_null($data))
        {
            $data = $this->prepareData;
        }
        return $this->discount->update($data);
    }

    public function delete(): bool
    {
        return $this->discount->delete();
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
}
