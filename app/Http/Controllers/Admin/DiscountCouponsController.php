<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DiscountCouponStoreRequest;
use App\Http\Requests\DiscountCouponUpdateRequest;
use App\Models\DiscountCoupons;
use App\Services\DiscountCouponService;
use App\Services\DiscountService;
use App\Traits\GdgException;
use Illuminate\Http\Request;
use Throwable;

class DiscountCouponsController extends Controller
{
    use GdgException;

    public function __construct(public DiscountCouponService $discountCouponService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $filters = $this->discountCouponService->getFilters();
        $coupons = $this->discountCouponService->getCoupons(10);

        return view('admin.discount.coupon.index', compact('filters', 'coupons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(DiscountService $discountService)
    {
        $discounts = $discountService->getDiscounts();
        return view('admin.discount.coupon.create_edit', compact('discounts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DiscountCouponStoreRequest $request)
    {
        try {
            $this->discountCouponService->prepareDataRequest()->create();

            alert()->success('Başarılı', 'İndirim Kodu kaydedildi');
            return redirect()->route('admin.discount-coupons.index');
        }
        catch (Throwable $exception) {
            return $this->exception($exception, 'admin.discount-coupons.index', "İndirim kodu kaydedilmedi.");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, DiscountService $discountService)
    {
        $discounts = $discountService->getDiscounts();
        $discount  = $this->discountCouponService->getById($id);

        return view('admin.discount.coupon.create_edit', compact('discount', 'discounts'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DiscountCouponUpdateRequest $request, string $id)
    {
        try {
            $discountCoupons = $this->discountCouponService->getById($id);
            if ($discountCoupons) {
                $this->discountCouponService
                    ->setDiscountCoupon($discountCoupons)
                    ->prepareDataRequest()
                    ->update();
                alert()->success('Başarılı', 'İndirim Kuponu güncellendi');
                return redirect()->route('admin.discount-coupons.index');
            }
            alert()->info('Bilgi', 'İndirim Kuponu bulunamadı ve güncellenmedi.');
            return redirect()->route('admin.discount-coupons.index');

        }
        catch (Throwable $exception) {
            return $this->exception($exception, "admin.discount-coupons.index", "İndirim Kuponu güncellenemedi");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $discountCoupons = $this->discountCouponService->getById($id);
            if ($discountCoupons) {
                $this->discountCouponService
                    ->setDiscountCoupon($discountCoupons)
                    ->delete();

                alert()->success('Başarılı', 'İndirim Kuponu silindi');
                return redirect()->route('admin.discount-coupons.index');
            }
            alert()->info('Bilgi', 'İndirim Kuponu bulunamadı ve silinemedi.');
            return redirect()->route('admin.discount-coupons.index');
        }
        catch (Throwable $exception) {
            return $this->exception($exception, "admin.discount-coupons.index", "İndirim Kuponu silinemedi");
        }
    }

    public function restore(Request $request)
    {
        try {
            $discountCouponID = $request->discount_coupon;
            $discountCoupon   = $this->discountCouponService->getByIdWT($discountCouponID);
            if ($discountCoupon) {
                $this->discountCouponService->setDiscountCoupon($discountCoupon)->restore();
                alert()->success('Başarılı', 'İndirim Kodu geri getirildi.');
                return redirect()->back();
            }
            alert()->error('Başarısız', 'İndirim Kodu bulunamadı ve geri getirilemedi.');
            return redirect()->back();
        }
        catch (Throwable $exception) {
            return $this->exception($exception, 'admin.discount.index', "İndirim tanımlaması geri getirilemedi.");
        }
    }
}
