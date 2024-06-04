<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use App\Services\CategoryService;
use App\Traits\GdgException;
use Illuminate\Http\Request;
use Throwable;

class CategoryController extends Controller
{
    use GdgException;

    public function __construct(public CategoryService $categoryService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = $this->categoryService->getAllCategoriesPaginate();

        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = $this->categoryService->getAllCategories();

        return view('admin.category.create_edit')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryStoreRequest $request)
    {
        try
        {
            $this->categoryService->prepareDataRequest()->create();

            alert()->success('Başarılı', 'Kategori kaydedildi');
            return redirect()->route('admin.category.index');
        }
        catch (Throwable $exception)
        {
            return $this->exception($exception, "admin.category.index","Kategori eklenmedi");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $categories = $this->categoryService->getAllCategories();
        return view('admin.category.create_edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryUpdateRequest $request, Category $category)
    {
        try
        {
            $this->categoryService
                ->setCategory($category)
                ->prepareDataRequest()
                ->update();

            alert()->success('Başarılı', 'Kategori güncellendi');
            return redirect()->route('admin.category.index');
        }
        catch (Throwable $exception)
        {
            return $this->exception($exception, "admin.category.index","Kategori güncellenemedi");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        dd($category);
        try
        {
            $this->categoryService->setCategory($category)->delete();
            alert()->success('Başarılı', 'Kategori silindi');

            return redirect()->back();
        }
        catch (Throwable $exception)
        {
            return $this->exception($exception, "admin.category.index",'Kategori Silinemedi');
        }

    }

    public function front()
    {
        $categories = Category::query()
                              ->with('children')
                              ->whereHas('children')
                              ->whereNull('parent_id')
                              ->get();
        return view('categories', compact('categories'));
    }

    public function changeStatus(Request $request)
    {
        $id = $request->id;

        $category = $this->categoryService->getById($id);
        if (is_null($category))
        {
            return response()
                ->json()
                ->setData(['message' => 'Kategori bulunamadı'])
                ->setStatusCode(404)
                ->setCharset('utf-8')
                ->header('Content-Type', 'application/json')
                ->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        }

        $data = ['status' => !$category->status];

        $this->categoryService
            ->setCategory($category)
            ->setPrepareData($data)
            ->update();

        return response()
            ->json()
            ->setData($category)
            ->setStatusCode(200)
            ->setCharset('utf-8')
            ->header('Content-Type', 'application/json')
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE);

    }
}
