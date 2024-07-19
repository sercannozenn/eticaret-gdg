<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandStoreRequest;
use App\Http\Requests\BrandUpdateRequest;
use App\Models\Brand;
use App\Services\BrandService;
use App\Services\DiscountService;
use App\Services\FilterService;
use App\Traits\GdgException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Throwable;

class BrandController extends Controller
{
    use GdgException;
    public function __construct(public BrandService $brandService)
    {
    }

    public function index()
    {
        $brands = $this->brandService->getBrands(10);
        $filters = $this->brandService->getFilters();

        return view('admin.brand.index', compact('brands', 'filters'));
    }

    public function create()
    {
        return view('admin.brand.create_edit');
    }

    public function store(BrandStoreRequest $request)
    {
        try
        {
            $this->brandService->prepareDataRequest()->create();

            alert()->success('Başarılı', 'Marka kaydedildi');
            return redirect()->route('admin.brand.index');
        }
        catch (Throwable $exception)
        {
            dd($exception->getMessage());
            return $this->exception($exception, 'admin.brand.index',"Marka eklenmedi");
        }

    }

    public function edit(Brand $brand)
    {
        return view('admin.brand.create_edit', compact('brand'));
    }

    public function update(BrandUpdateRequest $request, Brand $brand)
    {
        try
        {
            $this->brandService
                ->setBrand($brand)
                ->prepareDataRequest()
                ->update();

            alert()->success('Başarılı', 'Marka güncellendi');
            return redirect()->route('admin.brand.index');
        }
        catch (Throwable $exception)
        {
            return $this->exception($exception, "admin.brand.index","Marka güncellenemedi");
        }
    }

    public function delete(Brand $brand)
    {
        try
        {
            $this->brandService->setBrand($brand)->delete();
            alert()->success('Başarılı', 'Marka silindi');

            return redirect()->back();
        }
        catch (Throwable $exception)
        {
            return $this->exception($exception, "admin.brand.index",'Marka Silinemedi');
        }
    }

    public function changeStatus(Request $request)
    {
        $id = $request->id;

        $brand = $this->brandService->getById($id);
        if (is_null($brand))
        {
            return response()
                ->json()
                ->setData(['message' => 'Marka bulunamadı'])
                ->setStatusCode(404)
                ->setCharset('utf-8')
                ->header('Content-Type', 'application/json')
                ->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        }

        $data = ['status' => !$brand->status];

        $this->brandService
            ->setBrand($brand)
            ->setPrepareData($data)
            ->update();

        return response()
            ->json()
            ->setData($brand)
            ->setStatusCode(200)
            ->setCharset('utf-8')
            ->header('Content-Type', 'application/json')
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE);

    }

    public function changeIsFeatured(Request $request)
    {
        $id = $request->id;

        $brand = $this->brandService->getById($id);
        if (is_null($brand))
        {
            return response()
                ->json()
                ->setData(['message' => 'Marka bulunamadı'])
                ->setStatusCode(404)
                ->setCharset('utf-8')
                ->header('Content-Type', 'application/json')
                ->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        }

        $data = ['is_featured' => !$brand->is_featured];

        $this->brandService
            ->setBrand($brand)
            ->setPrepareData($data)
            ->update();

        return response()
            ->json()
            ->setData($brand)
            ->setStatusCode(200)
            ->setCharset('utf-8')
            ->header('Content-Type', 'application/json')
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE);

    }

    public function showDiscounts(Brand $brand, DiscountService $discountService, FilterService $filterService)
    {
        $query = $brand->discounts()->whereHas('brands', function ($query) use ($brand){
            $query->where('brands.id', $brand->id);
        });

        list($discounts, $filters) = $discountService->getDiscountsForBrands($query, 10);
        $data               = $brand;
        $filterRoute        = route('admin.brand.show-discounts', $data->id);
        $deleteRoute        = route('admin.discount.remove-brand', [
            'discount' => 'gdg_cat_discount',
            'brand' => $brand->id
        ]);
        $restoreRoute       = route('admin.discount.restore-brand', ['discount' => 'gdg_cat_discount',
                                                                        'brand' => $brand->id]);
        $restoreElementName = 'discount_brand_id';

        return view('admin.discount.general-discount-list',
                    compact('data',
                            'discounts',
                            'filters',
                            'filterRoute',
                            'deleteRoute',
                            'restoreRoute',
                            'restoreElementName'
                    ));
    }

}
