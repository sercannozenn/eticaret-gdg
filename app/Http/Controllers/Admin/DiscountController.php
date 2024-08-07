<?php

namespace App\Http\Controllers\Admin;

use App\Enums\DiscountType;
use App\Http\Controllers\Controller;
use App\Http\Requests\DiscountAssignProductsRequest;
use App\Http\Requests\DiscountStoreRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\DiscountProducts;
use App\Models\Discounts;
use App\Models\Product;
use App\Services\BrandService;
use App\Services\CategoryService;
use App\Services\DiscountService;
use App\Services\ProductService;
use App\Traits\GdgException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Throwable;

class DiscountController extends Controller
{
    use GdgException;

    public function __construct(public DiscountService $discountService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $discounts = $this->discountService->getDiscounts(10);
        $filters   = $this->discountService->getFilters();
        return view('admin.discount.index', compact('filters', 'discounts'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = DiscountType::cases();
        return view('admin.discount.create_edit', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DiscountStoreRequest $request)
    {
        try {
            $this->discountService->prepareDataRequest()->create();

            alert()->success('Başarılı', 'İndirim kaydedildi');
            return redirect()->route('admin.discount.index');
        }
        catch (Throwable $exception) {
            return $this->exception($exception, "admin.discount.index", "İndirim eklenmedi");
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
    public function edit(Discounts $discount)
    {
        $types    = DiscountType::cases();

        return view('admin.discount.create_edit', compact('discount', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DiscountStoreRequest $request, string $id)
    {
        try {
            $discount = $this->discountService->getById($id);
            $this->discountService->setDiscount($discount)->prepareDataRequest()->update();

            alert()->success('Başarılı', 'İndirim güncellendi');
            return redirect()->route('admin.discount.index');
        }
        catch (Throwable $exception) {
            return $this->exception($exception, "admin.discount.index", "İndirim güncellenemedi");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Discounts $discount)
    {
        try {
            $this->discountService->setDiscount($discount)->delete();
            alert()->success('Başarılı', 'İndirim silindi');

            return redirect()->back();
        }
        catch (Throwable $exception) {
            return $this->exception($exception, "admin.discount.index", 'İndirim Silinemedi');
        }
    }

    public function restore(Request $request)
    {
        try {
            $discountID = $request->discount_restore;
            $discount   = $this->discountService->getDiscountWT($discountID);
            if ($discount)
            {
                $this->discountService->setDiscount($discount)->restore();
                alert()->success('Başarılı', 'İndirim tanımlaması geri getirildi.');
                return redirect()->back();
            }
            alert()->error('Başarısız', 'İndirim tanımlaması bulunamadı ve geri getirilemedi.');
            return redirect()->back();
        }
        catch (Throwable $exception) {
            return $this->exception($exception, 'admin.discount.index', "İndirim tanımlaması geri getirilemedi.");
        }

    }

    public function changeStatus(Request $request)
    {
        try {
            $id = $request->id;

            $discount = $this->discountService->getById($id);

            $data = ['status' => !$discount->status];

            $this->discountService
                ->setDiscount($discount)
                ->setPrepareData($data)
                ->update();

            return response()
                ->json()
                ->setData($discount)
                ->setStatusCode(200)
                ->setCharset('utf-8')
                ->header('Content-Type', 'application/json')
                ->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        }
        catch (ModelNotFoundException $exception) {
            return $this->jsonException($exception, ['message' => 'İndirim Bulunamadı'], 404);
        }
        catch (Throwable $exception) {
            return $this->jsonException($exception, ['message' => $exception->getMessage()]);
        }

    }

    public function showAssignProductsForm(Discounts $discount, ProductService $productService)
    {
        $products = $productService->getAllProductsActive();
        $data     = (object)['items'       => $products,
                             'title'       => 'Ürüne İndirim Ekleme',
                             'label'       => 'İndirim Yapılacak Ürün',
                             'select_id'   => 'product_ids',
                             'select_name' => 'product_ids',
                             'option'      => 'İndirim Yapılacak Ürünü Seçebilirsiniz.',
                             'route'       => route('admin.discount.assign-products', $discount->id),
                             'message'     => 'Lütfen indirim yapılacak ürünü seçiniz.'
        ];
        return view('admin.discount.assign-product.assign', compact('data', 'discount'));
    }

    public function assignProducts(DiscountAssignProductsRequest $request, Discounts $discount)
    {
        try {
            $result = $this->discountService->setDiscount($discount)->assignProductsProcess($request->product_ids);

            if ($result) {
                alert()->success('Başarılı', 'Atama yapıldı.');
                return redirect()->back();
            }
            else {
                alert()->info('Atama yapılmadı', 'Daha önceden ürüne aynı indirim eklenmiştir.');
                return redirect()->back();
            }
        }
        catch (Throwable $exception) {
            dd($exception->getMessage());
        }
    }

    public function showProductsList(Request $request, Discounts $discount)
    {
        $filters   = $this->discountService->getFiltersForProduct();
        $discounts = $this->discountService->getDiscountForProductList();

        return view('admin.discount.assign-product.product-list', compact('discount', 'discounts', 'filters'));
    }

    public function removeProduct(Discounts $discount)
    {
        try {
            $productID = request()->product_remove;
            $discount->products()->updateExistingPivot($productID, ['deleted_at' => now()]);
            alert()->success('Başarılı', 'Ürün indirimden kaldırıldı.');
            return redirect()->back();
        }
        catch (Throwable $exception) {
            return $this->exception($exception, 'admin.discount.index', "Ürün indirimden kaldırılamadı.");
        }
    }

    public function restoreProduct(Request $request)
    {
        try {
            $discountProductId = $request->discount_product_id;
            $discountProduct   = $this->discountService->getDiscountProductWT($discountProductId);
            if ($discountProduct) {
                $discountProduct->restore();
                alert()->success('Başarılı', 'Ürün indirimi geri getirildi.');
                return redirect()->back();
            }
            alert()->error('Başarısız', 'Ürüne tanımlanmış indirim bulunamadı ve geri getirilemedi.');
            return redirect()->back();
        }
        catch (Throwable $exception) {
            return $this->exception($exception, 'admin.discount.index', "Ürün indirimi geri getirilemedi.");
        }

    }

    public function showCategoriesList(Request $request, Discounts $discount)
    {
        $filters   = $this->discountService->getFiltersForCategories();
        $discounts = $this->discountService->getDiscountForCategoryList();

        return view('admin.discount.assign-product.category-list', compact('discount', 'discounts', 'filters'));

    }

    public function showAssignCategoriesForm(Discounts $discount, CategoryService $categoryService)
    {
        $categories = $categoryService->getAllCategoriesActive();
        $data       = (object)['items'       => $categories,
                               'title'       => 'Kategoriye İndirim Ekleme',
                               'label'       => 'İndirim Yapılacak Kategori',
                               'select_id'   => 'category_ids',
                               'select_name' => 'category_ids',
                               'option'      => 'İndirim Yapılacak Kategoriyi Seçebilirsiniz.',
                               'route'       => route('admin.discount.assign-categories', $discount->id),
                               'message'     => 'Lütfen indirim yapılacak kategoriyi seçiniz.'
        ];
        return view('admin.discount.assign-product.assign', compact('data', 'discount'));
    }

    public function assignCategories(Request $request, Discounts $discount)
    {
        $request->validate([
                               'category_ids'   => ['required', 'array'],
                               'category_ids.*' => ['exists:categories,id']
                           ]);
        try {
            $result = $this->discountService
                ->setDiscount($discount)
                ->assignCategoryProcess($request->category_ids);

            if ($result) {
                alert()->success('Başarılı', 'Atama yapıldı.');
                return redirect()->back();
            }
            else {
                alert()->info('Atama yapılmadı', 'Daha önceden kategoriye aynı indirim eklenmiştir.');
                return redirect()->back();
            }
        }
        catch (Throwable $exception) {
            dd($exception->getMessage());
        }
    }

    public function removeCategory(Discounts $discount, Category $category)
    {
        try {
            $discount->categories()->updateExistingPivot($category->id, ['deleted_at' => now()]);
            alert()->success('Başarılı', 'Kategori indirimden kaldırıldı.');
            return redirect()->back();
        }
        catch (Throwable $exception) {
            return $this->exception($exception, 'admin.discount.index', "Kategori indirimden kaldırılamadı.");
        }

    }

    public function restoreCategory(Request $request)
    {
        try {
            $discountCategoryId = $request->discount_category_id;
            $discountCategory   = $this->discountService->getDiscountCategoryWT($discountCategoryId);
            if ($discountCategory) {
                $discountCategory->restore();
                alert()->success('Başarılı', 'Kategori geri getirildi.');
                return redirect()->back();
            }
            alert()->error('Başarısız', 'Kategoriye tanımlanmış indirim bulunamadı ve geri getirilemedi.');
            return redirect()->back();
        }
        catch (Throwable $exception) {
            return $this->exception($exception, 'admin.discount.index', "Kategori geri getirilemedi.");
        }

    }

    public function showAssignBrandsForm(Discounts $discount, BrandService $brandService)
    {
        $brands = $brandService->getAllActive();

        $data = (object)['items'       => $brands,
                         'title'       => 'Markaya İndirim Ekleme',
                         'label'       => 'İndirim Yapılacak Marka',
                         'select_id'   => 'brands_ids',
                         'select_name' => 'brands_ids',
                         'option'      => 'İndirim Yapılacak Markayı Seçebilirsiniz.',
                         'route'       => route('admin.discount.assign-brands', $discount->id),
                         'message'     => 'Lütfen indirim yapılacak markayı seçiniz.'
        ];
        return view('admin.discount.assign-product.assign', compact('data', 'discount'));
    }

    public function assignBrands(Request $request, Discounts $discount)
    {
        $request->validate([
                               'brands_ids'   => ['required', 'array'],
                               'brands_ids.*' => ['exists:brands,id']
                           ]);
        try {
            $result = $this->discountService
                ->setDiscount($discount)
                ->assignBrandProcess($request->brands_ids);

            if ($result) {
                alert()->success('Başarılı', 'Atama yapıldı.');
                return redirect()->back();
            }
            else {
                alert()->info('Atama yapılmadı', 'Daha önceden kategoriye aynı indirim eklenmiştir.');
                return redirect()->back();
            }
        }
        catch (Throwable $exception) {
            dd($exception->getMessage());
        }
    }

    public function showBrandsList(Request $request, Discounts $discount)
    {
        $filters   = $this->discountService->getFiltersForBrands();
        $discounts = $this->discountService->getDiscountForBrandList();

        return view('admin.discount.assign-product.brand-list', compact('discount', 'discounts', 'filters'));

    }

    public function removeBrand(Discounts $discount, Brand $brand)
    {
        try {
            $discount->brands()->updateExistingPivot($brand->id, ['deleted_at' => now()]);
            alert()->success('Başarılı', 'Marka indirimden kaldırıldı.');
            return redirect()->back();
        }
        catch (Throwable $exception) {
            return $this->exception($exception, 'admin.discount.index', "Marka indirimden kaldırılamadı.");
        }

    }

    public function restoreBrand(Request $request)
    {
        try {
            $discountBrandId = $request->discount_brand_id;
            $discountBrand   = $this->discountService->getDiscountBrandWT($discountBrandId);
            if ($discountBrand) {
                $discountBrand->restore();
                alert()->success('Başarılı', 'Marka geri getirildi.');
                return redirect()->back();
            }
            alert()->error('Başarısız', 'Marka tanımlanmış indirim bulunamadı ve geri getirilemedi.');
            return redirect()->back();
        }
        catch (Throwable $exception) {
            return $this->exception($exception, 'admin.discount.index', "Marka geri getirilemedi.");
        }

    }

}
