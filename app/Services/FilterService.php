<?php

namespace App\Services;

use Illuminate\Http\Request;

class FilterService
{
    public function __construct(public Request $request)
    {
    }

    public function applyFilters($query, array $filters)
    {
        foreach ($filters as $filterKey => $filterValue){
            if ($this->request->filled($filterKey) &&
                !($filterValue['type'] == 'select' && $this->request->$filterKey == 'all') &&
                $filterKey != 'order_by' &&
                $filterKey != 'order_direction'
            ){
                $requestValue = $filterValue['operator'] == 'like' ? '%'. $this->request->$filterKey . '%' : $this->request->$filterKey;
                $query = $query->where($filterValue['column'], $filterValue['operator'],  $requestValue);
            }

            if ($this->request->filled('order_by') && $this->request->filled('order_direction')){
                $query->orderBy($this->request->order_by, $this->request->order_direction);
            }
        }
        return $query;
    }

    public function paginate($query, $perPage = 10)
    {
        return $query->paginate($perPage);
    }
}
