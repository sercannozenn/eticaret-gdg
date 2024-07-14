<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class FilterService
{
    public function __construct(public Request $request)
    {
    }

    public function applyFilters($query, array $filters)
    {
        foreach ($filters as $filterKey => $filterValue) {
            if ($this->request->filled($filterKey) &&
                !($filterValue['type'] == 'select' && $this->request->$filterKey == 'all') &&
                $filterKey != 'order_by' &&
                $filterKey != 'order_direction'
            ) {
                $requestValue = $filterValue['operator'] == 'like' ? '%' . $this->request->$filterKey . '%' : $this->request->$filterKey;
                if (isset($filterValue['table']) && $filterKey != 'with_trashed') {
                    $query = $query->where($filterValue['table'] . '.' . $filterValue['column_live'], $filterValue['operator'], $requestValue);
                }elseif ($filterKey == 'with_trashed'){
                    if ($requestValue == 0){
                        $query = $query->whereNull($filterValue['table'] . '.' . $filterValue['column_live']);
                    }
                    if ($requestValue == 1){
                        $query = $query->withTrashed();
                    }
                }
                else {
                    $query = $query->where($filterValue['column'], $filterValue['operator'], $requestValue);
                }
            }
        }
        if ($this->request->filled('order_by') && $this->request->filled('order_direction')) {
            $query->orderBy($this->request->order_by, $this->request->order_direction);
        }
        return $query;
    }

    public function paginate($query, $perPage = 10): LengthAwarePaginator
    {
        return $query->paginate($perPage);
    }
}
