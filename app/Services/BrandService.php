<?php

namespace App\Services;

use App\Models\Brand;
use Exception;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class BrandService
{

    private array $prepareData = [];

    public function __construct(public Brand         $brand,
                                public ImageService  $imageService,
                                public FilterService $filterService
    )
    {
    }

    /**
     * @param int $id
     *
     * @return Brand|null
     */
    public function getById(int $id): Brand|null
    {
        return $this->brand::query()->where('id', $id)->first();
    }

    public function getAllPaginate(int $page = 10, $orderBy = ['order', 'DESC']): LengthAwarePaginator
    {
        return $this->brand::orderBy($orderBy[0], $orderBy[1])->paginate($page);
    }

    public function getAll($orderBy = ['order', 'DESC'])
    {
        return $this->brand::orderBy($orderBy[0], $orderBy[1])->get();
    }

    public function getBrands(int $perPage = 0)
    {
        $query   = $this->brand::query();
        $filters = $this->getFilters();
        $query   = $this->filterService->applyFilters($query, $filters);
        if ($perPage) {
            return $this->filterService->paginate($query, $perPage);
        }
        return $query->get();
    }

    public function getFilters(): array
    {
        return [
            'order'           => [
                'label'    => 'Sıra Numarası',
                'type'     => 'number',
                'column'   => 'order',
                'operator' => '='
            ],
            'name'            => [
                'label'    => 'Marka Adı',
                'type'     => 'text',
                'column'   => 'name',
                'operator' => 'like'
            ],
            'slug'            => [
                'label'    => 'Slug',
                'type'     => 'text',
                'column'   => 'slug',
                'operator' => 'like'
            ],
            'status'          => [
                'label'    => 'Durum',
                'type'     => 'select',
                'column'   => 'status',
                'operator' => '=',
                'options'  => ['all' => 'Tümü', 'pasif', 'aktif'],
            ],
            'is_featured'     => [
                'label'    => 'Öne Çıkarılma Durumu',
                'type'     => 'select',
                'column'   => 'is_featured',
                'operator' => '=',
                'options'  => ['all' => 'Tümü', 'Hayır', 'Evet'],
            ],
            'order_by'        => [
                'label'    => 'Sıralama Türü',
                'type'     => 'select',
                'column'   => 'order_by',
                'operator' => '',
                'options'  => [
                    'id'          => 'ID',
                    'order'       => 'Sıra Numarası',
                    'name'        => 'Marka Adı',
                    'status'      => 'Durum',
                    'is_featured' => 'Öne Çıkarılma Durumu'
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

    public function create(array $data = null): Brand
    {
        if (is_null($data)) {
            $data = $this->prepareData;
        }

        return $this->brand::create($data);
    }

    /**
     * @throws Exception
     */
    public function prepareDataRequest(): self
    {
        $data = request()->only('name', 'order');

        $logoPath = $this->uploadLogo($data['name']);
        if (!is_null($logoPath) || (is_null($logoPath) && is_null($this->brand->logo))) {
            $this->deleteLogo();
            $data['logo'] = $logoPath;
        }

        $slug = $this->slugGenerate($data['name'], request()->slug);

        $data['slug']        = $slug;
        $data['status']      = request()->has('status');
        $data['is_featured'] = request()->has('is_featured');


        $this->prepareData = $data;

        return $this;
    }

    public function setPrepareData(array $data): self
    {
        $this->prepareData = $data;
        return $this;
    }

    public function uploadLogo(string $fileName): string|null
    {
        if (request()->has('logo')) {
            $logo     = request()->file('logo');
            $path     = 'uploads/brands/original';
            $fileName = str_replace("storage", "", $fileName);

            return $this->imageService->singleUpload($logo, $fileName, $path);
        }
        return null;
    }

    /**
     * @param string $slug
     *
     * @return Brand|null
     */
    public function checkSlug(string $slug): Brand|null
    {
        return $this->brand::query()->where('slug', $slug)->first();
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
                throw new Exception('Slug değeriniz boş veya daha önce farklı bir kategori tarafından kullanılıyor olablir.', 400);
            }
        }
        else {
            $slug = Str::slug($slug);
        }

        return $slug;
    }

    public function setBrand(Brand $brand): self
    {
        $this->brand = $brand;
        return $this;
    }

    public function update(array $data = null): bool
    {
        if (is_null($data)) {
            $data = $this->prepareData;
        }
        return $this->brand->update($data);
    }

    public function delete(): bool
    {
        $this->deleteLogo();

        return $this->brand->delete();
    }

    public function deleteLogo(): void
    {
        $logo = $this->brand->logo;
        $path = is_null($logo) ? '' : pathEditor($this->brand->logo);

        if (file_exists(storage_path("app/".$path))) {
            $this->imageService->deleteImage($path);
        }
    }

    public function getFeaturedBrands(): Collection
    {
        return $this->brand::query()
                           ->where('status', 1)
                           ->where('is_featured', 1)
                           ->get();
    }

    public function getAllActive(): Collection
    {
        return $this->brand::query()
            ->where('status', 1)
            ->get();
    }

}
